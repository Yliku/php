<?php 
class indexController{
	function index(){
		$testModel = M('index');
		$data = $testModel->get();
		$testView = V('index');
		$testView -> display($data);
	}
}
 ?>