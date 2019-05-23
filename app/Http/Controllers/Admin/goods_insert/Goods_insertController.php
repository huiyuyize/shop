<?php

namespace App\Http\Controllers\Admin\goods_insert;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Goods_insertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取商品品牌信息
        $rs = DB::table('goods_brand')->pluck('brand_name');
        //获取商品分类信息
        $res = DB::select('select *,concat(cate_path,id) as paths from goods_category ORDER BY paths asc');
        dump($res);

        foreach($res as $k => $v){
            $pat = $v->cate_path;
            dump($pat);
            //通过path路径
            $info = count(explode(',',$v->cate_path))-2;

            $v->cate_name = str_repeat('==|', $info).$v->cate_name;

            // dump($info);
        }


        return view('/admin/goods/goods',[
            'title'=>'后台商品添加页面',
            'rs'=>$rs,
            'res'=>$res
        ]);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
