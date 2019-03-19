<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Congtrinh extends Model {

	protected $table = 'congtrinh';

	protected $fillable = ['ct_ma','ct_ten'];

 	public $timestamps = false;

}
