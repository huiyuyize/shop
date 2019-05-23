@extends('common.admin')
@section('content')
@section('title',$title);
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
                        <form id="mws-validate" class="mws-form" action="/admin/adminuser/{{$rs->id}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                            <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">管理员账号：</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="uname" class="required large" value="{{$rs->uname}}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">管理员邮箱：</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="admin_email" class="required url large" value="{{$rs->admin_email}}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">手机号：</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="admin_phone" class="required digits large" value="{{$rs->admin_phone}}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">管理员权限：</label>
                                    <div class="mws-form-item">
                                        <select class="required large" name="group">
                                            <option value="2" @if($rs->admin_status == 2) selected @endif</option>普通管理员</option>
                                            <option value="1" @if($rs->admin_status == 1) selected @endif>超级管理员</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                <label class="mws-form-label">头像：</label>
                                   <div class="mws-form-item">
                                    <img src="{{$rs->upic}}" alt="" style="width:300px;height:200px;">
                                        <input type="file" name="upic" style="position:absolute; top:0px; right:0px;margin:0px;cursor:pointer;font-size:999px;opacity:0;z-index:999;">
                                    </div>
                               
                                </div>
                               </div>
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" class="btn btn-danger">
                            </div>
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                        </form>
                    </div>      
                </div>

@stop