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
			<li><a href="index.php">首页</a></li>
			<li><a href="">关于慕课</a></li>
			<li><a href="newsList.php">新闻动态</a></li>
			<li><a href="">课程中心</a></li>
			<li><a href="">我的课程</a></li>
		</ul>
		<form action="" method="POST">
			<input type="text" class="search_text" placeholder="请输入要搜索的内容" id="key">
		</form>
	</div>


	<div class='body'>
		<div class='body1'>
			<div class='body_title'>
				<h2>新闻列表</h2>
				<a href="newsList.php">More&gt;&gt;</a>
			</div>

			<div class='pic_news'>
				<img src="./images/news.jpg" alt="">
				<h2>慕女神喊你来表白</h2>
				<p>5.20单身狗来表白<br>有机会获得慕女神赠送的礼品一份哦<br>邀请对象一起共享晚宴~</p>
			</div>
			<div class='news_list'>
				<ul>
					<li><em>01</em><a href="news.php"><span>2018-04-01</span>慕课网获App Store强力推荐荣登四榜单</a></li>
					<li><em>02</em><a href=""><span>2018-04-25</span>【有奖活动】给父亲的三行书信</a></li>
					<li><em>03</em><a href=""><span>2018-05-13</span>《程序猿，请晒出你的童年》活动获奖公告</a></li>
					<li class="news_list_btm"><em>04</em><a href=""><span>2018-05-16</span>【慕课访谈】破茧成蝶——美女程序员的蜕变史</a></li>
					<li class="news_list_btm"><em>05</em><a href=""><span>2018-05-21</span>【获奖公告】追“球”巅峰，争当“预言帝”</a></li>
					<li class="news_list_btm"><em>06</em><a href=""><span>2018-06-02</span>【问卷调查】慕课网用户学习情况大调查</a></li>
				</ul>
			</div>
		</div> <!-- 新闻框结束 -->

		<div class='body2'>
			<div class="trans">transition的过渡效果</div>
		</div>

		<div class='body1'>
			
		</div>
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
