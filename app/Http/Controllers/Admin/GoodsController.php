<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Goods;
class GoodsController extends Controller
{    
	 //商品分类
     public function index(Request $request)
     {  
        //查询数据,分页
        $search = $request->search;
        $res = Goods::where([
        	['cate_name','like','%'.$search.'%'],
        	['cate_pid','=','0'],
            ])->paginate($request->
        input('num',10));       
     	return view('/admin/goodsgory/goodslist',['title'=>'商品列表','res'=>$res,'request'=>$request]);
 
     }

     //修改页面
     public function edit($id)
     {
        $res = Goods::find($id);
        return view('/admin/goodsgory/goodsedit',['title'=>'商品分类修改','res'=>$res]);
     }

     //执行修改
     public function doedit(Request $request)
     {
     	   $res = $request->except('_token');  	             
     	   $bool = Goods::where('id',$res['id'])->update($res);
     	   //dump($bool);
     	   if($bool){
     	   	 echo "<script>alert('修改成功');location.href='/admin/goods'</script>";
     	    }else{
     	   	 return back();
     	   }     	   
     }


     //删除
     public function delete($id)
     {
          $bool = Goods::where('id',$id)->delete();
          return redirect('/admin/goods');

     }

     //添加商品分类
     public function insert()
     {
     	 return view('/admin/goodsgory/goodsinsert',['title'=>'添加商品分类']);
     }

     //执行分类添加
     public function doinsert(Request $request)
     {
         $res = $request->except('_token');
         $bool = Goods::create($res);
         if($bool){
         	echo "<script>alert('添加成功');location.href='/admin/goods'</script>";
         }else{
         	echo "<script>alert('添加失败')";
         	return back();
         }
     }


     //查看子分类
     public function store($id,Request $request)
     {
         $search = $request->search;
         $res = Goods::where([

            ['cate_name','like','%'.$search.'%'],
            ['cate_pid','=',$id],

        ])->paginate($request->
        input('num',10));
         return view('/admin/goodsgory/store',['title'=>'查看子分类列表','res'=>$res,'request'=>$request,'id'=>$id]);
     }


     //查看三级分类
     public function stores($id,Request $request)
     {
        $search = $request->search;
        $res = Goods::where([
            ['cate_pid','=',$id],
            ['cate_name','like','%'.$search.'%'],

    ])->paginate($request->
        input('num',10));
        return view('/admin/goodsgory/stores',['title'=>'查看三级分类列表','res'=>$res,'request'=>$request,'id'=>$id]);
     }


     //添加子分类
     public function inserts($id,$name)
     {   
         $res = Goods::where('id',$id)->get();
         foreach($res as $k=>$v){
              $cate_id = $v->id;
              $cate_path = $v->cate_path.$cate_id.',';
         }
         return view('/admin/goodsgory/inserts',['title'=>'添加子分类','name'=>$name,'cate_pid'=>$cate_id,'cate_path'=>$cate_path]);

     }


     //执行子分类添加
     public function doinserts(Request $request)
     {
         $res = $request->except('_token');
         $bool = Goods::create($res);
         if($bool){
            echo "<script>alert('添加成功');location.href='/admin/goods'</script>";
         }else{
            echo "<script>alert('添加失败')";
            return back();
         }
     }
}
