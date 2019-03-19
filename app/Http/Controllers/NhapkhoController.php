<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;

use DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Cart,Request;
use App\Nhapkho;
use App\Chitietnhapkho;
use App\Vattukho;
use App\Serial;

class NhapkhoController extends Controller {

    public function getDanhsach()
    {
        $data = DB::table('nhapkho')->get();
      //  var_dump($data);
      return view('chucnang.nhapkho.danhsach',compact('data'));
    }

    public function getList()
    {
        $data = DB::table('nhaphanphoi')->get();
        $data1 = DB::table('vattu')
            ->join('donvitinh','donvitinh.id','=','vattu.dvt_id')
            ->select('vattu.*','donvitinh.dvt_ten')
            ->get();
        $dataKho = DB::table('kho')->get();
        $dataDonvitinh = DB::table('donvitinh')->get();
        $content = Cart::content();
        return view('chucnang.nhapkho.nhapkho',compact('data','data1','dataKho','dataDonvitinh','content'));
    }

    public function postList()
    {
        $id_user = Request::input('txtNV');
        $content = Cart::content();
        $nhapkho = new Nhapkho;
        $nhapkho->nk_ma = Request::input('txtID');
        $nhapkho->nk_ngaylap = date('Y-m-d');
        $nhapkho->nk_lydo = Request::input('txtLyDo');
        $nhapkho->nv_id = $id_user;
        $nhapkho->save();
        foreach ($content as  $item) {
            $chitiet = new Chitietnhapkho;
            $chitiet->ctnk_soluong = $item['qty'];
            $chitiet->vt_id = $item['id'];
            $chitiet->nk_id = $nhapkho->id;
            $chitiet->npp_id = $item['price'];
            $chitiet->kho_id = $item->options->idKho;
            $chitiet->save();
            $vt = DB::table('vattukho')
                ->where(
                    'vt_id',$item['id']
                )
                ->where('kho_id',$item->options->idKho
                )
                ->first();
            if (!is_null($vt)) {
                DB::table('vattukho')
                    ->where(
                        'vt_id',$item['id']
                    )
                    ->where('kho_id',$item->options->idKho
                    )
                    ->update([
                        'sl_nhap' => $vt->sl_nhap + $item['qty'],
                        'sl_ton' => $vt->sl_ton + $item['qty'],
                    ]);

            } else {
                $soluong = new Vattukho;
                $soluong->vt_id = $item['id'];
                $soluong->kho_id = $item->options->idKho;
                $soluong->sl_nhap = $item['qty'];
                $soluong->sl_ton = $item['qty'];
                $soluong->sl_xuat = 0;
                $soluong->save();
            }

        }
        Cart::destroy();
        return redirect()->route('chucnang.nhapkho.getList')->with(['flash_level'=>'success','flash_message'=>'Thêm thành công!!!']);
    }

    public function getAdd()
    {
        return view('chucnang.nhapkho.themnhapkho');
    }

    public function getEdit($id)
    {
        $nhaphanphois = DB::table('nhaphanphoi')->get();
        foreach ($nhaphanphois as $key => $val) {
            $nhaphanphoi[] = ['id' => $val->id, 'name'=> $val->npp_ten];
        }
        $nhapkho = DB::table('nhapkho')->where('id',$id)->first();
        $chitiet = DB::table('chitietnhapkho')->where('nk_id',$id)->get();
        return view('chucnang.nhapkho.suanhapkho',compact('nhapkho','chitiet','nhaphanphoi'));
    }

