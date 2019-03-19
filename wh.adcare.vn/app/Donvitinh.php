<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Donvitinh extends Model {

	protected $table = 'donvitinh';

	protected $fillable = ['dvt_ma','dvt_ten'];

 	public $timestamps = false;

}
