<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//路由简介：传统MVC中请求对应控制器，但laravel中的请求却是对应路由，作用就是建立url和程序之间的映射
//请求类型：get post put patch delete 

//基础路由 get和post路由
Route::get('basic1',function(){
	return '基础路由之get请求，路由名称：basic1';
});
/*
我的laravel的主页面是
	http://test.com/laravel/public
而我们要访问get请求，我们要在主页面的链接后添加 /basic1
即：	http://test.com/laravel/public/basic1 即可访问该get路由
*/
Route::post('basic2',function(){
	return '基础路由之post请求，路由名称：basic2';
});//默认的post请求提交都要带上{{csrf_token()}}随机令牌验证，例如：  <input type="hidden" name="_token" value="{{ csrf_token() }}">

//多请求路由 
//第一种方法 match，响应制定类型的请求，放在数组[]里面
Route::match(['get','post'],'multy1',function(){
	return '多请求路由之match，可接收get或post请求，路由名称：multy1';
});
//第二种方法 any，响应所有类型的请求
Route::any('multy2',function(){
	return '多请求路由之any,路由名称：multy2';
});


//路由参数 ，限制参数的书写规则和正则表达式相关
Route::get('user/{id}',function($id){
	return '路由参数User-id(必需参数)-'.$id;
})->where('id','[0-9]+');
//举例：	http://test.com/laravel/public/user/4    ,输出：路由参数User-id(必需参数)-4
Route::get('user/{name?}',function($name = null){		//参数可选，$name的默认值是空
	return '路由参数User-name(可选参数)-'.$name;
});
Route::get('user/{name?}',function($name = 'sean'){		//参数可选，$name的默认值是sean
	return '路由参数（单参数）User-name(可选参数)-'.$name;
})->where('name','[A-Za-z]+');							//用正则表达式来限制参数
Route::get('user/{id}/{name?}',function($id,$name = 'sean'){	//多个参数
	return '路由参数（多参数）User-id-' . $id .'-name-'.$name;
})->where(['id'=>'[0-9]+' , 'name'=>'[A-Za-z]+']);				//用正则表达式来限制参数，但却是放进一个数组里面去限制


//路由别名 
Route::get('user/menber-center',['as'=>'center',function(){
	return route('center');
}]);


//路由群组 //路由中输出视图 