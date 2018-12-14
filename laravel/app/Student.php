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
}