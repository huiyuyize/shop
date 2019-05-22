<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    /**
     * 与模型关联的数据表,为user表
     *
     * @var string
     */
    protected $table = 'goods_category';

    protected $primaryKey = 'id';//主键

     /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

     /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    //protected $fillable = ['name','age','sex'];//放的是字段名

     /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];//都想被赋值,直接定义空数组

}
