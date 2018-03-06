<?php 
//后期静态绑定
class A{
	static function fun(){
		echo 'A类的静态方法<br />';
	}
	static function test(){
		static::fun();		//static的另一个用法，用哪个类来调用的就是用哪个类的
	}
}
class B extends A{			//继承A的属性和方法
	static function fun(){	//类B的方法名和类A的方法名一样
		echo 'B类中的静态方法<br />';
	}
}
B::test();	//调用继承的静态方法，输出结果为调用类B的函数fun()，如果static改为self，将会是调用类A的函数fun()

//类型约束——类的对象作为函数参数传递给函数
class C{
	function  fun123(){
		echo '类型约束——类的对象可作为函数参数传递给函数<br />';
	}
}
function test(C  $a){		//声明test函数，约束其参数只能是类C的对象
	$a->fun123();
}
test(new C());			//调用test函数
 ?>