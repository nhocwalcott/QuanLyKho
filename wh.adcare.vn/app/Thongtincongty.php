<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Thongtincongty extends Model {

	protected $table = 'thongtincongty';

	protected $fillable = ['cty_ten','cty_diachi','cty_sdt','cty_fax','cty_web','cty_email'];

 	public $timestamps = false;

}
