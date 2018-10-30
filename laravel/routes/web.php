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
    return view('welcome');	//路由中直接输出视图，视图在resources/views/welcome.blade.php
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
而我们要访问get请求，我们要在主页面的链接后添加 /basic1 这个路由名称
即：	http://test.com/laravel/public/basic1 即可访问该get路由
*/
Route::post('basic2',function(){
	return '基础路由之post请求，路由名称：basic2';
});//默认的post请求提交都要带上{{csrf_token()}}随机令牌验证，例如：  <input type="hidden" name="_token" value="{{ csrf_token() }}">

//多请求路由 
//第一种方法 match，响应制定类型的请求，放在数组[]里面
Route::match(['get','post'],'multy1',function(){
	return '多请求路由之match，可接收我们指定的get或post请求，路由名称：multy1';
});
//第二种方法 any，响应所有类型的请求
Route::any('multy2',function(){
	return '多请求路由之any,路由名称：multy2';
});


//路由参数 ，限制参数的书写规则和正则表达式相关
Route::get('user/{id}',function($id){	//$id的值是取决于{}花括号内的值，和花括号里面的符号没关系，也就是说可以取名为$ddddd，不影响$id的取值
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
Route::get('user/menber-center1',['as'=>'center1',function(){
	return 'center1';
}]);
Route::get('user/menber-center2',['as'=>'center2',function(){
	return route('center2');
	//路由别名的好处，是可以用route函数来生成别名对应的URL
}]);


//路由群组 
Route::group(['prefix'=>'group'],function(){	//prefix是指前缀，表示要加group这个前缀
	Route::get('group1',function(){
		return '路由群组下的group1';
	});
	Route::get('group2',function(){
		return '路由群组下的group2';
	});
});
//通过 http://localhost/studyphp/laravel/public/group/group2 访问

//路由中输出视图 



//学习控制器-控制器和路由关联，控制器在app/Http/Controllers下
//通过路由route调用控制器controller，然后调用视图view
Route::get('member/info','MemberController@info');	// 路由名，控制器名 @ 控制器的方法
Route::post('member/info2','MemberController@info2');	// 路由名，控制器名 @ 控制器的方法
Route::any('member/outputView','MemberController@outputView');	// 输出视图，视图文件放在resources=views下
Route::match(['get','post'],'member/info','MemberController@info');	// 路由名，控制器名 @ 控制器的方法
// Route::get('member/info',['uses' => 'MemberController@info']);	 也可以这么写
Route::get('member/info2',[		//路由别名
	'uses' => 'MemberController@info2',
	'as' => 'memberinfo2'
]);
Route::any('member/{id}',['uses'=>'MemberController@parameter1'])->where('id','[0-9]+'); //参数绑定，参数限制
Route::any('member/{name}',['uses'=>'MemberController@parameter2'])->where('name','[a-z]+'); //参数绑定，参数限制
Route::any('member/modelTest',['uses'=>'MemberController@modelTest']); //参数绑定，参数限制

//
Route::any('DBTest1',['uses'=>'StudentController@test1']);
Route::any('DBTest2',['uses'=>'StudentController@test2']);
Route::any('DBTest3',['uses'=>'StudentController@test3']);