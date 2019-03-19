<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vattu extends Model {

	protected $table = 'vattu';

	protected $fillable = ['vt_ma','vt_ten','dvt_id','nvt_id','cl_id','npp_id','nsx_id','vt_gia'];

 	public $timestamps = true;

}
