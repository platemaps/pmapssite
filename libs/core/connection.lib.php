<?php
class Connection extends Singleton{
	private $engine;

	protected function __construct(){
		$dsn = SITE_DB_DRIVER . ":host=". SITE_DB_HOST .";dbname=". SITE_DB;
		$this->engine = new PDO($dsn , SITE_DB_USERNAME , SITE_DB_PASSWORD);
		$this->engine->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
	}

	public function engine(){
		return $this->engine;
	}
}
?>