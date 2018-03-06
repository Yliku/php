<?php 	
//将输入的结果传递给数据库、入库
require_once('connect.php');	//引入connect.php文件进行数据库连接
//print_r($_POST);		//测试输出结果是否正常
$id=$_POST['id'];
$title=$_POST['title'];	//方括号里面不要忘记单/双引号，因为$_POST是关联数组
$author=$_POST['author'];	
$description=$_POST['description'];	
$content=$_POST['content'];	
$dateline=time();		//获取当前系统的时间戳
//将数据插入数据库，入库前需要对所有信息进行校验
$updatesql="update article set title='$title',author='$author',description='$description',content='$content',dateline=$dateline where id='$id'";
//字符串变量需要加单引号，$dateline是int类型的，所以不用加单引号
if( mysqli_query($con,$updatesql) ){
	echo "<script>alert('文章修改成功');window.location.href='index.php'</script>";	
}else{
	echo "<script>alert('文章修改失败')</script>";
	echo mysqli_error($con);
	//echo "<script>alert('文章修改失败');window.localtion.href='article.modify.php'</script>	";
}
 	

 ?>