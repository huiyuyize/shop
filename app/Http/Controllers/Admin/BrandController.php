<?php

//后台商品品牌模块控制器 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Brand;
use DB;

class BrandController extends Controller
{
    //商品品牌的添加
	public function brand(Request $request)
	{
		return view('admin/brand/addbrand',
			['title'=>'商品品牌的添加页面']
		);
	}

	//接收商品表单传过来的数据
	public function index(Request $request)
	{
		$rs = $request->except('_token');
		//获取文件上传信息
		$file = $request->file('brand_logo');
		//名字
		$name = 'img_'.rand(1111,9999).time();
		//获取后缀
		$suffix = $file->getClientOriginalExtension();
		$file->move('./uploads/brand',$name.'.'.$suffix);
		$rs['brand_logo'] = '/uploads/brand/'.$name.'.'.$suffix;
		// dump($rs);
	
		//存放到数据库
		$brand = Brand::create($rs); 
		if($brand){
			return redirect('/admin/brandlist')->with('success','添加成功');
		}else{
			return back()->with('error','添加失败');
		}
	}

	//品牌列表页
	public function brandlist(Request $request)
	{

		//获取传过来的搜索数据
		/*$um = $_GET['num'];
		$se = $_GET['search'];

		dump($um,$se);
*/
		$num = $request->num;
		$search = $request->search;

		//获取数据
		//单条件查询
		// $rs = Brand::where('brand_name','like','%'.$search.'%')->paginate($request->input('num',10));

		//多条件查询
		 $rs = Brand::orderBy('id','asc')
		    ->where(function($query) use($request){
		        //检测关键字
		        $brand_name = $request->input('brand_name');
		        $brand_url = $request->input('brand_url');
		        //如果用户名不为空
		        if(!empty($brand_name)) {
		            $query->where('brand_name','like','%'.$brand_name.'%');
		        }
		        //如果邮箱不为空
		        if(!empty($brand_url)) {
		            $query->where('brand_url','like','%'.$brand_url.'%');
		        }
		    })
		    	->paginate($request->input('num', 10));
			return view('admin/brand/brandlist',[
			'title'=>'商品品牌列表页',
			'rs'=>$rs,
			'request'=>$request
		]);
	}

//商品品牌数据修改
	public function update($id){
		//获取id
		$rs = Brand::find($id);
		// dump($rs);
		return view('admin/brand/update',[
			'title'=>'商品品牌的修改页面',
			'rs' => $rs
		]);
	}
	public function updates(Request $request , $id)
	{

		// 删除原始的logo
		//only 选哪个查那个
		$logo = Brand::find($id);
		$logo=$logo->only('brand_logo');
		$logos = $logo['brand_logo'];
		// dump($logos);
		$dd = unlink('.'.$logos);
		// dump($dd);die;


		//获取id和修改的数据
		$id = $id;
		$rs = $request->except('_token');
		// dump($rs,$id);
		//获取文件上传信息
		$file = $request->file('brand_logo');
		//名字
		$name = 'img_'.rand(1111,9999).time();
		//获取后缀
		$suffix = $file->getClientOriginalExtension();
		$file->move('./uploads/brand',$name.'.'.$suffix);
		$rs['brand_logo'] = '/uploads/brand/'.$name.'.'.$suffix;
		//修改数据
       	$data = Brand::where('id',$id)->update($rs);

       	if($data){
			return redirect('/admin/brandlist')->with('success','修改成功');
		}else{
			return back()->with('error','修改失败');
		}
	}
	

	//后台商品品牌删除
	public function delete($id)
	{
		$data = Brand::destroy($id);
		if($data){
			return redirect('/admin/brandlist')->with('success','删除成功');
		}else{
			return back()->with('error','删除失败');
		}
	}
}
