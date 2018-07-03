<?php 
/*
流程：
第一步：人		->	调用控制器，对控制器发出指令
第二步：控制器	->	控制器选取一个合适的模型
第三步：模型		->	控制器通过模型取得相应数据
第四步：控制器	->	控制器传递数据给视图
第五步：视图		->	把数据按照用户想要的样子呈现出来
*/
require_once('testController.class.php');
require_once('testModel.class.php');
require_once('testView.class.php');

$testController = new testController();
$testController->show();


 ?>