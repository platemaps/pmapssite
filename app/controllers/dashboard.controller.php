<?php
class Dashboard_controller extends Controller{
	public function index(){}
	public function access(){}
	public function user(){}
	public function setting(){}
	public function restaurant(){}
	public function foodtype(){}
	public function cuisine(){}
	public function comments(){}
	public function images(){}

	public function my(){
		/*
			url pattern -> my/ 
				- show company profile
				- show total restaurant
				- show total menu
				- show total comment that user have
				- show her latest comment
				- show rating each restaurant that her has
		*/
	}

	public function stakeholder(){
		//url pattern -> stakeholder/ <- show total company, total restaurant, highest rating restaurant
		//url pattern -> stakeholder/company/ <-- show all company
		//url pattern -> stakeholder/company/company_id/ <-- show spesific company
		//url pattern -> stakeholder/company/company_id/restaurant/ <!-- show all restaurant that company have
		//url pattern -> stakeholder/company/company_id/restaurant/restaurant_id <-- show spesific restaurant that company have
		//url pattern -> stakeholder/company/company_id/restaurant/restaurant_id/menu/ <-- show menu in spesific restaurant
	}
}
?>