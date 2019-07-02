<?php

namespace App\Model\Admin\advert;

use Illuminate\Database\Eloquent\Model;

class advert extends Model
{
     /**
     * 广告表
     *
     * @var string
     */
    protected $table = 'advertising';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];
}
