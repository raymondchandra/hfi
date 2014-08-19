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
					$authId = $user->id;
					$profile = Anggota::where('auth_id', '=' , $authId)->first();
					$cabang = Cabang::where('id', '=' , $profile->id_cabang)->first();
					if($user->status_aktif == 1)
					{
						$status_aktif = "Anggota Aktif";
					}
					else
					{
						$status_aktif = "Anggota Tidak Aktif";
					}
					
					$siteUrl = "//".$profile->situs;
					
					$tanggal_aktif = $user->batas_aktif;
					$result = array('profile' => $profile, 'cabang' => $cabang->nama, 'status_aktif' => $status_aktif, 'batas_aktif' => $tanggal_aktif, 'siteUrl' => $siteUrl);
					//var_dump($result);
					return View::make('pages.profileanggota')->with('data', $result);
					
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

	//newcode
	public function view_profile()
	{
		return View::make('pages.profileanggota');
	}
	//endnewcode
}

?>