    public function postEdit(Request $request, $id)
    {
        DB::table('nhapkho')
            ->where('id',$id)
            ->update([
                'nk_ngaylap' =>	 Request::input('txtDate'),
                'nk_lydo'	=>  Request::input('txtLyDo'),
            ]);
        return redirect()->route('chucnang.nhapkho.danhsach');
    }
    // Xu ly nhap kho chi tiet theo serial
    public function getSerial($id)
    {
        $dt = DB::table('serial')->where('ctnk_id', $id)->get();
        $ctnk = DB::table('chitietnhapkho')->where('id', $id)->first();
        $sr_ht = DB::table('serial')->where('vt_id', $ctnk->vt_id)->get();
        $ctxk = DB::table('serial')->where('vt_id', $ctnk->vt_id)->get();

        if ((count($dt) == $ctnk->ctnk_soluong)) {
            echo "<script>
            	alert('Đã sinh serial');
            	</script>";
        } else {
            if ((count($dt) <> 0) && (count($dt) > $ctnk->ctnk_soluong)&& (count($ctxk)>0)){

                echo "<script>
            	alert('Không thế sửa');
            	</script>";
            }
            else  {
                DB::table('serial')->where('ctnk_id', $id)->delete();

                $vt = DB::table('chitietnhapkho')->where('id', $id)->first();
                $tonkho = DB::table('vattukho')->where('vt_id', $vt->vt_id)->first();
                if ($tonkho == 'null') {
                    $tong = 0;
                } else
                    $tong = $tonkho->sl_nhap;
                    $t = $vt->ctnk_soluong;
                    $sr_ht = count($sr_ht);
                    $vattu = DB::table('vattu')->where('id', $vt->vt_id)->first();
                    $ma = $vattu->vt_ma;
                    for ($i = $sr_ht; $i<$sr_ht+$t; $i++) {
                        $serial = new Serial();
                        $j = strval($i);
                        $serial1[$i] = $ma . $j;
                        $serial->serial = $serial1[$i];
                        $serial->ip = "";
                        $serial->quality = "OK";
                        $serial->vt_id = $vattu->id;
                        $serial->realserial = "";
                        $serial->received = "";
                        $serial->bophan = "";
                        $serial->ctnk_id = $id;
                        $serial->ctxk_id = "";
                        $serial->status = "";
                        $serial->save();
                    }

                    echo "<script>
            	alert('Sinh serial thành công');
            	</script>";

                }
            }



       return redirect()->route('chucnang.nhapkho.getVattu');
}
    public function postSerial(){

    }
    public function getDelete($id)
    {
        DB::table('chitietnhapkho')->where('nk_id',$id)->delete();
        DB::table('nhapkho')->where('id',$id)->delete();
        return redirect()->route('chucnang.nhapkho.danhsach');
    }

    public function getVattu()
    {
        $data = DB::table('nhapkho')->get();
        // print_r($data);
        return view('chucnang.nhapkho.xemtheovattu',compact('data'));
    }

    public function postNhaphang()
    {
        if(Request::ajax()) {
            $id = Request::get('id');
            $qty = Request::get('qty');
            $vt = DB::table('vattu')
                ->where('vattu.id',$id)
                ->join('donvitinh','donvitinh.id','=','vattu.dvt_id')
                ->select('vattu.*','donvitinh.dvt_ten')
                ->first();
            $idKho = Request::get('idKho');
            $kho = DB::table('kho')->where('id',$idKho)->first();
            $npp_id = Request::get('npp_id');
            Cart::add(['id' => $id, 'name' => $vt->vt_ten, 'qty' => $qty, 'price' => $npp_id,'options' => ['size' => $vt->dvt_ten,'kho'=>$kho->kho_ten,'idKho'=>$kho->id]]);
            echo "oke";
        }

    }
    public function convert_vi_to_en($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
        return $str;
    }
  public function postSearch(Request $request){
        var_dump($request);
        foreach ($request as $i){
            var_dump($i);
        }
  }
    public function postimport(Request $req){
        $file = 'C:\Users\V180847\Desktop\QUAN LY KHO\nhapkho.xlsx';

        $test = Excel::load($file, function($reader) {

        })->get();

        foreach ($test as $key => $value) {
            $arr[] = ['ctnk_soluong' => $value->ctnk_soluong, 'vt_id' => $value->vt_id,'npp_id' => $value->npp_id, 'nk_id' => $value->nk_id,'kho_id'=>$value->kho_id];
        }

        for ($i=0;$i<sizeof($arr);$i++){
            $kho_id = $arr[$i]['kho_id'];
            $ctnk = new Chitietnhapkho();
            $ctnk->ctnk_soluong =$arr[$i]['ctnk_soluong'];
            $ctnk->vt_id =$arr[$i]['vt_id'];
            $ctnk->npp_id =$arr[$i]['npp_id'];
            $ctnk->nk_id =$arr[$i]['nk_id'];
            $ctnk->save();
            $vt = DB::table('vattukho')
                ->where(
                    'vt_id',$arr[$i]['vt_id']
                )
                ->where('kho_id',$kho_id)
                ->first();
            if (!is_null($vt)) {
                DB::table('vattukho')
                    ->where(
                        'vt_id',$arr[$i]['vt_id']
                    )
                    ->where('kho_id',$kho_id)
                    ->update([
                        'sl_nhap' => $vt->sl_nhap + $arr[$i]['ctnk_soluong'],
                        'sl_ton' => $vt->sl_ton + $arr[$i]['ctnk_soluong']
                    ]);

            } else {
                $soluong = new Vattukho;
                $soluong->vt_id = $arr[$i]['vt_id'];
                $soluong->kho_id = $kho_id;
                $soluong->sl_nhap = $arr[$i]['ctnk_soluong'];
                $soluong->sl_ton = $arr[$i]['ctnk_soluong'];
                $soluong->sl_xuat = 0;
                $soluong->save();
            }
        }
        //var_dump($soluong);
        return redirect()->route('chucnang.nhapkho.getList')->with(['flash_level'=>'success','flash_message'=>'Thêm thành công!!!']);
    }
    public function getEdit1($id)
    {
        $nhaphanphois = DB::table('nhaphanphoi')->get();
        foreach ($nhaphanphois as $key => $val) {
            $nhaphanphoi[] = ['id' => $val->id, 'name'=> $val->npp_ten];
        }
        $chitiet = DB::table('chitietnhapkho')->where('id',$id)->get();
        return view('chucnang.nhapkho.suatheovattu',compact('chitiet','nhaphanphoi'));
    }

