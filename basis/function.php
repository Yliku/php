<?php 
//本文件存放php函数
//substr("$str",2,3):返回字符串的子串，两个参数：正数代表从左到右，负数代表从右到左！！！
//第一个参数代表从哪开始，正数表示：从左到右的第x个字符开始返回所有字符；负数表示：从右到左
//第二个参数可不写，正数代表从左到右（最左） 保留 x个字符，负数代表从右到左（最右） 减少 x个字符；
echo substr("abcdef",2),'<br>'; 	//从左到右的第2个字符开始返回所有字符
echo substr("abcdef",-2),'<br>'; 	//从右到左的第2个字符开始返回所有字符
echo substr("abcdef",0,2),'<br>';	//从左到右的第0个字符开始返回所有字符，从左到右（最左）保留2个字符
echo substr("abcdef",1,-2),'<br>';	//从左到右的第1个字符开始返回所有字符，（最右）减少2个字符
echo substr("abcdef",-4,3),'<br>';	//从右到左的第4个字符开始返回所有字符，从左到右（最左）保留3个字符
echo substr("abcdef",-4,-1),'<br>';	//从右到左的第4个字符开始返回所有字符，（最右）减少1个字符

echo __FILE__.'<br>';							//输出本文件的绝对路径
echo '文件名：'.$_SERVER['PHP_SELF'].'<br>'; 	//输出本文件的相对路径；
echo '文件名：'.basename($_SERVER['PHP_SELF']).'<br>'; 	//输出本文件名，basename返回值是该文件名
echo '浏览器属性：'.$_SERVER['HTTP_USER_AGENT'].'<br>';
echo '服务器名称：'.$_SERVER['HTTP_HOST'].'<br>';		//输出主机地址，尽量使用该函数，本网页地址：http://test.com/basis/function.php
echo '服务器名称：'.$_SERVER['SERVER_NAME'].'<br>';	//输出主机地址，不太推荐使用该函数，最好使用上面的函数

$a=array(1,2,3,4,4,4,5,5,6);
$b=array_count_values($a); 			//本函数计算$a中所有值出现的次数，生成一个新的数组！！！
var_dump($b);						//新的数组是 $b={1=>1,2=>1,3=>1,4=>3,5=>2,6=>1,};
echo $b[4].'<br>';

class A{
	public static $num=0;
	public function __construct(){
		self::$num++;	}
}
new A();
new A();
echo A::$num;


 ?>
