<?php

class AccountController extends BaseController {
	
	public $restful = true;
	
	public function postSignIn()
	{
		$data = array('username'=>Input::get('username'), 'password'=>Input::get('password'));
		if(Auth::attempt($data))
		{
			var_dump("success");
		}
		else
		{
			var_dump("fail");
		}
	}
	
	
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