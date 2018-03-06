<?php 
require_once('connect.php');		//   .//表示相对路径下（当前目录下）的connect.php
$id=$_GET['id'];
//用get传递变量可直接在本页的地址栏后面加上  ?id=4  ，传递4给变量$id
//另一种识别表达方式  '..' 
$deletesql = "delete from article where id=$id";	
//当有变量存在时，得用双引号才能识别变量，单引号中的变量会被识别为文本/字符串直接输出 
if( mysqli_query($con,$deletesql) ){
	echo "<script>alert('删除成功');window.location.href='index.php'</script>";
}else	echo '删除失败，原因：',mysqli_errno($con);
 

	
 ?>