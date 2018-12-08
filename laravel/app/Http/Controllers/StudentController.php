<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller{
	public function test1(){ //测试访问是否正常
		return 'test1';
	}
	//首先得在laravel框架下的.env配置好mysql信息，默认使用mysql连接，地址、用户名和密码
	public function test2(){	//测试数据库连接，数据库查询，是否能够返回学生表的所有信息
		//$a = DB::select('select * from student'); 
		$a = DB::select('select * from student where id>?',[1000]); //条件限制，这样也行啊真方便
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

	//使用查询构造器
	public function query1(){	//插入数据
		//查询构造器，query builder，使用PDO参数绑定，以保护程序免于SQL注入，因此传入的参数不需要额外的转义字符
		$bool = DB::table('student')
		->insert(['name'=>'PDO','age'=>18]);	//插入一条数据，一维数组，返回的是布尔值
		var_dump($bool);
		//$id = DB::table('student')
		//->insertGetId(['name'=>'PDO','age'=>18]);	//返回的是自增数据的id

		// $bool = DB::table('student')->insert([	//插入多条数据，使用二维数组
		// 	['name'=>'PDO','age'=>18],
		// 	['name'=>'PDO','age'=>18],
		// 	['name'=>'PDO','age'=>18],
		// ]);
	}
	public function query2(){
		$num = DB::table('student')	//返回的是被影响的行数
		->where('id',1001)			//查询条件，不带条件的话会更新所有的数据！！！！！！！！！！
		->update(['age'=>29]);		//更新age的值为29，注意此处是数组
		var_dump($num);
	}
	public function query3(){
		$num = DB::table('student')	//返回的是被影响的行数
		->where('id',1001)
		->increment('age');		//将age的值自增1，同样的，不带条件的话将会更新所有age的值
	//	->increment('age',3);	//将age的值自增3
	//	->decrement('age',3);	//将age的值自减3
		var_dump($num);
	}
	public function query4(){
		$num = DB::table('student')
		->where('id',1003)
		->increment('age',3,['name'=>'hello1234']);		//将age的值自增3，同时修改name的值
		var_dump($num);
	}
	public function query5(){
		$num = DB::table('student')
		->where('id',1004)			//注意！！如果不加条件，是删除所有数据！！！！！！
	//	->where('id','>=',1004)		//删除大于等于id是1004的数据
		->delete();
		var_dump($num);
	//	DB::table('student')->truncate();	//删除整表，此操作很危险，谨慎使用！！！不返回任何东西
	}

	//使用查询构造器查询数据
	//get first where pluck lists select chunk
	public function query6(){
		$student1 = DB::table('student')->get();		//get获取表的所有数据
		$student2 = DB::table('student')->first();		//first取出一条数据
		$student3 = DB::table('student')->orderBy('id','desc')->first();	//id倒序，first取出一条数据，结果是取出最后一条数据
		
		$student4 = DB::table('student')->where('id','>=',1004)->get();						//where是条件限制
		$student5 = DB::table('student')->whereRaw('id >=? and age > ?',[1002,30])->get();	//whereRaw，多个条件限制
			
		//pluck 返回结果集中指定的字段
		$student6 = DB::table('student')->pluck('name');			//返回结果集中的name字段，索引数组
		$student6 = DB::table('student')->pluck('name','id');		//返回结果集中的name字段，以id为key的关联数组
		//$student7 = DB::table('student')->lists('name','id');		//返回结果集中的name字段，以id为key的关联数组，lists被废弃了，被pluck替换了
		$student7 = DB::table('student')->select('id','name','age')->get();		//返回结果集中的name字段，索引数组

		echo '查询构造器中的get：获取表中的所有数据<br>';		var_dump($student1);
		echo '查询构造器中的first：获取一条数据<br>';		var_dump($student2);
		echo '查询构造器中的first-orderBy：id，desc：获取一条数据，倒序<br>';		var_dump($student3);
		echo '查询构造器中的where：条件筛选<br>';		var_dump($student4);
		echo '查询构造器中的whereRaw：多重条件筛选<br>';	var_dump($student5);
		echo '查询构造器中的pluck：返回结果集中的指定字段，索引数组<br>';	var_dump($student6);
		echo '查询构造器中的select：返回结果集中的指定字段，索引数组<br>';	var_dump($student7);

		echo '查询构造器中的chunk：一次返回指定条数的结果，索引数组<br>';
		DB::table('student')->orderBy('id','desc')->chunk(2,function($a){
			var_dump($a);
		});

	}
}

