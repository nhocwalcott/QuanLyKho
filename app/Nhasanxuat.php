<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhasanxuat extends Model {

	protected $table = 'nhasanxuat';

	protected $fillable = ['nsx_ma','nsx_ten','kv_id'];

 	public $timestamps = false;

}
