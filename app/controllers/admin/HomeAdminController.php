<?php

class HomeAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		return View::make('pages.admin.home.slideshow');
	}
	
	public function view_slide()
	{
		return View::make('pages.admin.home.slideshow');
	}
	
	
	public function view_welcome()
	{
		return View::make('pages.admin.home.welcome');
	}
	
	
	

}

?>