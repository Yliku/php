<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>float无法撑起父元素高度，设置清除浮动，使父级元素不会塌陷</title>
	<style>		
	.a,.b {	background-color: gray;	  border: solid 1px red;	  }
	.a img,.b img {	float: left;  border: 1px solid green;}
	.a p,.b p {	float: right; border: 1px solid green; }
	
	.b:after{	content: "";   display: table;   	clear: both; 	  } 	/*方法二：添加父元素after伪类*/
	</style>
</head>
<body>

<pre style="font-family: 微软雅黑">
float之父元素高度塌陷
以父元素是div为例。div元素的高度会通过内容自动撑开。也就是说，内容有多少，高度就有多高。
但是当内部元素全部设置了float属性之后，会使父元素高度塌陷，高度变为0，也就是说设置为float的元素不能撑起div的高度。
清除浮动的方法
那么问题来了，如果内部元素要设置浮动，那如何避免父元素高度塌陷的问题呢？
有同学肯定会想，直接在父元素设置高度不就可以了吗？这在实际中是不行的。
因为如果固定了父元素的高度，那如果之后想在其添加内容，不是又要去修改css代码了，特麻烦。

注意：下面div中的文字如果放在图片的代码上面，那显示的效果也会不一样！！！！！！！
因为float属性是在当前行当前行当前行当前行左右浮动，如果float元素的标签之前加了br换行符，float元素将在下一行左右浮动。
1、多个float：left在一起时，会一个个按顺序往left排，float:right同理；
2、float和文本相结合的情况下，要严格按照想排版的顺序，否则根据浏览器窗口大小会出现最下的布局紊乱情况！
float:left时要把float元素的代码放在文本上面！float:right时同理！
</pre>

<div class="a">
	被本文字撑起高度的父级div；float属性：1、float属性不能撑起父级div的高度，2、文本环绕在float周围，float不会盖住文本。
<img src="basis/images/logo.jpg"/>
<p>some text</p>
</div>
<br><br><br><br><hr>

<div class="b">
	<img src="basis/images/logo.jpg" />
	<p>some text</p>
	清除浮动方法一：（推荐）使用CSS的:after伪类，父元素设置伪类after，可以完美兼容当前主流的各大浏览器，<br>
	举例如果浮动元素的容器div的class是.b，这时添加一个.b:after的伪元素style样式，内容为：{content:"";	display:table;	clear:both; }
</div>

<div class="a">
	<img src="basis/images/logo.jpg" />
	<p>some text</p>		
	清除浮动方法二：（次选）在浮动元素后添加div空标签，div空标签的style设置为clear:both，	<br>
	优点：简单，代码少，浏览器兼容性好。缺点：需要添加大量无语义的html元素，代码不够优雅，后期不容易维护。<br>
<div style="clear:both;"></div>	<!-- 方法一：空标签div -->
</div>

<div class="a">
	多个float:left在一起，会一个个按顺序往left排；而且float是在行的左右浮动。试试在此行后加br换行标签。
	<img src="basis/images/logo.jpg" /><img src="basis/images/logo.jpg" /><img src="basis/images/logo.jpg" />		
	<!-- float:left时，文本放在float元素之上会根据浏览器窗口大小使布局紊乱，设置float:right时同理 -->
</div>

</body>
</html>

