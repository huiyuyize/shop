@extends('common.admin')
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
                    	<form id="mws-validate" class="mws-form" action="/admin/role" method="post" enctype="multipart/form-data" novalidate="novalidate">
                        	<div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                        	<div class="mws-form-inline">
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">角色名称：</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="role_name" class="required large">
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
@section('js')
@if(Session::has('error'))
<script>
layer.alert('{{Session::get('error')}}', {
  icon: 1,
  skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
})
</script> 
@endif
@stop
