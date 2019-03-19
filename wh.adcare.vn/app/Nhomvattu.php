<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhomvattu extends Model {

	protected $table = 'nhomvattu';

	protected $fillable = ['nvt_ma','nvt_ten'];

 	public $timestamps = false;

}
