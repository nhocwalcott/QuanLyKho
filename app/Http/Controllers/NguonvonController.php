<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class NguonvonController extends Controller {

	public function getList()
	{
		return view('danhmuc.nguonvon.nguonvon');
	}

	public function getAdd()
	{
		return view('danhmuc.nguonvon.themnguonvon');
	}

	public function getEdit()
	{
		return view('danhmuc.nguonvon.suanguonvon');
	}

}
