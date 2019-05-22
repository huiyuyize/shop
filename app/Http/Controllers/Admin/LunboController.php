<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LunboController extends Controller
{
    //添加轮播图
    public function insert()
    {
    	return view('admin/lunboinsert',['title'=>'轮播图添加']);
    }


    //执行添加
    public function doinsert(Request $request)
    {
       
        //获取数据
        //dump($request->all());die;
        $res = $request->except('_token','lunbo_img');


        //处理头像
        if($request->hasFile('lunbo_img')){

            //获取图片上传的信息
            $file = $request->file('lunbo_img');


            //名字
            $name = 'img_'.rand(1111,9999).time();


            //获取后缀
            $suffix = $file->getClientOriginalExtension();

            //移动到目录
            $file->move('./uploads',$name.'.'.$suffix);

            //把图片路径信息放到一个定义的数组里面
            $res['lunbo_img'] = '/uploads/'.$name.'.'.$suffix;
            //dump($res['lunbo_img']);die;
    }
 }
}
