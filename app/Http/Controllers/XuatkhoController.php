<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;

use DB;
use App\Xuatkho;
use App\Chitietxuatkho;
use Cart,Request;
use Maatwebsite\Excel\Facades\Excel;

class XuatkhoController extends Controller {

	public function getList()
	{
		$data = DB::table('congtrinh')->get();
		$data1 = DB::table('vattu')
			->join('donvitinh','donvitinh.id','=','vattu.dvt_id')
			->select('vattu.*','donvitinh.dvt_ten')
			->get();
		$dataKho = DB::table('kho')->get();
		$content = Cart::content();
		return view('chucnang.xuatkho.xuatkho',compact('data','data1','dataKho','content'));
	}
    public function postimport(Request $req){
        $file = 'C:\Users\V180847\Desktop\QUAN LY KHO\xuatkho.xlsx';

        $test = Excel::load($file, function($reader) {

        })->get();

        foreach ($test as $key => $value) {
            $arr[] = ['ctxk_soluong' => $value->ctxk_soluong, 'vt_id' => $value->vt_id, 'xk_id' => $value->nk_id,'kho_id'=>$value->kho_id];
        }

        for ($i=0;$i<sizeof($arr);$i++){
            $kho_id = $arr[$i]['kho_id'];
            $ctxk = new Chitietxuatkho();
            $ctxk->ctxk_soluong =$arr[$i]['ctxk_soluong'];
            $ctxk->ctxk_thanhtien = 0;
            $ctxk->vt_id =$arr[$i]['vt_id'];
            $ctxk->xk_id =$arr[$i]['xk_id'];
            $ctxk->save();
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
                        'sl_nhap' => $vt->sl_nhap + $arr[$i]['ctxk_soluong'],
                        'sl_ton' => $vt->sl_ton - $arr[$i]['ctxk_soluong']
                    ]);
            } else {
                $soluong = new Vattukho;
                $soluong->vt_id = $arr[$i]['vt_id'];
                $soluong->kho_id = $kho_id;
                $soluong->sl_nhap = 0;
                $soluong->sl_ton = $arr[$i]['ctxk_soluong'];
                $soluong->sl_xuat = $arr[$i]['ctxk_soluong'];
                $soluong->save();
            }
        }
        return redirect()->route('chucnang.xuatkho.getList')->with(['flash_level'=>'success','flash_message'=>'Thêm thành công!!!']);
    }

	public function postList()
	{
		$id_user = Request::input('txtNV');
		$content = Cart::content();
		$total = Cart::total();
		$xuatkho = new Xuatkho;
		$xuatkho->xk_ma = Request::input('txtID');
		$xuatkho->xk_ngaylap = date('Y-m-d');
		$xuatkho->xk_lydo = Request::input('txtLyDo');
		$xuatkho->xk_diachi = Request::input('txtDC');
		$xuatkho->xk_tongtien = $total;
		$xuatkho->ct_id =  Request::input('selCT') ;
		$xuatkho->nv_id = $id_user;
		$xuatkho->save();
		foreach ($content as  $item) {
			$chitiet = new Chitietxuatkho;
			$chitiet->ctxk_soluong = $item['qty'];
			$chitiet->ctxk_thanhtien = $item['qty']*$item['price'];
			$chitiet->vt_id = $item['id'];
			$chitiet->xk_id = $xuatkho->id;
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
					'sl_xuat' => $vt->sl_xuat + $item['qty'],
					'sl_ton' => $vt->sl_ton - $item['qty'],
					]);

			}
		}

		Cart::destroy();
		return redirect()->route('chucnang.xuatkho.getList')->with(['flash_level'=>'success','flash_message'=>'Thêm thành công!!!']);
	}

	public function getAdd()
	{
		return view('chucnang.xuatkho.themxuatkho');
	}
    public function getSerial($id){
	    $ttxuat = DB::table('chitietxuatkho')->where('id',$id)->first();
	    $xuatkho = DB::table('xuatkho')->where('id',$ttxuat->xk_id)->first();
	    $bophan = DB::table('congtrinh')->where('id',$xuatkho->ct_id)->first();
	    $ttnhap = DB::table('chitietnhapkho')->where('vt_id',$ttxuat->vt_id)->where('kho_id',$ttxuat->kho_id)->get();
	    $i =0;
		$listid = array();				
		foreach ($ttnhap as $tt){
		
			$listid[$i] = $tt->id;
			$i++;
			}
	        $seriallist = DB::table('serial')->whereIn('ctnk_id',$listid)->where('bophan','')->where('quality',"OK")->get();			
		return view('chucnang.xuatkho.serial',compact('seriallist','xuatkho','bophan','ttxuat'));
         
    }
    public function postSerial($id){
	    $status = Request::input('status');
	    $ttxuat = DB::table('chitietxuatkho')->where('id',$id)->first();
        $xuatkho = DB::table('xuatkho')->where('id',$ttxuat->xk_id)->first();
        $bophan = DB::table('congtrinh')->where('id',$xuatkho->ct_id)->first();
        $ttnhap = DB::table('chitietnhapkho')->where('vt_id',$ttxuat->vt_id)->where('kho_id',$ttxuat->kho_id)->get();
        foreach ($ttnhap as $tt){
            $seriallist = DB::table('serial')->where('ctnk_id',$tt->id)->get();
        }
        $t1 = DB::table('serial')->where('ctxk_id',$ttxuat->id)->count();
        $t = sizeof($status);
        if( ($t1+$t) > $ttxuat->ctxk_soluong){
            echo "<script>
            		alert('Số lượng Serial > So luong xuat!');
            	</script>";
        }else{
	    for ($i = 0;$i<$t;$i++){
	        $data =  DB::table('serial')
                ->where('serial',$status[$i])->first();
            DB::table('serial')
                ->where('serial',$status[$i])
                ->update([
                    'ctxk_id' =>$id ,
                    'received'	=>	$xuatkho->xk_diachi ,
                    'bophan'	=>  $bophan->ct_ten,
                ]);
        }
        return redirect()->route('chucnang.xuatkho.getSerial',$id);}
    }
    public function getSerial1($id){
        $ttxuat = DB::table('chitietxuatkho')->where('id',$id)->first();
	    $xuatkho = DB::table('chitietxuatkho')->where('id',$ttxuat->id)->first();
        $serial = DB::table('serial')->where('ctxk_id',$ttxuat->id)->get();
        return view('chucnang.xuatkho.serial1',compact('serial'));
    }
    public function postSerial1($id){
	    $serial1 =  DB::table('serial')
            ->where('serial',$id)->first();
        $tt = DB::table('serial')
            ->where('serial',$id)->first();

        $quality = Request::input('quality');
        if ($serial1->quality == "OK") {
           if ($quality == "NG"){
            $vattukho = DB::table('vattukho')->where('vt_id',$tt->vt_id)->first();
            $sl_xuat = $vattukho->sl_xuat -1;
            $sl_ton = $vattukho->sl_ton + 1;
            $vattukho = DB::table('vattukho')->where('vt_id',$tt->vt_id)->update([
                'sl_xuat'=>$sl_xuat,
                'sl_ton'=>$sl_ton
            ]);

        }
        }else if ($serial1->quality == "NG") {
            if ($quality == "OK") {
                $vattukho = DB::table('vattukho')->where('vt_id', $tt->vt_id)->first();
                $sl_xuat = $vattukho->sl_xuat + 1;
                $sl_ton = $vattukho->sl_ton - 1;
                $vattukho = DB::table('vattukho')->where('vt_id', $tt->vt_id)->update([
                    'sl_xuat' => $sl_xuat,
                    'sl_ton' => $sl_ton
                ]);
            } else if ($quality == "TL") {
                $vattukho = DB::table('vattukho')->where('vt_id', $tt->vt_id)->first();
                $sl_ton = $vattukho->sl_ton - 1;
                $vattukho = DB::table('vattukho')->where('vt_id', $tt->vt_id)->update([
                    'sl_ton' => $sl_ton
                ]);
            }
        }
        DB::table('serial')
            ->where('serial',$id)
            ->update([
                'quality'=>Request::input('quality'),
                'realserial'	=>	Request::input('realserial'),
                'received'	=>	Request::input('received'),
                'bophan'	=>  Request::input('bophan'),
                'ip'=>Request::input('ip')
            ]);
        $serial = DB::table('serial')->where('ctxk_id',$serial1->ctxk_id)->get();
        return redirect()->route('chucnang.xuatkho.getSerial1',$serial1->ctxk_id);
    }
	public function getEdit($id)
	{
		$congtrinhs = DB::table('congtrinh')->get();
		foreach ($congtrinhs as $key => $val) {
		   $congtrinh[] = ['id' => $val->id, 'name'=> $val->ct_ten];
		  }
		$xuatkho = DB::table('xuatkho')->where('id',$id)->first();
		$chitiet = DB::table('chitietxuatkho')->where('xk_id',$id)->get();
		return view('chucnang.xuatkho.suaxuatkho',compact('congtrinh','xuatkho','chitiet'));
	}

	public function postEdit($id)
	{
		DB::table('xuatkho')
			->where('id',$id)
			->update([
				'xk_ngaylap' =>	 Request::input('txtDate'),
				'ct_id'	=>	 Request::input('selCT'),
				'xk_lydo'	=>  Request::input('txtLyDo'),
				'xk_diachi'	=>  Request::input('txtDC'),
				]);
		return redirect()->route('chucnang.xuatkho.getChungtu');
	}

	public function getVattu()
	{

		$chitiets = DB::table('chitietxuatkho')->paginate(6);
        $chitiets->setPath('xemtheovattu');
		return view('chucnang.xuatkho.xemtheovattu',compact('chitiets'));
	}

	public function getChungtu()
	{
		$datas = DB::table('xuatkho')->paginate(6);
        $datas->setPath('xemtheochungtu');
		return view('chucnang.xuatkho.xemtheochungtu',compact('datas'));
	}

	public function postXuathang()
	{
        $content = Cart::content();
		if(Request::ajax()) {
			$idKho = Request::get('idKho');
            $id = Request::get('id');
            $qty = Request::get('qty');
            $vt = DB::table('vattu')
                ->where('vattu.id',$id)
                ->join('donvitinh','donvitinh.id','=','vattu.dvt_id')
                ->select('vattu.*','donvitinh.dvt_ten')
                ->first();
            $kho = DB::table('kho')->where('id',$idKho)->first();
            $vtkho = DB::table('vattukho')
            	->where('vt_id',$id)
            	->where('kho_id',$idKho)
            	->first();
            if ($vtkho->sl_ton >= $qty) {
            	Cart::add(['id' => $id, 'name' => $vt->vt_ten, 'qty' => $qty, 'price' => $vt->id,'options' => ['size' => $vt->dvt_ten,'kho'=>$kho->kho_ten,'idKho'=>$kho->id]]);
            	echo "oke";
            } else {
            	echo "<script>
            		alert('Số lượng xuất lớn hơn số lượng tồn trong kho!');
            	</script>";
            }
        }

	}

	public function getDelete($id)
	{
		DB::table('chitietxuatkho')->where('xk_id',$id)->delete();
		DB::table('xuatkho')->where('id',$id)->delete();

		// print_r($i);
		return redirect()->route('chucnang.xuatkho.xemtheochungtu');
	}

	public function getEdit1($id)
	{
		$congtrinhs = DB::table('congtrinh')->get();
		foreach ($congtrinhs as $key => $val) {
		   $congtrinh[] = ['id' => $val->id, 'name'=> $val->ct_ten];
		  }
        $chitiet = DB::table('chitietxuatkho')->where('id',$id)->get();

		return view('chucnang.xuatkho.suatheovattu',compact('chitiet','congtrinh'));
	}
    public function postEdit1(Request $request, $id)
    {
        $chitiet = DB::table('chitietxuatkho')->where('id',$id)->first();
        $n = $chitiet->ctxk_soluong;
        $npp_id = Request::input('npp_id');
        $ctxk_soluong = Request::input('ctxk_soluong');
        $vt_id = Request::input('vt_id');
        $m = $ctxk_soluong-$n;
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
                'sl_xuat' => $vt->sl_xuat + $m,
                'sl_ton' => $vt->sl_ton - $m
            ]);

        $data = DB::table('chitietxuatkho')
            ->where('id',$id)
            ->update([
                'ctxk_soluong' => $ctxk_soluong,
            ]);
        return redirect()->route('chucnang.xuatkho.getVattu');

    }

	public function getEditPro()
	{
		if(Request::ajax()) {
            $xkID = Request::get('xkID');
            $qty = Request::get('qty');
            $vtID = Request::get('vtID');
            $vt = DB::table('vattu')
            	->where('vattu.id',$vtID)
            	->first();
            DB::table('chitietxuatkho')
			->where('vt_id',$vtID)
			->where('xk_id',$xkID)
			->update([
					'ctxk_soluong' => $qty,
					'ctxk_thanhtien' => $qty * $vt->vt_gia,
				]);
			$tong = DB::table('chitietxuatkho')
				->where('xk_id',$xkID)
				->sum('ctxk_thanhtien');
			DB::table('xuatkho')
				->where('id',$xkID)
				->update([
					'xk_tongtien' =>$tong
					]);
            echo "oke";
        }


	}

    public function getDeletePro($id,$ad)
    {
        $chitiet = DB::table('chitietxuatkho')
            ->where('vt_id',$id)
            ->where('xk_id',$ad)
            ->first();
        $m = $chitiet->ctxk_soluong;
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
                'sl_xuat' => $vt->sl_xuat - $m,
                'sl_ton' => $vt->sl_ton + $m
            ]);
        DB::table('serial')
            ->where(
                'vt_id',$chitiet->vt_id
            )
            ->where('ctxk_id',$chitiet->id)
            ->update([
                'ctxk_id' => "",
                'bophan'=>"",
                'received'=>""
            ]);
        $data = DB::table('chitietxuatkho')
            ->where('vt_id',$id)
            ->where('xk_id',$ad)
            ->delete();
        return redirect()->route('chucnang.xuatkho.getVattu');
    }

}
