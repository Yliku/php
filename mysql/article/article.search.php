<?php 
require_once('connect.php');
$key = $_GET['key'];
//echo $key,'<br />';
$sql = "select * from article where title like '%$key%' order by dateline desc";  
//%代表任意多个字符，如果只是 $key% 则代表以$key开头的数据，同理 %$key代表以$key结束的数据
$query = mysqli_query($con,$sql);
if($query && mysqli_num_rows($query)){				//当$query存在且$query数据的行数不为0的时候
	 while( $row = mysqli_fetch_assoc($query) ){
	 	$data[]=$row;	
	 	//print_r($data);	//注意$data为二维数组
	 }
}else{
	echo '搜索不到相关文章<br />';
	exit();
}
if(!empty($data)){
	foreach ($data as $value) {
	//将data里面的数据逐行输出给value关联数组
	//foreach ($variable as $key => $value)  另一个用法
 ?>	<!--foreach花括号没结束！！！循环内嵌套下面的html标签-->
<html>
<head><title>文章列表</title></head> 	

<body>
<p></p><br>
<div>标题：<?php echo $value['title']?></div>
<div>作者：<?php echo $value['author']?></div>
<div>简介：<?php echo $value['description']?></div>
<div>内容：<?php echo $value['content']?></div>
<div>发布时间：<?php echo $value['dateline']?></div>
<p></p>
</body>

</html>
<?php 
	
	}	//foreach的花括号，表示foreach循环在此处结束！！！
}		//if语句的花括号，表示if语句在此处结束！！！
 ?>