<?php

namespace App\Http\Controllers\Home\goodscar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Goods;
use DB;
class GoodcarController extends Controller
{
    
    	public function gocar(Request $request)
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

            //往购物车表存入数据
            $arr =['user_id'=>session('userid'), 'goods_id'=>(int)$request->id, 'car_num'=>(int)$request->input('cnt')];
            DB::table('shopping_car')->insert($arr);


            //购物车表
            $info = DB::table('shopping_car')->where('user_id',session('userid'))->get();
            
            $goods = [];
            $num = [];
            $carid = [];
            
            foreach($info as $kk=>$vv){
                $carid[] = $vv;
                $num[]= $vv->car_num;
                $goods[] = DB::table('goods')->find($vv->goods_id);

            }
            //根据购物车表商品id取出商品信息表内容
           // dump($goods);
          
            

            return view('home.goodscar.goodscar',[
                'pid_data'=>$pid_data,
                'title'=>'购物车页面',
                'goods'=>$goods,
                'num'=>$num,
                'carid'=>$carid  
            ]);
            
        }


        
        public function delete(Request $request)
        {

             $id = $request->input('id');
             $rs = DB::table('shopping_car')->where('id',$id)->delete();          
            if($rs) {
                echo 1;             
            }else{
                echo 0;
            }
            
        }

        //商品结算页
        public function jiesuan()
        {

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

            $uid = session('userid');
            $use = DB::table('user_addr')->where('uid',$uid)->first();
            // dump($use);die;

            $price = session('arr5');

            return view('Home/jiesuan',[ 
                'pid_data'=>$pid_data,
                'use'=>$use,
                'price'=>$price
            ]); 
        } 

}
