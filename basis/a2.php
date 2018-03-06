<!DOCTYPE html>
<html>

<head>
	<title>参数传递</title>
</head>

<body>
	<h1>欢迎</h1>
	<?php
		$name=$_GET["username"];
		echo $name;
		echo "<br/>请注意使用get传递时,地址栏的显示!";		
		// 地址栏上额外添加了?username='内容'! 这表示我们直接在地址栏输入 ?username=任意信息  都能传递成功!!!
		echo "<br/>输入的都显示在地址栏啦!隐私都暴露了";
	?>
</body>

</html>