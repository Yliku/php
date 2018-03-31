<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>css样式学习</title>
<style type="text/css">
	.class{color:red;} 		/*类选择器，最常用到*/
	#id{color:green;} 		/*ID选择器*/
	p{						/*标签选择器，以标签名开头*/
		font-size: 12px;		/*设置字体大小，注意css的注释是用*加/，html的注释是<!-- -->	*/
		color:green;		/*设置字体颜色*/
		font-weight: bold;	/*设置字体加粗*/
	}
	body, input, button{font-family:Microsoft Yahei;} 		/*设置body里面的字体为微软雅黑，英文的书写兼容性好*/
	xmp,span{	font-family:楷体;		font-size:20px;	color:silver;	font-weight:bolder;	} 	/*逗号表示xmp和span两个标签都使用该css格式~~~也可以写成一行*/
	.food1>span{border:1px solid red;color:orange;font-size:12px;} 	/*类选择器中的子选择器，用来设置该类选择器中的span标签内容的样式，>号表示作用于第一层span标签*/
	.food2 span{border:1px solid red;color:orange;font-size:12px;} 		/*类选择器中的后代选择器，用来设置该类选择器中的span标签内容的样式，空格表示作用于每个span标签*/
	/*	
	background:pink;  设置背景颜色为粉色
	*{font-szie:12px;color:red;}通用选择器，匹配所有标签元素，常用于设置整个页面的文字大小？字体？？	
	p{color:red!important;}     !important最高权限，优先权为最高，注意是写在分号前
	*/
	a:link{color:blue;} 		/*将未被访问的链接设置为蓝色，	link必须位于hover之前，否则hover会被覆盖*/    
	a:visited{color:purple;} 	/*将已访问的链接设置为紫色*/
	a:hover{color:red;} 		/*伪类选择符，作用于所有a标签，鼠标滑过a标签，a标签的内容改变为设置的样式，常用来滑过改变字体颜色~~~~~*/
	p:hover{color:purple;} 	/*伪类选择符，作用于所有p标签，鼠标滑过p标签，p标签的内容改变为设置的样式，常用来滑过改变字体颜色~~~~~*/
	a:active {color: blue}  	 /* 被点击选择时的链接颜色，active不常用 */

	/*
	CSS样式有三种：
		内联式CSS样式（写在HTML标签中）、
		嵌入式CSS样式（写在当前文件head标签中，用style包括起来）、
		外部式CSS样式（写在单独一个文件中）
	而嵌入式CSS中分三种选择器：标签选择器（作用于该标签的所有代码）、类选择器（最常用到，能重复使用）、ID选择器（只能使用一次）
	    	区别：标签选择器作用于所有标签；在一个HTML文档中，类选择器可以使用多次，而ID选择器有且只能使用一次。
	各种CSS样式的优先级：就近原则，哪个样式离代码近优先级最高
	 */
</style>
</head>

<body>
<p>第一段：用嵌入式css渲染过所有p标签的段落</p>										<!-- 嵌入式css必须写在<style></style>标签之间，而嵌入式css一般写在<head></head>之间 -->
<p>第二段：用嵌入式css渲染过 <span>所有span标签</span> 的段落</p> 
<p style="font-family:隶书;color:pink;font-size:20px;">第三段：用内联式css写在p标签中渲染过的段落</p>	<!-- 内联式css样式表就是把css代码直接写在现有的HTML标签中 -->
<p>使用了嵌入式css的<span class="class">类选择器</span>和<span id="id">ID选择器</span>，该方法最为灵活</p>
<p class="food1">使用了嵌入式CSS中类选择器中的<span>子选择器，>号只表示作用于第一层标签，<span>第二层不会受子选择器影响</span>哈哈</span>哈哈</p>
<p class="food2">使用了嵌入式CSS中类选择器中的<span>子选择器，空格表示作用所有标签，<span>每一层都会受子选择器影响</span>哈哈</span>哈哈</p>
<p>伪类选择符<a title="标题呀" href="https://www.baidu.com">a:hover{}</a></p>
<p style="text-decoration:line-through">测试测试，此处是删除线：text-decoration:line-through</p>
<a href="http://www.adminwang.com/css/90.html" style="border:1px solid red">CSS加强网站，不错，通俗易懂</a>
<a href="baidu.com" style="border:1px solid red">百度链接，此时是a标签是内联元素</a>
<a href="baidu.com" style="display:block;border:1px solid red">a标签转为块状元素，查看加了CSS样式：display:block的变化，一个块级元素独占一行</a>

<!-- 
块状元素：		display:block		
内联/行内元素：	display:inline 
内联块状元素：	display:inline-block
-->

<xmp>
外部式css样式(也可称为外联式)就是把css代码写一个单独的外部文件中，
这个css样式文件以“.css”为扩展名，在<head>内（不是在<style>标签内）
使用<link>标签将css样式文件链接到HTML文件内，如下面代码：
<link href="base.css" rel="stylesheet" type="text/css" />
xmp标签可以在网页上显示出html的标签代码，和pre标签还是有很大区别的，
区别：
pre标签只保留所有的   空格和换行符，而xmp不仅会保留空格和换行符，而且会保留html的代码片段。
</xmp>


</body>


<!-- 
font-family:设置字体；
font-size:字体大小；
font-weight:bold：设置为粗体样式；
font-style:italic：设置为斜体样式；
text-decoration:underline：文字设置下划线；
text-decoration:line-through：删除线；
text-align:center：水平居中对齐； 
text-indent:2em：缩进；（注意：2em的意思就是文字的2倍大小。）
line-height:2em：行高；
word-spacing:50px：单词间距；
letter-spacing:20px:字母间距；

盒子模型-由里到外分别是：
width：内容的宽度，内容可以是文字、图片或者标签元素
padding：内填充
border：盒子的边框
margin：盒子模型和盒子模型外边距

注意：
内填充、外边距、边框 都有四个方向：top buttom left right
比如：padding-top/padding-bottom/padding-left/padding-right



在网页中，元素有三种布局模型：
1、流动模型（Flow）默认的网页布局模式，块占一行从上往下排，内联元素从左到右排
2、浮动模型 (Float) 让两个块状元素在同一行显示出	{float:left/right;}
3、层模型（Layer）

层布局（Layer）模型
position: relative;相对定位
position: absolute;绝对定位
position: fixed;固定定位，不会随着滚动条滚动而改变位置，会一直显示在浏览器上，很多页面小广告就是用这个，深恶痛绝

color : rgb(80% , 40% , 0% ) ;   或者  color : rgb(204 , 102 , 0 ) ;     
计算机显示的颜色是红、绿、蓝三色不同比例配置而成的。
rgb表示红绿蓝的缩写；
百分比表示他们的比例；
数字表示红、绿、蓝指定0-255之间的一个数值 ；
#cc6600表示数值的16进制码。

12常见颜色：红橙黄绿青cyan蓝紫purple灰gray粉pink黑白棕brown
浅绿色aqua、紫红色fuchsia、绿黄色lime、褐红色maroon、深蓝色navy、橄榄色olive、银色silver、蓝绿色teal

-->

</html>
