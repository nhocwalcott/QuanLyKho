<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\ThongtincongtyAddRequest;
use App\Http\Requests\ThongtincongtyEditRequest;

use App\Thongtincongty;
use DB;

class ThongtincongtyController extends Controller {

	public function getList()
	{
		$thongtincongty = DB::table('thongtincongty')->get();
		return view('hethong.thongtincongty.thongtincongty', compact('thongtincongty'));
	}

	public function getAdd()
	{
		return view('hethong.thongtincongty.thongtincongty');
	}

	public function postAdd(ThongtincongtyAddRequest $request)
	{
		$thongtincongty = new Thongtincongty;
		$thongtincongty->cty_ten = $request->txtTen;
		$thongtincongty->cty_diachi = $request->txtDiachi;
		$thongtincongty->cty_sdt = $request->txtSDT;
		$thongtincongty->cty_fax = $request->txtFAX;
		$thongtincongty->cty_web = $request->txtWEB;
		$thongtincongty->cty_email = $request->txtEmail;
		$thongtincongty->save();
		return redirect()->route('hethong.thongtincongty.getList');
	}

	public function getEdit($id)
	{
		$thongtincongty = DB::table('thongtincongty')->where('id', $id)->first();
		return view('hethong.thongtincongty.suathongtincongty', compact('thongtincongty'));
	}

	public function postEdit($id, ThongtincongtyEditRequest $request)
	{
		DB::table('thongtincongty')->where('id',$id)->update([
			'cty_ten' => $request->txtTen,
			'cty_diachi' => $request->txtDiachi,
			'cty_sdt' => $request->txtSDT,
			'cty_fax' => $request->txtFAX,
			'cty_web' => $request->txtWEB,
			'cty_email' =>$request->txtEmail
			]);
		return redirect()->route('hethong.thongtincongty.getList');
	}


}
