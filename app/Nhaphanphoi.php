<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhaphanphoi extends Model {

	protected $table = 'nhaphanphoi';

	protected $fillable = ['npp_ma','npp_ten','npp_diachi','npp_sdt','npp_fax','npp_email','npp_taikhoan','npp_nhanviendaidien','kv_id'];

 	public $timestamps = false;
}
