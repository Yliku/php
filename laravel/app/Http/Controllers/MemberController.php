<?php 
namespace App\Http\Controllers;
//可参考同个目录下的Controller.php
class MemberController extends Controller{
	public function info(){
		return '控制器：member-info';
	}
	public function info2(){
		return route('memberinfo2'); //返回路由别名对应的URL
	}
	public function outputView(){
		return view('member-info'); //返回视图文件
	}
	public function parameter1($id){
		return $id . view('member-info'); //参数绑定
	}
}
//要想访问这个控制器，就得和路由进行关联

 ?>