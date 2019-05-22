<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
     /**
     * 商品品牌关联的表
     *
     * @var string
     */
    protected $table = 'goods_brand';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];
}
