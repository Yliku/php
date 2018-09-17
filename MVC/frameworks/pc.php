<?php 
	//启动引擎文件
	$currentdir = dirname(__FILE__);
	//echo __FILE__; 输出的是当前文件的位置，并不是被引入后的位置！！！
	include_once($currentdir.'/include.list.php');
	foreach ($paths as $path) {
		include_once($currentdir.'/'.$path);
	}
	// var_dump($currentdir);
	// echo __FILE__;

	class PC{
		public static $controller;
		public static $method;
		private static $config;
		/*
		$config是二维关联数组，保存了数据库对应的配置，视图引擎对应的配置，	
		举例： 
		$config = array(	
			'dbconfig'=>array('dbhost'=>'','dbuser'=>'','dbpsw'=>'','dbname'=>'','dbcharset'=>''),
			'viewconfig'=>array()
			)
		*/
		private static function init_db(){
			DB::init('mysql',self::$config['dbconfig']);
		}
		private static function init_view(){
			VIEW::init('Smarty',self::$config['viewconfig']);
		}
		private static function init_controller(){
			self::$controller = isset($_GET['controller'])?daddslashes($_GET['controller']):'index';
		}
		private static function init_method(){
			self::$method = isset($_GET['method'])?daddslashes($_GET['method']):'index';
		}
		public static function run($config){
			self::$config = $config;
			self::init_db();
			self::init_view();
			self::init_controller();
			self::init_method();
			C(self::$controller,self::$method);
		}
	}

 ?>