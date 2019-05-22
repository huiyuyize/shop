<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
    <link rel="stylesheet" type="text/css" href="/static/admin/bootstrap/css/bootstrap.css">
</head>
<script type="text/javascript" src="/static/admin/js/libs/jquery-1.8.3.min.js"></script>
<body>
	@extends('common.admin')
	@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">           	
            </i>
           {{$title}}
        </span>
       
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            <form action="/admin/goods" method="get">
                    <div id="DataTables_Table_1_length" class="dataTables_length">  
                     <label>
                            显示
                            <select size="1" name="num" aria-controls="DataTables_Table_1">
                                <option value="10" @if($request->search == '10') selected="selected" @endif>
                                    10
                                </option>
                                <option value="20"  @if($request->search == '20') selected="selected" @endif>
                                    20
                                </option>
                                <option value="30"  @if($request->search == '30') selected="selected" @endif>
                                    30
                                </option>
                                
                            </select>
                            条
                        </label>
                    </div>
             
                    <div class="dataTables_filter" id="DataTables_Table_1_filter">
                        <label>
                           
                            <input type="text" name="search" value="{{$request->search}}" aria-controls="DataTables_Table_1"> 
                        </label>
                            <button class="btn btn-info">搜索</button>
                   </div>
           </form>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                        style="width: 50px;">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                        style="width: 50px;">
                            商品分类名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                        style="width: 50px;">
                            商品分类PID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                        style="width: 50px;">
                            商品分类路径
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 50px;">
                            商品状态
                        </th>                       
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 50px;">
                            排序
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 123px;">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">\
                	  @foreach($res as $k=>$v)
                    <tr class="odd">
                      
                        <td class="  sorting_1">
                          {{$v->id}}
                        </td>
                        <td class="  sorting_1">
                          {{$v->cate_name}}
                        </td>
                        <td class="  sorting_1">
                          {{$v->cate_pid}}
                        </td>
                        <td class="  sorting_1">
                          {{$v->cate_path}}
                        </td>
                        <td class="  sorting_1">
                        	@if($v->cate_status == 1)
                              开启
                            @else
                              禁用
                            @endif
                          
                        </td>
                       
                        <td class="  sorting_1">
                          @switch($v->cate_sort)
							    @case(0)
							        顺序
							        @break
							@endswitch
                          
                        </td>



                        <td>
                           <a href="/admin/edit/{{$v->id}}" class="btn btn-warning" >修改
                           </a>
                           <a href="/admin/del/{{$v->id}}" onclick="return confirm('确认要删除吗?');" class="btn btn-danger">删除
                           </a>
                            <a href="/admin/goods/inserts/{{$v->id}}/{{$v->cate_name}}"  class="btn btn-info">添加子分类
                            <a href="/admin/goods/store/{{$v->id}}"  class="btn btn-info">查看子分类
                           </a>
                        </td>
                    </tr>
                        @endforeach

                    
                                               
                </tbody>
            </table>
           
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                
                
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
                  {{$res->appends($request->all())->links()}}
              
            </div>
        </div>
    </div>
</div>
	@stop
</body>
</html>
