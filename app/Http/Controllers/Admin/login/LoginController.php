<?php

namespace App\Http\Controllers\Admin\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Gregwar\Captcha\CaptchaBuilder;
use Session;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login',['title'=>'后台的登录']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rs = $request->except('_token');
        $user = DB::table('admin')->where('uname',$rs['uname'])->first();

        if (!$user) {
            
            return back()->with('error','用户名或密码不正确');
        
        }else{
            
            $data = Hash::check($rs['upwd'],$user->upwd);
            
            if (!$data) {
                
                return back()->with('error','用户名或密码不正确');
            
            }else{
                
                $code = session('code');
                
                if($code != $request->code){

                    return back()->with('error','验证码错误');
                }else{
                    if ($user->admin_status == 2) {
                        return back()->with('error','您的账号被封禁，请联系管理员解除封禁');
                    }else{
                        session(['uname'=>$user->uname,'uid'=>$user->id]);
                        
                        /*$roper = DB::select('select p.per_url from permission as p,user_role as ur,role as r,role_per as rp where ur.user_id='.$user->id.' and ur.role_id = rp.role_id and rp.per_id = p.id');*/
                        return redirect('/admin')->with('success','登录成功');
                    }
                }
            }
        }
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

    public function outlogin()
    {
        Session::forget('uname');
        return redirect('/admin/login')->with('success','退出成功');
    }
    
    //如果没有权限,跳转到这里
    public function noper()
    {
        return view('admin.user_role.noper');
    }
}
