<?php

namespace App\Http\Controllers\Admin\goods_insert;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\goods\Goods;
use App\Model\Admin\goods\Goodsattr;
use App\Model\Admin\goods\Goodstype;
use App\Model\Admin\goods\Goodsbrand;
use App\Model\Admin\goods\Goodscate;
use DB;

class Goods_insertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        $goods_name = $request->input('goods_name');
        $rs = Goods::where('goods_name','like','%'.$goods_name.'%')->paginate($request->input('num',10));
        //遍历获得对应的id 
        foreach($rs as $k=>$v){
            $cated = $v->cate_id;
            $bran = $v->brand_id;
        }
        // dump($rs);
       //多个商品对应一个分类  多对一
        $cat = Goods::with('catea')->get();
        $cate = $cat->pluck('cate_id');
        // dump($cate);
        $goods = DB::table('goods_category')->whereIn('id',$cate)->get();
        // dump($goods);
        /*foreach($cat as $k=>$v){
            $date[] = $v->catea;       
        }*/
        // dump($date);
        // die;
       

        //多个商品对应一个类型  多对一
        $typ = Goods::with('types')->get();
        // dump($typ);
        //多个商品对应一个品牌  多对一
        $bra = Goods::with('brands')->get();
        // dump($bra);


        return view('/admin/goods/goodslist',[
            'title'=>'后台商品列表页面',
            'rs'=>$rs,
            'request'=>$request,
            'cat'=>$cat,
            'typ'=>$typ,
            'bra'=>$bra
        ]);


       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取商品品牌信息
        // $rs = DB::table('goods_brand')->pluck('brand_name');
        $rs = DB::select('select * from goods_brand');
        // dump($rs);

        //获取商品分类信息
        $res = DB::select('select *,concat(cate_path,id) as paths from goods_category ORDER BY paths asc');

        // dump($res);
        //获取商品类型信息
        $typ = DB::select('select * from goods_type');
        // dump($typ);


        foreach($res as $k => $v){
            $pat = $v->cate_path;
            // dump($pat);
            //通过path路径
            $info = count(explode(',',$v->cate_path))-2;

            $v->cate_name = str_repeat('==|', $info).$v->cate_name;

            // dump($info);
        }


        return view('/admin/goods/goods',[
            'title'=>'后台商品添加页面',
            'rs'=>$rs,
            'res'=>$res, 
            'typ'=>$typ
        ]);
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取添加的数据
        $rs = $request->except('_token');
        

        // dump($rs);
        //获取分类id
        $cate = $request->only('cate_id');
        // dump($cate);die;
        $cates = str_replace('==|','',$cate);
        // dump($cates);die;
        $cate_id = Goodscate::where('cate_name',$cates)->first();
        // dump($cate_id);die;
        //获取类型id
        /*$type = $request->only('type_id');
        $type_id = Goodstype::where('type_name',$type)->first();*/
        // dump($type_id);die;
        //获取品牌id
        $brand = $request->only('brand_id');
        $brand_id = Goodsbrand::where('brand_name',$brand)->first();
        // dump($cate_id,$brand_id);die;
        //改变数组中的值 通过foreach循环
        foreach($rs as $k=>$v){
            $rs['cate_id'] = $cate_id->id;
            $rs['brand_id'] = $brand_id->id;
        }

        $file = $request->file('goods_img');
        // dump($file);die;
        //名字
        $name = 'img_'.rand(1111,9999).time();
        //获取后缀
        $suffix = $file->getClientOriginalExtension();
        $file->move('./uploads/goodss',$name.'.'.$suffix);
        $rs['goods_img'] = '/uploads/goodss/'.$name.'.'.$suffix;
        // dump($rs);die; 
        $data = Goods::insert($rs);
        if($data){
            return redirect('/ginsert')->with('success','添加成功');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rs = Goods::where('id',$id)->first();
        return view('/admin/goods/gupdate',[
            'title'=>'后台商品的修改页面',
            'rs'=>$rs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rs = $request->except('_token','_method');
        // dump($rs);die;
        $date = Goods::where('id',$id)->update($rs);
        if($date){
            return redirect('ginsert')->with('success','修改成功');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除图片
        $logo = Goods::find($id);
        $logo=$logo->only('goods_img');
        $logos = $logo['goods_img'];
        // dump($logos);
        $dd = unlink('.'.$logos);
        $data = Goods::destroy($id);
        if($data){
            return redirect('ginsert')->with('success','删除成功');
        }
    }
}