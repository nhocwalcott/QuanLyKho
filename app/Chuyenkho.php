<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chuyenkho extends Model {

	protected $table = 'chuyenkho';

	protected $fillable = ['ck_ma','ck_ngay','ck_lydo','nv_id','ck_tongtien'];

 	public $timestamps = false;

}
