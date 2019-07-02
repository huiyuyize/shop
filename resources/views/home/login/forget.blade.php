@extends('home.add')
@section('head')


@stop
@section('form')

	       <form action="" method="post">
            <table border="0" style="width:420px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr height="130" valign="top">
              	<td width="95">&nbsp;</td>
                <td>
                	<span class="fl" style="font-size:15px;">请输入你需要找回登录密码手机号</span>
                    <span class="fr"><a href="/login" style="color:#ff4e00;">登录&nbsp;&nbsp;&nbsp;</a>|&nbsp;&nbsp;&nbsp;<a href="/add" style="color:#ff4e00;">注册</a></span>
                </td>
              </tr>
              
              <tr height="70">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;手机 &nbsp;</td>
                <td><input type="text" value=""  name="phone" class="l_tel" name="yzmtel"/><span class="user_phone"></span></td>
              </tr>
              <tr height="90">
                <td align="right"> <font color="#ff4e00">*</font>&nbsp;验证码 &nbsp;</td>
                <td>

        			<input id="code" hidden name="code">
                    <input type="text"  value="" class="l_ipt" name="yzm"/>
                    <!-- <p><span>1111</span></p> -->
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button id="gain" class="btn btn-default" width="300">点击获取验证</button>
                    <p><span class="user_ipt"></span></p>
                </td>
              </tr>
              
              <tr height="110">
              	{{csrf_field()}}
              	<td>&nbsp;</td>
                <td><input type="submit" value="确定" class="log_btn" disabled style="background:#eee;cursor:not-allowed;"/></td>
                <!-- <td><input type="submit" value="确定" class="log_btn"/></td> -->
              </tr>
            </table>
        </form>
            
@stop
@section('js')
<script type="text/javascript">
    $('.l_ipt').prop('disabled',true);
    $('#gain').click(function(){
        //验证手机号是否真是存在
        
        var myreg = /^((1[3|4|5|6|7|8][0-9]{1})+\d{8})$/;

        if(!myreg.test($('.l_tel').val())){

　　       alert('请输入有效的手机号码！');

　　       return false;
　　      }

        //获取手机号
        var l_tel = $('.l_tel').val();          
            
        $.get('/dopwd',{'phone':l_tel},function(data){ 

        if(data == 0){

            $('.user_phone').html('<p><font color="red">该账户不存在，请重新输入</font></p>');

            return false;
        } else {
            $('.l_ipt').prop('disabled',false);
            $('.user_phone').html('');
            
           }
       })
                    
        //防止重复点击验证按钮(防机刷)
        $('#gain').prop('disabled',true);
        
        $('#gain').text('60s');
       

        //设置倒计时
        
        var clock = setInterval(function(){

        //令框内的值每过1秒减1,并转换成实型
        var a =  parseInt($('#gain').text())-1;

        //加上s
        $('#gain').text(a+'s');

        //判断,如果减到0,清空定时器,并且变为可点击,值变为重新获取
        if(a == 0){

        clearInterval(clock);

        $('#gain').prop('disabled',false);

       
        $('#gain').html('重新获取');

        }

        },1000);
    
        $('.l_ipt').keydown(function(){
              if($(this).val().length == 5){
                  $('.log_btn').attr({'disabled':false,'style':''});
              }
        })
       
                    
    });


	
    //点击确定,触发submit事件
	$('form').submit(function(){
        //获取验证码的值
		var yzm = $('.l_ipt').val();
        
        //获取一个code值,为空
		var code = $('#code').val();

        //发送ajax
		$.post('/reset',{
			"code":code,
            "yzm":yzm,
            "_token":"{{csrf_token()}}",
		},function(data){
			if(data == 1){

			location.href = "/resetpassword";
				
                    //window.location.href="http://lamp214.net/resetpassword";
			} else {
				$('.user_ipt').html('<p><font color="red">验证码错误,请重试.</font></p>');
				// return false;
			}
		})
		return false;
	})
</script>
@stop