<?php 
/*
类的继承中,
父类private的属性可以被继承,无法在子类中直接调用,但可以通过父类的非静态且非私有方法调用private属性;
父类private的方法同理
当扩展一个类，子类就会继承父类的所有公有和保护方法，如果名字相同，子类的属性或方法会覆盖父类的属性或方法。
*/
class A{		//静态属性和方法的调用,和公有属性的不同地方
	private static $str1='父类的私有静态属性111<br />';	//静态属性和方法不允许对象使用->操作符调用。
	private $str2='父类的私有非静态属性222<br />';
	const PI=3.14;		//类常量，不能更改，常量是属于类的，所以在类里面调用得用self，self是指类，this是指对象
	public static function get1(){		//注意,静态方法中不允许使用$this  和 ->操作符
		return self::$str1;				//而::只能访问类常量、静态属性、静态方法,故get1()只能访问$str1
		//echo self->$str2; //报错:Parse error: syntax error, unexpected '->' (T_OBJECT_OPERATOR)
		//静态属性保存在类空间，非静态属性保存在对象空间!
		//如果一个方法内部没有属于对象空间的属性，那么将封装成静态方法，通过类来调用，此种方法效率会快很多。
	}
	//类中的方法函数可以省略public,类中的方法可以被定义为公有、私有或受保护。如果没有设置这些关键字，则该方法默认为公有public。
	public function get2(){				//如果子类调用了该函数,就能继续访问该父类的私有属性
		echo  $this->str2;				//注意用$this的时候name不用加$
		echo self::$str1;				//非静态方法(函数)可以访问静态属性
		//此为 :通过公共方法(函数)访问私有属性,private只能在内部访问!!!!
	}
}
$a=new A();	//实例化一个对象$a
echo $a::get1();
echo $a->get2();
echo '<br />';



//继承的属性
class B{
	public $name='父类B';
	public $speed=13;
	function get3(){
		return $this->speed +=10;
	}
}
$b=new B();
echo $b->get3();
class B1 extends B{
	public $speed=15; //定义和父类相同的变量,父类的变量会被覆盖,重写写进 子类B1里面,不会改变父类B的属性
	function get4(){
		var_dump($this->speed);	//继承的属性
	}
}
$b1=new B1();
echo $b1->get4();
$b1->name ='公有属性name重新赋值';		//私有属性重新赋值得在类中预先声明 __set($name,$value)魔术方法
echo $b1->name ;

 ?>