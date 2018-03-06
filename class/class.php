<?php

class Car {		//类名的第一个字母大写
	public $name ='汽车';		
	const NUM='车牌号：粤AB9999';		//类的常量，常量属于类本身的，不是属于对象，在类中调用需使用静态调用self::NUM
	/*
	在类中定义变量和方法(函数)必须使用其中之一：public/protected/private/var
	public 表示全局，类内部外部子类全都可以访问；
	protected表示受保护的，只有本类或子类或父类中可以访问；
	private表示私有的，只有本类内部可以使用；
	*/
	//现在基本都是使用public来代替var
	//public $name ='汽车';   现常用public,var基本不用
	function get(){
		return $this -> name;	//return可用可不用,用了表示这个函数有返回值,不用函数的返回值是NULL
	}
}//类的最后不用加分号
$car = new Car();				//实例化一个类，实例化后的$car我们称为对象
$car->name='Rolls-Royce';	//注意php数组中是 => ，类中是 -> 
echo $car ->get();
echo $car::NUM;				//调用类的常量 ，使用静态调用::
echo '<br /><br />';
/*
  *关键字class，类名要大写， 变量声明用  var ， 实例化 用new   ，访问方法用 ->.
    类和对象，类就像c语言的结构体，对象就像c语言用结构体定义的变量

public和var的作用差不多,因为 var定义的变量如果没有加protected 或 private则默认为public
php4 中一般是用 var
php5 中就一般是用 public了
现在基本都是使用public来代替var
var是定义变量的；而public是定义property(属性)和method(方法)的可见性的
在php4的类中用var定义的变量必须在定义时或在类的构造函数中进行初始化
*/
$abc1=$car;	//注意，对象和普通变量不一样，此处代表的意思是，将$car指向的地址赋值给$abc1，所以如果通过$abc1更改对象的值，$car指向相同的值也被改变了
$abc2=clone $car;	//这才是对象的复制！！将$car指向的对象复制一份给$abc2

//类中的 构造函数  和 析构函数!			两个下划线开头的函数表示该函数是php内置的函数
class Car1{
	function __construct(){			//真是卧槽了,construct前面是两个下划线!!!!!!!!
									//构造函数顾名思义,是变量在被构建/创建的时候就会调用的函数~
									//构造方法如果被私有化private，那这个类将无法被实例化！！！！！！！！！！！！！！！！！
		print"构造函数被调用\n\r";	//换行符无效..........见以下
	}								//如果子类有自己的构造函数，不会覆盖掉父类的构造函数，可以用parent调用父类的构造函数：  parent::__content();
	function __destruct(){			//同样destruct前面是两个下划线.....
		print "析构函数被调用";		//析构函数顾名思义,是变量在被销毁(分崩离析)时会被调用的函数~
	}
	public $name='汽车2号';
}
$car1 = new Car1();					//实例化(定义)的时候 会自动调用构造函数__construct，这里会输出其内容
echo $car1->name;
echo '<br />注销变量<br />';
unset($car1);						//如果此处没注销变量,那在整个php页面执行完后,变量也会被释放,这时最后将调用析构函数
echo '<br />hello<br />';
/* 
	PHP中两个下划线的还有以下(包含但不仅限):
	__LINE__文件中的当前行号。
	__FILE__文件的完整路径和文件名。
	__DIR__文件所在的目录

	echo "<br />";//在网页上(html页面)输出可以换行
	echo "\n";//在文本域，写入txt时可以换行,网页(html页面)上不能换行,但在 html源代码 上会显示换行

	<pre></pre>标签有什么作用:
	按什么样的格式写的，在pre里就怎样显示,	简单的说，换行和空格在这个标签里可以显示。
	普通的标签里空格必须用  来代替，换行必须用<br>来表示，这个标签里你直接手敲空格和回车就能显示出来
	
	被包围在 pre 元素中的文本通常会保留空格和换行符。而文本也会呈现为等宽字体。
	举例:
	<pre>文        本</pre> 在html上显示的就是: '文        本';
	而'文        本'在html上显示的就是:'文 本'.

	<pre> 标签的一个常见应用就是用来表示计算机的源代码。
*/

?>

<pre>1 2
3</pre>
