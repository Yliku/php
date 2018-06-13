<?php 
echo "成功引入testModel.class.php文件".'</br>';
class testModel{
	function __contruct(){
		echo "成功new了testModel";
	}
	function get(){
		echo "成功调用get函数".'</br>';
		return 'hello world';
	}
}

 ?>