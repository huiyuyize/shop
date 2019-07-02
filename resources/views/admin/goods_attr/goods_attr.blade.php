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
        <form class="mws-form" action="/goods_attr" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">

            	<div class="mws-form-row">
    				<label class="mws-form-label">类型名称</label>
    				<div class="mws-form-item">
    					<select class="large" name="type_id">
    						<option>请选择类型</option>
    						@foreach($typ as $k =>$v)
    						<option value="{{$v->id}}">{{$v->type_name}}</option>
    						@endforeach
    					</select>
    				</div>
    			</div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                             属性名称:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="attr_name" class="large">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                             属性值:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="attr_value" class="large">
                    </div>
                    <p class="help-block col-sm-4 red">* 必填 [多个属性值请以 , 分隔]</p>
                </div>

            </div>
            {{csrf_field()}}
            <div class="mws-button-row">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        <input type="submit" value="添加类型" class="btn btn-info">
                    </font>
                </font>
            </div>
        </form>
    </div>
</div>
</center>

@stop