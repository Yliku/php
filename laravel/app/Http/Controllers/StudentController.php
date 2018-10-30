<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller{
	public function test1(){ //测试访问是否正常
		return 'test1';
	}
	public function test2(){	//测试连接数据库是否成功，是否能够返回学生表的所有信息
		$a = DB::select('select * from student'); 
		var_dump($a);
	}
	public function test3(){
		$bool = DB::insert('insert into student(name,age) values(?,?)',	//？是占位符，代表数据参数
			['sean',18]);
		var_dump($bool);
	}
}

