<?php

namespace App\Model\Admin\goods;

use Illuminate\Database\Eloquent\Model;

class Goodstype extends Model
{
   	/**
     * 类型表
     *
     * @var string
     */
    protected $table = 'goods_type';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];
}
