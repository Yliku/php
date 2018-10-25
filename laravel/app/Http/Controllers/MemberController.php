<?php 
namespace App\Http\Controllers;
//可参考同个目录下的Controller.php
class MemberController extends Controller{
	public function info(){
		return '控制器：member-info';
	}
	public function info2(){
		return route('memberinfo2');
	}
}
//要想访问这个控制器，就得和路由进行关联

 ?>