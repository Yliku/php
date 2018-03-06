<?php 
//目前的设计模式有25种左右，熟悉设计模式能大大提高代码质量：以下为其中的单例模式和工厂模式
// 在所有模式设计中，有三种基础设计模式，单例模式，工厂模式，注册树模式，其他模式往往基于这几种模式。

//单例模式（面试中经常被问到）
 //实例化同一个类4次就开辟了4个内存空间，php是一种解释性的脚本语言，这种运行机制使得每一个php页面被执行解释完后所有的相关资源才能被回收
class Test{
	private static $_instance=NULL;	
	final private function __construct(){}	//构造方法如果被私有化private，那么在外部new 时会调用构造方法而导致报错，这个类就无法在类的外部被实例化，
											//但是我们知道private可以在内部进行调用，所以我们在类的内部new时，构造函数可以被调用，可以new成功！！											
	final private function __clone(){}				//同样的克隆方法如果被私有化，那这个类/对象在外部将无法被克隆
	public static function getInstance(){		//创建一个获取唯一类的方法
		if(	!(self::$_instance instanceof self)){	//如果该变量没有被实例化，执行下面语句
			self::$_instance = new self();	//self代表类本身 
		}
		return self::$_instance;				//该方法确保了获取该类的唯一实例
	}
}
$test1=Test::getInstance();		//实例化该类，不能用new了，因为构造方法为私有了，只能通过调用函数getInstance实例化
$test2=Test::getInstance();		//再次实例化该类
$test3=Test::getInstance();		//再次实例化该类
$test4=Test::getInstance();		//再次实例化该类
var_dump($test1);
var_dump($test2);
var_dump($test3);
var_dump($test4);				//结果全部都相同，说明该类只被实例化一次
//至此真的完成了么?还不算~如果有个类继承本类，将构造方法申明为public那不又坏事儿了？那有必要在构造方法前加final关键字了，final表示不能被继承。
 ?>


<?php
// instanceof 用于确定一个 PHP 变量是否属于某一类 class 的实例 , 返回true或者false
class MyClass{}
class NotMyClass{}
$a = new MyClass;
var_dump($a instanceof MyClass);			//输出bool(true)
var_dump($a instanceof NotMyClass);		//输出bool(false)
?>

<!-- 
设计模式分为三种类型，共23种。
创建型模式：单例模式、抽象工厂模式、建造者模式、工厂模式、原型模式。
结构型模式：适配器模式、桥接模式、装饰模式、组合模式、外观模式、享元模式、代理模式。
行为型模式：模版方法模式、命令模式、迭代器模式、观察者模式、中介者模式、备忘录模式、解释器模式（Interpreter模式）、状态模式、策略模式、职责链模式(责任链模式)、访问者模式。 
-->

<?php 
//工厂模式
//比如想创建一个缓存类
class Memcache{
	public function set($k,$v){}	//设置
	public function get($k){}		//获取
	public function delete($k){}	//删除

}
class Cache{
	public static function factory(){
		return new Memcache();
	} 
}
//当我们需要操作缓存的时候，我们就需要新建一个缓存对象，调用对象中的方法
$a1=Cache::factory();	//通过类的静态函数新建对象，这样对象的类就算名称修改了也不影响，常用于新建很多对象的项目中使用
var_dump($a1);			//很多时候我们会新建很多对象散落在代码中，如果我们改了类名了，那就麻烦了，项目中有几百个文件，那一个个去翻来修改得浪费多少时间和精力，所以工厂模式就被设计出来了

 ?>