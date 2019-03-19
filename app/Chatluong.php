<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatluong extends Model {

	protected $table = 'chatluong';

	protected $fillable = ['cl_ma','cl_ten'];

 	public $timestamps = false;
}
