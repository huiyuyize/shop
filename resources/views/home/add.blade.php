<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="/static/home/css/style.css" />
  <link rel="stylesheet" href="/static/home/css/bootstrap.min.css">
    <!--[if IE 6]>
    <script src="js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    
    <!-- <script type="text/javascript" src="/static/home/js/jquery.js"></script> -->
    <script type="text/javascript" src="/static/home/js/jquery-1.11.1.min_044d0927.js"></script>
	<script type="text/javascript" src="/static/home/js/jquery.bxslider_e88acd1b.js"></script>
    
    <script type="text/javascript" src="/static/home/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/static/home/js/menu.js"></script>    
        
	<script type="text/javascript" src="/static/home/js/select.js"></script>
    
	<script type="text/javascript" src="/static/home/js/lrscroll.js"></script>
    
    <script type="text/javascript" src="/static/home/js/iban.js"></script>
    <script type="text/javascript" src="/static/home/js/fban.js"></script>
    <script type="text/javascript" src="/static/home/js/f_ban.js"></script>
    <script type="text/javascript" src="/static/home/js/mban.js"></script>
    <script type="text/javascript" src="/static/home/js/bban.js"></script>
    <script type="text/javascript" src="/static/home/js/hban.js"></script>
    <script type="text/javascript" src="/static/home/js/tban.js"></script>
    
	<script type="text/javascript" src="/static/home/js/lrscroll_1.js"></script>
    
    
<title>尤洪</title>
</head>
<body>  
<!--Begin Header Begin-->
@section('head')
<div class="soubg">
	<div class="sou">
        <span class="fr">
        	<span class="fl">你好，请<a href="/add">登录</a>&nbsp; <a href="/add" style="color:#ff4e00;">免费注册</a>&nbsp; </span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/static/home/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
 @show;
<!--End Header End--> 
<!--Begin Login Begin-->
<div class="log_bg">	
    <div class="top">
        <div class="logo"><a href="Index.html"><img src="/static/home/images/logo.png" /></a></div>
    </div>
	<div class="regist">
    	<div class="log_img"><img src="/static/home/images/l_img.png" width="611" height="425" /></div>
		<div class="reg_c">
     
    @section('form')
        	<form action="/doadd" method="post">
            <table border="0" style="width:420px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr height="30" valign="top">
              	<td width="95">&nbsp;</td>
                <td>
                	<span class="fl" style="font-size:24px;">注册</span>
                    <span class="fr">已有商城账号，<a href="/login" style="color:#ff4e00;">我要登录</a></span>
                </td>
              </tr>
              <tr height="70">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;用户名 &nbsp;</td>
                <td><input type="text" value="" class="l_user" name="user_name"/><span class="user_name"></span></td>
                
              </tr>
              <tr height="70">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;密码 &nbsp;</td>
                <td><input type="password" value="" class="l_pwd" name="password"/><span class="password"></span></td>
              </tr>
              <tr height="70">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;确认密码 &nbsp;</td>
                <td><input type="password" value="" class="l_pwd" id="repwd" name="repassword"/><span class="repwd"></span></td>
              </tr>
              <tr height="70">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;邮箱 &nbsp;</td>
                <td><input type="text" value="" class="l_email" name="user_email"/><span class="user_email"></span></td>
              </tr>
              <tr height="70">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;手机 &nbsp;</td>
                <td><input type="text" value="" class="l_tel" name="user_phone"/><span class="user_phone"></span></td>
              </tr>
              <tr height="70">
                <td align="right"> <font color="#ff4e00">*</font>&nbsp;验证码 &nbsp;</td>
                <td>
                    <input type="text" value="" class="l_ipt" />
                    <label><a   style="font-size:12px; font-family:'宋体';"></a><img src="/yan" onclick="this.src = this.src+='?1'"></label>
                    <span class="user_ipt"></span>
                </td>
              </tr>
              <tr>
              	<td>&nbsp;</td>
                <td style="font-size:12px; padding-top:20px;">
                	<span style="font-family:'宋体';" class="fl">
                    	<label class="r_rad"><input type="checkbox" /></label><label class="r_txt">我已阅读并接受《用户协议》</label>
                    </span>
                </td>
              </tr>
              <tr height="60">
              	{{csrf_field()}}
              	<td>&nbsp;</td>
                <td><input type="submit" value="立即注册" class="log_btn" disabled style="background:#eee;cursor:not-allowed;"/></td>
              </tr>
            </table>
            </form>
            @show
        </div>
    </div>
</div>
<!--End Login End--> 
<!--Begin Footer Begin-->
<div class="btmbg">
    <div class="btm">
        备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
        <img src="/static/home/images/b_1.gif" width="98" height="33" /><img src="/static/home/images/b_2.gif" width="98" height="33" /><img src="/static/home/images/b_3.gif" width="98" height="33" /><img src="/static/home/images/b_4.gif" width="98" height="33" /><img src="/static/home/images/b_5.gif" width="98" height="33" /><img src="/static/home/images/b_6.gif" width="98" height="33" />
    </div>    	
