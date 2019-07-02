<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Goods;
use DB;

class QuerenController extends Controller
{   
	public function list(){
             
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
              
                $data = session('arr2');
                $price = session('arr5');
               $address = DB::table('user_addr')->where('uid',session('userid'))->first();

                


     return view('home/queren/queren',['pid_data'=>$pid_data,'data'=>$data,'price'=>$price,'address'=>$address]);
    

	}

    public function ding(Request $request)
    {
          $arr = $request->arr;
          $arr1 = $request->arr1;
          $arr5 = $request->arr5;
          

          
          foreach($arr as $k=>$v){
           json_encode($v);
           $rs = DB::table('shopping_car')->where('id',$v)->first();
           $res = DB::table('goods')->where('id',$rs->goods_id)->get();
           $arr2[] = $res;         
        }
        
       
         //dump($arr1);
         dump($arr2);
         session(['arr2'=>$arr2]);
         session(['arr5'=>$arr5]);
         //dump(session('arr5'));
        //dump(session('arr2'));
        
         /*//dump($arr2);
          $id = $arr[0];
          $arr1[] = $id;
          $nums = $arr[1];
         

          json_encode($id);
          json_encode($nums);

          $goods_id = DB::table('shopping_car')->where('id',$id)->first();
          session(['gid'=>$goods_id->goods_id]);
          session(['nums'=>$nums]);
*/




    }
}
