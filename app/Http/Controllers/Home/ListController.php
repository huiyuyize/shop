<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Goods;
use DB;
class ListController extends Controller
{
    //
    public function index(Request $request, $id)
    {


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



 
         
         
        //商品查询+首页搜索+价格搜索+价格排序+销量排序
            // $goods_sales = $request->goods_sales;
           
            $markte_price = $request->markte_price;

            // $bool = $goods_sales?'asc':'desc';

            $bools = $markte_price?'asc':'desc';
           
            $gname = $request->gname;

            $price1 = $request->price1; 

            $price2 = $request->price2;

            $arr = [$price1,$price2];

            $data = Goods::where('cate_path','like','%'.$id.'%')->pluck('id');

            $data[] = (int)$id;        

           if(in_array(null,$arr)){

                $goods = DB::table('goods')

                ->whereIn('cate_id',$data)

                ->where('goods_name','like','%'.$gname.'%')
               ->orderBy('markte_price',$bools)

                // ->orderBy('goods_sales',$bool)

               

                ->paginate(10);
            }else{

               $goods = DB::table('goods')

               ->whereIn('cate_id',$data)

               ->whereBetween('markte_price',$arr)

               ->where('goods_name','like','%'.$gname.'%')

               // ->orderBy('goods_sales',$bool)

               ->orderBy('markte_price',$bools)

               ->paginate(10);
           }
           
          
            //品牌查询
               $brand_id = $goods->pluck('brand_id');
               $brand = DB::table('goods_brand')->whereIn('id',$brand_id)->get();
             
            //全部分类
            $cate = Goods::find($id);

            //共发现
            $count = $goods->count();


          
        return view('home.list',['title'=>'云联商城','pid_data'=>$pid_data,'goods'=>$goods,'brand'=>$brand,'cate'=>$cate,'count'=>$count,'request'=>$request]);



    }
    
}
