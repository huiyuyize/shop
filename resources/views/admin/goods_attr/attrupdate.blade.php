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
        <form class="mws-form" action="/goods_attr/{{$rs->id}}" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">

            	<div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                             原类型名称:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="attr_name" class="large" value="{{$typ->type_name}}" readonly>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                             原属性名称:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="attr_name" class="large" value="{{$rs->attr_name}}">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                             原属性值:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="attr_value" class="large" value="{{$rs->attr_value}}">
                    </div>
                    <p class="help-block col-sm-4 red">* 必填 [多个属性值请以 , 分隔]</p>
                </div>

            </div>
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <div class="mws-button-row">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        <input type="submit" value="修改类型" class="btn btn-warning">
                    </font>
                </font>
            </div>
        </form>
    </div>
</div>
</center>

@stop