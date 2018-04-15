<html>
<head>
	<title>我的第一个电商网站</title>
	<style>
		div{width:1000px;margin:0 auto;border:1px solid red;}
		.top_content a,.top_content a:link,.top_content visited{color:green;text-decoration:none;} 	
		/*取消字体修饰样式，在这里是清除超链接的默认下划线*/
		a:hover{color:red;}
		*{margin:0;padding:0;font-size:12px;font-family: "微软雅黑";}
		body{background: #F5F5F5;}
		.top_content{width:1000px;margin:0 auto;} 	
		/*如果是在这里设置浮动float:right，那么将是所有li都向右浮动，不会像下面一样一个个排在右边*/
		div li{list-style-image: url(./images/li_bg.gif);float:right;width:70px;line-height: 50px;} 	
		/*行高line-height设置和盒子高度一样，垂直居中*/
	</style>
</head>
<body>
	<div style="height:20px">	<!-- top开始 -->
		<div  style="width:300px;float:left">
			<img src="images/star.png" height=10px>
			<a href="">收藏慕课</a>	
		</div>
		<div  style="width:300px;float:right;text-align:right">
			欢迎来到慕课网<a href="">[登陆]</a><a href="">[注册]</a>
		</div>
	</div> 						<!-- top结束 -->
	<div  style="height:50px;">	
	<!-- 	
		<div style="width:300px;float:left;">
			<img src="images/logo.jpg" alt="慕课网"  height=50>
		</div> 
	-->
		<img src="images/logo.jpg" alt="慕课网"  height=50  style="float:left;">
		<ul>
			<li><a href="#">设为首页</a></li>
			<li><a href="">加入收藏</a></li> 	<!-- 注意空链接的#号如果不加，点击超链接将会是重新跳转到当前页面，即刷新页面 -->
			<li><a href="#">联系我们</a></li>
		</ul>
		</div>
	</div>
	<br>
	<hr style="width:1000px;margin:0 auto">
	
</body>

</html>
