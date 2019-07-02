@extends('common.home')
@section('content')
<div class="i_bg">  
    <div class="content mar_20">
        <img src="/static/home/images/img3.jpg" />        
    </div>
    
    <div class="i_bg">  
    
    <!--Begin 第三步：提交订单 Begin -->
    <div class="content mar_20">
      
        <!--Begin 银行卡支付 Begin -->
      <div class="warning">         
            <table border="0" style="width:1000px; text-align:center;" cellspacing="0" cellpadding="0">
              <tr height="35">
                <td style="font-size:18px;">
                  感谢您在本店购物！您的订单已提交成功，请记住您的订单号: <font color="#ff4e00">
                    @php 
                      echo date(time()).rand(1111,9999);
                    @endphp
                  </font>
                </td>
              </tr>
              <tr>
                <td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">
                  您选定的配送方式为: <font color="#ff4e00">申通快递</font>； &nbsp; &nbsp;您选定的支付方式为: <font color="#ff4e00">支付宝</font>； &nbsp; &nbsp;您的应付款金额为: <font color="#ff4e00">￥{{$price[0]}}</font>
                </td>
              </tr>
              <tr>
                <td style="padding:20px 0 30px 0; font-family:'宋体';">
                  收货人姓名:{{$use->user_take}} &nbsp;&nbsp;&nbsp;收货人联系电话:{{$use->user_phone}}<br /><br />
                  收货地址:{{$use->user_addr}}<br /><br />
                    注意事项：办理电汇时，请在电汇单“汇款用途”一栏处注明您的订单号。
                </td>
              </tr>
              <tr>
                <td>
                  <a href="/">返回首页</a> 
                </td>
              </tr>
            </table>          
        </div>
        <!--Begin 银行卡支付 Begin -->
        
     
        
        
    </div>
   
</div>


@stop 
<script type="text/javascript" src="/static/home/js/num.js">
    var jq = jQuery.noConflict();
</script>  
<script src="/static/home/js/jquery.js"></script>






    



    
