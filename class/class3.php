<?php 
//类的构造初始化和赋值 、私有属性的访问__get和赋值__set

//1.公有属性调用__construct函数进行初始化赋值
class Car1{
	public $name='汽车';
	public $speed=10;
	public $brand='保时捷';
	function __construct($name1='',$speed1=10,$brand1=''){	//声明要传入的变量
		echo __METHOD__;	//该魔术常量返回类名和方法名
		$this->name=$name1;
		$this->speed=$speed1;
		$this->brand=$brand1;
	}
}
$a1=new Car1('我的第一辆车',20,'宝马');						//初始化赋值操作!!!!
var_dump($a1);
$a1->speed=25;												//为其中一个属性再赋值,覆盖原来属性的值
var_dump($a1);

//2.私有属性访问__get和赋值__set
class Car2{
	private $name='私有汽车';
	private $speed=20;
	private $brand='雷克萨斯';
	public $cost=1000000;
	function __get($name1){		//访问私有属性函数,传递要访问的变量名
		if($name1=='name'){		//注意,判断是否恒等于变量名
			return $this->name;	//返回对应私有属性的值
		}else if($name1=='speed'){
			return $this->speed;	//如果是静态属性,本类得用self访问,上一级类(父类)的属性得用parents
		}else if($name1=='brand'){
			return $this->brand;
		}else{
			echo '找不到对应属性<br />';
			return;
		}
	}
	function __set($name1,$value){		//__set是给某一个私有变量赋值,不是全部赋值,全部赋值只有__construct函数初始化的时候
		$this->$name1 =$value;			//此处是$this->$name1,看懂了吗?
	}
}
$a2=new Car2();
echo $a2->name,'<br/>';	//直接访问私有属性,正常情况下不能访问,但是我们在类中使用了__get,会调用__get函数
echo $a2->speed,'<br/>';	//调用__get函数,将要访问的变量名speed传递给__get中的$name1
echo $a2->brand,'<br/>';	
echo $a2->brand22222,'<br/>';	
var_dump($a2);
$a2->speed=35;			//私有属性赋值,调用__set函数,赋值成功
$a2->cost=2500000;		//公有属性赋值,什么都不调用,直接赋值
var_dump($a2);

 ?>