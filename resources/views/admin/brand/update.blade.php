@extends('common.admin')
@section('content')
<!-- 商品品牌修改页面 -->
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
        <form class="mws-form" action="/admin/updates/{{$rs->id}}" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
           
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              品牌名称:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="brand_name" class="large" value="{{$rs->brand_name}}">
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              品牌URL:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="brand_url" class="large" value="{{$rs->brand_url}}">
                    </div>
                 </div>

                  <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              品牌描述:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="brand_desc" class="large" value="{{$rs->brand_desc}}">
                    </div>
                </div>

                <div class="mws-form-row">
                	<label class="mws-form-label">品牌logo</label>
                	<div class="mws-form-item">
                		<img src="{{$rs->brand_logo}}" style="width:100px">
                    	<input type="file" name='brand_logo' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                品牌状态
                            </font>
                        </font>
                    </label>
        				<div class="mws-form-item clearfix">
        					<ul class="mws-form-list inline">
        						<!-- <li><label><input type="radio" name='brand_status' value='1' checked> 上架</label></li>
        						<li><label><input type="radio" name='brand_status' value='0'> 下架</label></li> -->
        						<li><label><input type="radio" name='brand_status' value='1' @if($rs->brand_status==1)checked @endif> 上架</label></li>
        						<li><label><input type="radio" name='brand_status' value='0' @if($rs->brand_status==0)checked @endif> 下架</label></li>
        					</ul>
        				</div>
                </div>
            </div>
            {{csrf_field()}}
            <div class="mws-button-row">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        <input type="submit" value="确认修改" class="btn btn-warning ">
                    </font>
                </font>
            </div>
        </form>
    </div>
</div>
</center>
@stop