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

//后台路由组，以后添加中间件
Route::group([],function(){

//后台登录路由
Route::get('/login','Home\LoginController@index');
Route::post('admin/dologin','Admin\LoginController@dologin');
Route::get('admin/captcha','Admin\LoginController@captcha');


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






/**
	 * 后台商品添加路由规则
	 */
//后台商品添加路由
Route::any('/goods/create','Admin\Goods_brandController@create');
//后台商品列表页面路由
Route::any('/admin/list','Admin\Goods_brandController@list');

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
Route::any('/admin/create','Admin\AdvertController@create');

});
















//前台首页路由
Route::any('/','Home\IndexController@index');
//登录路由
Route::get('/login','Home\LoginController@index');
//用户登出
Route::get('/loginout','Home\LoginController@loginout');
//用户登录验证
Route::post('/login','Home\LoginController@login');

//忘记密码
Route::any('/slip','Home\LoginController@slip');
//第三方发送短信路由
Route::any('/smsyzm','Home\LoginController@smsyzm');
//验证是否是注册的手机号
Route::any('/verify','Home\LoginController@verify');
//生成手机验证码并加盐
Route::any('/code','Home\LoginController@code');
//向用户发送验证码
Route::any('/smsyzm','Home\LoginController@smsyzm');
//对比验证码
Route::any('/reset','Home\LoginController@reset');
//重置密码
Route::any('/resetpassword','Home\LoginController@resetpassword');
//短信验证修改密码
Route::post('/newpassword','Home\LoginController@newpassword');

//注册用户路由
Route::any('/add','Home\LoginController@add');
//注册信息存储
Route::post('/add','Home\LoginController@create');
//注册时验证用户名是否存在
Route::get('/readd','Home\LoginController@readd');
//手机号是否重复
Route::get('/rephone','Home\LoginController@rephone');
//验证码
Route::any('/yan','Home\LoginController@yanzheng');
//匹配验证码是否一致
Route::get('/fan','Home\LoginController@fan');




//商品列表
Route::any('/home/list','Home\ListController@index');
































