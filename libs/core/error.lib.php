<?php
class Error{
	public static function log($err){
		$today = date("Y-m-d");
		$filepath = SITE_DIR . "/logs/errors/error_". $today .".log";
		$message = null;
		$code = "none";

		if(is_object($err)){
			$code = $err->getCode();
			$message = $err->getMessage();
		}else{
			$message = $err;
		}

		$log = "Code=". $code .";Message=". $message .";time=". date("H:i:s") .";|";

		if(!file_exists($filepath)){
			$file = fopen($filepath, "w");
			fclose($file);
		}
		error_log($log , 3 , $filepath);
	}
}
?>