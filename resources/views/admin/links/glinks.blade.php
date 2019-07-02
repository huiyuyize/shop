@extends('common.admin')
@section('content')

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
        <form class="mws-form" action="/links" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
           
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              网址名称:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="link_title" class="large">
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              链接地址:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="link_url" class="large">
                    </div>
                 </div>

                  <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              网址描述:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="link_desc" class="large">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">网址logo</label>
                    <div class="mws-form-item">
                        <input type="file" name='link_logo' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                网址状态
                            </font>
                        </font>
                    </label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><label><input type="radio" name='link_status' value='1' checked>在线</label></li>
                                <li><label><input type="radio" name='link_status' value='0'> 下线</label></li>
                            </ul>
                        </div>
                </div>
            </div>
            {{csrf_field()}}
            <div class="mws-button-row">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        <input type="submit" value="添加链接" class="btn btn-info">
                    </font>
                </font>
            </div>
        </form>
    </div>
</div>
</center>
@stop