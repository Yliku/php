<?php 
	//封装mysql~~~~~~~~~~~~~~~~~~~
class mysql{
	function err($error){
		echo '错误信息为：'.$error;
	}

	function connect($config){		//封装连接数据库	
		//$config配置数组：array($dbhost,$dbuser,$dbpsw,$dbname,$dbcharset)
		extract($config);	//extract提取，提取$config关联数组，使用数组键名作为变量名，数组键值作为变量值。
		if(	$con = mysqli_connect($dbhost,$dbuser,$dbpsw)	){
			echo '数据库连接成功。<br>';
		}else{
			echo '数据库连接失败，原因：'.mysqli_connect_error();
		}		
		if(	mysqli_select_db($con,$dbname)	){
			echo '选择子库成功。<br>';
		}else{
			echo '选择子库失败，原因：'.mysqli_error();
		}
		mysqli_query($con,'set names'.$dbcharset); 	//设置字符集
	}

	function query($sql){			//封装执行sql命令
		if(	!($query = mysqli_query($sql))	){
			echo '执行sql出错，sql语句为：'$sql.'<br>原因为：'.mysqli_error();
		}else{
			return $query;
		}
	}

	function findAll($query){ 		//封装取全部数据的命令
		while(	$rs = mysqli_fetch_array($query,MYSQL_ASSOC)	){
			//MYSQL_ASSOC - 关联数组；	MYSQL_NUM - 数字数组；	MYSQL_BOTH - 默认。同时产生关联和数字数组
			$list[]=$rs;
		}
	}


}



 ?>