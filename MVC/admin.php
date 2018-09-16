<?php 
//入口文件
	header("Content-type:text/html;charset=utf-8");
	session_start();
	require_once('config.php');
	require_once('frameworks/pc.php');
	PC::run($config);
 ?>