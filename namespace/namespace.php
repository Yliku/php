<?php 
//存在两个文件  1.php(位于test目录下)和2.php(位于test\class目录下)，两个文件下都有一个类名字相同	class A{}
//当主文件包含两个文件时，相同的名字的类会导致报错
include '1.php';
include '2.php';
echo '<br /><br />';
//这时得用'namespace+空间名'，放在php代码的第一行，以示区分
//当前脚本文件的第一个命名空间前面不能有任何代码（见1.php），为什么要说第一个命名空间呢？因为同一脚本文件中可以创建多个命名空间。
var_dump(new \test\A());			//调用test空间下（1.php中）的类A
var_dump(new \test\class1\A());	//调用test\class1子空间下（2.php中）的类A
/******************  只有一个反斜杠表示是在全局空间里面的，用于命名空间里面调用全局的变量/函数等 **********************/
/******************  比如在1.php的test空间里面调用 namespace.php里面变量/函数 **********************/
/*
以下类型会收到命名空间的影响：
类（包括抽象类、traits）、接口、
函数和常量（仅限const定义的常量，define定义的常量是全局的，不受命名空间影响）
*/
test\p();				//调用test空间下的p()函数
echo 'const定义的局部常量ID1的值：',test\ID1, '<br />';	//调用test空间下的局部常量
echo 'define定义的全局常量ID2的值：',ID2, '<br />';		//调用test空间下的全局常量，全局常量不受命名空间影响
echo 'define定义的全局常量ID3的值：',ID3, '<br />';		

//每次使用 空间名+函数/常量 会很麻烦，因此引入 use关键字
//use关键字与文件加载没有一点关系，use关键字的作用就是声明要使用的类所处哪个命名空间之下
use test\A;				//将test空间下的类A引入到主文件里面，将可直接使用，
use test\class1\A  as A2 ;	//另一个test\class目录下的A使用as起别名为A2
use function test\p;		//将test空间下的函数引入，引入函数得加function
use const test\ID1;		//将test空间下的常量引入，引入常量得加const 

var_dump(new A());		//调用1.php中的类A，使用use后此行等价于  var_dump(new test\A());
var_dump(new A2());		//调用2.php中的类A
p();					//调用test空间下的函数p();
echo ID1,'<br />';		//调用test空间下的常量ID1;

/*
使用建议
定义和导入命名空间的时候，统一不加前导\
所有的类都使用use导入，包括全局类，只命名空间类，有冲突的就as一下
禁止直接使用相对命名空间

namespace bookrpg\config;	//正确
namespace \bookrpg\config;  	//错误，最前面不能有前导\
use \Exception; 				//可以有前导\，但不建议加

 */
 ?>