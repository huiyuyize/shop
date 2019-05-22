@extends('home.add')
@section('head')


@stop
@section('form')
	<form >
            <table border="0" style="width:420px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr height="130" valign="top">
              	<td width="95">&nbsp;</td>
                <td>
                	<span class="fl" style="font-size:15px;">请输入你需要找回登录密码手机号</span>
                    <span class="fr"><a href="/login" style="color:#ff4e00;">登录&nbsp;&nbsp;&nbsp;</a>|&nbsp;&nbsp;&nbsp;<a href="/login" style="color:#ff4e00;">注册</a></span>
                </td>
              </tr>
              
              <tr height="70">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;手机 &nbsp;</td>
                <td><input type="text" value="" class="l_tel" name="yzmtel"/><span class="user_phone"></span></td>
              </tr>
              <tr height="90">
                <td align="right"> <font color="#ff4e00">*</font>&nbsp;验证码 &nbsp;</td>
                <td>

        			<input id="code" hidden name="code">
                    <input type="text" value="" class="l_ipt" name="yzm"/>
                    <!-- <p><span>1111</span></p> -->
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button id="yanzheng" class="btn btn-default" width="300">点击获取验证</button>
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
	$('#yanzheng').click(function(){
		//手机号规则删选
		var myreg = /^((1[3|4|5|6|7|8][0-9]{1})+\d{8})$/;
		if(!myreg.test($('.l_tel').val())){
　　       alert('请输入有效的手机号码！');
　　       return false;
　　		}
			//验证是否注册时填写的手机号
			var l_tel = $('.l_tel').val();
			$.get('/verify',{'phone':l_tel},function(data){
				// console.log(data);
				// document.write(data);
				if(data ==0){
					$('.user_phone').html('<p><font color="red">该账户不存在，请重新输入</font></p>');
					return false;
				}else {
					$('.l_tel').focus();
					$('.user_phone').html('');

					$.ajax({
                    async : false,
                    type: "get",
                    url: "{{url('code')}}", //
                    data: {},
                    success: function (data) {
                        //发送短信验证码
                        $("#code").val(data); //获取生成验证码赋值 加密
                        $.ajax({
                            async : false,
                            type: "post",
                            url: "{{url('smsyzm')}}", //
                            data: {
                                "yzm": data,
                                'yzmtel': $('.l_tel').val(),
                                '_token':'{{csrf_token()}}'
                            },
                            dataType: "json",
                            success: function (data) {
                            	console.log(data);
                            	if(data.msg == 'OK'){
                            		 $('input:submit').attr({'disabled':false,'style':''});
                            	}
                            }
                        });
                    }
                });


					//防止重复点击验证按钮(防机刷)
					$('#yanzheng').prop('disabled',true);
					// $('#yanzheng').css('background','#666666');
					$('#yanzheng').val('');
					$('#yanzheng').html('30s');
				
				
					//设置定时
					var clock = setInterval(function(){
					var a = parseInt($('#yanzheng').text())-1;
						// console.log(a);
						$('#yanzheng').text(a+'s')  ;
						//清除定时器并返回默认值
						if(a == 0){
						clearInterval(clock);
						$('#yanzheng').prop('disabled',false);
						// $('#yanzheng').css('background','');
						$('#yanzheng').html('重新获取');
						}

					},1000);
					// return false;
				}
			});	
			return false;
			
	})

	$('form').submit(function(){
		var yzm = $('.l_ipt').val();
		var code = $('#code').val();
		$.post("{{url('reset')}}",{
			"code":code,
            "yzm":yzm,
            "_token":"{{csrf_token()}}",
		},function(data){
			if(data == 1){
				// loction.href = "{{url('resetpassword')}}";
				
                    window.location.href="http://lamp214.net/resetpassword";
			} else {
				$('.user_ipt').html('<p><font color="red">验证码错误,请重试.</font></p>');
				// return false;
			}
		})
		return false;
	})
</script>
@stop