<?php 
//当项目很大，存在多个不同的controller/model/view时，我们就可以这样优化程序
	function C($name,$method){ 		/*controller控制函数*/
		echo "没问题".'</br>';
		require_once('./Controller/'.$name.'Controller.class.php');
		$controller = $name.'Controller';
		$obj = new $controller(); 	//注意此处的$符号需要加！！！留意此处的$controller!!!!!!不用加双引号！！
		$obj->$method();			//注意此处的$符号需要加！！！留意此处的$method!!!!!!不用加双引号！！
	}


 ?>