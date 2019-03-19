<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vattukho extends Model {

	protected $table = 'vattukho';

	protected $fillable = ['vt_id','sl_nhap','sl_xuat','sl_ton','kho_id'];

 	public $timestamps = false;

}
