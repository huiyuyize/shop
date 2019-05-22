@extends('common.admin')
@section('content')

<!-- <center><h1>商品品牌列表页</h1></center> -->

<div class="mws-panel grid_8">
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

        	<form action="/admin/brandlist" method="get">
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
                            搜索品牌：
                        </font>
                    </font>
                    <input type="text" name="brand_name" aria-controls="DataTables_Table_1" value="{{$request->brand_name}}">
                </label>
                <label>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            URL：
                        </font>
                    </font>
                    <input type="text" name="brand_url" aria-controls="DataTables_Table_1" value="{{$request->brand_url}}">
                </label>
                <button class="btn btn-info">搜索</button>
            </div>
			</form>

            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th style="width:40px" class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-sort="ascending" aria-label="渲染引擎：激活以对列进行降序排序"
                        style="width: 153px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    品牌编号
                                </font>
                            </font>
                        </th>
                        <th style="width:100px" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="浏览器：激活以对列升序进行排序" style="width: 210px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    商品品牌名称
                                </font>
                            </font>
                        </th>
                        <th style="width:100px" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="平台：激活以对列升序进行排序" style="width: 196px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    品牌URL
                                </font>
                            </font>
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="引擎版本：激活以对列升序进行排序" style="width: 132px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    品牌描述
                                </font>
                            </font>
                        </th>
                        <th style="width:60px" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS等级：激活以对列升序进行排序" style="width: 120px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                   品牌logo
                                </font>
                            </font>
                        </th>
                        <th style="width:55px" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS等级：激活以对列升序进行排序" style="width: 97px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                   品牌状态
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
                                    {{$v->brand_name}}
                                </font>
                            </font>
                        </td>
                        <td class=" ">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->brand_url}}
                                </font>
                            </font>
                        </td>
                        <td class=" ">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->brand_desc}}
                                </font>
                            </font>
                        </td>
                        <td class=" ">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                   <img src="{{$v->brand_logo}}" style="width:60px">
                                </font>
                            </font>
                        </td>
                        <td class=" ">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                   {{$v->brand_status?'上架':'下架'}}
                                </font>
                            </font>
                        </td>
                        <td class=" ">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                  	<a class="btn btn-warning" href="/admin/update/{{$v->id}}">修改</a>
                                  	<form action="/admin/delete/{{$v->id}}" method="post" style='display: inline'>
                                        {{csrf_field()}}
                                        <button class="btn btn-danger">删除</button>
                                    </form>
                                </font>
                            </font>
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
                        当前第[ {{$rs->currentPage()}} ]页 &nbsp;&nbsp;&nbsp;&nbsp; 显示 [ {{$rs->count()}} ]条数据&nbsp;&nbsp;&nbsp;&nbsp; 从第[ {{$rs->firstItem()}} ]条开始
                    </font>
                </font>
            </div>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
            	{{$rs->appends($request->all())->links()}}
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