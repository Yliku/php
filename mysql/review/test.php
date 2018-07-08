<?php 
if( $con=mysqli_connect('localhost','root','123')){
	echo "连接成功<br>";
}else{
	echo "连接失败，失败原因：".mysqli_connect_error()."<br>";
}
if (mysqli_select_db($con,'test1')) {
	# code...
	echo '选择数据库成功<br>';
}else{
	echo '选择数据库失败，原因：';
	echo mysqli_error($con);
}


 ?>