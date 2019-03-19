<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
use Input;
use DB,Request;
use Cart;
use App\Chuyenkho;
use App\Chitietchuyenkho;
use App\Vattukho;

class ChuyenkhoController extends Controller {

	public function getList()
	{
		$data = DB::table('congtrinh')->get();
		$data1 = DB::table('vattu')
			->join('donvitinh','donvitinh.id','=','vattu.dvt_id')
			->select('vattu.*','donvitinh.dvt_ten')
			->get();
		$dataKho = DB::table('kho')->get();
		$content = Cart::content();
		return view('chucnang.chuyenkho.chuyenkho',compact('data','data1','dataKho','content'));
	}

	public function postList()
	{
		$id_user = Request::input('txtNV');
		$content = Cart::content();
		$total = Cart::total();
		$chuyenkho = new Chuyenkho;
		$chuyenkho->ck_ma = Request::input('txtID');
		$chuyenkho->ck_ngay = date('Y-m-d');
		$chuyenkho->ck_lydo = Request::input('txtLyDo');
		$chuyenkho->ck_tongtien = $total;
		$chuyenkho->nv_id = $id_user;
		$chuyenkho->save();
		foreach ($content as  $item) {
			$chitiet = new Chitietchuyenkho;
			$chitiet->ctck_soluong = $item['qty'];
			$chitiet->ctck_thanhtien = $item['qty']*$item['price'];
			$chitiet->vt_id = $item['id'];
			$chitiet->ck_id = $chuyenkho->id;
			$chitiet->khocu_id = $item->options->idKho1;
			$chitiet->khomoi_id = $item->options->idKho2;
			$chitiet->save();

			$vtnhap = DB::table('vattukho')
				->where(
					'vt_id',$item['id']
					)
				->where('kho_id',$item->options->idKho2
					)
				->first();
			$vtxuat = DB::table('vattukho')
				->where(
					'vt_id',$item['id']
					)
				->where('kho_id',$item->options->idKho1
					)
				->first();
			DB::table('vattukho')
				->where(
					'vt_id',$item['id']
					)
				->where('kho_id',$item->options->idKho1
					)
				->update([
					'sl_xuat' =>$vtxuat->sl_xuat + $item['qty'],
					'sl_ton' =>$vtxuat->sl_ton - $item['qty'],
					]);
			if (!is_null($vtnhap)) {
				DB::table('vattukho')
				->where(
					'vt_id',$item['id']
					)
				->where('kho_id',$item->options->idKho2
					)
				->update([
					'sl_nhap' => $vtnhap->sl_nhap + $item['qty'],
					'sl_ton' => $vtnhap->sl_ton + $item['qty'],
					]);
				
			} else {
				$soluong = new Vattukho;
				$soluong->vt_id = $item['id'];
				$soluong->kho_id = $item->options->idKho2;
				$soluong->sl_nhap = $item['qty'];
				$soluong->sl_ton = $item['qty'];
				$soluong->sl_xuat = 0;
				$soluong->save();
			}
			
		}

		Cart::destroy();
		return redirect()->route('chucnang.chuyenkho.getList')->with(['flash_level'=>'success','flash_message'=>'Thêm thành công!!!']);
	}

	public function getAdd()
	{
		return view('chucnang.chuyenkho.themchuyenkho');
	}

	public function getEdit($id)
	{
		$data = DB::table('chitietchuyenkho')->where('ck_id',$id)->get();
		$chuyenkho = DB::table('chuyenkho')->where('id',$id)->first();
		return view('chucnang.chuyenkho.suatheochungtu',compact('chuyenkho','data'));
	}

	public function postEdit(Request $request, $id)
	{
		DB::table('chuyenkho')
			->where('id',$id)
			->update([
					'ck_ngay' => Request::input('txtDate'),
					'ck_lydo' => Request::input('txtLyDo'),
				]);
		return redirect()->route('chucnang.chuyenkho.getChungtu');
	}

