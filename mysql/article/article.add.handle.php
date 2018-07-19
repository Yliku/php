<?php 	
//将输入的结果传递给数据库、入库
require_once('connect.php');	//引入connect.php文件进行数据库连接，可不加圆括号
//require、require_once、include、include_once均可用，后面可不加圆括号
//print_r($_POST);		//测试输出结果是否正常，再继续码字入库
if(		!(	isset($_POST['title'])&& (!empty($_POST['title']))	)	){	//注意$_POST后是方括号！！！
	echo "<script>alert('标题不能为空！');window.location.href='article.add.php'</script>";	
	//script脚本标签，alert 脚本语言，弹出对话框提醒
}
$title=$_POST['title'];	//方括号里面不要忘记单/双引号，因为$_POST是关联数组
$author=$_POST['author'];	
$description=$_POST['description'];	
$content=$_POST['content'];	
$dateline=time();		//获取当前系统的时间戳
//将数据插入数据库，入库前需要对所有信息进行校验
$insertsql="INSERT INTO article(title,author,description,content,dateline) VALUES('$title','$author','$description','$content',$dateline)";
//字符串变量需要加单引号，$dateline是int类型的，所以不用加单引号
//echo $insertsql;			//打印变量检测语句是否书写正确，打印出来后复制进数据库的sql进行执行看是否出错！！！！！！
if( $con1=mysqli_query($con,$insertsql) ){
	echo "<script>alert('新增文章成功');window.location.href='article.manage.php'</script>";
}else {
	echo '插入失败',mysqli_error($con);	//mysqli_error必须输出才能看到报错内容
}

 ?>