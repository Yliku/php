<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;

class ValidateController extends Controller {
    public function create() {
        return view('post.create');
    }
    public function store(Request $request) {
    //类型限制：变量 $request 为 Request 类的实例，input传入的值会保存在 $request里面，可用 $request->title 调用
        $this->validate($request, [				//开始验证，验证不通过的情况下，重新跳转/调用上一步的视图文件
            'title' => 'required',				//title 为必须填写的值，否则验证失败
            //'title' => 'exists:users,id',		//title 的值存在数据库中users表的id字段中，否则验证失败
            // 'title' => 'min:6|max:12',		//title 的值长度最小为6，最大为12，否则验证失败
            // 'body' => 'required',			//多个属性一起验证，只要有一个失败，即代表全部失败，会重新跳转/调用到上一步的视图文件
        ]);
        // 验证通过后下面就可以开始写 将input数据存入数据库 的代码
        //...
    }
}
