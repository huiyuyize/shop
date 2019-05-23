<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	@extends('common.admin')
	@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span>{{$title}}</span>
        </div>
	<div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/lunbo" method='post' enctype='multipart/form-data' >
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">轮播图名称</label>
        				<div class="mws-form-item">
        					<input type="text" name='lunbo_name' class="small" value="">
        					
        				</div>
        			</div>

        			<div class="mws-form-row">
        				<label class="mws-form-label">轮播图描述</label>
        				<div class="mws-form-item">
        					<input type="text" name='lunbo_desc' class="small" value="" >
        				</div>
        			</div>

        			<div class="mws-form-row">
                    <label class="mws-form-label">轮播图图片</label>
                                <div class="mws-form-item">
                                    <input type="file" name="lunbo_img" value="">
                                </div>
                    </div>     		

        			<div class="mws-form-row">
        				<label class="mws-form-label">轮播图跳转链接</label>
        				<div class="mws-form-item">
        					<input type="text" name='lunbo_link' class="small" value="">
        				</div>
        			</div>

        			
        			<div class="mws-form-row">
        				<label class="mws-form-label">轮播图状态</label>
        				<div class="mws-form-item clearfix">
        					<ul class="mws-form-list inline">        				
        					<li><label><input type="radio" name='lunbo_status' value='1'>开启</label></li>
        						
        					<li><label><input type="radio" name='lunbo_status' value='0'>禁用</label></li>
        						
        					</ul>
        				</div>
        			</div>
        		</div>
        		<div class="mws-button-row">          
        			<input type="submit" value="添加" class="btn btn-info">
        		</div>
                {{csrf_field()}}
        	</form>
        </div>
	@stop
</body>
</html>