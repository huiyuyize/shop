@extends('common.admin')
@section('content')
@section('title','管理员列表页')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>用户详情列表</span>
                        
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                        	<form action="/admin/adminuser" method="get">
                        	<div id="DataTables_Table_1_length" class="dataTables_length">
                        	<label>查看 
                        		<select size="1" name="num" aria-controls="DataTables_Table_1">
                        			<option value="10" @if($request->num == '10') selected="selected" @endif>
                        				10
                        			</option>
                        			<option value="10" @if($request->num == '10') selected="selected" @endif >
                        			 	20
                        			</option>
                        			<option value="10" @if($request->num == '10') selected="selected" @endif>
                        			  	30
                        			</option>
                        		</select> 条</label></div>
                        <div class="dataTables_filter" id="DataTables_Table_1_filter">
                        	<label>
                        		用户名:<input type="text" name="search" aria-controls="DataTables_Table_1" value="{{$request->search}}">
                        	</label>
                        	<button class='btn btn-info'>搜索</button>
                        </div>
                    </form>
                        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr role="row">
                                	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 30px;">
	                                管理员账号
	                            </th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 30px;">管理员邮箱
	                                </th>
	                                 </th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 123px;">管理员手机号
	                                </th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 315px;">注册时间
	                                </th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 163px;">上次登录时间
	                               
	                                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 200px;">管理员头像
	                                </th>
	                                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 188px;">管理员权限
	                                </th>
	                                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 188px;">状态
	                                </th>
	                                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 188px;">操作
	                                </th>
                            	</tr>
                            </thead>
                       
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        	@foreach($rs as $k=>$v)

                        		<tr class="odd">
                                    <td class="  sorting_1">{{$v->uname}}</td>
                                    <td class=" ">{{$v->admin_email}}</td>
                                    <td class=" ">{{$v->admin_phone}}</td>
                                    <td class=" ">{{$v->created_time}}</td>
                                    <td class=" ">{{$v->last_time}}</td>
                                    <td class=" ">
                                    	<img src="{{$v->upic}}" alt="">
                                    </td>
                                    <td class=" ">
                                    	@if($v->group == 1)
                                    	超级管理员
                                    	@else
                                    	普通管理员
                                    	@endif
                                    </td>
                                    <td class=" ">
                                    	@if($v->admin_status == 1)
                                    	正常
                                    	@else
                                    	封禁
                                    	@endif
                                	</td>
                                    <td class=" ">	
                                        <a class="btn btn-waring" href="/admin/adminuser/{{$v->id}}/edit">修改</a>
                                        <form action="/admin/adminuser/{{$v->id}}" method="post">
                                            <button>删除</button>
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
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
					Showing 1 to 10 of 57 entries
					</div>
					<div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
						
					</div>
				</div>
			</div>
        </div>
                            

@stop