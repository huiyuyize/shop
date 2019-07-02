@extends('common.admin')
@section('content')

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