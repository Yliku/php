<html>
<head>
	<title>我的第一个电商网站</title>
	<style>
		*{margin:0;padding:0;font-size:12px;font-family: "微软雅黑";} 	/*设置全局边框和字体*/
		body{background: #F5F5F5;}
		div{width:1000px;margin:0 auto;border:1px solid red;}
		hr{width:1000px;margin:0 auto;}

		.top1:after,.top2:after{content:"";	display:table;	clear:both; } 	/*清浮动*/
		.top1 li{list-style:none;float:left;margin-right:10px;} 	 
		.top1 span{float:right;}
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
		<div style="float:right;width:150px;margin:15px 0;">
			<img src="images/tel.jpg" style="height: 20px;vertical-align:middle;">  	<!-- 为什么此处使用vertial-align会生效？？？？ -->
			<span >0756-1234567</span>
			<!--
			 vertical-align:middle 垂直居中，只对行内元素有效，对块状元素无效！可用display:inline-block设置为行内块状元素 。
			所谓inline-block行内块状元素，即可以与inline水平元素混排（在同一行），又能设置高宽属性的元素，
			例如图片，按钮，单复选框，单行/多行文本框等HTML控件，只有这些元素默认情况下会对vertical-align属性起作用。
			1、当父元素top2设置了line-height:200px;时，vertical-align:middle;将会根据父元素的高度在100px的位置垂直居中；
			2、当父元素没有设置line-height时，可以试试直接设置height，将会看的更直观，
			      这时vertical-align:middle;将会根据行内的兄弟元素对齐；在兄弟元素的中间水平线上对齐；
			-->
		</div>
	</div>					<!-- top2结束 -->
	<hr>
	




</body>

</html>
