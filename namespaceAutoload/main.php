<?php 
spl_autoload_register(	function($classname){
	echo $classname .'<br />';
	echo $a1=str_replace('\\', '/',$classname .".php" );	//如果类文件和此文件放在同一个目录下，就不用使用相对路径！！！
	/*
	str_replace 
	将字符串 $classname .".php" 中的 \ 替换为 /
	
	str_replace("world","Shanghai","Hello world!");
	把字符串 "Hello world!" 中的字符 "world" 替换为 "Shanghai"：
	*/
	echo '<br />';
	require $a1;
	//require str_replace("\\", "/",$classname .".php" );  	//等价于上面两句
});
$a = new models\Imooc();		//不同目录下，得指定命名空间路径（反斜杠），然后经过str_replace转换为实际文件路径（正斜杠）
$b = new Autoload1();			//同一个目录下，能自动require到类文件
var_dump($a);
var_dump($b);

//以下的使用use的写法不太推荐，等同于上面的写法
use models\Imooc10086;	//use关键字的作用就是声明要使用的类所处哪个命名空间之下，将models空间下的类引入到主文件里面，以下将可直接使用引入的类
$c = new Imooc10086();	//注意调用spl_autoload_register传递进去的类名！！居然是  models\Imooc10086 !!!不是 Imooc10086 ,说明use起作用了!!!!!!
						//但建议使用上面不用use的写法 $a = new models\Imooc()，因为这句等价于上面两句
	//【终于明白】相关文章PHP加入命名空间的好处--方便自动加载 https://www.cnblogs.com/xingyazhao/p/7137781.html
 
/*
	表达文件相对路径（正斜杠-除法符号）：1、/是根目录	 	2、./是当前目录		3、../是父级目录；  ../../父级的父级（上上级）目录
	表达命名空间路径（反斜杠-转义字符）：1、\表示全局空间	2、\test表示全局空间下的test空间		3、\test\class1表示全局空间下的test空间里面的class1子空间;
	只有一个反斜杠表示是在全局命名空间里面的，用于命名空间里面调用全局的类、变量/函数等 ;
	比如在test空间（1.php）里面调用 3.php里面的类 ; 
	与调用类不同的是，如果命名空间找不到函数和常量，php会进一步去全局空间找，可以省略反斜杠
*/

 ?>