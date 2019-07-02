<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Goods;
use DB;
class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pid_data = Goods::where('cate_pid',0)->get();
        //通过1级拿2级
        foreach($pid_data as $k=>$v){
            //压一个数组,放二级
            $v['sub'] = Goods::where('cate_pid',$v->id)->get();
            foreach($v['sub'] as $key=>$value){
            //在二级最下面压一个数组,放三级
             $value['sub'] = Goods::where('cate_pid',$value->id)->get();
            }
        }
        
        //详情页面
        $cate_id = DB::table('goods')->where('id',$id)->pluck('cate_id');
        //全部分类 3级
        $cate3 = Goods::where('id',$cate_id)->first();
        $cate_pid = Goods::where('id',$cate_id)->pluck('cate_pid')->first();
        $cate_pid1 = Goods::where('id',$cate_pid)->pluck('cate_pid')->first();
        // dump($cate3);die;
        //2级
        $cate2 = Goods::where('id',$cate_pid)->first();
        //1级
        $cate1 = Goods::where('id',$cate_pid1)->first();
        //商品信息
        $cate_data = DB::table('goods')->where('id',$id)->first();
        //dump($cate_data);
        

        
        //商品主图下面的4个小图
        $arr[] = $cate_data->id;

        $images = DB::table('goods_imgs')->whereIn('goods_id',$arr)->get();

        //品牌
        $brand_id = $cate_data->brand_id;

        $brand = DB::table('goods_brand')->where('id',$brand_id)->first();

        //类型
        $type = DB::table('goods')->where('id',$id)->get();

        //商品详情下面的多张图片
        $gimg = DB::table('img_goods')->where('gid',$id)->get();
        // dump($gimg);die;
       
        
        
        
        // dump($cate1,$cate2,$cate3);

        return view('/home/detail',[
            'pid_data'=>$pid_data,
            'cate1'=>$cate1,
            'cate2'=>$cate2,
            'cate3'=>$cate3,
            'cate_data'=>$cate_data,
            'images'=>$images,
            'brand'=>$brand,
            'type'=>$type,
            'gimg'=>$gimg
        ]);
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
}
