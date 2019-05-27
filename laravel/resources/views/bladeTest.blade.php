<p>{{$name}}</p>	
@extends('parent')
@section('title')
  @parent
  子模板的标题
@stop

@section('content')
  @parent
  子模板扩展的内容1
@append

@section('content')
  @parent
  子模板扩展的内容2
@stop