<?php 
namespace App\Http\Controllers;
use App\Member;	//注意，使用命名空间引入
//可参考同个目录下的Controller.php
//一般一个控制器对应一个视图的目录，视图在resource/views下，视图目录的文件名和控制器保持一致，叫member
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
	public function parameter2($name){
		return view('member/info',[ //该视图文件位于 resources/views/member,info指向默认的文件info.blade.php
			'name'=>'Yliku',
			'age'=>30
		]); //参数绑定，传递参数给视图
	}
	public function modelTest(){
		return Member::getMember();
	}

}
//要想访问这个控制器，就得和路由进行关联

 ?>