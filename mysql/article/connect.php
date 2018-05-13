<?php 
require_once('config.php');
//连库
//header('Content-type:text/html;charset=utf-8');	//表示当前的文档是utf8格式，请以utf8的格式输出，这样的话汉字就不会变成乱码了
if( $con=mysqli_connect(HOST,USERNAME,PASSWORD)  ){	//HOST,USERNAME,PASSWORD被我们定义为常量，可以不用加单引号，如果是变量得加双引号
	echo "<script>alert('mysqli连接成功');</script>";						
}else{
	echo mysqli_error();			//怎么使用？？无法输出信息
	echo 'mysqli连接失败<br />';
	}
//选库
if( mysqli_select_db($con,'test') ){
	echo '子库连接成功<br />';
}else echo '子库连接失败<br />';
//设置字符集
mysqli_query($con,'set names utf8');

 ?>