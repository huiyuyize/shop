<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Gregwar\Captcha\CaptchaBuilder;
use Session;
class LoginController extends Controller
{
    //
    
    /**
     * 登录页面
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
    	return view('admin.login',['title'=>'后台的登录']);
    }

    /**
     * 处理登录的信息
     *
     * @return \Illuminate\Http\Response
     */
    public function dologin(Request $request)
    {
    	

    	//先获取用户名
    	$um = $request->username;

    	//根据用户名作对比
    	$rs = DB::table('users')->where('user_name',$um)->first();

    

    	if(!$rs){

    		return back()->with('error','用户名或密码错误');
    	}

    	//对比密码
    	$pass = $rs->password;

    	if(!Hash::check($request->password,$pass)){

			return back()->with('error','用户名或密码错误');
    	}

    	//验证码
    	$code = session('code');
    	if($code != $request->code){

    		return back()->with('error','验证码错误');
    	}

    	//存储用户信息
    	session(['uid'=>$rs->id]);

    	return redirect('/admins')->with('success','登录成功');
    }

    /**
     * 验证码
     *
     * @return \Illuminate\Http\Response
     */
    public function captcha()
    {
    	
        $builder = new CaptchaBuilder;
        
        $builder->build($width = 100, $height = 35, $font = null);
       
        $phrase = $builder->getPhrase();
        
        session(['code'=> $phrase]);
        
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

    /**
     * 显示修改头像
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
    	$rs = DB::table('user')->where('id',session('uid'))->first();

    	return view('admin.profile',[
    		'title'=>'修改头像',
    		'rs'=>$rs
    	]);
    }

    /**
     * 处理头像
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
    	$file = $request->file('file_upload');

    	
        $name = 'img_'.rand(1111,9999).time();

        
        $suffix = $file->getClientOriginalExtension();

        $file->move('./uploads',$name.'.'.$suffix);

        echo '/uploads/'.$name.'.'.$suffix;

     
        $rs['profile'] = '/uploads/'.$name.'.'.$suffix;

        DB::table('user')->where('id',session('uid'))->update($rs);



    }

    /**
     * 修改密码页面
     *
     * @return \Illuminate\Http\Response
     */
    public function pass()
    {
    	return view('admin.pass',['title'=>'修改密码']);
    }

    /**
     * 处理修改密码
     *
     * @return \Illuminate\Http\Response
     */
    public function dopass(Request $request)
    {
    	//验证

    	//获取旧密码
    	$pass = $request->oldpass;

    	//获取当前用户的信息
    	$rs = DB::table('user')->where('id',session('uid'))->first();

    	//Hash
    	if(!Hash::check($pass,$rs->password )){

    		return back()->with('error','旧密码有误');
    	}

    	//两次密码一致
    	$res['password'] = Hash::make($request->password);

    	$data = DB::table('user')->where('id',session('uid'))->update($res);

    	if($data){
    		//清空session
    		session(['uid'=>'']);

    		return redirect('/admin/logins');
    	} else {

    		return back();
    	}

    }


    /**
     * 退出
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
    	//清除session
    	session(['uid'=>'']);

    	//重定向
    	return redirect('/admin/logins')->with('success','退出成功');
    }
}
