<?php 
	class VIEW{
		private static $view;
		public static function init($view,$config){
			return 0;
		}
		public static function display($template){
			//self::$view->display($template);
			require_once("./tpl/"."$template");
		}
	}


 ?>