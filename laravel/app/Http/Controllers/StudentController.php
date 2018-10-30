<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller{
	public function test1(){ //测试访问是否正常
		return 'test1';
	}
	public function test2(){	//测试数据库连接，数据库查询，是否能够返回学生表的所有信息
		//$a = DB::select('select * from student'); 
		$a = DB::select('select * from student where id>?',[1001]); //条件限制，这样也行啊真方便
		var_dump($a);
		dd($a);					//神奇的dd，这样也行。。。谨慎使用dd函数，用来打印出给定的变量和结束脚本的运行！！！类似于使用了die()函数
	}
	public function test3(){	//测试数据库插入
		$bool = DB::insert('insert into student(name,age) values(?,?)',	//？是占位符，代表数据参数，代表后面数组的值
			['Yliku',30]);
		var_dump($bool);
	}
	public function test4(){	//测试数据库更新
		$num = DB::update('update student set age=? where id=?',
			[22,1001]);	//update返回值是修改的行数
		var_dump($num);
	}
	public function test5(){	//测试数据库删除
		$num = DB::delete('delete from student where id>?',	//delete的返回值也是行数，被删掉的行数
		[1002]);
		var_dump($num);
	}
}

