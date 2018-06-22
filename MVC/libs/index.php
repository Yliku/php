<?php 
//入口文件目录，单一入口机制：所有的访问都得通过该网页来访问
//类的自动加载，sql_autoload_register也可以
//规定统一的URL形式：index.php?controller=控制器名&method=方法名
require_once('function.php');
$controller = $_GET['controller'];
$method = $_GET['method'];
C($controller,$method); /*调用控制器*/



 ?>