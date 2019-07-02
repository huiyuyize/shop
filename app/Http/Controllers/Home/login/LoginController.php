<?php

namespace App\Http\Controllers\Home\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Session;
use Gregwar\Captcha\CaptchaBuilder;
use Sms;
class LoginController extends Controller
{
    
    //登录路由
	public function login()
	{  
		return view('home.login.login');
	}


	
	//账号与密码比对数据库路由
	public function dologin(Request $request)
	{
		$rs = $request->except('_token');
		$user = DB::table('users')->where('user_name',$rs['user_name'])->first();
		if (!$user) {
			return back()->with('error','账号或密码不正确');
		}else{
			$data = Hash::check($rs['password'],$user->password);
			if (!$data) {
				return back()->with('error','账号或密码不正确');
			}else{
				 session(['username'=>$user->user_name,'userid'=>$user->id]);
				 return redirect('/')->with('success','登录成功');
			}
		}

	}
	//用户退出路由
	public function outlogin()
	{
		 Session::forget('username','userid');
        return redirect('/login')->with('success','退出成功');
	}

	
	//用户注册路由
	public function create()
	{
		return view('home.login.add');
	}

	

	public function doadd(Request $request)
	{

		dump($request->all());

		$date = date("Y-m-d H:i:s",time());

	}

	

	//验证码图片生成
	 public function yanzheng(){
        session_start();
        $builder = new CaptchaBuilder;
        $builder->build($width = 100,$height = 40,$font = null);
        $_SESSION['yanzheng'] = $builder->getPhrase();
        $builder->save('out.jpg');
        header('Content-type: image/jpeg');
        $builder->output();
    }
    
    
    //匹配验证码是否一致
    public function fan(Request $request){
        // echo 1;
        // echo $request->input('code');
        session_start();
        // echo $_SESSION['yanzheng'] ;
        $a = $request->input('code');
        if($a == $_SESSION['yanzheng']){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function findpwd()
    {
    	return view('home.login.forget');
    }

    public function sms(Request $request)
    {
    	$phone = $request->input('phone');
    	$rs = DB::table('users')->where('user_phone',$phone)->first();
    	if($rs){
           echo 1;
           session(['user_id'=>$rs->id]);
           Sms::put('phone',$phone)->send();
    	}else{
    	   echo 0;
    	}

    }


    //对比验证码
    public function reset(Request $request){
        $yzm = $request->input('yzm');
        $rules = ['code'=>'required|sms'];
        if($rules){
           echo 1;
        }else{
           echo 0;
        }
    } 
    
}
