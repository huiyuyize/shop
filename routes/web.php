<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//登录控制器
Route::resource('/admin/login','Admin\login\LoginController');

//验证码控制器
Route::get('admin/captcha','Admin\login\LoginController@captcha');
//如果没有权限跳转页面
Route::get('admin/noper','Admin\login\LoginController@noper');


//退出登录
Route::get('/admin/out','Admin\login\LoginController@outlogin');

//后台路由组，以后添加中间件
Route::group(['middleware'=>['adminlogin']],function(){

//角色管理路由
Route::resource('/admin/role','Admin\rbac\RoleController');
//权限管理路由
Route::resource('/admin/permission','Admin\rbac\PermissionController');
//管理员列表角色跳转路由
Route::get('/admin/user/role/{id}','Admin\AdminController@userrole');
Route::post('/admin/user/uprole/{id}','Admin\AdminController@uprole');


//后台用户管理路由
Route::resource('/admin/users','Admin\UserController');
//后台管理员管理路由
Route::resource('/admin/adminuser','Admin\AdminController');
//后台的首页路由
Route::any('/admin','Admin\IndexController@index');
//后台用户管理路由
Route::any('/admin/user','Admin\IndexController@user');
//后台商品分类路由
Route::any('admin/goods','Admin\GoodsController@index');
//商品分类修改
Route::any('admin/edit/{id}','Admin\GoodsController@edit');
//商品分类执行修改
Route::any('admin/doedit','Admin\GoodsController@doedit');
//商品分类删除
Route::any('admin/del/{id}','Admin\GoodsController@delete');
//添加商品分类
Route::any('/admin/insert/goods','Admin\GoodsController@insert');
//执行添加商品分类
Route::any('/admin/doinsert','Admin\GoodsController@doinsert');
//查看子分类
Route::any('/admin/goods/store/{id}','Admin\GoodsController@store');
//查看三级分类
Route::any('/admin/goods/stores/{id}','Admin\GoodsController@stores');
//添加子分类
Route::any('admin/goods/inserts/{id}/{name}','Admin\GoodsController@inserts');
//执行子分类添加
Route::any('admin/doinserts','Admin\GoodsController@doinserts');

//后台轮播图
Route::resource('/admin/lunbo','Admin\Lunbo\LunboController');

//后台商品添加路由
Route::resource('/ginsert','Admin\goods_insert\Goods_insertController');

//后台商品的详情图片添加
Route::get('/goodsimg/{id}','Admin\goods_insert\GoodsimgController@adds');
Route::any('/goodsimg/tian/','Admin\goods_insert\GoodsimgController@tian');

//后台商品类型添加路由
Route::resource('/goods_type','Admin\goods_type\Goods_typeController');
//后台商品属性路由
Route::resource('/goods_attr','Admin\goods_attr\Goods_attrController');

	/**
	 * 后台商品品牌模块路由规则
	 */
//后台商品品牌添加路由
Route::any('/admin/brand','Admin\BrandController@brand');
Route::any('/admin/index','Admin\BrandController@index');
//后台商品品牌列表路由
Route::any('/admin/brandlist','Admin\BrandController@brandlist');
//后台商品品牌修改路由
Route::any('/admin/update/{id}','Admin\BrandController@update');
//处理商品品牌路由
Route::any('/admin/updates/{id}','Admin\BrandController@updates');
//后台商品删除路由
Route::any('/admin/delete/{id}','Admin\BrandController@delete');


	/**
	 * 后台广告路由规则
	 */
//后台广告添加页面
Route::resource('/advert','Admin\AdvertController');
//友情链接路由
Route::resource('/links','Admin\links\GoodslinksController');

});


//前台首页路由
Route::any('/','Home\IndexController@index');
//注册用户路由
Route::any('/add','Home\LoginController@add');
//注册信息存储
Route::post('/doadd','Home\LoginController@doadd');
//注册时验证用户名是否存在
Route::get('/readd','Home\LoginController@readd');
//手机号是否重复
Route::get('/rephone','Home\LoginController@rephone');
//验证码
Route::any('/yan','Home\LoginController@yanzheng');
//匹配验证码是否一致
Route::get('/fan','Home\LoginController@fan');


//登录路由
Route::get('/login','Home\LoginController@index');
//用户退出
Route::get('/loginout','Home\LoginController@loginout');
//用户登录验证
Route::post('/dologin','Home\LoginController@login');


//找回密码路由
Route::get('/findpwd','Home\login\LoginController@findpwd');
//发送验证码路由
Route::get('/dopwd','Home\login\LoginController@sms');
//对比验证码
Route::post('/reset','Home\login\LoginController@reset');


//重置密码
Route::any('/resetpassword','Home\LoginController@resetpassword');
//短信验证修改密码
Route::post('/newpassword','Home\LoginController@newpassword');


//前台广告显示页面路由
Route::any('/guanggao/{id}','Home\IndexController@list');


//前台中间件
Route::group(['middleware'=>'homelogin'],function(){
//购物车路由 
Route::post('/goodscar','Home\goodscar\GoodcarController@gocar');
Route::get('/deletecar','Home\goodscar\GoodcarController@delete');
Route::get('/jiesuan','Home\goodscar\GoodcarController@jiesuan');
Route::post('/queren','Home\QuerenController@list');     
Route::post('/ding','Home\QuerenController@ding');
});

//商品列表
Route::any('/list/{id}','Home\ListController@index');
//商品详情
Route::resource('/detail','Home\DetailController');




















































































