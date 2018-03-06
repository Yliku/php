<html>
<head>	<title>html基础</title>	 </head>		
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<!-- 用sublime写程序，输出到网页预览时，得在html中加入这句，不然浏览器无法识别会显示为乱码，
	或者文件保存为utf-8 ，浏览器现在一般都会默认识别为utf-8 -->
										<!-- HTML标签的注释,这注释符号真奇葩 -->
<body bgcolor="#BEBEBE">					<!-- 设置背景颜色 -->
<a>超链接标签测试文字测试文字测试文字测试文字测试文字</a>
<br />									<!-- html中的换行符,最规范的写法,不要写成br -->
<a href="https://baidu.com">(超链接跳转标签)跳转百度</a>		
										<!-- 试试看不加https://的效果 href它是Hypertext Reference的缩写-->
<p>段落1</p>
<p>段落2</p>								<!-- 注意两个段落之间的距离 --> 
<em>段落3之em斜体标签<br /></em>					

<!-- img 是html中的单标签：单标签得加空格和斜杠!!!!	<br>换行<hr>水平线<img>插入图片<input>输入框<param>对象<meta>元信息<link>定义文档与外部资源的关系	 --> 	

<img src="./basis/chicken1.jpg" />		<!-- 插入图片,本地图片放在根目录下的可以直接访问 --> 	
										<!-- src就是 source（来源），这里是指图片地址 --> 				
<img src="./images/chicken2.jpg" />		<!-- 当图片位置和源代码的父文件夹位置在同一父文件夹时候 应先返回父级文件夹../ 因此src地址填"../images/baby.jpg" -->			

<form>								<!-- 插入表单单单单单单 --> 
登录名:<input type="text" name="username">
密  码:<input type="text" name="password">
<input type="submit" value="登录">
<input type="submit" name="登录">			<!-- 比较name和value的区别 --> 
</form>								<!-- 插入表单单单单单单 --> 
								
<table border="1" cellspacing="0">	<!-- 插入表格格格格格格,tr：行table row,td：单元格table data --> 
										<!-- border=1设置包括标签table，tr，td的边框粗细，cellspacing合并标签tr，个td的空隙-->
<tr><td>序号</td><td>姓名</td><td>科目</td><td>成绩</td></tr>
<tr><td>001</td><td>陈赫</td><td>数学</td><td>21</td></tr>
<tr><td>002</td><td>热巴</td><td>数学</td><td>999</td></tr>
</table>
			
<?php 
date_default_timezone_set("Asia/Shanghai");		
//显示的时间比实际时间小8小时，原因很可能是因为服务器显示的是格林威治时间。比北京时间小八小时。
//服务器位于其他国家或者被设置为不同时区，得添加以上代码，把时区设置为上海。
echo  date("y-m-d H:i:s",time());	//得用双引号！！！大写的H表示输出24小时制，小写h表示输出12小时制
 ?>
			
</body>



</html>