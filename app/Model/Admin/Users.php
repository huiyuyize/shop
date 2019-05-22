<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';


    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    public function uinfo()
    {
     	return $this->hasMany('App\Model\Admin\User_info','uid','id');
    }
}
