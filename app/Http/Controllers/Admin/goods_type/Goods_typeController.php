<?php

//商品类型添加

namespace App\Http\Controllers\Admin\goods_type;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\goods\Goodstype;

use DB;

class Goods_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //商品类型的列表页面
        $type = Goodstype::all();
        // dump($type);
        return view('/admin/goods_type/goodslist',[
            'title'=>'商品类型的列表页',
            'type'=>$type
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //商品类型添加页面
        return view('/admin/goods_type/goods_type',[
            'title'=>'商品类型添加页面'
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
        //
        $type = $request->except('_token');
        // dump($type);
        $data = Goodstype::insert($type);
        if($data){
            return redirect('/goods_type');
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
        //
        $re = Goodstype::find($id);
        return view('/admin/goods_type/updatetype',[ 
            'title'=>'商品类型的修改页面',
            're'=>$re
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
        //
        $ty = $request->only('type_name');
        // dump($ty,$id);
        $data = Goodstype::where('id',$id)->update($ty);
        if($data){
            return redirect('/goods_type');
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
        //
    }
}
