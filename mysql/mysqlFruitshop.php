<?php 
$con=mysqli_connect('localhost','root','123');
mysqli_select_db($con,'test');		//test为子数据库名，不是表格名！！！！
mysqli_query($con,'SET NAMES utf8');	//设定字符集，注意mysqli语句需要加单引号啊啊啊啊啊啊！！！！

if( mysqli_query($con,"INSERT INTO fruitshop(id,name,num,price) VALUES(6,'油柑',2,30) ")   ){
	echo '插入成功<br />';
}else echo '插入失败<br />';	
$res=mysqli_query($con,'SELECT * FROM fruitshop');	//$res为从数据库中查询到的结果集的地址
while($row=mysqli_fetch_row($res)){
	print_r($row);
	echo '<br />';
	var_dump($row);
}

//mysql增删改
//通过mysql_query向mysql数据库传递insert、delete、update语句
//修改语句：UPDATE fruitshop SET num=3 WHERE id=1  直接在数据库的SQL里操作也可更改
//删除语句：DELETE FROM table_name [WHERE id=1] 如果没有指定where，整个表将被删除
mysqli_query($con,'UPDATE fruitshop SET num=31 WHERE id=1');
mysqli_query($con,'DELETE FROM fruitshop WHERE id=6');
mysqli_close($con);


/*
if(	$con=mysqli_connect('localhost','root','123')	){
	echo 'mysql连接成功<br />';
}else{
	echo '数据库连接失败：'.mysqli_error($con).'<br />';
}
mysqli_query($con,'set names utf8');
if(	mysqli_select_db($con,'test')	){
	echo '子库连接成功<br />';
}else{
	echo '子库连接失败：'.mysqli_error($con).'<br />';
}
$a=mysqli_query($con,'SELECT * FROM fruitshop');
while(	$a1=mysqli_fetch_row($a) ){
	var_dump($a1);
}
*/


 ?>