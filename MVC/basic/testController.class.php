<?php 
require_once("testModel.class.php");
require_once("testView.class.php");
class testController{
	function show(){
		$model = new testModel();
		return $model->get();
	}
}
$data = testController::show();
$view = new testView();
$view->display($data);
 ?>