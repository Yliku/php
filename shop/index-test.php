<html>
<head>
	<title>我的电商网站</title>
	<style>
		*{margin:0;padding:0;font-size:12px;font-family: "微软雅黑";} 		/*设置全局边框和字体*/
		body{background: #F5F5F5;}
		.top1,.top2,.content_top,.body,.btm{width:1000px;margin:0 auto;}

		.top1:after,.top2:after,.content_top:after,.body:after{content:"";	display:table;	clear:both; } 	/*清浮动!!!!  	*/
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

		!!!不建议使用border来查看布局，建议使用background-color来看布局，因为border至少有1px，在很严谨的地方会严重影响到布局！
		*/
		.top2{background: white;}		
		.tel{color:red;}

		.content_top{border-radius:4px;background:gray;height:30px;} 	/*设置边框的圆角属性*/
		/*border-top-left-radius:5px 10px;表示top-left这个角的水平圆角半径为5px，垂直圆角半径为10px。*/
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
		.body{margin:5px auto;}
		.body1{height:400px;background-color:#A0D468;width:400px;float:left;border-radius:4px;}
		.body2{height:400px;background-color:#AC92DC;width:180px;float:left;margin:0 10px;border-radius:4px;}
		.body_title{height:30px;border-bottom:2px solid #E8E8E8;}
		.body_title h2{width:70%;float:left;color:gray;line-height: 30px;padding-left:15px;}
		.body_title a{width:20%;float:right;color:gray;height:30px;line-height: 30px;text-decoration: none;text-align:right;}
		.body_title{clear:both;}

		.pic_news{line-height: 20px;margin:10px;}
		.pic_news img{
			float:left;margin-right:10px;
			cursor:pointer;		
			/*pointer鼠标移到这里时变成一只伸出食指的手，和a标签的效果一样，只是点击了不能跳转，
			其他参数有：default箭头，crosshair十字，progress箭头加沙漏等*/
			transition:all 1s;	/*代表这个转换过程在1s内完成*/
		}
		.pic_news img:hover{
			transform:rotate(360deg);	 /*旋转360度*/
			/*
			transform:scale(1.5); 	在鼠标放到图片上的时候图片按比例放大1.5倍
			神奇的transform转换，其属性有：斜拉(skew)，缩放(scale)，旋转(rotate)以及位移(translate)。
			*/
		}

		.news_list{margin: 10px;line-height: 20px;}
		.news_list li{list-style:none;}
		.news_list em{
			background:url(./images/li-bg.jpg) no-repeat;
			font-style:normal; /*em里的字体不倾斜*/		
		}
		.news_list_btm em{ 		/*为什么使用了上级.news_list em后，直接在em里面使用类选择器定义css样式，background-position不起作用？？？*/
			background:url(./images/li-bg.jpg) no-repeat;
			font-style:normal;
			background-position:0px -16px;	
			/*水平向右偏移0px;垂直向上偏移16px;不限制em宽度和设置no-repeat的话，背景图像是上下左右重复的,所以16px和-16px效果是一样的*/
		}		
		/*
		.body_left,.body_middle,.body_right{width:330px;display:inline-block;}  
		上面代码中的浮动如果改为行内块状元素，行内块状元素会出现默认间距，浮动元素则没有间距；
		要留意浏览器内 行内块状元素 之间的默认间距，一般是标签之间的tab缩进造成的空格，360浏览器是3px
		（注意：换行符、tab(制表符)、空格都会造成此问题）
		*/

		.transition



		.btm{background:#c5d3e5;width:100%;height:30px;position:absolute;bottom:0;border:none;text-align:center;line-height: 30px;color:gray;}
		/*    	背景颜色				宽度			高度			绝对定位			定位在最下面	没有边框		文字水平居中		行高等于div高度，垂直居中 	文字颜色为gray*/
		.btm a{color:#1d5494;text-decoration:none;}
		.btm a:hover{color:#1d5494;text-decoration:underline;}
	</style>
	<link rel="shortcut icon" href="./images/favicon.ico">
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
		<div class='body1'>
			<div class='body_title'>
				<h2>新闻列表</h2>
				<a href="">More&gt;&gt;</a>
			</div>

			<div class='pic_news'>
				<img src="./images/news.jpg" alt="">
				<h2>慕女神喊你来表白</h2>
				<p>5.20单身狗来表白<br>有机会获得慕女神赠送的礼品一份哦<br>邀请对象一起共享晚宴~</p>
			</div>
			<div class='news_list'>
				<ul>
					<li><em>01</em><a href="">【慕客访谈用户篇】“有为屌丝”在路上</a></li>
					<li><em>02</em><a href="">【有奖活动】给父亲的三行书信</a></li>
					<li><em>03</em><a href="">《程序猿，请晒出你的童年》活动获奖公告</a></li>
					<li class="news_list_btm"><em>04</em><a href="">【慕课访谈】破茧成蝶——美女程序员的蜕变史</a></li>
					<li class="news_list_btm"><em>05</em><a href="">【获奖公告】追“球”巅峰，争当“预言帝”</a></li>
					<li class="news_list_btm"><em>06</em><a href="">【问卷调查】慕课网用户学习情况大调查</a></li>
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
