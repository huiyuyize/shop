@extends('common.home')
@section('content')
<script type="text/javascript" src="/static/home/js/select.js"></script>
    
    <script type="text/javascript" src="/static/home/js/num.js">
        var jq = jQuery.noConflict();
    </script>     
    
    <script type="text/javascript" src="/static/home/js/shade.js"></script>
<div class="i_bg">  
    <div class="content mar_20">
    	<img src="/static/home/images/img2.jpg" />        
    </div>
    
    <!--Begin 第二步：确认订单信息 Begin -->
    <div class="content mar_20">
    	<div class="two_bg">
        	<div class="two_t">
            	<span class="fr"><a href="#">修改</a></span>商品列表
            </div>

            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="550">商品名称</td>
                <td class="car_th" width="140">属性</td>         
              </tr>
              @foreach($data as $k=>$v)
              @foreach($v as $kk=>$vv)
              <tr>
                <td>
                    <div class="c_s_img"><img src="{{$vv->goods_img}}" width="73" height="73" /></div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{$vv->goods_name}}
                </td>
                <td align="center">{{$vv->type_id}}</td>
                
                
              </tr>
              @endforeach
              @endforeach
             
             
            </table>
            
            <div class="two_t">
            	<span class="fr"><a href="#">修改</a></span>收货人信息
            </div>
            <table border="0" class="peo_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="p_td" width="160">收货人姓名</td>
                <td width="395">{{$address->user_take}}</td>
                <td class="p_td">手机</td>
                <td>{{$address->user_phone}}</td>
              </tr>
              <tr>
                <td class="p_td">详细信息</td>
                <td>{{$address->user_addr}}</td>
                <td class="p_td">邮政编码</td>
                <td>{{$address->user_code}}</td>
              </tr>
              <tr>
                
              </tr>
              
            </table>

           
            
            
            
           
            
            <table border="0" style="width:900px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr>
                <td align="right">
                    商品总价: <font color="#ff4e00">￥{{$price[0]}}</font>
                </td>
              </tr>
              <tr height="70">
                <td align="right">
                	<b style="font-size:14px;">应付款金额：<span style="font-size:22px; color:#ff4e00;">￥{{$price[0]}}</span></b>
                </td>
              </tr>
              <tr height="70">
                <td align="right"><a href="/jiesuan"><img src="/static/home/images/btn_sure.gif" /></a></td>
              </tr>
            </table>

            
        	
        </div>
    </div>
    @stop
	