<?php 
require_once('function.php');
/* 	require_once('./Model/testModel.class.php'); 	
	echo "成功引入testController.class.php文件".'</br>';
	注意此处的路径，如果是在index.php引入的，那引入的就是当前目录./ ，如果是直接在本文件所在目录打开的，那就是上级文件.//了		
	require_once('./View/testView.class.php');
*/
class testController{
	function show(){
		// echo "成功调用show函数".'</br>';
		$testModel = M();
		$data = $testModel->get();
		$testView = new testView();
		$testView -> display($data);
	}
	function show2(){}
	function show3(){}
	function show4(){}
	function show5(){}
}
 ?>