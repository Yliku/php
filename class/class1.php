<?php 
//类与继承、类的定义与调用、类中的静态属性
/*
类中定义变量和方法
在类中定义变量和方法(函数)必须使用其中之一：public/protected/private
public 表示全局，类内部外部子类全都可以访问；
protected表示受保护的，只有本类或子类或父类中可以访问；
private表示私有的，只有本类内部可以使用,私有属性和方法能继承,但无权被调用,可通过调用父类的方法进行访问!!!

调用类中的变量和方法
static:	修饰类的属性，该属性将变为类的属性，不用实例化也可调用，通过static修饰属性：static $name ，后使用'类名::$name '调用，例  Car::name
		注意： static修饰的function（静态方法）中不可使用$this!!!!!静态方法只能调用静态属性
$this :	代表对象本身（类的实例化），可加->来调用/访问当前对象或对象的父类中可调用的属性和方法,不能调用静态属性和静态方法，例  $this->name
self:	代表类本身（不是类的对象），用来调用本类或父类中的静态属性和静态方法，可以不用实例化，例  self::name
parent:	代表父类的类本身（不是类的对象），用来调用父类中的静态属性和静态方法，可以不用实例化

*/
class Car1{
	public $name='父类1';
	function  get(){
		//类中的function叫方法,面向过程的程序设计中function叫做函数，在面向对象中function我们则被称之为方法。
		return $this ->name;			//return 如果不加,调用函数将返回空,此处的name不加$
	}
}
$car1=new Car1();
echo $car1->name , $car1->get(),"<br />";		//注意!!!!调用的name不用加$

class Car2{			
	public static $name='父类2';		//类中的静态变量，加上static为类属性，属于这个类，可直接通过类名调用，不用实例化
	public $brand='雷克萨斯';			//brand品牌,branch分支/支流		
	private $num='001';
	public static function  get(){
		return self::$name;
		//return 可加可不加,不加函数get()的返回值是空,以下的echo调用本函数将输出空白
		//注意!!!!此处的name需要加$ 
		//echo $this->brand; 错误!!静态函数(方法)中,伪变量$this不允许使用
	}
}
echo 'static为类属性，属于这个类，可直接通过类名调用:',Car2::$name,"<br />";
echo '不实例化类(只有声明没有定义)的情况下调用:',Car2::get(),"<br />";	//静态调用-----静态属性与方法可以在不实例化类的情况下调用
$car2=new Car2();					//实例化/创建(定义)
echo '实例化(定义)类后调用静态方法:',$car2::get(),"<br />";					//动态调用-----实例化后静态方法的调用,静态属性和方法不允许对象使用->操作符调用,只能用::。
var_dump($car2);					//静态变量没被打印出来!!!!!!

/*
静态、动态调用都指类、对象对其方法的调用，
动态指的是创建（new）了对象，然后用对象变量去调用方法；
静态则是没有创建对象，直接用类名去调用。
*/

echo '<br />继承举例:<br />';
class Car3 extends Car1{				//Car3继承Car1,Car1为父类,Car3为子类
	public function start(){
		echo '子类的函数<br />';
		echo '访问父类的static(静态)函数:',parent::get(),self::get(),'<br />访问父类的public(公开)变量:',$this->name;	
		//parent是用来访问父类中的静态属性和静态方法,$this可以调用本类中的方法和属性，也可以调用父类中的可以调用的方法和属性	
	}
}		//注意大括号啊!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$car3=new Car3();
echo $car3->start();

//如果不希望某个类或者类中的某个元素/函数被继承，可使用关键字 final 加在类或者函数最前面
final class Car4{
	public function start(){
		echo '不可被继承的类';
	}
}
class Car5{
	final public function start(){
		echo '不可被继承的函数';
	}
}
 ?>