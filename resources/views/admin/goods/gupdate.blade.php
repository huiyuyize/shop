@extends('common.admin')
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
        <form class="mws-form" action="/ginsert/{{$rs->id}}" method="post" enctype="multipart/form-data">
           
            <div class="mws-form-inline">
           
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              商品名称:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="goods_name" class="large" value="{{$rs->goods_name}}">
                    </div>
                </div>

                <div class="mws-form-row">
                   <label class="mws-form-label">
                       <font style="vertical-align: inherit;">
                           <font style="vertical-align: inherit;">
                             商品标语:
                           </font>
                       </font>
                   </label>
                   <div class="mws-form-item">
                       <input type="text" name="goods_title" class="large" value="{{$rs->goods_title}}">
                   </div>
                </div>  

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              市场价:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="markte_price" class="large" value="{{$rs->markte_price}}">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              本店家:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="goods_price" class="large" value="{{$rs->goods_price}}">
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              修改时间:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="updated_at" class="large" value="@php echo date('Y-m-d h:i:s', time()) @endphp">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                商品状态:
                            </font>
                        </font>
                    </label>
        				<div class="mws-form-item clearfix">
        					<ul class="mws-form-list inline">
        						<li><label><input type="radio" name='goods_status' value='1' checked>上架</label></li>
        						<li><label><input type="radio" name='goods_status' value='0'> 下架</label></li>
        					</ul>
        				</div>
                </div>
            </div>
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <div class="mws-button-row">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        <input type="submit" value="修改商品" class="btn btn-info">
                    </font>
                </font>
            </div>
        </form>
    </div>
</div>
</center>
@stop