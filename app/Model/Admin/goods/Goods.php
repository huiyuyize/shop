<?php

namespace App\Model\Admin\goods;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
     /**
     * 商品主表
     *
     * @var string
     */
    protected $table = 'goods';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];
	
     /**
     * 获得此商品的分类。
     */
    public function catea()
    {
        return $this->belongsTo('App\Model\Admin\goods\Goodscate','cate_id','id');
    }

    /**
     * goods表
     * 获得此商品的类型。
     */
    public function types()
    {
        return $this->belongsTo('App\Model\Admin\goods\Goodstype','type_id','id');
    }

    /**
     * goods表
     * 获得此商品的类型。
     */
    public function brands()
    {
        return $this->belongsTo('App\Model\Admin\goods\Goodsbrand','brand_id','id');
    }
	
}
