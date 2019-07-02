<?php

namespace App\Http\Controllers\Admin\goods_insert;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\goods\Goods;
use App\Model\Admin\goods\gimd;
use DB;

class GoodsimgController extends Controller
{
    //添加商品的详情图片
    public function adds($id)
    {
    	$res = Goods::where('id',$id)->first();
    	$gname = $res->goods_name;
    	return view('/admin/goods/gimg',[
    		'title'=>'商品详情图片添加页面',
    		'gname'=>$gname,
    		'res'=>$res
    	]);
    } 
    public function tian(Request $request){
    	$rs = $request->except('_token');
    	// dump($rs);die;
    	$date = gimd::create($rs);
    	if($date){
    		return redirect('/ginsert')->with('success','图片添加成功');
    	}
    }
}
