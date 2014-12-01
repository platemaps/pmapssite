<?php
abstract class Singleton{
	protected static $instance = array();
	protected function __construct(){}
	private function __wakeup(){}
	private function __clone(){}

	public final static function instance(){
		$classname = get_called_class();
		
		if(!isset(static::$instance[$classname]) ||  static::$instance[$classname] == null){
			static::$instance[$classname] = new $classname;
		}

		return static::$instance[$classname];
	}
}
?>