<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitietdangkymua extends Model {

	protected $table = 'chitietdangkymua';

	protected $fillable = ['ctdkm_soluong','vt_id','nk_id','ct_id'];

 	public $timestamps = false;

}

