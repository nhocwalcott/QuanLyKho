<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\PhongbanAddRequest;
use App\Http\Requests\PhongbanEditRequest;

use App\Phongban;
use DB;

class PhongbanController extends Controller {

	public function getList()
	{
		$phongban = DB::table('phongban')->get();
		return view('danhmuc.phongban.phongban', compact('phongban'));
	}

	public function getAdd()
	{
		return view('danhmuc.phongban.themphongban');
	}

	public function postAdd(PhongbanAddRequest $request)
	{
		$phongban = new Phongban;
		$phongban->pb_ma = $request->txtMa;
		$phongban->pb_ten = $request->txtTen;
		$phongban->save();
		return redirect()->route('danhmuc.phongban.getList');
	}


	public function getEdit($id)
	{
		$data = DB::table('phongban')->where('id', $id)->first();
		return view('danhmuc.phongban.suaphongban', compact('data'));
	}

	public function postEdit($id, PhongbanEditRequest $request)
	{
		DB::table('phongban')->where('id',$id)->update([
			'pb_ma' => $request->txtMa,
			'pb_ten' => $request->txtTen
			]);
		return redirect()->route('danhmuc.phongban.getList');
	}

	public function getDelete($id)
	{
		 DB::table('phongban')->where('id',$id)->delete();
		return redirect()->route('danhmuc.phongban.getList');
	}
}
