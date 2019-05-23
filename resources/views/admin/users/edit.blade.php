@extends('common.admin')
@section('title',$title)
@section('content')
<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-ok"></i> 用户添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <!-- 显示控制器中表单验证错误信息 -->
                        @if (count($errors) > 0)
                            <div class="mws-form-message error">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="mws-validate" class="mws-form" action="/admin/users/{{$v->id}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                            <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">用户名：</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="user_name" class="required large" value="{{$v->user_name}}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">邮箱：</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="user_email" class="required url large" value="{{$v->user_email}}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">年龄：</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="user_age" class="required digits large" value="{{$v['uinfo'][0]->user_age}}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">手机号：</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="user_phone" class="required digits large" value="{{$v->user_phone}}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">性别：</label>
                                    <div class="mws-form-item">
                                        <select class="required large" name="user_sex">
                                            
                                            <option value="1" @if($v['uinfo']['0']->user_sex == 1) selected @endif >男</option>
                                            <option value="2"@if($v['uinfo']['0']->user_sex == 2) selected @endif>女</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                <label class="mws-form-label">头像：</label>
                                   <div class="mws-form-item">
                                    <img src="{{$v['uinfo'][0]->user_pic}}" alt="" style="width:300px;height:200px;">
                                        <input type="file" name="user_pic" style="position:absolute; top:0px; right:0px;margin:0px;cursor:pointer;font-size:999px;opacity:0;z-index:999;">
                                    </div>
                                </div>
                                 <div class="mws-form-row">
                                    <label class="mws-form-label">状态：</label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list inline">
                                            <li><lavle><input type="radio" name="user_status" value="1"@if($v->user_status == 1) checked @endif>开启</lavle></li>
                                            <li><lavle><input type="radio" name="user_status" value="2" @if($v->user_status == 2) checked @endif>禁用</lavle></li>
                                        </ul>
                                    </div>
                                </div>
                            <div class="mws-button-row">
                                <input type="submit" class="btn btn-danger" value="修改">
                            </div>
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                        </form>
                    </div>      
                </div>
@stop