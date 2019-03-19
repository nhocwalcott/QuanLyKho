<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\KhoAddRequest;
use App\Http\Requests\KhoEditRequest;

use App\Kho;
use DB;
use Maatwebsite\Excel\Facades\Excel;


class KhoController extends Controller {

	public function getList()
	{
		$kho = DB::table('kho')->get();
		return view('danhmuc.kho.kho', compact('kho'));
	}

	public function getAdd()
	{
		return view('danhmuc.kho.themkho');
	}

	public function postAdd(KhoAddRequest $request)
	{
		$kho = new Kho;
		$kho->kho_ma = $request->txtMa;
		$kho->kho_ten = $request->txtTen;
		$kho->kho_lienhe = $request->txtLienhe;
		$kho->kho_diachi = $request->txtDiachi;
		$kho->kho_sdt = $request->txtSDT;
		$kho->kho_quanly = $request->txtQuanly;
		$kho->kho_ghichu = $request->txtGhichu;
		$kho->save();
		return redirect()->route('danhmuc.kho.getList')->with(['flash_level'=>'success','flash_message'=>'Thêm thành công!!!']);
	}
    public function postimport(Request $req){
       $file = $req->excelfile;

        $test = Excel::load($file, function($reader) {

        })->get();

        foreach ($test as $key => $value) {
                   $arr[] = ['kho_ma' => $value->kho_ma, 'kho_ten' => $value->kho_ten,'kho_lienhe' => $value->kho_lienhe, 'kho_diachi' => $value->kho_diachi,'kho_sdt' => $value->kho_sdt, 'kho_quanly' => $value->kho_quanly,'kho_ghichu' => $value->kho_ghichu];
           }

        for ($i=0;$i<sizeof($arr);$i++){
            $kho = new Kho;
            $kho->kho_ma =$arr[$i]['kho_ma'];
            $kho->kho_ten =$arr[$i]['kho_ten'];
            $kho->kho_lienhe =$arr[$i]['kho_lienhe'];
            $kho->kho_diachi =$arr[$i]['kho_diachi'];
            $kho->kho_sdt =$arr[$i]['kho_sdt'];
            $kho->kho_quanly =$arr[$i]['kho_quanly'];
            $kho->kho_ghichu =$arr[$i]['kho_ghichu'];
            $kho->save();
        }

        return redirect()->route('danhmuc.kho.getList')->with(['flash_level'=>'success','flash_message'=>'Thêm thành công!!!']);
    }
	public function getEdit($id)
	{
		$data = DB::table('kho')->where('id', $id)->first();
		//var_dump($data);
		return view('danhmuc.kho.suakho', compact('data'));
	}

	public function postEdit($id, KhoEditRequest $request)
	{
		DB::table('kho')->where('id',$id)->update([
			'kho_ten' => $request->txtTen,
			'kho_lienhe' => $request->txtLienhe,
			'kho_diachi' => $request->txtDiachi,
			'kho_sdt' => $request->txtSDT,
			'kho_quanly' => $request->txtQuanly,
			'kho_ghichu' => $request->txtGhichu
			]);
		return redirect()->route('danhmuc.kho.getList')->with(['flash_level'=>'success','flash_message'=>'Sửa thành công!!!']);
	}

	public function getDelete($id)
	{
		 DB::table('kho')->where('id',$id)->delete();
		return redirect()->route('danhmuc.kho.getList')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công!!!']);
	}
    public function getExport(){
        $serial = DB::table('vattukho')->get();
        $data = array();
        foreach ($serial as $sr){
            $vattu = DB::table('vattu')->where('id',$serial->vt_id)->first();
            $kho = DB::table('kho')->where('id',$serial->kho_id)->first();
            $sr->mavattu = $vattu->vt_ma;
            $sr->model = $vattu->vt_gia;
            $sr->tenvattu = $vattu->vt_ten;
            $sr->kho = $kho->kho_ten;
            $data[]= (array)$sr;
        }
        \Maatwebsite\Excel\Facades\Excel::create('Serial',function($excel) use($data){
            $excel->sheet('Sheet1', function($sheet) use($data){
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }
}
