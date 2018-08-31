<?php 
	//封装mysql~~~~~~~~~~~~~~~~~~~
class mysql{
	function err($error){
		echo '错误信息为：'.$error;
	}
	static $con = null;
	static function connect($config){		//封装连接数据库	
		//$config配置数组：$config = array($dbhost,$dbuser,$dbpsw,$dbname,$dbcharset)
		extract($config);	//extract提取，提取$config关联数组，使用数组键名作为变量名，数组键值作为变量值。
		if(	self::$con = mysqli_connect($dbhost,$dbuser,$dbpsw)	){
			echo '数据库连接成功。<br>';
			if(	mysqli_select_db(self::$con,$dbname)	){
				echo '选择子库成功。<br>';
				mysqli_query(self::$con,'set names'.$dbcharset); 	//设	置字符集
			}else{
				echo '选择子库失败，原因：'.mysqli_error(self::$con);
			}
		}else{
			echo '数据库连接失败，原因：'.mysqli_connect_error();
		}		
	}

	function query($sql){			//封装执行sql命令
		if(	!($query = mysqli_query($sql))	){
			echo '执行sql出错，sql语句为：'.$sql.'<br>原因为：'.mysqli_error();
		}else{
			return $query;
		}
	}

	function findAll($query){ 		//封装取全部数据的命令
		while(	$rs = mysqli_fetch_array($query,MYSQL_ASSOC)	){
			//MYSQL_ASSOC - 关联数组；	MYSQL_NUM - 数字/索引数组；	MYSQL_BOTH - 默认。同时产生关联和数字数组
			$list[]=$rs;
		}
		return isset($list)? $list : "";
	}
	function findOne($query){		//封装取单挑数据的命令
		$rs = mysqli_fetch_array($query,MYSQL_ASSOC);
		return $rs;
	}

	function findResult($query,$row=0,$field=0){	//封装取指定行指定字段的命令
		$rs = mysqli_result($query,$row,$field);
		return $rs;
	}

	function insert($table,$arr){
		//$arr我们定为关联数组，因为当我们的字段很多时，用关联数组来书写就可以减少字段对错的失误
		foreach($arr as $key=>$value){
			$keyArr[]="`".$key."`";					//不用逗号隔开？？
			$valueArr[]="'".$value."'";				//不用逗号隔开？？
		}

	}
}
$config=array('dbhost'=>'127.0.0.1','dbuser'=>'root','dbpsw'=>'123','dbname'=>'test','dbcharset'=>'utf8mb4');
mysql::connect($config);


 ?>