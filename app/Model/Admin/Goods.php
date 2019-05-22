<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    /**
     * 与模型关联的数据表
     * @var string
     */
    protected $table = 'goods';
    protected $primarykey = 'id';

     /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = false;

     /**
     * 可以被批量赋值的属性.
     *
     * @var array
     */
    // protected $fillable = ['name','age','sex'];

     /**
     * 不能被批量赋值的属性
     *
     * @var array
     */
    protected $guarded = [];

     /**
     * 获得与用户关联的表。
     */
    public function goodsa()
    {
        return $this->hasOne('App\Model\Admin\Goodsbrand','brand_id','id');
    }
}
