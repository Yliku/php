<?php 
class Smarty{
	public static function display($template){
		require_once('./tpl/'.$template);
	}
}

 ?>