<?php 
	//封装mysql~~~~~~~~~~~~~~~~~~~
class mysql{
	function err($error){
		echo '错误信息为：'.$error;
	}
	public $con = null;
	function connect($config){		//封装连接数据库	
		//$config配置数组：$config = array($dbhost,$dbuser,$dbpsw,$dbname,$dbcharset)
		extract($config);	//extract提取，提取$config关联数组，使用数组键名作为变量名，数组键值作为变量值。
		if(	$this->con = mysqli_connect($dbhost,$dbuser,$dbpsw)	){
			echo '数据库连接成功。<br>';
			if(	mysqli_select_db($this->con,$dbname)	){
				echo '选择子库成功。<br>';
				mysqli_query($this->con,'set names '.$dbcharset); 	//设	置字符集，踩坑：注意空格！！！
			}else{
				echo '选择子库失败，原因：'.mysqli_error($this->con);
			}
		}else{
			echo '数据库连接失败，原因：'.mysqli_connect_error();
		}		
	}

	function query($sql){			//封装执行sql命令
		if(	!($query = mysqli_query($this->con,$sql))	){
			echo '执行sql出错，sql语句为：'.$sql.'<br>原因为：'.mysqli_error($this->con);
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
		//mysql插入的格式： INSERT INTO 表名('字段1','字段2') VALUES('值1','值2');
		//$arr我们定为关联数组，因为当我们的字段很多时，用关联数组来书写就可以减少字段对错的失误
		//$arr格式举例：$arr=array('id'=>'5','name'=>'小红');
		foreach($arr as $key=>$value){
			$value = mysqli_real_escape_string($this->con,$value);	//将字符串中的有害字符进行转义过滤，避免数据库被入侵
			$keyArr[]="`".$key."`";					//符号是键盘Esc下面的符号，不是单引号
			$valueArr[]="'".$value."'";				//这个是单引号了
		}
		/*  
		https://www.cnblogs.com/shijianchuzhenzhi/p/6193097.html
		键盘Esc下面的 ` 符号是 MySQL 的转义符，避免和 mysql 的本身的关键字冲突，
		只要你不在列名或表名中使用 mysql 的保留字或中文，就不需要转义。
		所有的数据库都有类似的设置，不过mysql用的是`而已。通常用来说明其中的内容是数据库名、表名、字段名，不是关键字。
		例如：
		select from from table;
		第一个from是字段名，最后的table表名，但是同时也是mysql关键字，这样执行的时候就会报错，
		所以应该使用select `from` from `table`;
		当然，为了便于阅读，不建议使用关键字作为字段名、表名，同时，应该对数据库名、表名、字段名用一对儿反引号包含。
		*/
		$keys = implode(",", $keyArr);	//implode函数是把数组组合成字符串，用法： implode(分隔符，数组)
		$values = implode(",", $valueArr);
		$sql = "INSERT INTO ".$table."(".$keys.") VALUES(".$values.")";
		$this->query($sql);
		return mysqli_insert_id($this->con);
	}

	function update($table,$arr,$where){
		//mysql修改的格式：	UPDATE 表名 SET '字段'='值' where id='';
		//$arr格式举例：$arr=array('id'=>'5','name'=>'小红');
		foreach($arr as $key => $value){
			$value = mysqli_real_escape_string($this->con,$value);	//对value的非法字符进行过滤转义，降低数据库被入侵风险
			$keyAndValueArr[] = "`".$key."`='".$value."'";
		}
		$keyAndValue = implode(',', $keyAndValueArr);
		$sql = "UPDATE ".$table." SET ".$keyAndValue." WHERE ".$where;
		$this->query($sql);
	}

	function delete($table,$where){
		//mysql删除的格式：DELETE FROM table WHERE ...
		$sql = "DELETE FROM ".$table."WHERE ".$where;
		$this->query($sql);
	}
}

/*

$mysql = new mysql();
//数据库连接测试
$config=array('dbhost'=>'127.0.0.1','dbuser'=>'root','dbpsw'=>'123','dbname'=>'test','dbcharset'=>'utf8');
//踩坑：注意是utf8，不是utf-8，不然会乱码！！！
$mysql->connect($config);

// 插入测试
// $sql_insert = 'INSERT INTO review(name) VALUES("晓黄")';
// $result1 = $mysql->query($sql_insert);
// var_dump($result1);

//搜索测试
$sql_search = 'SELECT * FROM review';
$result2 = $mysql->query($sql_search);
$list = $mysql->findAll($result2);
var_dump($list);

// 插入封装的测试
// $arr=array('id'=>'5','name'=>'小红');	//注意id是主键，每次刷新得改下，避免重复报错
// $id = $mysql->insert('review',$arr);
// var_dump($id);

//修改测试
$arrUpdate = array('id'=>'5');
$where = 'id=41';
$mysql->update('review',$arrUpdate,$where);

*/

 ?>