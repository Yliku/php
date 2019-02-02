<!-- 
<form action="http://localhost/study/laravel/public/post22" method="post">		 
当然不用路由别名也可以这么写，但是以后维护会很麻烦，所以强烈推荐路由别名
-->

<!-- 路由别名的用处和用法，要双花括号~~~~ -->
<form action="{{ route('post11') }}" method="post">		
	<input type="hidden" name="_token" value="{{ csrf_token() }}">	
	<!-- 	post方法传递必须加上面的代码，否则会找不到，或者这句：	{{ csrf_field() }} 	   -->
	<input type="text" name='title'>
	<input type='submit' value='提交'>
</form>

<!-- 将错误信息打印出来，下面的代码为blade的语法 -->
@if ($errors->any())
{{ $errors }}
@endif
