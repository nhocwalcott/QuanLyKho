<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Excel;

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
	public function export(){
        $vattu = DB::table('vattukho')
            ->join('vattu','vattu.id','=','vattukho.vt_id')
            ->join('donvitinh','donvitinh.id','=','vattu.dvt_id')
            ->select(
                'vattu.id',  'vattu.vt_ma','vattu.vt_ten','donvitinh.dvt_ten', 'vattu.vt_gia',
                'vattukho.sl_nhap','vattukho.sl_xuat',
                'vattukho.sl_ton', 'vattu.created_at'
            )
            ->get();
        var_dump($vattu);
        $data = array();
        $data=array('id','vt_ma','vt_ten','dvt_ten','vt_gia','sl_nhap','sl_xuat','sl_ton','created_at');
        foreach ($vattu as $item){
            $data['id']= $item->id;
            $data['vt_ma'] = $item->vt_ma;
        }
        var_dump($data);

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
    public function getExport(){
        $serial = DB::table('vattukho')->get();
        $data = array();
        foreach ($serial as $sr){
            $vattu = DB::table('vattu')->where('id',$sr->vt_id)->first();
            $kho = DB::table('kho')->where('id',$sr->kho_id)->first();
            $sr->mavattu = $vattu->vt_ma;
            $sr->model = $vattu->vt_gia;
            $sr->tenvattu = $vattu->vt_ten;
            $sr->kho = $kho->kho_ten;
            $data[]= (array)$sr;
        }
        \Maatwebsite\Excel\Facades\Excel::create('Tonkho',function($excel) use($data){
            $excel->sheet('Sheet1', function($sheet) use($data){
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }
    public function getExportKiemKe(){
        $dl = DB::table('chitietxuatkho')
            ->join('serial','serial.ctxk_id','=','chitietxuatkho.id')
            ->join('xuatkho','xuatkho.id','=','chitietxuatkho.xk_id')
            ->select( 'serial.vt_id','xuatkho.ct_id','serial.received','serial.id'
            )->get();
        $data = array();
        foreach ($dl as $sr){
            $congtrinh = DB::table('congtrinh')->where('id',$sr->ct_id)->first();
            $vattu = DB::table('vattu')->where('id',$sr->vt_id)->first();
            $sr->mavattu = $vattu->vt_ma;
            $sr->model = $vattu->vt_gia;
            $sr->tenvattu = $vattu->vt_ten;
            $sr->tenbophan = $congtrinh->ct_ten;
            $sr->key = $vattu->vt_ma.$sr->ct_id;
            $data[]= (array)$sr;
        }

        \Maatwebsite\Excel\Facades\Excel::create('DLKiemke',function($excel) use($data){
            $excel->sheet('Sheet1', function($sheet) use($data){
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }

}
