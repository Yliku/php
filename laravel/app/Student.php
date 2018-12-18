<?php 
namespace App;
use Illuminate\Database\Eloquent\Model;
//模型model

class Student extends Model{
	protected $table = 'student';	//指定表名关联数据库的表
	protected $primaryKey = 'id';	//默认以id作为主键，也可以通过这里，指定其他字段为主键
	public $timestamps = true;		//设置保存进数据库时自动生成时间戳，默认是true，false的情况下是不自动生成
	
	protected $fillable = ['name','age'];	//指定允许批量赋值的字段，可理解为白名单
	protected $guarded = ['sex'];			//指定不允许批量赋值的字段，可理解为黑名单

	public function getDateFormat(){	//该方法必须为public
		return time();	//在这里我们将返回的时间戳改为Unix的时间戳，不设置格式
	}	//重写该方法，该方法是自动生成时间戳，默认的方法返回的时间戳格式是：2018-12-14 16:35:53
	public function asDateTime($val){
		return $val;	//在这里我们直接返回原来的格式，不做任何处理，即会输出Unix时间戳
	}	//重写该方法，该方法是在输出created或updated时间戳的时候自动转换为该格式：2018-12-14 16:35:53  



	public function score1()			//创建关联table，1对1的表，Relationships：one to one 
	{	//此处的函数命名可以不用和关联的表对应，但是调用的话得调用该函数名，而不是table名！！！
	    // return $this->hasOne('App\Score','score_id');		
	    // hasOne表示Student模型关联Score模型，
	    // 这时两个表的对应、映射关系是通过：  Student.id = Score.score_id  来映射
	    // 第二个参数代表关联Score的socre_id字段，
	    // 如果不指定参数，会默认以第一个表名为前缀：student_id作为在Score表里查询的字段名！！即 Score.student_id

	    return $this->hasOne('App\Score', 'score_id','id');
	   	//指定从属关系，表示该表包含 App\Score
	    //第二个参数是子表 Score 的字段，第三个参数是主表 Student的字段，这样可以通过 Student 表取得 Score 的数据

	    // 这种情况是指定两个表的映射关系是：	Score.math = Student.id
	    // return $this->hasOne('App\Score', 'foreign_key', 'local_key');
	    // 这种情况是指定两个表的映射关系是：	Score.foreign_key = Student.local_key
	   	
	}

}