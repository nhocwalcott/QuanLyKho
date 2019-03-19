<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\VattuAddRequest;
use App\Http\Requests\VattuEditRequest;
use App\Vattu;
use App\Vattukho;
use DB,PDF;
use Maatwebsite\Excel\Facades\Excel;
class VattuController extends Controller {

	public function getList()
	{
		
		$vattu = DB::table('vattu')->get();
		return view('danhmuc.vattu.vattu',compact('vattu'));
	}

	public function getAdd()
	{
		$chatluongs = DB::table('chatluong')->get();
		foreach ($chatluongs as $key => $val) {
		   $chatluong[] = ['id' => $val->id, 'name'=> $val->cl_ten];
		  }
		$donvitinhs = DB::table('donvitinh')->get();
		foreach ($donvitinhs as $key => $val) {
		   $donvitinh[] = ['id' => $val->id, 'name'=> $val->dvt_ten];
		  }
		$nhomvattus = DB::table('nhomvattu')->get();
		foreach ($nhomvattus as $key => $val) {
		   $nhomvattu[] = ['id' => $val->id, 'name'=> $val->nvt_ten];
		  }
		$khos = DB::table('kho')->get();
		foreach ($khos as $key => $val) {
		   $kho[] = ['id' => $val->id, 'name'=> $val->kho_ten];
		  }
		$nhaphanphois = DB::table('nhaphanphoi')->get();
		foreach ($nhaphanphois as $key => $val) {
		   $nhaphanphoi[] = ['id' => $val->id, 'name'=> $val->npp_ten];
		  }
		$nhasanxuats = DB::table('nhasanxuat')->get();
		foreach ($nhasanxuats as $key => $val) {
		   $nhasanxuat[] = ['id' => $val->id, 'name'=> $val->nsx_ten];
		  }
		return view('danhmuc.vattu.themvattu', compact('chatluong','donvitinh','nhomvattu','kho','nhaphanphoi','nhasanxuat'));
	}

	public function postAdd(VattuAddRequest $request)
	{
		$vattu = new Vattu;
		$vattu->vt_ma = $request->txtMa;
		$vattu->vt_ten = $request->txtTen;
		$vattu->dvt_id = $request->selDVT;
		$vattu->nvt_id = $request->selNVT;
		$vattu->cl_id = $request->selCLuong;
		$vattu->nsx_id = $request->selNSX;
		$vattu->npp_id = $request->selNPP;
		$vattu->vt_gia = $request->txtGia;
		$vattu->save();
		$soluong = new Vattukho;
		$soluong->vt_id = $vattu->id;
		$soluong->kho_id = $request->selKho;
		$soluong->sl_nhap = $request->txtSLuong;
		$soluong->sl_ton = $request->txtSLuong;
		$soluong->sl_xuat = 0;
		$soluong->save();
		return redirect()->route('danhmuc.vattu.getList')->with(['flash_level'=>'success','flash_message'=>'Thêm thành công!!!']);
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
        $data = $request->search;
       // var_dump($data);
        $vattu = DB::table('vattu')->get();
        foreach ($vattu as $key => $val) {
            $vattu[] = ['id' => $val->id, 'name'=> $this->convert_vi_to_en($val->vt_ten)];
        }
       // var_dump($vattu);
        $vattu = DB::table('vattu')->where('vt_ten','like','%'.$data.'%')->get();
        return view('danhmuc.vattu.vattu',compact('vattu'));
    }

	public function getEdit($id)
	{
		$chatluongs = DB::table('chatluong')->get();
		foreach ($chatluongs as $key => $val) {
		   $chatluong[] = ['id' => $val->id, 'name'=> $val->cl_ten];
		  }
		$donvitinhs = DB::table('donvitinh')->get();
		foreach ($donvitinhs as $key => $val) {
		   $donvitinh[] = ['id' => $val->id, 'name'=> $val->dvt_ten];
		  }
		$nhomvattus = DB::table('nhomvattu')->get();
		foreach ($nhomvattus as $key => $val) {
		   $nhomvattu[] = ['id' => $val->id, 'name'=> $val->nvt_ten];
		  }
		$khos = DB::table('kho')->get();
		foreach ($khos as $key => $val) {
		   $kho[] = ['id' => $val->id, 'name'=> $val->kho_ten];
		  }
		$nhaphanphois = DB::table('nhaphanphoi')->get();
		foreach ($nhaphanphois as $key => $val) {
		   $nhaphanphoi[] = ['id' => $val->id, 'name'=> $val->npp_ten];
		  }
		$nhasanxuats = DB::table('nhasanxuat')->get();
		foreach ($nhasanxuats as $key => $val) {
		   $nhasanxuat[] = ['id' => $val->id, 'name'=> $val->nsx_ten];
		  }
		$vattu = DB::table('vattu')->where('id', $id)->first();

        $khovt = DB::table('vattukho')->where('vt_id',$id)->first();
        if ($khovt = 'null'){
		$khovt = new Vattukho();
		$khovt->id = 1;
		$khovt->vt_id = $id;
		$khovt->sl_nhap =0;
		$khovt->sl_xuat = 0;
		$khovt->sl_ton =0;
		$khovt->created_at = '2019-01-28 16:43:42';
		$khovt->updated_at = '2019-01-28 16:43:42';
        } else $khovt = DB::table('vattukho')->where('vt_id',$id)->first();

		return view('danhmuc.vattu.suavattu', compact('vattu','chatluong','donvitinh','nhomvattu','kho','nhaphanphoi','nhasanxuat','khovt'));
	}

