<html>	
	<head>	
		<title>html基础</title>
	</head>		
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<!-- 用sublime写程序，输出到网页预览时，得在html中加入这句，不然浏览器无法识别会显示为乱码，
	或者文件保存为utf-8 ，浏览器现在一般都会默认识别为utf-8 -->
										<!-- HTML标签的注释,这注释符号真奇葩 -->
<style>
	/*body, input, button,xmp,pre{font-family:Microsoft Yahei;} */		/*CSS样式之：设置标签的字体为微软雅黑，英文的书写兼容性好*/
	input{height:30px;border:1px solid gray;border-radius:4px;} 		/*设置边框的高度 和 圆角属性*/
</style>
<body bgcolor="#BEBEBE">					<!-- 设置背景颜色 -->
<strong>sublime中输入!按Tab会自动补齐html的主体代码 <br /></strong>
<a href="https://baidu.com" title="title鼠标停留在这时显示的文字" >a标签：超链接标签-跳转百度<br /></a>		<!-- br /为html中的换行符,最规范的写法,不要写成br -->	
<q><a href="https://zhuanlan.zhihu.com/p/22231471" title="在新建网页打开，查看漏洞介绍以及修复方法" target="_blank">《被低估的 target="_blank" 漏洞》</a></q><br />	
<a href="mailto:367336561@qq.com ?subject=邮件主题 &body=邮件内容" title="title说明，点击发送邮件">发送邮件<br /></a>		
<!-- 试试看不加https://的效果，或者换成www.   href是Hypertext Reference的缩写-->
<!-- target="_blank" 在新的窗口打开，其使用是一门很深的学问，千万不要对于所有的元素都一概而论，打个比方：
比如google在处理分页的时候使用target="_blank"，想象一下会是什么样的后果；
而在处理搜索结果列表的时候使用target="_blank"却又是一件很惬意的事。所以得针对不同的对象谨慎使用target="_blank"。

 -->
<q>q标签（quote）：短文本的引用；给浏览器知道的，该标签浏览器会识别为引用的内容，浏览器会自动加上双引号</q>
<blockquote>blockquote标签：长文本的引用；该标签浏览器会识别为引用的内容，不会自动加上双引号，会分段且左右缩进</blockquote>
<p>p标签：段落1</p>
<p>p标签：段落2；注意两个段落之间的距离</p>								<!-- 注意两个段落之间的距离 --> 

<ul>
	<li>ul-li标签：无序列表；常用于无需排序的文章标题列表</li>
	<li>1、前面会自动添加园点</li>
	<li>2、另起一行，注意不是另起一段，段与段之间是有间隙的</li>
	<li>3、li是list item，ol是ordered list，ul是unordered list无序列表</li>
</ul>
<ol>
	<li>ol-li标签：有序列表；常用于文章阅读量排行榜</li>
	<li>1、前面自动添加序号，默认序号从1开始</li>
	<li>2、另起一行，<strong>留意ul和ol的区别</strong></li>
</ol>

<em>em标签（emphasize）：强调-斜体<br /></em>			<!-- emphasize 强调、着重 -->
<strong>strong标签：加强版强调-粗体<br /></strong>		<!-- 比em更加强调 -->
<address>address标签：地址标签，斜体且另起一行；该标签会让浏览器识别这是地址，地址；北京市丰台区xx大街xx号</address>
<pre>pre标签：可以保留文本中的所有格式，包括多少个空格和回车，
因为html里面无论同时输入了多少个空格和回车，都会被当成一个空格来显示，而在pre标签中会保留所有格式：
5个空格：     。
1个空格： 。
如果不想用pre标签来输出空格，可以用& nbsp;来输出空格！注意分号！！nb(牛逼)sp(space) 好牛逼的空格!哈哈哈，其实是& nbsp;no-breaking space:不间断空格
</pre>
hr /标签（horizontal rule水平线）：水平分割线；空标签，和换行br标签一样，只有结束标签
<hr />	
<div style="border:1px solid red">div块占据整个页面的一整行，看css框样式的生效范围
	<div >div标签（divide）：把某个区域框起来，并另起一行，可通过css进行该区域样式的装饰，使每个区域呈现不同的效果</div>
	<div>div标签：就是一个框，将里面的东西框起来，然后通过css来使这个框按照所需要的样式显示出来</div>1234另起一行 <div>4567另起一行</div>
	<div>div标签形象的比喻：html=页面的家，div=页面的房间，css=对房间的装饰</div>
	span标签：<span>你看该标签把数据</span>连在一起了，不会和div标签一样另起一行；
	<div id="区别" style="text-align:center;">	<!-- id为每个div板块添加名称 -->
	div和span区分：
		<div style="border:1px solid gray;text-align:center;color:purple">
		两个都是用来划分区间但是没有实际语义的标签，相同之处就是都可以通过css来修饰其中的内容；	内联式CSS样式写在html标签的style=""中以示区分；<br />
		差别就在于div是块级元素，不会其他元素在同一行；<span>而span是内联元素~</span>可以与其他元素位于同一行~<br />
		</div>
	</div>
	哈哈
</div>
<!-- img 是html中的单标签：单标签得加空格和斜杠!!!!	
	单标签的有：<br>换行<hr>水平线<img>插入图片<input>输入框<param>对象<meta>元信息<link>定义文档与外部资源的关系	 --> 	
