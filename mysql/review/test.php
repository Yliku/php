<?php 
if( $con=mysqli_connect('localhost','root','123')){
	echo "连接成功<br>";
}else{
	echo "连接失败，失败原因：".mysqli_connect_error()."<br>";
	//返回连接失败的错误信息！！！！
}
if (mysqli_select_db($con,'test')) {
	# code...
	echo '选择数据库成功<br>';
}else{
	echo '选择数据库失败，原因：';
	echo mysqli_error($con);
	//返回上一个mysql操作所产生的文本错误信息！！！！
}
mysqli_query($con,'set names utf8');	//告诉数据库当前插入和读出的数据以utf8的形式 
if (	mysqli_query($con,"INSERT INTO review(name) VALUES('小六2')")	) {
	echo '插入成功<br>';
}else{
	echo '插入失败，原因：';
	echo mysqli_error($con);
}
$res = mysqli_query($con,'SELECT * FROM review');
var_dump(mysqli_fetch_array($res));

mysql_fetch_row($res);
mysql_fetch_array($res);
mysql_fetch_assoc($res);
mysql_fetch_object($res);




 ?>