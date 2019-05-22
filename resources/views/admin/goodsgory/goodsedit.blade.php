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
        	<form class="mws-form" action="/admin/doedit" method='post'>
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">商品分类名称</label>
        				<div class="mws-form-item">
        					<input type="text" name='cate_name' class="small" value="{{$res->cate_name}}" >
        					<input type="hidden" name="id" value="{{$res->id}}">
        				</div>
        			</div>

        			<div class="mws-form-row">
        				<label class="mws-form-label">商品分类pid</label>
        				<div class="mws-form-item">
        					<input type="text" name='cate_pid' class="small" value="{{$res->cate_pid}}" readonly>
        				</div>
        			</div>

        			<div class="mws-form-row">
        				<label class="mws-form-label">商品分类路径</label>
        				<div class="mws-form-item">
        					<input type="text" name='cate_path' class="small" value="{{$res->cate_path}}" readonly>
        				</div>
        			</div>       		

        			<div class="mws-form-row">
        				<label class="mws-form-label">商品分类描述</label>
        				<div class="mws-form-item">
        					<input type="text" name='cate_desc' class="small" value="{{$res->cate_desc}}">
        				</div>
        			</div>

        			
        			<div class="mws-form-row">
        				<label class="mws-form-label">商品分类状态</label>
        				<div class="mws-form-item clearfix">
        					<ul class="mws-form-list inline">        				
        					<li><label><input type="radio" name='cate_status' value='1'>开启</label></li>
        						
        					<li><label><input type="radio" name='cate_status' value='0'>禁用</label></li>
        						
        					</ul>
        				</div>
        			</div>
        		</div>
        		<div class="mws-button-row">
        			{{csrf_field()}}
        			<input type="submit" value="修改" class="btn btn-warning">
        		</div>
        	</form>
        </div>    	
    </div>
	@stop
</body>
</html>