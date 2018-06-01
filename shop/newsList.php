<html>
<head>
	<title>我的电商网站</title>
	<link rel="shortcut icon" href="./images/favicon.ico">
	<link type="text/css" href="style/main.css" rel="stylesheet">
</head>
<body>
	<div class="top">
		<div class="top1">		<!-- top1开始 -->
			<ul>
				<li><a href="#">设为首页</a></li>
				<li><a href="#">加入收藏</a></li> 	<!-- 注意空链接的#号如果不加，点击超链接将会是重新跳转到当前页面，即刷新页面 -->
				<li><a href="http://baidu.com">联系我们</a></li>
			</ul>
			<span >欢迎来到慕课网！<a href="" style="margin-left:5px">[登陆]</a><a href="">[注册]</a></span>
		</div>					<!-- top1结束 -->
	</div> 					
	
	<div class="top2">		<!-- top2开始 -->
		<img src="images/logo.jpg" alt="慕课网" style="float:left;height: 50px;">
		<div style="float:right;width:250px;margin:15px 0;color:#8e8e8e;">
			<img src="images/tel.jpg" style="height: 20px;vertical-align:middle;" alt="服务热线">  	<!-- 为什么此处使用vertial-align会生效？？？？ -->
			24小时服务热线：<span class="tel" ><b>0756-1234567</b></span>
			<!--
			想让图片和文字在同一行垂直居中，在图片的img表情中添加vertical-align:middle;即可实现！！！！！！
			 vertical-align:middle 垂直居中，只对行内元素有效，对块状元素无效！可用display:inline-block设置为行内块状元素 。
			所谓inline-block行内块状元素，即可以与inline水平元素混排（在同一行），又能设置高宽属性的元素，
			例如图片，按钮，单复选框，单行/多行文本框等HTML控件，只有这些元素默认情况下会对vertical-align属性起作用。
			1、当父元素top2设置了line-height:200px;时，vertical-align:middle;将会根据父元素的高度在100px的位置垂直居中；
			2、当父元素没有设置line-height时，可以试试直接设置height，将会看的更直观，
			      这时vertical-align:middle;将会根据行内的兄弟元素对齐；在兄弟元素的中间水平线上对齐；
			-->
		</div>
	</div>					<!-- top2结束 -->
	<div class="content_top">
		<ul>
			<li><a href="#">首页</a></li>
			<li><a href="">关于慕课</a></li>
			<li><a href="">新闻动态</a></li>
			<li><a href="">课程中心</a></li>
			<li><a href="">我的课程</a></li>
		</ul>
		<form action="" method="POST">
			<input type="text" class="search_text" placeholder="请输入要搜索的内容" id="key">
		</form>
	</div>
	<div class="listTop"><img src="images/ad4.jpg" alt=""></div>
	<div class="listContent">
		<div class="listLeft">
			<ul>
				<li>1</li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
				<li>5</li>
			</ul>
		</div>
		<div class="listRight">
			<ul>
				<li>11</li>
				<li>12</li>
				<li>13</li>
				<li>14</li>
				<li>15</li>
			</ul>
		</div>
	</div>
	


	<div class="btm"> 	<!-- 颜色#acc3e3 -->
		<button onclick="alert('点击确定跳转到我的Github上~');window.open('https://github.com/Yliku')">关于我</button>&nbsp;|
		<a href="" onclick="alert('点击确定跳转到我的Github上~');window.open('https://github.com/Yliku')">联系我们</a>&nbsp;|
		<a href="" >服务条款</a>&nbsp;|
		<a href="">帮助中心</a>&nbsp;|
		<span>制作时间：2018.04.08~现在</span>
	</div>
</body>

</html>
