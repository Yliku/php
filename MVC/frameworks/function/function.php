<?php 
//当项目很大，存在多个不同的controller/model/view时，我们就可以这样优化程序
	function C($name,$method){ 		/* controller控制函数，MVC架构规范：控制器的方法原则上不允许有参数 */
		require_once('./Controller/'.$name.'Controller.class.php');
		$controller = $name.'Controller';
		$obj = new $controller(); 	//注意此处的$符号需要加！！！留意此处的$controller!!!!!!不用加双引号！！
		$obj->$method();			//注意此处的$符号需要加！！！留意此处的$method!!!!!!不用加双引号！！
	}
	function M($name){ 				/* Model模型函数*/
		require_once('./Model/'.$name.'Model.class.php');
		$model = $name.'Model';
		$obj = new $model(); 
		return $obj;
	}
	function V($name){ 				/* View视图函数*/
		require_once('./View/'.$name.'View.class.php');
		$view = $name.'View';
		$obj = new $view();
		return $obj;
	}

	function ORG($path,$name,$params=array()){
		//path是路径，name是第三方类名，params是该类初始化的时候需要指定或赋值的属性，格式为 array(属性名=>属性值,...)
		require_once('./ORG/'.$path.$name.'class.php');
		$obj = new $name();
		if(!empty($params)){
			foreach ($params as $key => $value) {
				$obj->key = $value;
			}
		}
		return $obj;
	}

	function daddslashes($str){ 	//该函数的作用是对非法字符进行转义，进行初步过滤
		return (!get_magic_quotes_gpc())?addslashes($str):$str;
		/*get_magic_quotes_gpc() 判断当前魔法符号的打开状态，打开的时候函数返回true，
		  魔法符号打开的时候系统会对单引号等特殊符号进行转义，避免addslashes()一起，与造成两次转义
		addcslashes() 在指定的字符前添加反斜杠。 		比如：  addcslashes($str,'m');在字符m前添加反斜杠
		addslashes() 在指定的预定义字符前添加反斜杠。  预定义字符是：单引号 (')双引号 (")反斜杠 (\)
		*/
	}

 ?>