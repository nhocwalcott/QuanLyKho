<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhapkho extends Model {

	protected $table = 'nhapkho';

	protected $fillable = ['nk_ma','nk_ngaylap','nk_lydo','nv_id'];

 	public $timestamps = false;
}
