<?php

namespace App\Http\Controllers\Admin\links;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class GoodslinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $rs = DB::table('links')->get();
       // dump($rs);
       return view('/admin/links/links',[
            'title'=>'友情链接列表页面',
            'rs'=>$rs,
            'request'=>$request
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //友情链接页面
        return view('admin/links/glinks',[
            'title'=>'友情链接页面'
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
        $rs = $request->except('_token');
        // dump($rs);
        $file = $request->file('link_logo');
        //名字
        $name = 'img_'.rand(1111,9999).time();
        //获取后缀
        $suffix = $file->getClientOriginalExtension();
        $file->move('./uploads/links',$name.'.'.$suffix);
        $rs['link_logo'] = '/uploads/links/'.$name.'.'.$suffix;
        // dump($rs);
        $data = DB::table('links')->insert($rs);
        if($data){
            return redirect('/links')->with('success','添加成功');
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
        $logo = DB::table('links')->find($id);
        $logos=$logo->link_logo;
        // dump($logos);
        unlink('.'.$logos);
        $data = DB::table('links')->where('id',$id)->delete();
        if($data){
            return redirect('/links')->with('success','删除成功');
        }
    }
}