    public function postEdit1(Request $request, $id)
    {
        $chitiet = DB::table('chitietnhapkho')->where('id',$id)->first();
        $n = $chitiet->ctnk_soluong;
        $npp_id = Request::input('npp_id');
        $ctnk_soluong = Request::input('ctnk_soluong');
        $vt_id = Request::input('vt_id');
        $m = $ctnk_soluong - $n;
        $vt = DB::table('vattukho')
            ->where(
                'vt_id',$chitiet->vt_id)
            ->where('kho_id',$chitiet->kho_id)
            ->first();
            DB::table('vattukho')
                ->where(
                    'vt_id',$chitiet->vt_id
                )
                ->where('kho_id',$chitiet->kho_id)
                ->update([
                    'sl_nhap' => $vt->sl_nhap + $m,
                    'sl_ton' => $vt->sl_ton + $m
                ]);
            $data = DB::table('chitietnhapkho')
            ->where('id',$id)
            ->update([
                'vt_id' => $vt_id,
                'npp_id'	=>  $npp_id,
                'ctnk_soluong' => $ctnk_soluong,
            ]);
        return redirect()->route('chucnang.nhapkho.getVattu');
    }

    public function getDeletePro($id,$ad)
    {
        $chitiet = DB::table('chitietnhapkho')
            ->where('vt_id',$id)
            ->where('nk_id',$ad)
            ->first();
        $m = $chitiet->ctnk_soluong;
        $vt = DB::table('vattukho')
            ->where(
                'vt_id',$chitiet->vt_id)
            ->where('kho_id',$chitiet->kho_id)
            ->first();
        DB::table('vattukho')
            ->where(
                'vt_id',$chitiet->vt_id
            )
            ->where('kho_id',$chitiet->kho_id)
            ->update([
                'sl_nhap' => $vt->sl_nhap - $m,
                'sl_ton' => $vt->sl_ton - $m
            ]);

        $data = DB::table('chitietnhapkho')
            ->where('vt_id',$id)
            ->where('nk_id',$ad)
            ->delete();
        $data = DB::table('serial')
            ->where('ctnk_id',$chitiet->id)
            ->where('vt_id',$id)
            ->delete();
        return redirect()->route('chucnang.nhapkho.getVattu');
    }


    public function getPDF($id)
    {
        $cty = DB::table('thongtincongty')->where('id',1)->first();
        $nhapkho = DB::table('nhapkho')->where('id',$id)->first();
        $chitiet = DB::table('chitietnhapkho')->where('nk_id',$id)->get();
        $nv = DB::table('nhanvien')->where('id',$nhapkho->nv_id)->first();
        $npp = DB::table('nhaphanphoi')->where('id',$nhapkho->npp_id)->first();
        $pdf = PDF::loadView('chucnang.nhapkho.phieu',compact('nhapkho','chitiet','nv','cty','npp'));
        return $pdf->stream();
    }

}
