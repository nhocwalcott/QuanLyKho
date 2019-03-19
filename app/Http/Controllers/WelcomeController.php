<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	// public function __construct()
	// {
	// 	$this->middleware('guest');
	// }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('master');
	}

	public function danhmuc()
	{
		return view('danhmuc.danhmuc');
	}

	public function hethong()
	{
		return view('hethong.hethong');
	}

	public function chucnang()
	{
		return view('chucnang.chucnang');
	}

	public function trogiup()
	{
		return view('trogiup.trogiup');
	}

	public function check_status ()
    {
        $serial = DB::table('serial')->get();
        $i = 0;
        $kq = array();
        foreach ($serial as $sr) {
            $i++;
            $ip = $sr->ip;
            exec("ping -n 3 $ip", $output, $status);
            var_dump($output);
            if($output[0]=="IP address must be specified."){
                print_r ("IP_Trong");
                $output = "";
            } else if($output[2]=="Request timed out." or $output[2]=="PING: transmit failed. General failure."){
                print_r ("NOT_CONNECT");
                $output = "";
            }else{
                print_r ("CONNECT");
                $output = "";
            }

        }
    }
}
