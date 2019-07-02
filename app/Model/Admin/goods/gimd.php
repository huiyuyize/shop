<?php

namespace App\Model\Admin\goods;

use Illuminate\Database\Eloquent\Model;

class gimd extends Model
{
    /**
     * 商品图片表
     *
     * @var string
     */
    protected $table = 'img_goods';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];
}
