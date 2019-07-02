@extends('common.admin')
@section('content')

<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>角色详情列表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                        	
                        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr role="row">
                                	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 100px; align:center ">
	                               ID:
	                            </th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 300px;">角色名称
	                                </th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 315px;">操作
	                                </th>
	                                
                            	</tr>
                            </thead>
                       
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        	@foreach($data as $k=>$v)

                        		<tr class="odd">
                                    <td class="  sorting_1" style="text-align:center">{{$v->id}}</td>
                                    <td class=" " style="text-align:center">{{$v->role_name}}</td>                                   
                                    <td class=" " style="text-align:center">
                                    	   <a class="btn btn-info" href="/admin/role/{{$v->id}}/edit">权限节点</a>
                                    	   <form action="/admin/role/{{$v->id}}" method="post">
                                    	   		<button class="btn btn-info">删除角色</button>
                                    	   		{{csrf_field()}}
                                    	   		{{method_field('DELETE')}}
                                    	   </form>
                                    </td>
                            @endforeach
							</tr>
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
@section('js')
@if(Session::has('success'))
<script>
layer.alert('{{Session::get('success')}}', {
  icon: 1,
  skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
})
</script> 
@endif
@stop


