<?php 
namespace App\Http\Controllers;

class LocalizationController extends Controller{
	public function index(){
		return view('localization'); //返回视图文件
	}
	public function modelTest(){
		return Member::getMember();
	}

}
//要想访问这个控制器，就得和路由进行关联

 ?>