<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Admin\adminuser;

class RbacMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //获取管理员信息
        /*$user = DB::table('admin')->where('uname',session('uname'))->get();
        foreach($user as $k=>$v){
            $uid = $v->id;
        }
        $role = DB::select('select p.per_name,p.per_url from permission as p,user_role as ur,role as r,role_per as rp where ur.user_id='.$uid.' and ur.role_id = rp.role_id and rp.per_id = p.id');*/
        
        $users = adminuser::find(session('uid'));
        
        $roles = $users->user_role()->get();
        $prs = [];
        foreach($roles as $k=>$v){
            $pers = $v->role_per()->get();
            foreach($pers as $k=>$v){
                $prs[] = $v->per_url;
            }
        }
        $prs = array_unique($prs);

        $urls = \Route::current()->getActionName();
        
        if (in_array($urls,$prs)) {
             return $next($request);
        }else{
            return redirect('/admin/noper')->with('error','您没有此权限,请联系管理员获取权限');
        }
        
        
       
    }
}
