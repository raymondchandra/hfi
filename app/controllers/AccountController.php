<?php

class AccountController extends BaseController {
	
	public $restful = true;
	
	public function view_login()
	{
		return View::make('pages.login');
	}
	
	public function view_registrasi()
	{
		return View::make('pages.registrasi');
	}

}

?>