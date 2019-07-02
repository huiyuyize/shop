<?php

namespace App\Http\Controllers\Admin\goods_attr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\goods\Goodsattr;
use App\Model\Admin\goods\Goodstype;

class Goods_attrController extends Controller
{
    /**,lmlk
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //
        // $rs = Goodsattr::paginate(10);
        $attr_name = $request->input('attr_name');
        //商品类型的列表页面
        $rs = Goodsattr::where('attr_name','like','%'.$attr_name.'%')->paginate($request->input('num',10));
        // dump($rs);
        //获取商品的类型
        foreach($rs as $k => $v){
            $ty = ($v->type_id);
        }
        $typ = Goodstype::find($ty);
        // dump($typ);
        return view('/admin/goods_attr/attrlist',[
            'title'=>'商品属性的类表页面',
            'rs'=>$rs,
            'request'=>$request,
            'typ'=>$typ
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取所有的类型
        $typ = Goodstype::all();
        // dump($typ);
        return view('/admin/goods_attr/goods_attr',[
            'title'=>'后台的属性添加页面',
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
        $rs = $request->except('_token');
        // dump($rs);
        $data = Goodsattr::insert($rs);
        if($data){
            return redirect('/goods_attr')->with('success','添加成功');
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
        
        $rs = Goodsattr::find($id);
        //获取商品类型
        $typ = Goodstype::find("$rs->type_id");
        // dump($typ);
        // dump($rs);
        return view('/admin/goods_attr/attrupdate',[
            'title'=>'商品属性的修改页面',
            'rs'=>$rs,
            'typ'=>$typ
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
        $rs = $request->only('attr_name','attr_value');
        // dump($rs);
        $data = Goodsattr::where('id',$id)->update($rs);
        if($data){
            return redirect('/goods_attr')->with('success','修改成功');
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
        $data = Goodsattr::destroy($id);
        if($data){
            return redirect('/goods_attr')->with('success','删除成功');
        }
    }
}
