@extends('common.home')
@section('content')
<div class="i_bg">  
    <div class="content mar_20">
        <img src="/static/home/images/img1.jpg" />        
    </div>
    
    <!--Begin 第一步：查看购物车 Begin -->
    <div class="content mar_20" id="d1">
        <form action="/queren" method="post">
        <table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
          <tr>
            <td class="car_th" width="40">选择</td>
            <td class="car_th" width="40">编号</td>
            <td class="car_th" width="400">商品名称</td>
            <td class="car_th" width="140">属性</td>
            <td class="car_th" width="150">购买数量</td>
            <td class="car_th" width="130">单价</td>
            <td class="car_th" width="130">小计</td>
            <td class="car_th" width="150">操作</td>
          </tr>
           @foreach($goods as $k=>$v)
          <tr>           
            <td>
                 <input type="checkbox" class="xuan">
            </td>
            <td>
                 {{$carid[$k]->id}}
            </td>
           
            <td>
                <div class="c_s_img"><img src="{{$v->goods_img}}" width="73" height="73" /></div>
                {{$v->goods_name}}
            </td>
            <td align="center">{{$v->type_id}}</td>
            <td align="center">
                <div class="c_num">
                    <input type="button" value=""  class="car_btn_1 min" />
                    <input type="text" id="num" value="{{$num[$k]}}" name="" class="car_ipt" />  
                    <input type="button" value=""   class="car_btn_2 add" />
                    
                </div>
            </td>
            <td align="center" style="color:#ff4e00;">￥<span class="pric">{{$v->goods_price}}</span></td>
            <td align="center" style="color:#ff4e00;">￥<span class="gogogo">{{$v->goods_price}}</span></td>
            
            <td align="center"><a href="#" class="del">删除</a></td>
          
          </tr>
           @endforeach
          <tr height="70">
            <td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
                <span class="fr">商品总价：<b class="all" style="font-size:22px; color:#ff4e00;"></b></span>
            </td>
          </tr>
          <tr valign="top" height="150">
            <td colspan="6" align="right">
                <button id="getnum">确认结算</button> &nbsp; &nbsp; 
                <a href="/list/1"><img src="/static/home/images/buy1.gif" /></a>
            </td>
          </tr>
        </table>
          {{csrf_field()}}
        </form>
      
       
    </div>
      

@stop 
<script type="text/javascript" src="/static/home/js/num.js">
    var jq = jQuery.noConflict();
</script>  
<script src="/static/home/js/jquery.js"></script>
<script>
    $(function(){
        
        $('.add').click(function(){
            //获取数量,设置为每次点加号都增加1
            var num = $(this).prev().val().trim();
            num++;
            $(this).prev().val(num);
            
            //获取价格
            var pr = $(this).parents('tr').find('.pric').text();
            
            function accMul(arg1, arg2){
              var m = 0, s1= arg1.toString(), s2 = arg2.toString();
              try{ m += s1.split(".")[1].length } catch (e) {}
              try{ m += s2.split(".")[1].length } catch (e) {}

              return Number(s1.replace(".","")) * Number(s2.replace(".","")) / Math.pow(10,m)
            }
            $(this).parents('tr').find('.gogogo').text(accMul(num, pr));
            getAll();
        })
          
        



        $('.min').click(function(){
          
          var num = $(this).next().val().trim();

          num--;
          if (num <= 1) {
            num = 1;
          }
          $(this).next().val(num);
          //获取价格
          var pr = $(this).parents('tr').find('.pric').text();
          function accMul(arg1, arg2){
              var m = 0, s1= arg1.toString(), s2 = arg2.toString();
              try{ m += s1.split(".")[1].length } catch (e) {}
              try{ m += s2.split(".")[1].length } catch (e) {}

              return Number(s1.replace(".","")) * Number(s2.replace(".","")) / Math.pow(10,m)
            }
          $(this).parents('tr').find('.gogogo').text(accMul(num, pr));
          getAll();
        })
        
        
         

          function getAll()
          {
            var allpri = 0;
              $(':checkbox:checked').each(function(){
                var pc = parseFloat($(this).parents('tr').find('.gogogo').text());
                  allpri += pc;   
              }) 
              $('.all').text(allpri);
          }
            
          //点击删除,发送ajax
          $('.del').click(function(){
             var id = $(this).parents('tr').find('td').eq(1).text().trim();
              var tr = $(this).parents('tr');
             $.get('/deletecar',{'id':id},function(data){
                 if(data == 1){
                    tr.remove();
                 }
             })
            
          })  


       $('.xuan').click(function(){
          getAll();
           })
         
           //点击结算
            $('#getnum').click(function(){ 
            var arr = [];
            var arr1 = [];
            var arr5 = [];
            var allpri = 0;
            $(':checkbox:checked').each(function(){
              var pc = parseFloat($(this).parents('tr').find('.gogogo').text());
                  allpri += pc; 
                var price = $('.all').text();
                var pid = $(this).parents('tr').find('td').eq(1).text().trim();
                var nums = $(this).parents('tr').find('td').eq(4).find('div').find('input').eq(1).val().trim();
                arr.push(pid);
                arr1.push(nums);
                arr5.push(price);
            })
              var url = '/ding';
                $.post(url,{'_token':"{{csrf_token()}}",arr:arr,arr1:arr1,arr5:arr5},function(data){
                       //console.log(data);
                })
            })
            
         

           
            

           

    });



   /**/
</script>



    



    
