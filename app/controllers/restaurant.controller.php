<?php
class Restaurant_controller extends Controller{
	public function index(){
		$view = View::instance();
		$view->greet = "Hello world";
		$view->generate("restaurant");
	}

	public function kemana(){

	}
}
?>