<?php 
	define('HOST','127.0.0.1');	//定义常量，常量大写！
	define('USERNAME','root');	
	define('PASSWORD','123');	
	header('Content-type:text/html;charset=utf-8');	
	//表示当前的文档是utf8格式，请以utf8的格式输出，这样的话汉字就不会变成乱码了
	date_default_timezone_set("Asia/Shanghai");        
	//显示的时间比实际时间小8小时，原因很可能是因为服务器显示的是格林威治时间。比北京时间小八小时。
	//服务器位于其他国家或者被设置为不同时区，得添加以上代码，把时区设置为上海
 ?>