<?php

namespace App\Http\Controllers\Admin\rbac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$data = DB::table('role')->paginate();*/

        $data = Role::paginate();
        return view('admin.user_role.role',[
            'title'=>'角色列表页面',
            'data'=>$data

        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_role.addrole',[
            'title'=>'角色添加页面'
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
        $rs = $request->except('_token');
        try{
            $data = Role::create($rs);
            if ($data) {
                return redirect('/admin/role')->with('success','添加角色成功');
            }
        }catch(\Exception $e){
            return back()->with('error','添加角色失败');
        }
        /*if ($data) {
            return redirect('/admin/role')->with('success','添加角色成功');
        }else{
            return back()->with('error','添加失败');
        }*/
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
        //为角色分配权限
        $role = DB::table('role')->where('id',$id)->first();
        
        $per = DB::table('permission')->get();
        

        //获取当前角色的权限
        $per_id = DB::table('role_per')->where('role_id',$id)->select('per_id')->get();

        $role_per = [];
        foreach($per_id as $perid){
            $role_per[] = $perid->per_id;
        }

        
       

       return view('admin.user_role.addper',[
            'role'=>$role,
            'title'=>'角色分配权限页',
            'role_per'=>$role_per,
            'per'=>$per
            
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
        //删除数据库角色权限分配表旧数据
        $rs = DB::table('role_per')->where('role_id',$id)->delete();
        
        //获取角色与权限的id后填进角色权限分配表中
        $per = $request->input('per');
        
        foreach($per as $perid){
            $data = [
                'per_id'=>$perid,
                'role_id'=>$id
            ];
            $res = DB::table('role_per')->insert($data);
        }

        if ($res) {
            return redirect('/admin/role')->with('success','角色权限分配成功');
        }else{
            return back()->with('error','角色权限分配失败');
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
        $rs = DB::table('role')->where('id',$id)->delete();
        if ($rs) {
            return redirect('/admin/role')->with('success','删除角色成功');
        }else{
            return back()->with('error','删除角色失败');
        }
    }
}
