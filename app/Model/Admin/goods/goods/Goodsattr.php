<?php

namespace App\Model\Admin\goods;

use Illuminate\Database\Eloquent\Model;

class Goodsattr extends Model
{
    /**
     * 属性表
     *
     * @var string
     */
    protected $table = 'goods_attr';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];
}