</div>
<!--End Footer End -->    

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
@section('js')
<script>
  var l_tel = 0;
	$('.l_tel').blur(function(){
    //手机号规则删选
    var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
    if(!myreg.test($('.l_tel').val())){
　　       $('.user_phone').html('<p><font color="red">请输入有效的手机号码！</font></p>');
          l_tel = 0;
          $('input:submit').attr({'disabled':true,'style':'background:#eee;cursor:not-allowed;'});
　　       return false;
　　    }else{
           $('.user_phone').html('');
            var url = '/rephone'; 
            var phone = $(this).val();
            // console.log(phone);
        $.get(url,{'user_phone':phone},function(data){
          // console.log(data);
          // 
        if(data == 1){
            $('.user_phone').html('<p><font color="red">此手机号已经注册</font></p>');
            l_tel = 0;
            $('input:submit').attr({'disabled':true,'style':'background:#eee;cursor:not-allowed;'});
          }else{
            
            $('.user_phone').html('');
            l_tel = 1;
          }
        });
          // l_tel = 1;
        }
        
  })
// console.log(l_tel);
  //邮箱规则删选
  var l_email =0;
  $('.l_email').blur(function(){
    
    var myre = /^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/;
    if(!myre.test($('.l_email').val())){
　　       $('.user_email').html('<p><font color="red">请输入有效的邮箱！</font></p>');
          fl_email = 0;
          $('input:submit').attr({'disabled':true,'style':'background:#eee;cursor:not-allowed;'});
　　       return false;
　　    }else{
           $('.user_email').html('');
           l_email = 1;
        }
  })

  // 用户名检测

var l_user = 0;
$('.l_user').blur(function(){
    if(!$(this).val()){
      $('.user_name').html('<p><font color="red">注意!!用户名不能为空</font></p>');
      l_user = 0;
      $('input:submit').attr({'disabled':true,'style':'background:#eee;cursor:not-allowed;'});
    }else{
      var nowval =  $(this).val();
      //校验登录名：只能输入5-15个以字母开头、可带数字、“_”、“.”的字串
      var reg = /^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){4,15}$/i;
      if(!reg.test(this.value)){
        $('.user_name').html('<p><font color="red">非法用户名:由字母数字下划线组成的5-20位字符且不能数字开头</font></p>');
        l_user = 0;
        $('input:submit').attr({'disabled':true,'style':'background:#eee;cursor:not-allowed;'});
        return false;
        
      }else{

        var url = '/readd';    
        $.get(url,{'user_name':nowval},function(data){
        	// console.log(data);
        if(data == 1){
            $('.user_name').html('<p><font color="red">用户名已经存在</font></p>');
            l_user = 0;
            $('input:submit').attr({'disabled':true,'style':'background:#eee;cursor:not-allowed;'});
          }else{
            
            $('.user_name').html('<p><font color="green">恭喜!此用户名可用</font></P');
            l_user = 1;
          }
        });
      } 
    }   
  });

//密码验证
            var l_pwd = 0;
          $('.l_pwd').blur(function(){
          
          var password = /^(\w){6,20}$/;
          if(!password.test($('.l_pwd').val())){
      　　       $('.password').html('<p><font color="red">错误!密码由6-20位,字母、数字、下划线组成！</font></p>');
                  l_pwd = 0;
                  $('input:submit').attr({'disabled':true,'style':'background:#eee;cursor:not-allowed;'});
      　　       return false;
      　　    }else{
                 $('.password').html('');
                 l_pwd = 1;
              }
          })
 



 //确认密码
    var repwd = 0;
  $('#repwd').blur(function(){   
    var a = $(this).val();
    var b = $('.l_pwd').val();
    if( a !=  b){
　　       $('.repwd').html('<p><font color="red">错误!成！</font></p>');
          repwd = 0;
          $('input:submit').attr({'disabled':true,'style':'background:#eee;cursor:not-allowed;'});
　　       return false;
　　    }else{
           $('.repwd').html('');
           repwd = 1;
        }
  })

  //验证码ipt
  var l_ipt= 0;
  $('.l_ipt').blur(function(){
           var red = $('.l_ipt').val();
          $.get('/fan',{'code':red},function(data){
          // console.log(data);
          if(data == 0){
            $('input:submit').attr({'disabled':true,'style':'background:#eee;cursor:not-allowed;'});
            l_ipt= 0;
            $('.user_ipt').html('<p><font color="red">验证码错误！</font></p>')
          }else{
            l_ipt= 1;
            $('.user_ipt').html('');
          }
        
          })
          
      })

// $('input:checkbox').click(function(){
// var statu = $('input:checkbox').prop('checked');
// console.log(statu);
//   // if($(this).attr('checked') == true){

//   // }
//   if(statu == true){
//      if((l_user == 1) && (l_pwd==1) && (repwd == 1) && (l_email == 1) && (l_tel == 1) && (l_ipt == 1)){

//           $('input:submit').attr({'disabled':false,'style':''});
          
    
     
//      }  
//   }else{
//     $('input:submit').attr({'disabled':true,'style':'background:#eee;cursor:not-allowed;'});
//   }
    
  
// })
// 
if($('input:checkbox').prop('checked') == false){
  $('input:submit').attr({'disabled':true,'style':'background:#eee;cursor:not-allowed;'});
}

setInterval(function(){
var statu = $('input:checkbox').prop('checked');
// console.log(statu);
  // if($(this).attr('checked') == true){

  // }
  if(statu == true){
      if((l_user == 1) && (l_pwd==1) && (repwd == 1) && (l_email == 1) && (l_tel == 1) && (l_ipt == 1)){

          $('input:submit').attr({'disabled':false,'style':''});
          
    
     
       } 
    } else {
       $('input:submit').attr({'disabled':true,'style':'background:#eee;cursor:not-allowed;'});
    }
},800);
  
</script>
@show