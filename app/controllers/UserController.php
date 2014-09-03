<?php
class UserController extends BaseController {
	
	public $restful = true;
	
	public function view_profile()
	{

			$authId = Auth::user()->id;
			$profile = Auth::user()->profile;
			//Anggota::where('auth_id', '=' , $authId)->first();
			$cabang = Cabang::where('id', '=' , $profile->id_cabang)->first();
			if(Auth::user()->status_aktif == 1)
			{
				$status_aktif = "Anggota Aktif";
			}
			else
			{
				$status_aktif = "Anggota Tidak Aktif";
			}
			
			$siteUrl = "//".$profile->situs;
						
			$tanggal_aktif = Auth::user()->batas_aktif;
			$result = array('data' => $profile, 'cabang' => $cabang->nama, 'status_aktif' => $status_aktif, 'batas_aktif' => $tanggal_aktif, 'siteUrl' => $siteUrl);
			$arr = $this->setHeader();
			return View::make('pages.profileanggota', compact('arr'))->with('data' , $result);
	}
	
	public static function getHeaderName($id)
	{
		
		$profile = Account::find($id)->profile;
		return $profile->nama;
		if($profile != null)
		{
			return $profile->nama;
		}
		else
		{
			return "error";
		}
	}
	
	public static function getProfileId($auth_id)
	{
		$profile = Anggota::where('auth_id', '=' , $auth_id)->first();
		if($profile != null)
		{
			return $profile->id;
		}
		else
		{
			return "error";
		}
		return "error";
	}
	
	public function view_carianggota()
	{
		$arr = $this->setHeader();
		return View::make('pages.carianggota', compact('arr'));
	}	
	
	public function view_berkas()
	{	
		$arr = $this->setHeader();
		return View::make('pages.berkas', compact('arr'));
	}
}
?>