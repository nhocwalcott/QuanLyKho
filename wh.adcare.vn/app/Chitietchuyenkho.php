<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitietchuyenkho extends Model {

	protected $table = 'chitietchuyenkho';

	protected $fillable = ['ctck_soluong','ctck_thanhtien','vt_id','ck_id','khocu_id','khomoi_id'];

 	public $timestamps = false;

}
