<?php
class View extends Singleton{
	private $prop = array();

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

	public static function includeJs(){}
	public static function includeCss(){}
	public static function includeImg(){}
	public static function includeMeta(){}

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