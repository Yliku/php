<?php 
//入口文件目录，单一入口机制：所有的访问都得通过该网页来访问
//类的自动加载，sql_autoload_register也可以
//规定统一的URL形式：index.php?controller=控制器名&method=方法名
//例如输入：http://test.com/MVC/libs/index.php?controller=test&method=show，将得到我们想要的结果
require_once('function.php');
/* 初步过滤，过滤非法参数，符号
$controller = daddslashes(	$_GET['controller']	);
$method = daddslashes(	$_GET['method']	);
*/
// 再次过滤，让用户只能传入我们允许/指定的参数
// 定义一个允许访问的数组 ，然后用php的内置函数 in_array($a,$b) 判断传入的变量$a是否在数组$b之中，是的话返回true
$controllerAllow=array('test','index');		//定义允许输入的控制器名
$methodAllow=array('test','index','show');	//定义允许输入的方法名

$controller =	in_array( $_GET['controller'],$controllerAllow	)	?	daddslashes($_GET['controller']	) 	: 'index';
$method = 		in_array( $_GET['method'],	  $methodAllow		)	?	daddslashes($_GET['method']	) 		: 'index';
//三元运算，判断字符串是否存在我们允许的数组里面，是的话使用 daddslashes(	$_GET['controller']	) ，不存在的话使用默认的 index

C($controller,$method); /*调用控制器*/



 ?>