<?php
class Router{
	private $controller = "Index" , 
			$method 	= "Index" , 
			$args 		= null , 
			$params;

	public function __construct(){
		$this->params 	= isset($_GET['params']) ? $_GET['params'] : null;
	}

	private function auditParams(){
		if($this->params != null){
			$exploded 			= explode('/' , $this->params);
			$this->controller 	= array_shift($exploded);
			$this->controller 	= ucfirst(strtolower($this->controller));

			$this->method 		= count($exploded) > 0 ? array_shift($exploded) : $this->method;
			$this->method 		= strtolower($this->method);

			$this->args 		= count($exploded) > 0 ? $exploded : null;
		}

		return $this;
	}

	private function auditController(){
		$filepath = SITE_DIR . "/app/controllers/" . strtolower($this->controller) . ".controller.php";
		if(!file_exists($filepath)){
			$this->controller 	= "Error404";
			$this->method 		= "index";
			$this->args 		= null;

			$this->auditController();
		}

		return $this;
	}

	private function auditObject(){
		$classname 	= $this->controller . "_controller";
		$controller = new $classname;

		if(is_array($this->args)){
			$controller->{$this->method}($this->args);
		}else{
			$controller->{$this->method}();
		}
	}

	public function execute(){
		$this->auditParams()
			->auditController()
			->auditObject();
	}
}
?>