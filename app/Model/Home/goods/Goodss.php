<?php

namespace App\Model\Home\goods;

use Illuminate\Database\Eloquent\Model;

class goodss extends Model
{
    /**
     * 商品表
     *
     * @var string
     */
    protected $table = 'goods';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];
}
