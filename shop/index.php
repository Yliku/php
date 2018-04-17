<html>
<head>
	<title>我的第一个电商网站</title>
	<style>
		*{margin:0;padding:0;font-size:12px;font-family: "微软雅黑";} 	/*设置全局边框和字体*/
		body{background: #F5F5F5;}
		div{width:1000px;margin:0 auto;border:1px solid red;}
		hr{width:1000px;margin:0 auto;}

		.top1:after,.top2:after{content:"";	display:table;	clear:both; }
		.top1 img{float:left;height: 10px;width:10px;}
		.top1 span{float:right;}
		.top1 li{list-style:none;float:left;margin-right:10px;} 	 
		/*行高line-height设置和盒子/图片高度一样，可以实现垂直居中   list-style-image: url(./images/li_bg.gif);*/
		.top1 a:link{color:green;text-decoration:none;} 		/*取消字体修饰样式，在这里是清除a标签超链接的默认下划线*/
		.top1 a:hover{color:red;text-decoration:underline;} 					/*滑过a标签，a标签改变颜色*/
		.top2{border:1px solid red;background: white;}
		/*
		a:link 未访问时的状态；		a:visited 已访问过的状态；		a:hover 鼠标移动到链接上时的状态；

		定义CSS时候的顺序不同，也会直接导致链接显示的效果不同。
		原因可能在于浏览器解释CSS时遵循的“就近原则”。
		浏览器判断a标签属于哪个状态，会取最近的样式进行解析，不会再重复向上/远重复解析。
		正确的顺序（由上往下）：a:link、a:visited、a:hover、a:active
		如果将a:hover放在最上面/远，那永远也不会得到hover的效果;
		*/
	</style>
</head>
<body>
	<div class="top1">		<!-- top1开始 -->
		<ul>
			<li><a href="#">设为首页</a></li>
			<li><a href="#">加入收藏</a></li> 	<!-- 注意空链接的#号如果不加，点击超链接将会是重新跳转到当前页面，即刷新页面 -->
			<li><a href="http://baidu.com">联系我们</a></li>
		</ul>
		<span >欢迎来到慕课网！<a href="" style="margin-left:5px">[登陆]</a><a href="">[注册]</a></span>
	</div> 					<!-- top1结束 -->

	<div class="top2">		<!-- top2开始 -->
		<img src="images/logo.jpg" alt="慕课网" style="float:left;height: 50px;">
		<span style="float:right;">1234</span>
		<img src="images/tel.jpg" style="height: 20px;float:right;vertical-align:middle;text-align:center">
	</div>					<!-- top2结束 -->
	<hr>
	




</body>

</html>
