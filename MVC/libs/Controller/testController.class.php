<?php 
require_once('./frameworks/function/function.php');
/* 	require_once('./Model/testModel.class.php'); 	
	echo "成功引入testController.class.php文件".'</br>';
	注意此处的路径，如果是在index.php引入的，那引入的就是当前目录./ ，如果是直接在本文件所在目录打开的，那就是上级文件.//了		
	require_once('./View/testView.class.php');
*/
class testController{
	function __construct(){
		echo '成功new了testController<br>';
	}
	function show(){
		//test控制器，调用的方法和视图肯定也是test开头的，所以M和V函数不用再传递变量，直接传递test即可;
		//每个控制器只指定一个M和V
		$testModel = M('test');
		$data = $testModel->get();
		$testView = V('test');
		$testView -> display($data);
	}
}
 ?>