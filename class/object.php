<?php 							//掌握this和self的区别

class A{							//类，不是函数，没有圆括号
	public $name='我的类';		//public公有的、private私有的、protected受保护的
	private $age='20';
	static $height = '170cm';

	const NUM1 = 1;				//定义类常量，只能在类内部使用
	const NUM2 = self::NUM1 +1;	//调用类常量，使用self；
								//总结：this代表这个类实例化后的对象，self代表类本身！！！！！

	public function b1($b1){
		echo $this->name,'<br />';		//this调用实例化后的对象本身，用c语言的来理解就是对象$a的指针，哈哈
		echo  $this->age,'<br />';
		echo self::$height,'<br />';		//self用来访问静态属性
		echo '函数参数：',$b1,'<br />';
	}
	static function b2(){			//静态函数里面不允许使用this,只能用self和parent
		echo self::height,'<br />';
	}
}
$a = new A();						//类的实例化对象，$a为一个对象
//var_dump($a);				
echo '调用参数：',$a->name,'<br /><br />';
echo '调用函数：<br />',$a->b1(3),'<br />';//类中属性的调用，私有和受保护属性不能在外部被调用

//静态属性不需要实例化就可以调用
var_dump(A::$height);
var_dump(A::NUM1);
 ?>