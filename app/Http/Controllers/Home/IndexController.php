<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Goods;
use App\Model\Home\goods\Goodss;
use DB;
class IndexController extends Controller
{
    
	public function index(Request $request)
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
    
        //轮播图
        $lunbo = DB::table('lunbo')->get(); 

         //广告遍历
        $advert = DB::table('advertising')->get();
        // dump($advert);

        //前台首页商品遍厉
        $goods = Goodss::all();
        // dump($goods);
            
        //友情链接
        $link = DB::table('links')->get();
           
		return view('home.index',[
            'pid_data'=>$pid_data,
            'lunbo'=>$lunbo,
            'title'=>'云联商城',
            'advert'=>$advert,
            'link'=>$link,
            'goods'=>$goods

        ]);
	
       }

       //显示广告页面
       public function list($id)
       {
        $rs = DB::table('advertising')->find($id);
        // dump($rs);
        return view('home/guanggao',[
            'rs'=>$rs, 

        ]);
       }


}

	
  
