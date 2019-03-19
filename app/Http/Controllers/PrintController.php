<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Serial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;


class PrintController extends Controller {

    public function printPreview(){
        $serial = DB::table('serial')->where('ip','<>','')->get();
        $i = count($serial);
        $kq = array();
        for($j = 0; $j<$i;$j++){
            echo $j;
            $sr = $serial[$j];
            $ip = $sr->ip;
            exec("ping -n 1 -w 1 $ip", $input, $result);

            if($result==0){
                DB::table('serial')
                    ->where(
                        'serial',$sr->serial                    )
                    ->update([
                        'status' => "CONNECT",
                    ]);
            }else{
                DB::table('serial')
                    ->where(
                        'serial',$sr->serial                    )
                    ->update([
                        'status' => "NOTCONNECT",
                    ]);
            }
    }
        $serial = DB::table('serial')->orderBy('status','DESC')->get();
        return view('printPreview',compact('serial'));
    }
    public function getExport(){
        $serial = DB::table('serial')->get();
        $data = array();
        foreach ($serial as $sr){
            $sr1 = $sr->serial;
            $barcode = "*".$sr1."*";
            $phieunhap = DB::table('chitietnhapkho')->where('id',$sr->ctnk_id)->first();
            $vattu = DB::table('vattu')->where('id',$phieunhap->vt_id)->first();
            $sr->barcode = $barcode;
            $sr->tenvattu = $vattu->vt_ten;
            $sr->model = $vattu->vt_gia;
            $data[]= (array)$sr;
        }
        \Maatwebsite\Excel\Facades\Excel::create('Serial',function($excel) use($data){
            $excel->sheet('Sheet1', function($sheet) use($data){
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }
}
