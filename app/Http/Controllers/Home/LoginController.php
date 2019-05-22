<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use DB;
use Hash;
class LoginController extends Controller
{	
	//登录页
    public function index()
    {
    	return view('home.login');
    }
   	//注册页
    public function add()
    {
    	return view('home.add');
    }
    //注册信息存储
    public function create(Request $request)
    {
    	$a = $request->except('_token','repassword');
        $a['password'] = Hash::make($request->password);
        $a['user_status'] = 1;
        $a['user_created_time'] = time();
        $a['user_ip'] = $request->ip();
        $a['user_balance'] = '0.00';
    	// dump($a);
        $res = DB::table('users')->insert($a);
    	        
        if($res){
            return redirect('/login');
        }
    }

    //检查用户名是否唯一
    public function readd(Request $request)
    {
    	$a = $request->input('user_name');
    	$b = DB::table('users')->where('user_name',$a)->first();
    	if($b){
    		echo 1;
    	}else{
    		echo 0;
    	} 
    }
    //检测手机号是否唯一
    public function rephone(Request $request)
    {
        $a = $request->input('user_phone');
        $b = DB::table('users')->where('user_phone',$a)->first();
        if($b){
            echo 1;
        }else{
            echo 0;
        } 
    }
    //验证码
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

    //用户登录
    public function login(Request $request)
    {
        $a = $request->all();
       

        // dump($a['username']);
        // 查看用户名是否存在
        $password = DB::table('users')->where('user_name',$a['username'])->first();
        if(!$password){
            echo 1;
        } else {
            $pa = $password->password ;
            if(! Hash::check("$request->pass",$pa)){
                echo 1;
            } else {
                echo 0;
                // return redirect('/');
                session(['user'=>$a['username']]);
                
            }
        }
        
       
    }
    //退出登录
    public function loginout()
    {
        session(['user'=>'']);
        return redirect('/');
    }
    //忘记密码
    public function slip()
    {
        return view('home/slip');
    }

    /* 忘记密码:验证是否注册的手机号 */
    public function verify(Request $request)
    {
        $a = $request->input('phone');
        $rs = DB::table('users')->where('user_phone',$a)->first();
        // dump($rs);
       if($rs){
        session(['reset_id'=>$rs->id]);
        echo 1;
       }else{
        echo 0;
       }
        
    }


    /*生成验证码*/
    public function code(){
        // $code_len=4;
        // $code=array_merge(range('A','Z'),range('a','z'),range(1,9));//需要用到的数字或字母

        // $keyCode=array_rand($code,$code_len);//真正的验证码对应的$code的键值
        // if($code_len==1){
        //     $keyCode=array($keyCode);
        // }
        // shuffle($keyCode);//打乱数组
        // $verifyCode="";
        // foreach ($keyCode as $key){
        //     $verifyCode.=$code[$key];//真正验证码
        // }
        $verifyCode = mt_rand(0000,9999);
        echo base64_encode($verifyCode); //加密
    }

    /* 发短信 */
    public function smsyzm(Request $request){
        //dd($request->all());
        //载入ucpass类
        require_once("../app/common/Ucpaas.class.php");
        //初始化必填
        //填写在开发者控制台首页上的Account Sid
         $options['accountsid']='58133112d6f54fa0e0d40f5589b470d0';
        //填写在开发者控制台首页上的Auth Token
         $options['token']='a11097b73449235f78b138c1a9182946';
        //初始化 $options必填
        $ucpass = new \Ucpaas($options);
 
        $appid = "0a61683962dc4c2d8d6374160c12b3bb";   //应用的ID，可在开发者控制台内的短信产品下查看
        $templateid = "460249";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
        $yzm = base64_decode($request->input('yzm')); //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空   code进行解密
        $time = 5;
        $param="$yzm";
        $mobile = $request->input('yzmtel');//$_POST['yzmtel']
        $uid = "";
 
        //70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
 
        echo $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
 
    }


    /* 验证  */
    public function reset(Request $request){
 
 
            if($request->isMethod('POST')){
                
                $valArr = $request->all();
                //发送的验证码
                $valArr['code'] = base64_decode($request->input('code'));
 
                //手动输入的验证码
                $usercode = $valArr['yzm'];
                if($usercode == $valArr['code']){

                    echo 1;
                }else{
                    echo 0;
                }
            }
         
    }

    //重置登录密码
    public function resetpassword()
    {
        
        return view('home/resetpassword',['title'=>'重置密码']);
    }
    //报错密码
    public function newpassword(Request $request)
    {
        // dump(session('reset_id'));
        // echo session('id');
         $newpass = $request->input('new');
        $pass = Hash::make($newpass);
        $arr = ['password'=>$pass];
        $rs = DB::table('users')->where('id',session('reset_id'))->update($arr);
        if($rs){
            echo 1;
        }else{
            echo 0;
        }
    }

}
