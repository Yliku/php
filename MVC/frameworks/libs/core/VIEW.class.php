<?php 
	class VIEW{
		private static $view;
		public static function init($view,$config){
			self::$view = new $view();
		}
		public static function display($template){
			self::$view->display($template);
		}
	}


 ?>