<html>
<head><title>HTML基础</title></head>	<!-- HTML标签的注释，符号超奇葩 -->


<body bgcolor="BEBEBE">					<!-- 设置背景颜色 -->

<a ="http://baidu.com">超链接</a><br />	<!-- 插入超链接 -->
<img src="chicken1.jpg">				<!-- 放在根目录下的图片 -->
<img src="../images\couple.jpg"><br />	<!-- 放在根目录下 images文件夹里的图片 -->
<form>									<!-- 插入表单单单单单单 -->
用户名：<input type="text" name="username">
密  码：<input type="text" name="password">
<input type="submit" name="登录">
<input type="submit" value="登录">		<!-- 比较两个登录/提交的区别 -->
</form>									<!-- 插入表单单单单单单 -->

<table border="1" cellspacing="0">		<!-- 插入表格格格格格格 -->
										<!--border=1设置包括标签table，tr，td的边框粗细，cellspacing合并标签tr，td的空隙-->
<tr><td>序号</td><td>姓名</td><td>爱好</td></tr>
<tr><td>0001</td><td>张三</td><td>篮球</td></tr>
<tr><td>0002</td><td>李四</td><td>编程</td></tr>
</table>								<!-- 插入表格格格格格格 -->
<br />

<?php
	echo "以下为PHP内容"."<br />";
	$var1=89757;
	$var2="你好PHP"."<br />";
	echo "编号".$var1,"正在学习php,$var2"."<br />";	//用逗号和连接符.都可以将变量和其他连接

	
?>
</body>


</html>


