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
	
	public function view_about()
	{
		return View::make('pages.admin.home.about');
	}
	
	public function view_visi()
	{
		return View::make('pages.admin.home.visi');
	}
	
	public function view_misi()
	{
		return View::make('pages.admin.home.misi');
	}
	
	public function view_regulasi()
	{
		return View::make('pages.admin.home.regulasi');
	}
	
	
	

}

?>