<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MucdichController extends Controller {

	public function getList()
	{
		return view('danhmuc.mucdich.mucdich');
	}

	public function getAdd()
	{
		return view('danhmuc.mucdich.themmucdich');
	}

	public function getEdit()
	{
		return view('danhmuc.mucdich.suamucdich');
	}

}