<img src="./basis/chicken1.jpg" alt="啊哦，图片被吃了" title="chicken图片" height=200/>		
										<!-- 插入图片,本地图片放在根目录下的可以直接访问 --> 	
										<!-- alt是alternate(替换)src就是 source（来源），这里是指图片地址 --> 				
<img src="./basis/images/couple.jpg"  height=200 />	<!-- 当图片位置和源代码的父文件夹位置在同一父文件夹时候 应先返回父级文件夹../ 因此src地址填"../images/baby.jpg" -->			

<form>								<!-- 插入表单单单单单单 --> 
<label for="usernameID">登录名:</label>	<input type="text" name="username" id="usernameID">		<!-- label标签：当鼠标点击label中间的文字时，会跳转到for指向的id控件 -->
<label for="passwordID">密  码:</label><input type="password" name="password" id="passwordID">	
<input type="submit" value="登录" name="submit">		<!-- 比较name和value的区别，value是显示在网页上的值，name是用来传输数据到后台用于后台辨别的 --> 
<input type="reset" value="重置" name="reset">		
<input style="width:50px">

<br><label for="msgID">文本域textarea：</label><br>
<textarea name="msg" id="msgID" cols="40" rows="4" style="resize:none">请在此处输入</textarea>		<!-- column列 row行，style="resize:none"禁止文本框拉伸 -->
<textarea name="msg" id="msgID" cols="30" rows="4" placeholder=" 请登录后再开始你的表演！"></textarea>
<button style="border:none;">button标签，特殊样式border:none，好像没什么用，点击后会跳转刷新页面</button>

<br>单选（radio）你喜欢旅游吗？<br>
<input type="radio" name=	"liketravel" value="喜欢">喜欢						<!-- 注意单选的name需要一样，复选需要不同 -->
<input type="radio" name=	"liketravel" value="不喜欢">不喜欢					<!--  当 type="radio" 时，控件为单选框；  当 type="checkbox" 时，控件为复选框 -->
<input type="radio" name=	"liketravel" value="无所谓" checked="checked">无所谓

<br>多选（checkbox）下面的运动你喜欢哪些？<br>
<input type="checkbox" name="likesport1" value="跑步" checked="checked">跑步	 <!-- checked="checked"默认选中 -->
<input type="checkbox" name="likesport2" value="游泳">游泳
<input type="checkbox" name="likesport3" value="旅游">旅游
<input type="checkbox" name="likesport4" value="打篮球">打篮球

<br>下拉（select）你今年是否满18周岁？<br>
<select name="age" id="age1">
	<option value="是">是</option>
	<option value="否">否</option>
	<option value="不告诉你" selected="selected">不告诉你</option>				<!-- selected="selected"默认选中 -->
</select>
</form>								
								
<pre>
	html语法：< table border="1" cellspacing="0">
	html语法中设置属性的值/样式用<strong>属性名+等于号</strong> 来设置，属性的值用双/单引号括起来，比如<  table border="1" cellspacing="0"  >。
	html中两个属性之间用<strong>空格</strong>区分（不在双引号内的两个属性）比如后面的id和style属性：  < div id="top" style="width:100;pxheight:200px;">< /div>  这里的style开始是css样式
	css 语法：div{width:200px;height:200px;border-width:2px;border-color:#00F;}
	css 语法中设置属性的值/样式用<strong>属性名+冒号</strong> 来设置；
	css 中两个属性之间用<strong>分号</strong>区分；
</pre>	
<!--
cellspacing代表标签tr，td之间的空隙
 border=1设置包括标签table，tr，td的边框粗细，
 border属性有三个子属性：线宽 线型 颜色，举例：{border:1px solid red}
1px表示边框的宽度为1像素； 
solid表示边框的样式为实线；
red是边框的颜色。
-->	
<table style="margin:0 auto" border="1" bordercolor=red cellspacing="0" summary="插入简介，语义化：不会在浏览器显示出来，用于增加表格可读性，使搜索引擎更好的读懂内容，使屏幕阅读器帮助用户读取表格内容">	
									<!-- 插入表格格格格格格 -->
									<!-- margin:0 auto 设置表格左右水平居中 -->
<caption>数学成绩对比</caption>									<!-- caption表格的标题 -->
<tr><th>序号</th><th>姓名</th><th>科目</th><th>成绩</th></tr>		<!-- th: 表格表头，加粗table header cell；tr: 行table row；td: 单元格table data cell -->
<tr><td>001</td><td>陈赫</td><td>数学</td><td>21</td></tr>
<tr><td>002</td><td>热巴</td><td>数学</td><td>999</td></tr>
</table>

<?php 
date_default_timezone_set("Asia/Shanghai");		
//显示的时间比实际时间小8小时，原因很可能是因为服务器显示的是格林威治时间。比北京时间小八小时。
//服务器位于其他国家或者被设置为不同时区，得添加以上代码，把时区设置为上海。
echo  date("y-m-d H:i:s",time());	//得用双引号！！！大写的H表示输出24小时制，小写h表示输出12小时制
 ?>



</body>

</html>


<style>
	*{margin:0;padding:0;font-size:12px;}
	textarea{resize:none;} 		/*禁止文本框拉伸*/
	a{text-decoration:none;} 	/*取消字体修饰样式，在这里是清除超链接的默认下划线*/

</style>