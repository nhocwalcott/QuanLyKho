<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Kho extends Model {

	protected $table = 'kho';

	protected $fillable = ['kho_ma','kho_ten','kho_lienhe','kho_diachi','kho_sdt','kho_quanly','kho_ghichu'];

 	public $timestamps = false;

}
