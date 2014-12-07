<?php
class View extends Singleton{
	private $prop = array();
	private static $csspattern = '<link rel="stylesheet" type="text/css" href="%s" />';
	private static $jspattern = '<script src="%s"></script>';

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

	public static function includeJs(){}

	public static function includeCss($param , $thirdparty = false){
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

		echo sprintf(self::$csspattern , $url);
	}

	public static function includeImg(){}
	public static function includeMeta(){}

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

}
?>