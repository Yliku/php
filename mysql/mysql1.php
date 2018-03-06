<?php 
header("Content-type:text/html;charset=utf-8");

if( 	$con = mysqli_connect('localhost','root','123')){		//连接数据库，并判断是否连接成功
//$con为资源变量
//如果使用mysql_connect会报错，因为现在mysql扩展模块就要被放弃使用了，所以请使用mysqli代替
//尝试更改密码试试看效果
	echo 'mysql连接成功<br />';
}else	echo 'mysql连接失败<br />';
//var_dump( $con);

if(mysqli_select_db($con,'test')){							//选择子数据库
//包含两个参数，$con资源变量，'test'子数据库名字
	echo '子数据库选择成功<br />';
}else	echo '子数据库选择失败<br />';

mysqli_query($con,'set names utf8');							//告诉数据库当前我们插入和读取的数据以utf8的形式来读取和插入
if(	mysqli_query($con,"  INSERT INTO  test1(id,name) VALUES(3,'banana')")	) { 	//注意双引号和单引号的嵌套
//执行一条sql语句：insert插入数据,插入成功返回true,失败返回false
//mysqli插入数据失败时，是数据库表中的某个字段没有添加，比如id列，必须完整插入所有字段;
//如果不想这样的话去设计表中把id列改为自动递增就可以了,把id改为自增长，就不需要我们来插入id。
	echo '插入成功<br />';
	$uid=mysqli_insert_id($con);
	echo '插入的数据id为：',$uid,'<br />';			//输出的是0，有bug
} else{
	echo mysqli_error($con);	//当sql语句太过长时，执行失败，无法分辨是哪里时，要借助该语句查询错误
	echo '插入失败<br />';
}
$a=mysqli_query($con,'SELECT * FROM test1');		
//*代表每个字段的所有元素，如果是select name from test1，即表示只取字段中name的值
//sql语句的关键字最好的是大写，以便加以区分：	SELECT name FROM test1;

var_dump($a);
echo '<br />使用循环打印<br />';
while($row = mysqli_fetch_row($a)){
	//print_r($row);
	var_dump($row);
	echo $row[1],',id是：',$row[0],'<br />';
}

mysqli_close($con);	//建立通道、资源变量后才能使用该函数，关闭$con连接

 ?>