	public function getDelete($id)
	{
		DB::table('chitietchuyenkho')->where('ck_id',$id)->delete();
		DB::table('chuyenkho')->where('id',$id)->delete();
		return redirect()->route('chucnang.chuyenkho.getChungtu');
	}

	public function getVattu()
	{
		$chuyenkho = DB::table('chuyenkho')->get();
		$data = DB::table('chitietchuyenkho')->get();
		return view('chucnang.chuyenkho.xemtheovattu',compact('data','chuyenkho'));
	}

	public function getChungtu()
	{
		$data = DB::table('chuyenkho')->get();
		return view('chucnang.chuyenkho.xemtheochungtu',compact('data'));
	}

	public function postChuyenkho()
	{
		
		if(Request::ajax()) {
            $id = Request::get('id');
            $qty = Request::get('qty');
            $idKho = Request::get('idKho');
            $idKho2 = Request::get('idKho2');
            
            	$kho1 = DB::table('kho')->where('id',$idKho)->first();
            	$kho2 = DB::table('kho')->where('id',$idKho2)->first();
            	
            	$vt = DB::table('vattu')
            	->where('vattu.id',$id)
            	->join('donvitinh','donvitinh.id','=','vattu.dvt_id')
				->select('vattu.*','donvitinh.dvt_ten')
            	->first();
            $vtkho = DB::table('vattukho')
            	->where('vt_id',$id)
            	->where('kho_id',$idKho)
            	->first();
            if ($vtkho->sl_ton >= $qty) {	
            	Cart::add(['id' => $id, 'name' => $vt->vt_ten, 
            				'qty' => $qty, 'price' => $vt->vt_gia,
            				'options' => [
            				'size' => $vt->dvt_ten,
            				'kho1'=>$kho1->kho_ten,
            				'idKho1'=>$kho1->id,
            				'kho2'=>$kho2->kho_ten,
            				'idKho2'=>$kho2->id
            				]
            				]);
            	echo "oke";
            } else {
            	echo "<script>
            		alert('Số lượng xuất lớn hơn số lượng tồn trong kho!');
            	</script>";
            }
        }
	}

	public function getDeletePro($id,$ad)
	{
		DB::table('chitietchuyenkho')
			->where('vt_id',$id)
			->where('ck_id',$ad)
			->delete();
		return redirect()->route('chucnang.chuyenkho.suatheovattu',$ad);
	}

	public function getEditPro()
	{	
		if(Request::ajax()) {
            $ckID = Request::get('ckID');
            $qty = Request::get('qty');
            $vtID = Request::get('vtID');
            $vt = DB::table('vattu')
            	->where('vattu.id',$vtID)
            	->first();
            DB::table('chitietchuyenkho')
			->where('vt_id',$vtID)
			->where('ck_id',$ckID)
			->update([
					'ctck_soluong' => $qty,
					'ctck_thanhtien' => $qty * $vt->vt_gia,
				]);
			$tong = DB::table('chitietchuyenkho')
				->where('ck_id',$ckID)
				->sum('ctck_thanhtien');
			DB::table('chuyenkho')
				->where('id',$ckID)
				->update([
					'ck_tongtien' =>$tong
					]);
            echo "oke";
        }
		

	}

	public function getEdit1($id)
	{
		$data1 = DB::table('vattu')
			->join('donvitinh','donvitinh.id','=','vattu.dvt_id')
			->select('vattu.*','donvitinh.dvt_ten')
			->get();
		$dataKho = DB::table('kho')->get();
		$data = DB::table('chitietchuyenkho')->where('ck_id',$id)->get();
		$chuyenkho = DB::table('chuyenkho')->where('id',$id)->first();
		return view('chucnang.chuyenkho.suatheovattu',compact('chuyenkho','data','data1','dataKho'));
	}

	public function postEdit1()
	{

	}

}
