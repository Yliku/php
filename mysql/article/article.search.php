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

<table border="1"  cellpadding="2" cellspacing="0" bgcolor="BABABA">
<!-- width/height设置的是整个table的宽度和高度！！！border=1设置包括标签table，tr，td的边框粗细，
	cellspacing合并标签tr，个td的空隙；cellpadding单元格边框与内容之间的距离		-->
	<tr><td height="50" align="center" colspan="6"><strong>搜索到的文章</strong></td></tr>
	<!--colspan设置文章跨列-->
	<tr height="40">
		<td><strong>文章标题</strong></td>	<!--<strong>标签意思是加强，表示该文本比较重要，提醒读者／终端注意。-->
		<td><b>作者</b></td>			<!--<b>这个标签对应 bold，即文本加粗，其目的仅仅是为了加粗显示文本。-->
		<td><b>文章简介</b></td>
		<td><b>文章内容</b></td>
		<td><b>发布时间</b></td>
	</tr>	
	<tr height="10">
		<td bgcolor="FFFFFF" width="150"><?php echo $value['title']?></td>
		<td bgcolor="FFFFFF" width="80"><?php echo $value['author']?></td>
		<td bgcolor="FFFFFF" width="200"><?php echo $value['description']?></td>
		<td bgcolor="FFFFFF" width="600"><?php echo $value['content']?></td>	
		<td bgcolor="FFFFFF" width="200"><?php echo date("y年m月d日 H:i:s",$value['dateline'])?></td>
	</tr>	
</table>

</body>

</html>
<?php 
	
	}	//foreach的花括号，表示foreach循环在此处结束！！！
}		//if语句的花括号，表示if语句在此处结束！！！
 ?>