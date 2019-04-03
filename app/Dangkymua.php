<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Dangkymua extends Model {

	protected $table = 'Dangkymua';

	protected $fillable = ['dkm_ma','dkm_ngaylap','dkm_lydo','nv_id'];

 	public $timestamps = false;
}
