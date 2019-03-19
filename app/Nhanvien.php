<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhanvien extends Model {
	
	protected $table = 'nhanvien';

	protected $fillable = ['nv_ma','nv_ten','nv_gioitinh','nv_ngaysinh','nv_cmnd','nv_quequan','nv_sdt','nv_email','nv_ngayvaolam','pb_id','users_id'];

 	public $timestamps = true;

}
