<?php

define("SITE_URL" , defineurl());

function defineurl(){
	if($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1'){
		return 'http://'. $_SERVER['SERVER_NAME'] . '/' . SITE_LOCAL_FOLDER;
	}else{
		return 'http://'. $_SERVER['SERVER_NAME'] . '/'. SITE_LOCAL_FOLDER;
	}
}

function __autoload($classname){
	$classexp = explode("_" , $classname);
	$classpath = null;

	if(count($classexp) > 1){
		switch($classexp[1]){
			case "controller" :
				$classpath = SITE_DIR . "/app/controllers/" . strtolower($classexp[0]) .".controller.php";
			break;
			case "model" :
				$classpath = SITE_DIR . "/app/models/" . strtolower($classexp[0]) . ".model.php";
			break;
			default :
				$classpath = SITE_DIR . "/libs/core/" . strtolower($classexp[0]) . ".lib.php";
		}
	}else{
		$classpath = SITE_DIR . "/libs/core/" . strtolower($classexp[0]) . ".lib.php";
	}

	include($classpath);
}
?>