	public function postEdit($id, VattuEditRequest $request)
	{
		DB::table('vattu')->where('id',$id)->update([
			'vt_ma' => $request->txtMa,
			'vt_ten' => $request->txtTen,
			'dvt_id' => $request->selDVT,
			'nvt_id' => $request->selNVT,
			'cl_id' => $request->selCLuong,
			'npp_id' => $request->selNPP,
			'nsx_id' => $request->selNSX,
			'vt_gia' => $request->txtGia
			]);
		DB::table('vattukho')->where('vt_id',$id)->update([
			'kho_id' => $request->selKho,
			'sl_nhap' => $request->txtSLuong,
			'sl_ton' => $request->txtSLuong,
			'sl_xuat' => 0,
			
			]);
		return redirect()->route('danhmuc.vattu.getList')->with(['flash_level'=>'success','flash_message'=>'Sửa thành công!!!']);
	}
    public function postimport(Request $req){
        $file = $req->excelfile;

        $test = Excel::load($file, function($reader) {

        })->get();

        foreach ($test as $key => $value) {
            $arr[] = ['vt_ma' => $value->vt_ma, 'vt_ten' => $value->vt_ten,'vt_gia' => $value->vt_gia,'dvt_id'=>$value->dvt_id,'nvt_id'=>$value->nvt_id,'cl_id'=>$value->cl_id,'npp_id' => $value->npp_id, 'nsx_id' => $value->nsx_id];
        }

        for ($i=0;$i<sizeof($arr);$i++){
            $vattu = new Vattu();
            $vattu->vt_ma =$arr[$i]['vt_ma'];
            $vattu->vt_ten =$arr[$i]['vt_ten'];
            $vattu->vt_gia =$arr[$i]['vt_gia'];
            $vattu->dvt_id =$arr[$i]['dvt_id'];
            $vattu->nvt_id =$arr[$i]['nvt_id'];
            $vattu->cl_id =$arr[$i]['cl_id'];
            $vattu->npp_id =$arr[$i]['npp_id'];
            $vattu->nsx_id=$arr[$i]['nsx_id'];
            $vattu->save();
        }

        return redirect()->route('danhmuc.vattu.getList')->with(['flash_level'=>'success','flash_message'=>'Thêm thành công!!!']);
    }
	public function getDelete($id)
	{
		DB::table('vattukho')->where('vt_id',$id)->delete();
		 DB::table('vattu')->where('id',$id)->delete();
		return redirect()->route('danhmuc.vattu.getList')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công!!!']);
	}

	public function getPDF()
    {
    	
        $vt = DB::table('vattu')
        	->join('donvitinh','donvitinh.id','=','vattu.dvt_id')
        	->join('nhomvattu','nhomvattu.id','=','vattu.nvt_id')
        	->join('nhaphanphoi','nhaphanphoi.id','=','vattu.npp_id')
        	->join('nhasanxuat','nhasanxuat.id','=','vattu.nsx_id')
        	->join('chatluong','chatluong.id','=','vattu.cl_id')
        	->select('vattu.*','donvitinh.dvt_ten','nhomvattu.nvt_ten','nhaphanphoi.npp_ten','nhasanxuat.nsx_ten','chatluong.cl_ten')
        	->get();
        // print_r($khachhang);
        $pdf = PDF::loadView('danhmuc.vattu.phieu',compact('vt'));
        return $pdf->stream();
    }
    public function getExport(){
        $vattu = DB::table('vattu')->get();
        $data = array();
        foreach ($vattu as $sr){
            $data[]= (array)$sr;
        }
        \Maatwebsite\Excel\Facades\Excel::create('Vattu',function($excel) use($data){
            $excel->sheet('Sheet1', function($sheet) use($data){
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }

}
