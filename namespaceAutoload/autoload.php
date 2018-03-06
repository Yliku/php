<?php 
/*
类的自动加载
平时开发建议一个文件放一个类，类名作为文件名。
但实现一个逻辑的时候需要引入很多类文件，因此有了类的自动加载，用类名作为文件名，然后可用以下方法调用
*/
function test($classname){
	echo $classname;				
	require $classname .'.php';				//类文件和本文件放在同一个目录下，直接require,不用使用相对路径
											//不在同一个目录下的时候，详见 main.php文件
}
class TEST{
	public function fun($classname){
		require $classname .'.php';
	}
}
//spl_autoload_register('test');			//参数可以是函数名，调用test函数
//spl_autoload_register([new TEST,'fun']);	//也可以是类，调用实例化类（对象）的fun函数，fun函数后面不用加圆括号.......
spl_autoload_register(	function($classname){		//也可以是命名函数
	echo '调用spl_autoload_register函数成功<br />';
	require $classname .'.php';
});				//函数最后得加分号！！！

$car = new Autoload1();			//新建一个类的对象，查找不到类的时候，会调用spl_autoload_register
var_dump($car);
 ?>