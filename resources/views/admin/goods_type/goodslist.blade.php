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
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <label>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            节目
                        </font>
                    </font>
                    <select size="1" name="DataTables_Table_1_length" aria-controls="DataTables_Table_1">
                        <option value="10" selected="selected">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    10
                                </font>
                            </font>
                        </option>
                        <option value="25">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    25
                                </font>
                            </font>
                        </option>
                        <option value="50">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    50
                                </font>
                            </font>
                        </option>
                        <option value="100">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    100
                                </font>
                            </font>
                        </option>
                    </select>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            项
                        </font>
                    </font>
                </label>
            </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            搜索：
                        </font>
                    </font>
                    <input type="text" aria-controls="DataTables_Table_1">
                </label>
            </div>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-sort="ascending" aria-label="渲染引擎：激活以对列进行降序排序"
                        style="width: 155px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    类型ID
                                </font>
                            </font>
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="浏览器：激活以对列升序进行排序" style="width: 211px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    商品类型
                                </font>
                            </font>
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="浏览器：激活以对列升序进行排序" style="width: 211px;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    操作
                                </font>
                            </font>
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($type as $k => $v)
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
                                    {{$v->type_name}}
                                </font>
                            </font>
                        </td>
                        <td class=" ">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    <a href="/goods_type/{{$v->id}}/edit" class="btn btn-warning">修改</a>
                                    <a href="" class="btn btn-danger">删除</a>
                                </font>
                            </font>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        显示57个参赛作品中的1到10个
                    </font>
                </font>
            </div>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                <a tabindex="0" class="first paginate_button paginate_button_disabled"
                id="DataTables_Table_1_first">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            第一
                        </font>
                    </font>
                </a>
                <a tabindex="0" class="previous paginate_button paginate_button_disabled"
                id="DataTables_Table_1_previous">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            前一个
                        </font>
                    </font>
                </a>
                <span>
                    <a tabindex="0" class="paginate_active">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                1
                            </font>
                        </font>
                    </a>
                    <a tabindex="0" class="paginate_button">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                2
                            </font>
                        </font>
                    </a>
                    <a tabindex="0" class="paginate_button">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                3
                            </font>
                        </font>
                    </a>
                    <a tabindex="0" class="paginate_button">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                4
                            </font>
                        </font>
                    </a>
                    <a tabindex="0" class="paginate_button">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                5
                            </font>
                        </font>
                    </a>
                </span>
                <a tabindex="0" class="next paginate_button" id="DataTables_Table_1_next">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            下一个
                        </font>
                    </font>
                </a>
                <a tabindex="0" class="last paginate_button" id="DataTables_Table_1_last">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            最后
                        </font>
                    </font>
                </a>
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