<html>
<head>
	<title>我的电商网站</title>
	<style>
		*{margin:0;padding:0;font-size:12px;font-family: "微软雅黑";} 		/*设置全局边框和字体*/
		body{background: #F5F5F5;}
		div{width:1000px;margin:0 auto;}
		hr{width:1000px;margin:0 auto;}

		.top1:after,.top2:after,.content_top:after{content:"";	display:table;	clear:both; } 	/*清浮动!!!!  	*/
		.top{background:#c5d3e5;width:100%;border:none;height:30px;line-height: 30px;}
		.top1 li{list-style:none;float:left;margin-right:5px;} 	 /*list-style:none没有样式/disc实心圆（默认）/circle空心圆/square实心方块*/
		.top1 span{float:right;}
		/*行高line-height设置和盒子/图片高度一样，可以实现垂直居中   list-style-image: url(./images/li_bg.gif);*/
		.top1 a:link,.content_top li a:link{color:green;text-decoration:none;} 		/*取消字体修饰样式，在这里是清除a标签超链接的默认下划线*/
		.top1 a:hover,.content_top li a:hover{color:red;text-decoration:underline;} 					/*滑过a标签，a标签改变颜色*/
		/*
		a:link 未访问时的状态；		a:visited 已访问过的状态；		a:hover 鼠标移动到链接上时的状态；
		定义CSS时候的顺序不同，也会直接导致链接显示的效果不同。
		原因可能在于浏览器解释CSS时遵循的“就近原则”。
		浏览器判断a标签属于哪个状态，会取最近的样式进行解析，不会再重复向上/远重复解析。
		正确的顺序（由上往下）：a:link、a:visited、a:hover、a:active
		如果将a:hover放在最上面/远，那永远也不会得到hover的效果;
		*/
		.top2{background: white;}		
		.tel{color:red;}

		.content_top{border-radius:4px;background:gray;height:30px;} 	/*设置边框的圆角属性*/
		.content_top li{list-style:none;width:100px;float:left;text-align:center;line-height: 30px;}
		.content_top li a{font-size:16px;color:white;}
		.content_top form{float:right;}
		.search_text{
			width:200px;height:24px;margin-top:3px;margin-right:20px;
			background:url(./images/search.jpg) no-repeat right center; 	/*搜索框图片，不重复，居右，垂直居中*/
			/*等同以下三句
			background-image:url(./images/search.jpg);
			background-repeat:no-repeat;
			background-position:right center;
			*/
			background-color: white;
			padding-right:25px; 	/*输入文字会遮盖搜索的背景图片，设置填充限制，填充大小等同于搜索图片宽度*/
			border:1px solid white; /*设置边框线宽度，更加简洁好看*/
		}

		
		.btm{background:#c5d3e5;width:100%;height:30px;position:absolute;bottom:0;border:none;text-align:center;line-height: 30px;color:gray;}
		/*    	背景颜色				宽度			高度			绝对定位			定位在最下面	没有边框		文字水平居中		行高等于div高度，垂直居中 	文字颜色为gray*/
		.btm a{color:#1d5494;text-decoration:none;}
		.btm a:hover{color:#1d5494;text-decoration:underline;}
	</style>
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

	<div class='body'>
		<div class='body_left'></div>
		<div class='body_middle'></div>
		<div class='body_right'></div>
	</div>


	<div class="btm"> 	<!-- 颜色#acc3e3 -->
		<button onclick="alert('点击确定跳转到我的Github上~');window.open('https://github.com/Yliku')">关于我</button>&nbsp;|
		<!--
		onclick是当鼠标单击时运行其中的脚本/函数:	alert是点击后触发弹窗；
		button标签：定义一个按钮，是双标签。在button双标签之间，可以放置文本、图像、移动（hr网页右边的上下拖动按钮？）、水平线、框架、分组框、音频视频等；
		input中定义type=button时，是单标签，只能放置文本，而且需要使用value；
		这是button标签与input标签创建的按钮之间的不同之处。 
		button成为input的type举例：<input type="button" value="字段" onclick="php脚本程序"/>


		在网页中，按钮分为3种：普通按钮button、提交按钮submit、重置按钮reset。
		<input type="button">	普通按钮，可自定义函数或样式，比如onclick：鼠标单击时运行；
		<input type="submit">	提交按钮，（需配合使用form表单使用）点击会向服务器提交当前所在的form表单里面的数据，
										form举例：<form action ="xxx.php/html" method ="get/post"></form>；
		<input type="reset">	重置按钮，（需配合使用form表单使用）点击会重置当前所在的form表单里面所有input输入框里面的数据，如果没有在form里面则不起作用；
		<input type="file">		上传文件按钮
		<input type="image">	定义图像形式的提交按钮?????

		此外，input的type还可以是以下属性：
		<input type="test">     文本输入框
		<input type="password"> 密码输入框，会显示字符掩码

		<input type="radio">	 单选框
		<input type="checkbox">	 多选框

		<input type="date">	 日期的输入框
		<input type="month">	 月份的输入框

		等，有24种之多：https://www.cnblogs.com/eyed/p/7880000.html
		-->
		<a href="" onclick="alert('点击确定跳转到我的Github上~');window.open('https://github.com/Yliku')">联系我们</a>&nbsp;|
		<a href="" >服务条款</a>&nbsp;|
		<a href="">帮助中心</a>&nbsp;|
		<span>制作时间：2018.04.08~现在</span>
	</div>
</body>

</html>
