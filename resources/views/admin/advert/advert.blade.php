@extends('common.admin')
@section('content')

<!-- 广告添加页面 -->

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
        <form class="mws-form" action="/advert" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
           
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              广告标题:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="ad_name" class="large">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">广告内容</font></font></label>
                    <div class="mws-form-item">
                        <textarea rows="" cols="" name="ad_desc" class="large"></textarea>
                    </div>
                </div>

                <div class="mws-form-row">
                	<label class="mws-form-label">广告图片</label>
                	<div class="mws-form-item">
                    	<input type="file" name='ad_img' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">
                    </div>
                </div>

            </div>
            {{csrf_field()}}
            <div class="mws-button-row">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        <input type="submit" value="添加广告" class="btn btn-info">
                    </font>
                </font>
            </div>
        </form>
    </div>
</div>
</center>
@stop