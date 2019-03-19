<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\DonvitinhAddRequest;
use App\Http\Requests\DonvitinhEditRequest;

use App\Donvitinh;
use DB;

class DonvitinhController extends Controller {

	public function getList()
	{
		$donvitinh = DB::table('donvitinh')->get();
		return view('danhmuc.donvitinh.donvitinh', compact('donvitinh'));
	}

	public function getAdd()
	{
		return view('danhmuc.donvitinh.themdonvitinh');
	}

	public function postAdd(DonvitinhAddRequest $request)
	{
		$donvitinh = new Donvitinh;
		$donvitinh->dvt_ma = $request->txtMa;
		$donvitinh->dvt_ten = $request->txtTen;
		$donvitinh->save();
		return redirect()->route('danhmuc.donvitinh.getList')->with(['flash_level'=>'success','flash_message'=>'Thêm thành công!!!']);
	}


	public function getEdit($id)
	{
		$data = DB::table('donvitinh')->where('id', $id)->first();
		return view('danhmuc.donvitinh.suadonvitinh', compact('data'));
	}

	public function postEdit($id, DonvitinhEditRequest $request)
	{
		DB::table('donvitinh')->where('id',$id)->update([
			'dvt_ten' => $request->txtTen
			]);
		return redirect()->route('danhmuc.donvitinh.getList')->with(['flash_level'=>'success','flash_message'=>'Sửa thành công!!!']);
	}

	public function getDelete($id)
	{
		 DB::table('donvitinh')->where('id',$id)->delete();
		return redirect()->route('danhmuc.donvitinh.getList')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công!!!']);
	}

}
