<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PhanquyenController extends Controller {

	public function getList()
	{
		return view('hethong.phanquyen.phanquyen');
	}

	public function getAdd()
	{
		return view('hethong.phanquyen.themphanquyen');
	}

	public function getEdit()
	{
		return view('hethong.phanquyen.suaphanquyen');
	}

}
