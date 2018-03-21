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
	xmp,span{font-family:楷体;		font-size:20px;	color:silver;	font-weight:bolder;	} 	/*逗号表示xmp和span两个标签都使用该css格式~~~也可以写成一行*/
	.food1>span{border:1px solid red;color:orange;font-size:5px;} 	/*类选择器中的子选择器，用来设置该类选择器中的span标签内容的样式，>号表示作用于第一层span标签*/
	.food2 span{border:1px solid red;color:orange;font-size:5px;} 		/*类选择器中的后代选择器，用来设置该类选择器中的span标签内容的样式，空格表示作用于每个span标签*/
	/*	*{font-szie:12px;color:red;}通用选择器，匹配所有标签元素，常用于设置整个页面的文字大小？字体？？	*/
	a:hover{color:red;} 		/*伪类选择符，作用于所有标签，鼠标滑过a标签，a标签的内容改变为设置的样式，常用来滑过改变字体颜色~~~~~*/
	p:hover{color:purple;} 	/*伪类选择符，作用于所有标签，鼠标滑过p标签，p标签的内容改变为设置的样式，常用来滑过改变字体颜色~~~~~*/
	/*
	CSS样式有三种：
		内联式CSS样式（写在HTML标签中）、
		嵌入式CSS样式（写在当前文件head标签中的style中）、
		外部式CSS样式（写在单独一个文件中）
	而嵌入式CSS中分三种选择器：标签选择器（作用于该标签的所有代码）、类选择器（最常用到，能重复使用）、ID选择器（只能使用一次）
	    	区别：标签选择器作用于所有标签，而在一个HTML文档中，ID选择器有且只能使用一次，而类选择器可以使用多次。
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
<p>伪类选择符<a href="https://www.baidu.com">a:hover{}</a></p>

<xmp>
外部式css样式(也可称为外联式)就是把css代码写一个单独的外部文件中，
这个css样式文件以“.css”为扩展名，在<head>内（不是在<style>标签内）
使用<link>标签将css样式文件链接到HTML文件内，如下面代码：
<link href="base.css" rel="stylesheet" type="text/css" />
xmp标签可以在网页上显示出html的标签代码
</xmp>

</body>
</html>

