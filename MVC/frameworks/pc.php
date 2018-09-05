<?php 
	//启动引擎文件
	$currentdir = dirname(__FILE__);
	include_once($currentdir.'/include.list.php');
	foreach ($paths as $path) {
		include_once($currentdir.'/'.$path);
	}
	
	
 ?>