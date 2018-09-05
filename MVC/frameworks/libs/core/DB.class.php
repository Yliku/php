<?php 
class DB{
	public static $db;
	//初始化，核心函数，$dbtype，选择要操作的数据库类型，MySql/Oracle/SQL Server等
	public static function init($dbtype,$config){
		self::$db = new $dbtype;		//实例化选择的数据库
		self::$db->connect($config);	//调用实例化的数据库中的链接方法
	}
	public static function query($sql){
		return self::$db->query($sql);		
	}
	public static function findAll($sql){
		$query = self::$db->query($sql);
		return self::$db->findAll($query);
	}
	public static function findOne($sql){
		$query = self::$db->query($sql);
		return self::$db->findOne($query);
	}
	public static function findResult($sql,$row=0,$field=0){
		$query = self::$db->query($sql);
		return self::$db->findResult($query,$row,$field);
	}
	public static function insert($table,$arr){
		return self::$db->insert($table,$arr);
	}
	public static function update($table,$arr,$where){
		return self::$db->update($table,$arr,$where);
	}
	public static function delete($table,$where){
		return self::$db->delete($table,$where);
	}


}




 ?>