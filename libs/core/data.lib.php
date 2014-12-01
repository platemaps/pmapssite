<?php
class Data extends Singleton{
	private static $datas = array();
	
	public static function get($var){
		return self::$datas[$var];
	}

	public static function set($var , $val){
		self::$datas[$var] = $val;
	}
}
?>