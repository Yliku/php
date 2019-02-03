<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;
use Validator;
use App\Http\Requests\validateRequest;

class ValidateController extends Controller {
    public function create() {
        return view('post.create');
    }

    //写在controller中也有两种写法
	//方法一：验证失败时重定向默认视图/路由（即上一步的视图）
    public function store1(Request $request) {
    //类型限制：变量 $request 为 Request 类的实例，input传入的值会保存在 $request里面，可用 $request->title 调用
        $this->validate($request, [				//开始验证，验证不通过的情况下，重新跳转/调用上一步的视图文件
    	//validate()里面三个参数，
    	//第一个（必填）是$request，代表传进来的数据，
    	//第二个（必填）是验证规则，
    	//第三个（选填）可自定义错误显示的信息
    	//第四个（选填）可自定义 input传进来的name 的显示信息
            'title' => 'required',				//title 为必须填写的值，否则验证失败
            'body' => 'required',				//多个属性一起验证，只要有一个失败，即代表全部失败，会重新跳转/调用到上一步的视图文件
            //'title' => 'exists:users,id',		//title 的值存在数据库中users表的id字段中，否则验证失败
            // 'title' => 'min:6|max:12',		//title 的值长度最小为6，最大为12，否则验证失败
        ],[
			'required' => ':attribute 为必填项', 
			'min' => ':attribute 长度不能小于2个字符',
			'max' => ':attribute 长度不能大于20个字符',
			'integer' => ':attribute 必须为数字',
		],[
			'title' => '标题',
			'body' => '内容',
        ]);
        // 验证通过后下面就可以开始写 将input数据存入数据库 的代码
        //...
    }

    //方法二：验证失败时重定向自定义视图/路由
    public function store1_1(Request $request) {
    	//如果我们要获得传递过来的其中指定值,可以使用下面三种方法
        //$request['name']; $request->get('name'); $request->name;
		$validator = Validator::make($request->all(), [		//这种方法注意要引入类： use Validator;
			//传递给make方法的第一个参数是需要验证的数据，第二个参数是要应用到数据上的验证规则。
			'title' => 'required',
			'body' => 'required',
    	]);
    	if ($validator->fails()) {
    	    return redirect('basic1');		//这种写法可重定向指定路由，这里重定向 basic1 路由了
    	}
    }

    public function store2(validateRequest $request) {
        // 将验证规则写在request中的写法，
        // 验证通过后下面就可以开始写 将input数据存入数据库 的代码
        // dd($request);
    }
}
