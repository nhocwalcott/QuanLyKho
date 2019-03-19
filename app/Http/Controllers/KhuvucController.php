<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Khuvuc;
use App\Http\Requests\KhuvucAddRequest;
use App\Http\Requests\KhuvucEditRequest;
use DB;

class KhuvucController extends Controller {


	public function getList()
	{
		$khuvuc = DB::table('khuvuc')->get();
		return view('danhmuc.khuvuc.khuvuc',compact('khuvuc'));
	}

	public function getAdd()
	{
		return view('danhmuc.khuvuc.themkhuvuc');
	}

	public function postAdd(KhuvucAddRequest $request)
	{
		$khuvuc = new Khuvuc;
		$khuvuc->kv_ma = $request->txtMa;
		$khuvuc->kv_ten = $request->txtTen;
		$khuvuc->save();
		return redirect()->route('danhmuc.khuvuc.getList')->with(['flash_level'=>'success','flash_message'=>'Thêm thành công!!!']);
	}

	public function getEdit($id)
	{
		$data = DB::table('khuvuc')->where('id',$id)->first();
		return view('danhmuc.khuvuc.suakhuvuc',compact('data'));
	}


	public function postEdit(KhuvucEditRequest $request, $id)
	{
		DB::table('khuvuc')->where('id',$id)->update([
			'kv_ten' => $request->txtTen
			]);
		return redirect()->route('danhmuc.khuvuc.getList')->with(['flash_level'=>'success','flash_message'=>'Sửa thành công!!!']);
	}

	public function getDelete($id)
	{
		 DB::table('khuvuc')->where('id',$id)->delete();
		return redirect()->route('danhmuc.khuvuc.getList')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công!!!']);
	}
}
