<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Serial extends Model {

    protected $table = 'serial';

    protected $fillable = ['serial','ip','received','bophan','ctnk_id','ctxk_id','status'];

    public $timestamps = false;

}
