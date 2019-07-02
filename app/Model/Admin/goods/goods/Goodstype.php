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
    
    //类型一对多
    public function typea()
    {
        return $this->hasMany('App\Model\Admin\goods\Goods','type_id','id');
    }
}
