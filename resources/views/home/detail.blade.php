<script type="text/javascript" src="/static/home/js/jquery.js"></script>
@extends('common.home')
@section('content')
    
    <link rel="stylesheet" type="text/css" href="/static/home/css/ShopShow.css" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/MagicZoom.css" />
    <script type="text/javascript" src="/static/home/js/MagicZoom.js"></script>
    
    <script type="text/javascript" src="/static/home/js/num.js">
        var jq = jQuery.noConflict();
    </script>
        
    <script type="text/javascript" src="/static/home/js/p_tab.js"></script>
    
    <script type="text/javascript" src="/static/home/js/shade.js"></script>
<div class="i_bg">
    <div class="postion">
        <span class="fl">全部 >
      
        </span>
    </div>    
    <div class="content">
                            
        <div id="tsShopContainer">
            <div id="tsImgS"><a href="/static/home/images/p_big.jpg" title="/static/home/Images" class="MagicZoom" id="MagicZoom"><img src="{{$cate_data->goods_img}}" width="390" height="390" /></a></div>
            <div id="tsPicContainer">
                <div id="tsImgSArrL" onclick="tsScrollArrLeft()"></div>
                <div id="tsImgSCon">
                    <ul>
                        @foreach($images as $k=>$v)
                        <li onclick="showPic(0)" rel="MagicZoom" class="tsSelectImg"><img src="{{$v->goods_imgs}}" tsImgS="{{$v->goods_imgs}}" width="79" height="79" /></li>
                        @endforeach
                    </ul>
                </div>
                <div id="tsImgSArrR" onclick="tsScrollArrRight()"></div>
            </div>
            <img class="MagicZoomLoading" width="16" height="16" src="/static/home/images/loading.gif" alt="Loading..." />               
        </div>
        
        <div class="pro_des">
            <div class="des_name">
                <p>{{$cate_data->goods_name}}</p>
                “开业巨惠，北京专柜直供”，不光低价，“真”才靠谱！
            </div>
            <div class="des_price" style="height:100px">
                本店价格：<b>￥{{$cate_data->markte_price}}</b><br />
                消费积分：<span>28R</span> <br />
                库存:<span>{{$cate_data->goods_num}}</span>
            </div>            
            <div class="des_choice">
                <span class="fl">商品属性选择：</span>
                <ul>
                    @foreach($type as $k=>$v)
                    <li>{{$v->type_id}}<div class="ch_img"></div></li>
                    @endforeach
                </ul>
            </div>
           
            <div class="des_share">
                <div class="d_sh">
                    分享
                    <div class="d_sh_bg">
                        <a href="#"><img src="/static/home/images/sh_1.gif" /></a>
                        <a href="#"><img src="/static/home/images/sh_2.gif" /></a>
                        <a href="#"><img src="/static/home/images/sh_3.gif" /></a>
                        <a href="#"><img src="/static/home/images/sh_4.gif" /></a>
                        <a href="#"><img src="/static/home/images/sh_5.gif" /></a>
                    </div>
                </div>
                <div class="d_care"><a onclick="ShowDiv('MyDiv','fade')">关注商品</a></div>
            </div>
        <form action="/goodscar" method="post">
            <div class="des_join">
                <div class="j_nums">                   
                    <input type="text" value="1" name="cnt" class="n_ipt" />
                    <input type="button" value="" onclick="addUpdate(jq(this));" class="n_btn_1" />
                    <input type="button" value="" onclick="jianUpdate(jq(this));" class="n_btn_2" />
                    <input type="hidden" name="id" value="{{$cate_data->id}}">
                </div>
                <span class="fl"><input type="submit" name="" value="加入购物车" onclick="ShowDiv_1('MyDiv1','fade1')"  style="width: 100px;
                        height: 50px;
                        display:block;
                        background-color: #ff4e00;
                        color: #FFF;
                        font-size: 16px;
                        text-align: center;
                        font-family: "Microsoft YaHei";
                        text-align: center;
                        float: left;
                       
       cursor: pointer;">加入购物车</span>
        {{csrf_field()}} 
     </form>
     
               
            </div> 
                       
        </div>    
        
        <div class="s_brand">
            <div class="s_brand_img"><img src="{{$cate_data->goods_img}}" width="188" height="132" /></div>
            <div class="s_brand_c"><a href="#">进入品牌专区</a></div>
        </div>    
        
        
    </div>
    <div class="content mar_20">
        <div class="l_history">
            <div class="fav_t">猜你喜欢</div>
            <ul>
                <li>
                    <div class="img"><a href="#"><img src="/static/home/images/his_1.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="/static/home/images/his_2.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>768.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="/static/home/images/his_3.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>680.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="/static/home/images/his_4.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="/static/home/images/his_5.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
            </ul>
        </div>
        <div class="l_list">            
            
            <div class="des_border">
                <div class="des_tit">
                    <ul>
                        <li class="current"><a href="#p_attribute">商品属性</a></li>
                        <li><a href="#p_details">商品详情</a></li>
                        <li><a href="#p_comment">商品评论</a></li>
                    </ul>
                </div>
                <div class="des_con" id="p_attribute">
                    
                    <table border="0" align="center" style="width:100%; font-family:'宋体'; cellspacing="0" cellpadding="0">
                      <tr>
                        <td>商品名称：{{$cate_data->goods_name}}</td>
                        <td>商品编号：{{$cate_data->goods_bianhao}}<td>
                        <td>品牌：{{$brand->brand_name}}</td>
                        <td>上架时间：{{$cate_data->created_at}} </td>
                      </tr>
                      <tr>
                        <td>商品毛重：{{$cate_data->goods_weight}}</td>
                        <td>商品产地：中国</td>
                       
                        <td>&nbsp;</td>
                      </tr>
                      
                    </table>                                               
                                            
                        
                </div>
            </div>  
            
            <div class="des_border" id="p_details">
                <div class="des_t">商品详情</div>
                <div class="des_con">
                    <table border="0" align="center" style="width:745px; font-size:14px; font-family:'宋体';" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="265"><img src="{{$cate_data->goods_img}}" width="206" height="400"/></td>
                        <td>
                            <b>{{$cate_data->goods_name}}</b><br />
                            【商品规格】：5ml<br />
                            【商品质地】：{{$cate_data->goods_title}}<br />
                            【商品日期】：与专柜同步更新<br />
                            【商品产地】：中国<br />
                        </td>
                      </tr>
                    </table>
                    
                    <p align="center">
                     @foreach($gimg as $k=>$v)
                        @php 
                           echo "$v->text";
                        @endphp
                     @endforeach               
                    </p>
                    
                </div>
            </div>  
            
            <div class="des_border" id="p_comment">
                <div class="des_t">商品评论</div>
                
                <table border="0" class="jud_tab" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="175" class="jud_per">
                        <p>80.0%</p>好评度
                    </td>
                    <td width="300">
                        <table border="0" style="width:100%;" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="90">好评<font color="#999999">（80%）</font></td>
                            <td><img src="/static/home/images/pl.gif" align="absmiddle" /></td>
                          </tr>
                          <tr>
                            <td>中评<font color="#999999">（20%）</font></td>
                            <td><img src="/static/home/images/pl.gif" align="absmiddle" /></td>
                          </tr>
                          <tr>
                            <td>差评<font color="#999999">（0%）</font></td>
                            <td><img src="/static/home/images/pl.gif" align="absmiddle" /></td>
                          </tr>
                        </table>
                    </td>
                    <td width="185" class="jud_bg">
                        购买过雅诗兰黛第六代特润精华露50ml的顾客，在收到商品才可以对该商品发表评论
                    </td>
                    <td class="jud_bg">您可对已购买商品进行评价<br /><a href="#"><img src="/static/home/images/btn_jud.gif" /></a></td>
                  </tr>
                </table>
                
                
                                
                <table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="160"><img src="/static/home/images/peo1.jpg" width="20" height="20" align="absmiddle" />&nbsp;向死而生</td>
                    <td width="180">
                        颜色分类：<font color="#999999">粉色</font> <br />
                        型号：<font color="#999999">50ml</font>
                    </td>
                    <td>
                        产品很好，香味很喜欢，必须给赞。 <br />
                        <font color="#999999">2015-09-24</font>
                    </td>
                  </tr>
                  <tr valign="top">
                    <td width="160"><img src="/static/home/images/peo2.jpg" width="20" height="20" align="absmiddle" />&nbsp;就是这么想的</td>
                    <td width="180">
                        颜色分类：<font color="#999999">粉色</font> <br />
                        型号：<font color="#999999">50ml</font>
                    </td>
                    <td>
                        送朋友，她很喜欢，大爱。 <br />
                        <font color="#999999">2015-09-24</font>
                    </td>
                  </tr>
                  <tr valign="top">
                    <td width="160"><img src="/static/home/images/peo3.jpg" width="20" height="20" align="absmiddle" />&nbsp;墨镜墨镜</td>
                    <td width="180">
                        颜色分类：<font color="#999999">粉色</font> <br />
                        型号：<font color="#999999">50ml</font>
                    </td>
                    <td>
                        大家都说不错<br />
                        <font color="#999999">2015-09-24</font>
                    </td>
                  </tr>
                  <tr valign="top">
                    <td width="160"><img src="/static/home/images/peo4.jpg" width="20" height="20" align="absmiddle" />&nbsp;那*****洋 <br /><font color="#999999">（匿名用户）</font></td>
                    <td width="180">
                        颜色分类：<font color="#999999">粉色</font> <br />
                        型号：<font color="#999999">50ml</font>
                    </td>
                    <td>
                        下次还会来买，推荐。<br />
                        <font color="#999999">2015-09-24</font>
                    </td>
                  </tr>
                </table>

                    
                    
                <div class="pages">
                    <a href="#" class="p_pre">上一页</a><a href="#" class="cur">1</a><a href="#">2</a><a href="#">3</a>...<a href="#">20</a><a href="#" class="p_pre">下一页</a>
                </div>
                
            </div>
            
            
        </div>
    </div>
    
    
    <!--Begin 弹出层-收藏成功 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="/static/home/images/close.gif" /></span>
            </div>
            <div class="notice_c">
                
                <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="40"><img src="/static/home/images/suc.png" /></td>
                    <td>
                        <span style="color:#3e3e3e; font-size:18px; font-weight:bold;">您已成功收藏该商品</span><br />
                        <a href="#">查看我的关注 >></a>
                    </td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td>&nbsp;</td>
                    <td><a href="#" class="b_sure">确定</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-收藏成功 End-->
    
    
    <!--Begin 弹出层-加入购物车 Begin-->
    <div id="fade1" class="black_overlay"></div>
    <div id="MyDiv1" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv_1('MyDiv1','fade1')"><img src="/static/home/images/close.gif" /></span>
            </div>
            <div class="notice_c">
                
                <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="40"><img src="/static/home/images/suc.png" /></td>
                    <td>
                        <span style="color:#3e3e3e; font-size:18px; font-weight:bold;">宝贝已成功添加到购物车</span><br />
                        购物车共有1种宝贝（3件） &nbsp; &nbsp; 合计：1120元
                    </td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td>&nbsp;</td>
                    <td><a href="#" class="b_sure">去购物车结算</a><a href="#" class="b_buy">继续购物</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-加入购物车 End-->
    
    
    
    <!--Begin Footer Begin -->
    <div class="b_btm_bg bg_color">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/home/images/b1.png" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/home/images/b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/home/images/b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/home/images/b4.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
              </tr>
            </table>
        </div>
    </div>
    <div class="b_nav">
        <dl>                                                                                            
            <dt><a href="#">新手上路</a></dt>
            <dd><a href="#">售后流程</a></dd>
            <dd><a href="#">购物流程</a></dd>
            <dd><a href="#">订购方式</a></dd>
            <dd><a href="#">隐私声明</a></dd>
            <dd><a href="#">推荐分享说明</a></dd>
        </dl>
        <dl>
            <dt><a href="#">配送与支付</a></dt>
            <dd><a href="#">货到付款区域</a></dd>
            <dd><a href="#">配送支付查询</a></dd>
            <dd><a href="#">支付方式说明</a></dd>
        </dl>
        <dl>
            <dt><a href="#">会员中心</a></dt>
            <dd><a href="#">资金管理</a></dd>
            <dd><a href="#">我的收藏</a></dd>
            <dd><a href="#">我的订单</a></dd>
        </dl>
        <dl>
            <dt><a href="#">服务保证</a></dt>
            <dd><a href="#">退换货原则</a></dd>
            <dd><a href="#">售后服务保证</a></dd>
            <dd><a href="#">产品质量保证</a></dd>
        </dl>
        <dl>
            <dt><a href="#">联系我们</a></dt>
            <dd><a href="#">网站故障报告</a></dd>
            <dd><a href="#">购物咨询</a></dd>
            <dd><a href="#">投诉与建议</a></dd>
        </dl>
        <div class="b_tel_bg">
            <a href="#" class="b_sh1">新浪微博</a>            
            <a href="#" class="b_sh2">腾讯微博</a>
            <p>
            服务热线：<br />
            <span>400-123-4567</span>
            </p>
        </div>
        <div class="b_er">
            <div class="b_er_c"><img src="/static/home/images/er.gif" width="118" height="118" /></div>
            <img src="/static/home/images/ss.png" />
        </div>
    </div>    
    <div class="btmbg">
        <div class="btm">
            备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
            <img src="/static/home/images/b_1.gif" width="98" height="33" /><img src="/static/home/images/b_2.gif" width="98" height="33" /><img src="/static/home/images/b_3.gif" width="98" height="33" /><img src="/static/home/images/b_4.gif" width="98" height="33" /><img src="/static/home/images/b_5.gif" width="98" height="33" /><img src="/static/home/images/b_6.gif" width="98" height="33" />
        </div>      
    </div>
    <!--End Footer End -->    
</div>
</body>
<script src="/static/home/js/ShopShow.js"></script>
<script type="text/javascript">
$('.des_choice ul li').click(function(){
    /* $(this).siblings('li').removeClass('checked');
     $(this).addClass('checked');*/
$(this).toggleClass('checked');

});
</script>
</html>
@stop


