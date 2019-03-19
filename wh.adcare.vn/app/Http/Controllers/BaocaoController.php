<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;

class BaocaoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getKhohang()
	{
		$data = DB::table('kho')->get();
		return view('chucnang.baocao.khohang',compact('data'));
	}

	public function thekho()
	{

		$data = DB::table('vattu')
			->get();
		return view('chucnang.baocao.thekho',compact('data'));
	}

	public function tongton()
	{
		$data = DB::table('kho')->get();
		return view('chucnang.baocao.baocaokho',compact('data'));
	}

	public function nhomton()
	{
		$data = DB::table('nhomvattu')
			->get();
		return view('chucnang.baocao.baocaonhomvt',compact('data'));
	}

	public function chatluongton()
	{
		$data = DB::table('chatluong')
			->get();
		return view('chucnang.baocao.baocaochatluong',compact('data'));
	}

	public function nppton()
	{
		$data = DB::table('nhaphanphoi')
			->get();
		return view('chucnang.baocao.baocaonpp',compact('data'));
	}

}
