<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitietnhapkho extends Model {

	protected $table = 'chitietnhapkho';

	protected $fillable = ['ctnk_soluong','vt_id','nk_id','npp_id'];

 	public $timestamps = false;

}

