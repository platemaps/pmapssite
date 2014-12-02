<?php
define("SITE_NAME" 		, "platemaps.com"); 	//setting nama website
define("SITE_DB"			, "platemaps");		//setting nama database
define("SITE_DB_DRIVER"		, "");			//setting driver pdo
define("SITE_DB_HOST"		, "localhost");		//setting nama host
define("SITE_DB_USERNAME" 	, "root");			//setting username database
define("SITE_DB_PASSWORD"		, "");			//setting password database
define("SITE_LOCAL_FOLDER"		, "platemaps");		//setting local folder , diubah sesuai nama folder di local
define("SITE_UNDER_MAINTENANCE"	, false);			//setting status maintenance
define("SITE_DIR" 			, __DIR__); 		//jangan di ubah

require("libs/core/setting.lib.php");
?>