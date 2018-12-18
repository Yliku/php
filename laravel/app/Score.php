<?php 
namespace App;
use Illuminate\Database\Eloquent\Model;
//模型model

class Score extends Model{
	protected $table = 'score';	//指定表名关联数据库的表

	public function student()
	{
	    return $this->belongsTo('App\Student','score_id','id');
	    //指定从属关系，表示该表属于 App\Student
	    //第二个参数是子表 Score 的字段，第三个参数是主表 Student的字段，这样可以通过Score表取得Student的数据

	    //同样的，如果不传入参数，默认会以 Score_id作为查询主表 Student的字段
		//同样的，belongsTo的参数也是一样，代表映射关系是： Score.socre_id = Student.id
	}

}