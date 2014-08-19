<?php

class AccountController extends BaseController {
	
	public $restful = true;
	
	public function postSignIn()
	{
		$username = Input::get('username');
		$password = Input::get('password');
		$data = array('username'=>$username, 'password'=>$password);
	
		if(Auth::attempt($data))
		{
			$user = Account::where('username', '=', $username)->first();
			
			
			if($user->status_aktif == 1)
			{
				if($user->role == 0)
				{
					echo("success user normal");
				}
				else
				{
					echo("success user admin");
				}
			}
			else
			{
				echo("need to re activated");
			}
		}
		else
		{
			echo("fail");
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