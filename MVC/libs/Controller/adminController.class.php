<?php 
	class adminController{
		public function test(){
			echo 'hello1113';
		}
		public function login(){
			if($_POST){
				echo 1212;
				//进行登陆处理
				//登陆处理的业务逻辑放在admin auth
				//admin同表名的模型：从数据库取用户信息
				//auth模型：进行用户信息的核对
			}else{
				//显示登陆界面
				VIEW::display('admin/login.html');
				}
		}
	}


 ?>