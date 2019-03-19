<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Xuatkho extends Model {

	protected $table = 'xuatkho';

	protected $fillable = ['xk_ma','xk_ngaylap','xk_lydo','xk_diachi','xk_tongtien','ct_id','nv_id'];

 	public $timestamps = false;

}
