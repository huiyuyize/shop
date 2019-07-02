@extends('common.home')
@section('content')

<script type="text/javascript" src="/static/home/js/jquery.js"></script>

<div class="postion">
    	<span class="fl">全部分类 >
        {{$cate->cate_name}}
          
    	 </span>
    	
      
    </div>
    <!--Begin 筛选条件 Begin-->
    <div class="content mar_10">
    	<table border="0" class="choice" style="width:100%; font-family:'宋体'; margin:0 auto;" cellspacing="0" cellpadding="0">
          <tr valign="top">
            <td width="70">&nbsp; 品牌：</td>
            <td class="td_a">
            	
            	@foreach($brand as $k=>$v)
            	<a href="#" class="now">{{$v->brand_name}}</a>
                @endforeach
              
            </td>
          </tr>
          <tr valign="top">
            <td>&nbsp; 价格：</td>                                                                                                       
            <td class="td_a">
            	<form action="/list/1" method="post" style="width:190px"  class="price">
                   <input type="text" name="price1" placeholder="¥" value="{{$request->price1}}" style="width:50px"> -- 
            	   <input type="text" name="price2" placeholder="¥" value="{{$request->price2}}" style="width:50px">
                   <input type="submit" name="" value="确定" style="display:none;
                    width: 40px;
				    height: 20px;				   
				    background-color: #ff4e00;
				    color: #FFF;								   
				    text-align: center;		    
				    border: 0px;
				    cursor: pointer;
                   ">
                   {{csrf_field()}}
            	</form>
            	
            </td>
          </tr>                                              
                                                    
                                                                     
        </table>                                                                                 
    </div>
    <!--End 筛选条件 End-->
    
    <div class="content mar_20">
    	<div class="l_history">
        	<div class="his_t">
            	<span class="fl">浏览历史</span>
                <span class="fr"><a href="#">清空</a></span>
            </div>
        	<ul>
            	<li>
                    <div class="img"><a href="#"><img src="/static/home/images/his_1.jpg" width="185" height="162" /></a></div>
                	<div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                    	<font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
               
                
                
                
        	</ul>
        </div>
        <div class="l_list">
        	<div class="list_t">
        		<form action="/list/1" get="post">
            	<span class="fl list_or">
                	<a href="#" class="now">默认</a>
                    
                    <a href="#">
                    	<label>
                    	<select size="1" name="markte_price" aria-controls="DataTables_Table_1" style="width:70px;height:30px; margin:0px auto;display:block;">
                                <option value="1" >
                                    价格从低到高
                                </option>
                                <option value="0" >
                                    价格从高到低
                                </option>                                        
                           </select> 
                        </label>
                    </a>
                   
                </span>
                <input type="submit" value="确定" style="width:40px;
				    height: 20px;
				    margin-top:9px;	
				    margin-left:2px;		   
				    background-color: #ff4e00;
				    color: #FFF;								   
				    text-align: center;		    
				    border: 0px;
				    cursor: pointer;">
                </form>
                <span class="fr">共发现{{$count}}件</span>
            </div>
            <div class="list_c">
            	
                <ul class="cate_list">

                  
                  
                   @foreach($goods as $k=>$v)
                	<li>
                    	<div class="img"><a href="/detail/{{$v->id}}"><img src="{{$v->goods_img}}" width="210" height="185" /></a></div>
                        <div class="price">
                            <font>￥<span>{{$v->markte_price}}</span></font> &nbsp;
                        </div>
                        <div class="name"><a href="/detail/{{$v->id}}">{{$v->goods_name}}</a></div>
                        <div class="carbg">
                        	<a href="#" class="ss">收藏</a>
                            <a href="/detail/{{$v->id}}" class="j_car">加入购物车</a>
                        </div>
                    </li>
                   @endforeach
                  
                 
                	
                  

                    
                  
                </ul>

               
                <div class="pages">              	              	
                     {{$goods->links()}}
                	<!-- <a href="#" class="p_pre">上一页</a><a href="#" class="cur">1</a><a href="#">2</a><a href="#">3</a>...<a href="#">20</a><a href="#" class="p_pre">下一页</a> -->
                </div>
                <style type="text/css">                   
                  .pages li{                    
                  line-height:36px;  overflow:hidden;  color:#666666; font-size:16px; text-align:center; display:inline-block; padding:0 12px;margin:0px;
                  }
                  .pages .active{                 	
                     color:#FFF; background-color:#ff4e00; border:1px solid #ff4e00;
                  }
                                        
                </style>                                             
            </div>
        </div>
    </div>
    <script type="text/javascript">

	$('.price').mouseover(function(){
		var btn = $(this).find('input').eq(2);
		btn.show();
	})

	$('.price').mouseout(function(){
		var btn = $(this).find('input').eq(2);
		btn.hide();
	})

    </script>

@stop



        


     
