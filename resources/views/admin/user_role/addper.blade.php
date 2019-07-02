@extends('common.admin')
@section('title',$title)
@section('content')
<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>Inline Form</span>
                    </div>
                    <div class="mws-panel-body no-padding">

                        <form class="mws-form" action="/admin/role/{{$role->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">角色名称：</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="small" disabled value="{{$role->role_name}}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">拥有权限节点：</label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list inline">
                                            @foreach($per as $k=>$v)
                                            <li><input type="checkbox" name="per[]" @if(in_array($v->id,$role_per))  checked @endif value="{{$v->id}}"><label>{{$v->per_name}}</label></li>
                                        </ul>
                                            @endforeach
                                    </div>
                                </div>
                            
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="提交" class="btn btn-danger">
                                <input type="reset" value="Reset" class="btn ">
                            </div>
                        </form>
                    </div>      
                </div>
@stop