<?php

//后台广告模块

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\advert\advert;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ad_name = $request->input('ad_name');
        $rs = advert::where('ad_name','like','%'.$ad_name.'%')->paginate($request->input('num',10));
        return view('/admin/advert/adlist',[
            'title'=>'广告列表页面',
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
        //
        return view('admin/advert/advert',[
            'title'=>'广告添加页面'
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
        $file = $request->file('ad_img');
        //名字
        $name = 'img_'.rand(1111,9999).time();
        //获取后缀
        $suffix = $file->getClientOriginalExtension();
        $file->move('./uploads/advert',$name.'.'.$suffix);
        $rs['ad_img'] = '/uploads/advert/'.$name.'.'.$suffix;
        // dump($rs);die;
        $data = advert::create($rs);
        if($data){
            return redirect('/advert')->with('success','添加成功');
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
        $rs = advert::find($id);
        // dump($rs);
        return view('/admin/advert/upadvert',[ 
            'title'=>'广告的修改页面',
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
        $logo = advert::find($id);
        $logo=$logo->only('ad_img');
        $logos = $logo['ad_img'];
        // dump($logos);
        $dd = unlink('.'.$logos);
       $data = advert::destroy($id);
       if($data){
        return redirect('/advert')->with('success','删除成功');
       }
    }
}
