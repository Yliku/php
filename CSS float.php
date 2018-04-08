<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CSS 盒子的浮动属性</title>
	<style>
		.box1{
			width:100px;
			height:150px;
			border:1px solid red;
			background: purple;
			float:left;		/*设置盒子浮动，会脱离普通文本流，会覆盖普通文本流*/
		}
		.box2{
			width:300px;
			height:350px;
			border:1px solid green;
			background: yellow;
			/*clear:left;		清浮动，表示box2的左侧不允许出现浮动，如果有浮动box2将会另起一行，both表示两侧都不允许*/
		}
	</style>
</head>
<body>

	<div class="box1">box1浮于box2之上，而且会挤压box2的文字布局</div>
	<div class="box1">box1浮于box2之上，而且会挤压box2的文字布局</div>
	<div class="box2">box2</div>
	在非IE浏览器（如Firefox）下，当容器的高度为auto，且容器的内容中有浮动（float为left或right）的元素，<br />
	在这种情况下，容器的高度不能自动伸长以适应内容的高度，使得内容溢出到容器外面而影响（甚至破坏）布局的现象。这个现象叫浮动溢出，<br />
	为了防止这个现象的出现而进行的CSS处理，就叫CSS清除浮动。<br />
<pre>
总结：常用的清除浮动的方法。
1、使用空标签清除浮动。我用了很久的一种方法，空标签可以是div标签，也可以是P标签。我习惯用<P>，够简短，也有很多人用<hr>，只是需要另外 为其清除边框，但理论上可以是任何标签。这种方式是在需要清除浮动的父级元素内部的所有浮动元素后添加这样一个标签清除浮动，并为其定义CSS代 码：clear:both。此方法的弊端在于增加了无意义的结构元素。
对于使用额外标签清除浮动（闭合浮动元素），是W3C推荐的 做法。至于使用<br />元素还是空<div></div>可以根据自己的喜好来选（当然你也可以使用其它块级元素）。不过要注意的 是，<br />本身是有表现的，它会多出一个换行出来，所以要设定它的heigh为0，以隐藏它的表现。所以大多数情况下使用空<div>比较合 适。
2、使用overflow属性。此方法有效地解决了通过空标签元素清除浮动而不得不增加无意代码的弊端。使用该方法是只需在需要清除浮动的元素中定义CSS属性：overflow:auto，即可！”zoom:1″用于兼容IE6,也可以用width:100%。
不过使用overflow的时候，可能会对页面表现带来影响，而且这种影响是不确定的，你最好是能在多个浏览器上测试你的页面；
3、使用after伪对象清除浮动。 该方法只适用于非IE浏览器 。具体写法可参照以下示例。使用中需注意以下几点。一、该方法中必须为需要清除浮动元素的伪对象中设置height:0，否则该元素会比实际高出若干像 素；二、content属性是必须的，但其值可以为空，蓝色理想讨论该方法的时候content属性的值设为”.”，但我发现为空亦是可以的。
此三种方法各有利弊，使用时应择优选择，个人习惯于第一种，比较稳定可靠。
参考链接：http://www.cnblogs.com/fengzheng126/archive/2012/05/19/2508778.html
</pre>
</body>
</html>


