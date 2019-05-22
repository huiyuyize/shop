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
        <form class="mws-form" action="/admin/index" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
           
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              商品名称:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="goods_name" class="large">
                    </div>
                </div>

                <div class="mws-form-row">
                   <label class="mws-form-label">
                       <font style="vertical-align: inherit;">
                           <font style="vertical-align: inherit;">
                             商品标语:
                           </font>
                       </font>
                   </label>
                   <div class="mws-form-item">
                       <input type="text" name="goods_title" class="large">
                   </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              商品分类:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="cate_id" class="large">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              商品类型:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="type_id" class="large">
                    </div>
                </div>

                <div class="mws-form-row">
    				<label class="mws-form-label">商品品牌</label>
    				<div class="mws-form-item">
    					<select class="large">
    						@foreach($rs as $k=>$v)
    						<option>{{$v}}</option>
    						@endforeach
    					</select>
    				</div>
    			</div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              市场价:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="markte_price" class="large">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              本店家:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="goods_price" class="large">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              点击数量:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="click_num" class="large">
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              商品重量:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="goods_weight" class="large">
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              库存数量:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="goods_num" class="large">
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              商品描述:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="goods_desc" class="large">
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              商品销量:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="goods_sales" class="large">
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              商品编号:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="goods_bianhao" class="large">
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              创建时间:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="created_at" class="large" value="@php echo date('Y-m-d h:i:s', time()) @endphp">
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              修改时间:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="updated_at" class="large">
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                              删除时间:
                            </font>
                        </font>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="deleted_at" class="large">
                    </div>
                </div>



                <div class="mws-form-row">
                	<label class="mws-form-label">商品图片:</label>
                	<div class="mws-form-item">
                    	<input type="file" name='brand_logo' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                商品状态:
                            </font>
                        </font>
                    </label>
        				<div class="mws-form-item clearfix">
        					<ul class="mws-form-list inline">
        						<li><label><input type="radio" name='brand_status' value='1' checked>上架</label></li>
        						<li><label><input type="radio" name='brand_status' value='0'> 下架</label></li>
        					</ul>
        				</div>
                </div>
            </div>
            {{csrf_field()}}
            <div class="mws-button-row">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        <input type="submit" value="添加商品" class="btn btn-info">
                    </font>
                </font>
            </div>
        </form>
    </div>
</div>
</center>
@stop