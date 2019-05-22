<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    protected $table = 'user_info';


    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

}
