<html>
<head><title>修改文章</title></head>
<body >
<?php
require_once('connect.php');
$id=$_GET['id'];		
$query=mysqli_query($con,"select * from article where id=$id");	//取出结果集，id=4数字不用加单引号
$data=mysqli_fetch_assoc($query);								//将结果集以(关联)数组的形式存入变量$data，以字段为键名的关联数组
var_dump($data);
?>
<form method='post' action='article.modify.handle.php'>			<!--表单里面嵌套表格，表单可以提交后跳转，表格不行-->
<input type='hidden' name="id" value="<?php echo $data['id']?>"/>	<!--创建隐藏域，传递要修改文章的id给 下一个网页进行数据库修改操作-->
<table >
	<tr><td>修改文章</td></tr>
	<tr><td>标题<input type='text' name='title' value="<?PHP echo $data['title']; ?>"></td></tr>	
	<!--将内容传递进去，使用value，插入php语句，用echo输出-->
	<tr><td>作者<input type='text' name='author'  value="<?PHP echo $data['author']; ?>"></td></tr>
	<tr><td>文章简介<textarea name='description' cols='80' rows='3' ><?PHP echo $data['description']; ?></textarea></td></tr>
	<!--记住textarea文本框前面不是input!!!coulmn行row列，，文本域/框的php语句插入和上面的不一样，需要在textarea标签和闭合标签中间插入，不是使用value!!!!!-->
	<tr><td>文章内容<textarea name='content' cols='80' rows='10' ><?PHP echo $data['content']; ?></textarea></td></tr>
	<tr><td><input type='submit' value='提交'></td></tr>			<!--注意提交的值是value，不是name-->
</table>
</form>

</body>
</html>

