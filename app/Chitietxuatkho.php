<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitietxuatkho extends Model {

	protected $table = 'chitietxuatkho';

	protected $fillable = ['ctxk_soluong','ctxk_thanhtien','vt_id','xk_id'];

 	public $timestamps = false;

}
