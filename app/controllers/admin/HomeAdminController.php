<?php

class HomeAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		return View::make('pages.admin.home.slideshow');
	}
	
	
	

}

?>