<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\ChatluongAddRequest;
use App\Http\Requests\ChatluongEditRequest;

use App\Chatluong;
use DB;

class ChatluongController extends Controller {

	public function getList()
	{
		$chatluong = DB::table('chatluong')->get();
		return view('danhmuc.chatluong.chatluong', compact('chatluong'));
	}

	public function getAdd()
	{
		return view('danhmuc.chatluong.themchatluong');
	}

	public function postAdd(ChatluongAddRequest $request)
	{
		$chatluong = new Chatluong;
		$chatluong->cl_ma = $request->txtMa;
		$chatluong->cl_ten = $request->txtTen;
		$chatluong->save();
		return redirect()->route('danhmuc.chatluong.getList')->with(['flash_level'=>'success','flash_message'=>'Thêm thành công!!!']);
	}


	public function getEdit($id)
	{
		$data = DB::table('chatluong')->where('id', $id)->first();
		return view('danhmuc.chatluong.suachatluong', compact('data'));
	}

	public function postEdit($id, ChatluongEditRequest $request)
	{
		DB::table('chatluong')->where('id',$id)->update([
			'cl_ten' => $request->txtTen
			]);
		return redirect()->route('danhmuc.chatluong.getList')->with(['flash_level'=>'success','flash_message'=>'Sửa thành công!!!']);
	}

	public function getDelete($id)
	{
		 DB::table('chatluong')->where('id',$id)->delete();
		return redirect()->route('danhmuc.chatluong.getList');
	}
}
