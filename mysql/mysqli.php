<?php
$con = mysqli_connect($host,$name,$psw);		//建立数据库连接，传递地址，用户名和密码
mysqli_select_db($con,$name);					//选择需要操作的数据库（该用户的数据库）
mysqli_query($con,"set names 'utf8'");			//设置当前连接使用的字符编码，一般使用utf8编码
//数据库查询：
$res=mysqli_query($con,'SELECT * from user limit 1');	
//建立连接后就可以进行查询，采用mysql_query加sql语句的形式向数据库发送查询指令
//limit 1,2 表示从第1+1条开始，连续读2条
$row = mysqli_fetch_array($res);	//查询类的语句会返回一个资源句柄/资源变量（resource），可以通过该资源变量获取查询结果集中的数据。
var_dump($row);
/*
关于limit一般形式是  limit n,m
表示从结果中n行开始取，一共取m行； 注意其中n是从0开始，即第一行的n为0。
limit 后只有一个数字 例如limit a   是（从结果第一行开始）取a行，等价于limit 0,a；
例如：limit 2,3表示取结果中的第3、4、5行；limit 2表示取第1、2行
*/

//数据库插入数据：
$name = '李四';
$age = 18;
$class = '高三一班';
$sql = "INSERT into user(name, age, class) values($name, $age, $class)";
mysqli_query($con,$sql);	//执行插入语句
var_dump($sql);

  ?>
