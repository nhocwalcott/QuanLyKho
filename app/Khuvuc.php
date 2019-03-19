<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Khuvuc extends Model {

protected $table = 'khuvuc';

 protected $fillable = ['kv_ma','kv_ten'];

 public $timestamps = false;

}
