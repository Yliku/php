<?php 
namespace App\Http\Controller;
//可参考同个目录下的Controller.php
class MemberController extends Controller{
	public function info(){
		return 'member-info';
	}
}
//要想访问这个控制器，就得和路由进行关联

 ?>