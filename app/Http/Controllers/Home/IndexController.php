<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Goods;
use DB;
class IndexController extends Controller
{
    
	public function index()
	{     
        //首页分类
          
        //首先获取1级分类
        $pid_data = Goods::where('cate_pid',0)->get();
        //通过1级拿2级
        foreach($pid_data as $k=>$v){
            //压一个数组,放二级
        	$v['sub'] = Goods::where('cate_pid',$v->id)->get();
        	foreach($v['sub'] as $key=>$value){
            //在二级最下面压一个数组,放三级
             $value['sub'] = Goods::where('cate_pid',$value->id)->get();
        	}
        }
      
     
       
		  return view('common.home',['pid_data'=>$pid_data]);
	
       }



       
	
}

	
  
