<?php

namespace App\Model\Admin\goods;

use Illuminate\Database\Eloquent\Model;

class Goodsbrand extends Model
{
    /**
     * 品牌表
     *
     * @var string
     */
    protected $table = 'goods_brand';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];
}
