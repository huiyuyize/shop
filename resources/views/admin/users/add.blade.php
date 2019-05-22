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
                    	<form id="mws-validate" class="mws-form" action="/admin/users" method="post" enctype="multipart/form-data" novalidate="novalidate">
                        	<div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                        	<div class="mws-form-inline">
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">用户名：</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="user_name" class="required large">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">密码：</label>
                                	<div class="mws-form-item">
                                    	<input type="password" name="password" class="required email large">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">重复密码：</label>
                                    <div class="mws-form-item">
                                        <input type="password" name="pwd" class="required digits large">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">邮箱：</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="user_email" class="required url large">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">年龄：</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="user_age" class="required digits large">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                	<label class="mws-form-label">手机号：</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="user_phone" class="required digits large">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">性别：</label>
                                	<div class="mws-form-item">
                    					<select class="required large" name="user_sex">
                                        	<option></option>
                    						<option value="1">男</option>
                    						<option value="2">女</option>
                    					</select>
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                            	<label class="mws-form-label">头像：</label>
                            	   <div class="mws-form-item">
                            	       <div class="fileinput-holder" style="position: relative;">
                                        <input type="text" class="fileinput-preview" style="width: 100%; padding-right: 84px;" readonly="readonly">
                                            <span class="fileinput-btn btn" type="button" style="display:block; overflow: hidden; position: absolute; top: 0; right: 0; cursor: pointer;">选择文件：<input type="file" name="user_pic" class="required" style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;"></span>
                                        </div>
                            	<label for="picture" class="error" generated="true" style="display:none"></label>
                            	</div>
                            	</div>
                               </div>
                            </div>
                            <div class="mws-button-row">
                            	<input type="submit" class="btn btn-danger">
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>    	
                </div>
@stop