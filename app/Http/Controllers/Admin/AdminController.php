<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
//use App\Http\Requests\AdminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $rs = DB::table('admin')->paginate(10);

        $search = $request->search;


        $user = DB::table('admin')->where('uname','like','%'.$search.'%')->paginate($request->input('num',10));

        return view('admin.user.user',[
            'title'=>'管理员列表',
            'rs'=>$rs,
            'user'=>$user,
            'request'=>$request,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add',[
            'title'=>'添加管理员页面',
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
        //获取表单传过来的信息
        $rs = $request->except('_token','reupwd');

        if ($request->hasFile('upic')) {
            
            //获取上传头像的暂存地址
            $file = $request->file('upic');

            //编辑一个图片名称
            $name =  'img_'.rand(1111,9999).time();
            //获取上传文件的后缀名
            $suffix = $file->getClientOriginalExtension();
            //将头像文件移动到uploads的admin下
            $file->move('./uploads/admin',$name.'.'.$suffix);
            //存入数据库的数据
            $rs['upic'] = './uploads/admin/'.$name.'.'.$suffix;
        }

            //对密码进行加密
            $rs['upwd'] = Hash::make($request->upwd);

            //注册时间
            $rs['created_time'] = date('Y-m-d H:i:s',time());


        $add = DB::table('admin')->insert($rs);

        
        if($add){
            return redirect('')->with('success','添加成功');
        }else{
            return back()->with('success','添加失败');
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
        $rs = DB::table('admin')->where('id',$id)->delete();

        if($rs){
            return redirect('/admin/adminuser')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
