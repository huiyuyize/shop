<?php

namespace App\Model\Admin\goods;

use Illuminate\Database\Eloquent\Model;

class Goodscate extends Model
{
     /**
     * 分类表
     * 
     * @var string
     */
    protected $table = 'goods_category';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];


    //一对多
   	public function cates()
    {
        return $this->hasMany('App\Model\Admin\goods\Goods','cate_id','id');
    }
}
