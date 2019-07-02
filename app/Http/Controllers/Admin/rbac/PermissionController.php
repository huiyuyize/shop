<?php

namespace App\Http\Controllers\Admin\rbac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$data = DB::table('permission')->paginate();*/
        
        $data = Permission::paginate();
        
        return view('admin.permission.user',[
            'title'=>'权限页面显示',
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
        return view('admin.permission.addpermission',[
            'title'=>'权限添加页面'
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
        /*$data = DB::table('permission')->insert($rs);*/

        
        try{
            $data = Permission::create($rs);
            if ($data) {
                return redirect('/admin/permission')->with('success','添加权限成功');
            }
        }catch(\Exception $e){
            return back()->with('error','添加权限失败');
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
        $data = DB::table('permission')->where('id',$id)->delete();
        if ($data) {
            return redirect('/admin/permission')->with('success','删除权限成功');
        }else{
            return back()->with('error','删除权限失败');
        }
    }
}
