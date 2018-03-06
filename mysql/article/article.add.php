<html>
<head><title>无标题文档</title></head>
<body >

<form method='post' action='article.add.handle.php'>	<!--表单里面嵌套表格，表单可以提交后跳转，表格不行-->
<table >
	<tr><td>发布文章</td></tr>
	<tr><td>标题<input type='text' name='title'></td></tr>
	<tr><td>作者<input type='text' name='author'></td></tr>
	<tr><td>文章简介<textarea name='description' cols='80' rows='3' ></textarea></td></tr>		<!--记住textarea文本框前面不是input!!!-->
	<tr><td>文章内容<textarea name='content' cols='80' rows='10' ></textarea></td></tr>		<!--coulmn行row列-->
	<tr><td><input type='submit' value='提交'></td></tr>										<!--注意提交的值是value，不是name-->
</table>
</form>

<?php 
//文章添加页面
 ?>

</body>
</html>

