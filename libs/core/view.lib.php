<?php
class View extends Singleton{
	private $prop = array();
	private static $linkpattern = '<link rel="%s" type="%s" href="%s" />';
	private static $jspattern 	= '<script src="%s"></script>';
	private static $metapattern = '<meta name="%s" content="%s" />';

	public function __set($var , $val){ $this->prop[$var] = $val; }
	public function __get($var){ return $this->prop[$var]; }

	public function generate($view = null){
		$filepath = SITE_DIR . "/app/views/" . $view . ".view.php";
		foreach($this->prop as $var => $val){
			$$var = $val;
		}


		if(file_exists($filepath)){
			include($filepath);
		}else{
			echo "Template not found";
			exit();
		}
	}

	private static function csspath(){
		return SITE_URL . '/public/css/';
	}

	private static function jspath(){
		return SITE_URL . '/public/js/';
	}

	private static function imgpath(){
		return SITE_URL . '/public/img/';
	}

	public static function js($param , $thirdparty = false){
		$url = self::jspath();
		switch($param){
			case 'bootstrap':
				$url .= 'bootstrap.min.js';
			break;
			case 'jquery':
				$url .= 'jquery.min.js';
			break;
			default:
				if($thirdparty)
					$url = $param;
				else
					$url .= $param;
		}
		echo sprintf(self::$jspattern , $url);
	}

	public static function css($param , $thirdparty = false){
		$url = self::csspath();
		switch($param){
			case "bootstrap" : 
				$url .= 'bootstrap.min.css';
				break;
			default :
				if($thirdparty)
					$url = $param;
				else
					$url .= $param;
		}

		echo sprintf(self::$linkpattern , 'stylesheet' , 'text/css' , $url);
	}

	public static function includeImg(){}

	public static function bootstrapCss(){
		echo '<link rel="stylesheet" type="text/css" href="" />';
	}

	public static function begin(){
		echo "<!DOCTYPE html><html>";
	}

	public static function end(){
		echo "</html>";
	}

	public static function beginHead(){
		echo "<head>";
	}

	public static function endHead(){
		echo "</head>";
	}

	public static function beginBody(){
		echo "<body>";
	}

	public static function endBody(){
		echo "</body>";
	}

	public static function title($title){
		echo '<title>'. $title .'</title>';
	}

	public static function meta($name , $content){
		echo sprintf(self::$metapattern , $name , $content);
	}
}
?>