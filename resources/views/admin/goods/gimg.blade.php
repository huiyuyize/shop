@extends('common.admin')

<script type="text/javascript" charset="utf-8" src="/static/admin/js/baidu/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/admin/js/baidu/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/static/admin/js/baidu/lang/zh-cn/zh-cn.js"></script>

@section('content')

<!-- 商品添加页面 -->
<center>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                    {{$title}}
                </font>
            </font>
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/goodsimg/tian" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              商品ID:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="gid" class="large" value="{{$res->id}}" >
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              商品图片:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <!-- <input type="text" name="goods_desc" class="large"> -->
                        <script id="editor" type="text/plain" style="width:800px;height:300px;" name="text"></script>
                    
                    </div>
                </div>

                 
            </div>
            {{csrf_field()}}
            <div class="mws-button-row">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        <input type="submit" value="添加图片" class="btn btn-info">
                    </font>
                </font>
            </div>
        </form>
    </div>
</div>
</center>
@stop

@section('js')
  <script>

     //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
      
    setTimeout(function(){
        $('.mws-form-message').hide(1200)
    },2000)  
  </script>
@stop