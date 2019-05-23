<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Users;
use App\Model\Admin\User_info;
use App\Http\Requests\UformRequest;

use Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

            /*$num = $_GET['num'];
            $se = $_GET['search'];
            dump($num,$se);*/

       /* $user = DB::table('users')->paginate();
        $uinfo = DB::table('user_info')->paginate();*/
        $search = $request->search;

        $user = Users::with('uinfo')->where('user_name','like','%'.$search.'%')->paginate($request->input('num',10));

        
        //dump($user[0]['uinfo'][0]->user_addr);die;


        return view('admin.users.user',[
            'title'=>'用户详情列表',
            'user'=>$user,
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
        return view('admin.users.add',[
            'title'=>'用户添加页面'

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UformRequest $request)
    {

        //验证表单填写格式
        /*$this->validate($request,[
            'user_name'=>'required',
            'password'=>'required',
            'pwd'=>'same:password',

        ],[

            'user_name.required'=>'用户名不能为空',
            'password.required'=>'密码不能为空',
            'pwd.same'=>'两次输入密码不一致',


        ]);*/


        //获取user主表的字段
        $user = $request->except('_token','user_sex','user_age','user_pic','pwd');
        //获取关联表userinfo的字段
        $uinfo = $request->except('_token','user_name','password','user_email','user_phone','pwd');

        //对上传的头像进行处理
        if ($request->hasFile('user_pic')) {
            $file = $request->file('user_pic');


            $name = 'img_'.rand(1111,9999).time();

            $suffix = $file->getClientOriginalExtension();


            $file->move('./uploads',$name.'.'.$suffix);

            $uinfo['user_pic'] = '/uploads/'.$name.'.'.$suffix;

        }
        //对密码进行加密
        $user['password'] = Hash::make($request->password);
        
        //设置注册时间值
        $nowtime = date('Y-m-d H:i:s',time());
        $user['user_created_time'] = $nowtime;

        //获取插入users表信息的id为下一条插入userinfo表准备
        $rs = DB::table('users')->insertGetId($user);
        //设置userinfo表的uid为user表的id
        $uinfo['uid'] = $rs;
        //插入userinfo表中数据
        $rus = DB::table('user_info')->insert($uinfo);
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

        //$rs = Users::find($id)->uinfo()->get();
        $rs = Users::with('uinfo')->where('id',$id)->get();



        foreach($rs as $k=>$v){

        }


        return view('admin.users.edit',[
            'title'=>'用户的修改页面',
            'v'=>$v
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
        

        $user = $request->except('_token','_method','user_age','user_sex','user_pic');
        $uinfo = $request->except('_token','_method','user_name','user_email','user_phone','user_status');

        
        

        //从数据库取出旧头像的路径为删除做准备
        $pic = DB::table('user_info')->where('uid',$id)->value('user_pic');
        //判断，如果上传了新头像，删除旧头像
        
        
        $pic = '.'.$pic;
        if($request->hasFile('user_pic')){
            unlink($pic);
        }

        if ($request->hasFile('user_pic')) {
            $file = $request->file('user_pic');
            $name = 'img_'.rand(1111,9999).time();

            $suffix = $file->getClientOriginalExtension();

            $file->move('./uploads',$name.'.'.$suffix);

            $uinfo['user_pic'] = '/uploads/'.$name.'.'.$suffix;

        }

        
        $data = DB::table('users')->where('id',$id)->update($user);
        $udata = DB::table('user_info')->where('uid',$id)->update($uinfo);
        if ($data && $udata) {
            return redirect('/admin/users')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
        //获取id删除数据库用户
        
        $del = Users::find($id);
        $del->delete();
        $pic = DB::table('user_info')->where('uid',$id)->value('user_pic');
        $pic = '.'.$pic;
        $dodel = $del->uinfo()->delete();

        if ($dodel) {
            unlink($pic);
            return redirect('/admin/users')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }


    }
}
