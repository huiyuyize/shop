@extends('common.admin')
@section('content')


<style type="text/css">
	#long{
		/*width: 1500px;*/
	}
</style>

<div class="mws-panel grid_8" id="long">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                    {{$title}}
                </font>
            </font>
        </span>
    </div>

    @if(session('success'))
    <div class="mws-form-message info">
        {{session('success')}}
    </div>
    @endif

    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">

        	<form action="/ginsert" method="get">
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <label>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            每页显示
                        </font>
                    </font>
                    <select size="1" name="num" aria-controls="DataTables_Table_1">
                        <option value="10" @if($request->num == 10) selected="selected" @endif >
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    10
                                </font>
                            </font>
                        </option>
                        <option value="20" @if($request->num == 20) selected="selected" @endif >
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    20
                                </font>
                            </font>
                        </option>
                        <option value="30" @if($request->num == 30) selected="selected" @endif >
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    30
                                </font>
                            </font>
                        </option>
                    </select>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            条
                        </font>
                    </font>
                </label>
            </div>

            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            搜索商品：
                        </font>
                    </font>
                    <input type="text" name="goods_name" aria-controls="DataTables_Table_1" value="{{$request->goods_name}}">
                </label>
                
                <button class="btn btn-info">搜索</button>
            </div>
			</form>

            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info" width="100%">
                <thead>
                    <tr role="row">
                        <th style="width:40px" class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-sort="ascending" aria-label="渲染引擎：激活以对列进行降序排序"
                        style="width: 153px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    商品ID
                                </font>
                            </font>
                        </th>
                        <th style="width:100px" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="浏览器：激活以对列升序进行排序" style="width: 210px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    商品名称
                                </font>
                            </font>
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="引擎版本：激活以对列升序进行排序" style="width: 132px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    商品所属分类
                                </font>
                            </font>
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS等级：激活以对列升序进行排序" style="width: 120px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                   商品所属类型
                                </font>
                            </font>
                        </th>
                        <th style="width:55px" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS等级：激活以对列升序进行排序" style="width: 97px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                   商品所属品牌
                                </font>
                            </font>
                        </th>
                        <th style="width:55px" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS等级：激活以对列升序进行排序" style="width: 97px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                   市场价
                                </font>
                            </font>
                        </th>
                        <th style="width:55px" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS等级：激活以对列升序进行排序" style="width: 97px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                   本店价
                                </font>
                            </font>
                        </th>
                        <th style="width:55px" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS等级：激活以对列升序进行排序" style="width: 97px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                   库存数量
                                </font>
                            </font>
                        </th>
                        <th style="width:55px" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS等级：激活以对列升序进行排序" style="width: 97px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                   商品状态
                                </font>
                            </font>
                        </th>
                        <th style="width:55px" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS等级：激活以对列升序进行排序" style="width: 97px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                   商品销量
                                </font>
                            </font>
                        </th>
                        
                        <th style="width:55px" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS等级：激活以对列升序进行排序" style="width: 97px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                   商品图片
                                </font>
                            </font>
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS等级：激活以对列升序进行排序" style="width: 97px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                   操作
                                </font>
                            </font>
                        </th>
                    </tr>
                </thead>

                <tbody role="alert" aria-live="polite" aria-relevant="all">
                	@foreach($rs as $k => $v)
                	@if($k % 2 == 0)
						 <tr class="odd">
                	@else
						<tr class="even">
                	@endif
                   
                        <td class="  sorting_1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->id}}
                                </font>
                            </font>
                        </td>
                        <td class=" ">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->goods_name}}
                                </font>
                            </font>
                        </td>
                        <td class=" ">
                        	
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{ $v->cate_id}}
                                </font>
                            </font>
                            
                        </td>
                        <td class=" ">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->type_id}}
                                </font>
                            </font>
                        </td>
                         <td class=" ">
                         	
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->brand_id}}
                                </font>
                            </font>
                            
                        </td>
                        <td class=" ">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->markte_price}}
                                </font>
                            </font>
                        </td>
                        <td class=" ">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->goods_price}}
                                </font>
                            </font>
                        </td>
                        <td class=" ">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->goods_num}}
                                </font>
                            </font>
                        </td>
                        <td class=" ">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                   {{$v->brand_status?'下架':'上架'}}
                                </font>
                            </font>
                        </td>
                        <td class=" ">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->goods_sales}}
                                </font>
                            </font>
                        </td>
                        <td class=" ">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                   <img src="{{$v->goods_img}}" style="width:60px">
                                </font>
                            </font>
                        </td>
                        
                       <td class=" ">
                        <a class='btn btn-info' href="/goodsimg/{{$v->id}}">添加</a>
                            
                            <a class='btn btn-warning' href="/ginsert/{{$v->id}}/edit">修改</a>

                            <form action="/ginsert/{{$v->id}}" method='post' style='display: inline'>
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class='btn btn-danger'>删除</button>
                            </form>
                        </td>   

                    </tr>
                    @endforeach
                </tbody>
            </table>

			<style>
				.pagination{

					margin:0px;
				}

				.pagination li{
					    float: left;
					    height: 20px;
					    padding: 0 10px;
					    display: block;
					    font-size: 12px;
					    line-height: 20px;
					    text-align: center;
					    cursor: pointer;
					    outline: none;
					    background-color: #444444;
					   
					    text-decoration: none;
					    border-right: 1px solid rgba(0, 0, 0, 0.5);
					    border-left: 1px solid rgba(255, 255, 255, 0.15);
					    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
				}

				.pagination a{
					 color: #fff;
				}

				.pagination .active{
					
					color: #323232;
				    border: none;
				    background-image: none;
				    box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
				    background-color: #f08dcc;
				}


			</style>



            <div class="dataTables_info" id="DataTables_Table_1_info">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        
                    </font>
                </font>
            </div>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
            	
            </div>
        </div>
    </div>
</div>

<style type="text/css">
	#one{
		width: 100%;
		height: 30px;
		float: left;
	}
</style>
<div id="one"></div>
@stop

@section('js')
  <script>
      
    setTimeout(function(){
        $('.mws-form-message').hide(1200)
    },2000)  
  </script>
@stop