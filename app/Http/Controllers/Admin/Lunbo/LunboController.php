<?php

namespace App\Http\Controllers\Admin\Lunbo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LunboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $res = DB::table('lunbo')->get();
       
        return view('/admin/lunbo/lunbolist',['title'=>'轮播图列表','res'=>$res]);
        
    }

    /**
     * 轮播图添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('/admin/lunbo/lunboinsert',['title'=>'轮播图添加']);
    }

    /**
     * 处理轮播图添加信息
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $res = $request->except('_token','lunbo_img');
        
        //处理图片上传
        if($request->hasfile('lunbo_img')){

        $file = $request->file('lunbo_img');

        //创建名字
        $name = 'img_'.rand(1111,9999).time();

        //获取后缀
        $shuffix = $file->getClientOriginalExtension();

        $file->move('./uploads/lunbo/'.$name.'.'.$shuffix);

        $res['lunbo_img'] = '/uploads/lunbo/'.$name.'.'.$shuffix;
        //dump($res);

        }

        $bool = DB::table('lunbo')->insert($res);
        if($bool){
        echo '<script>alert("添加成功");location.href="/admin/lunbo"</script>';
        }else{
        echo '<script>alert("添加失败")';
        return back();
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
