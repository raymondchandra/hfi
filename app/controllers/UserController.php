<?php

use Carbon\Carbon;

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
				//ambil cabang dari database
				$listcabang = $this->get_all_cabang();
			return View::make('pages.profileanggota', compact('arr', 'listcabang'))->with('data' , $result);
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
			//ambil cabang dari database
			$listberkas = $this->get_all_berkas();	//return null kalo kosong
			//ambil nama pengunduh						
			if($listberkas!=null){
				$arrPengunggah = array();
				foreach($listberkas as $value){
					$pengunggah = DB::table('profile')->where('id', $value['uploaded_by'])->pluck('nama');
					$arrPengunggah[] = $pengunggah;
				}
			}else{
				$arrPengunggah = null;
			}						
		return View::make('pages.berkas', compact('arr', 'listberkas', 'arrPengunggah'));		
	}
	
	public function get_all_cabang()
	{
		//$count = Cabang::select('nama')->get();
		$count = DB::table('cabang')->orderBy('nama','asc')->lists('nama','nama');
		if(count($count) != 0)
		{
			return $count;
		}else
		{
			return "";
		}
	}
	
	public function get_all_berkas()
	{	
		$count = Berkas::all();
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
		
	
	//edit_profile
	public function edit_profile(){
		$id_profile = Input::get('id_profile');
		$profile = Profile::find($id_profile);
		$profile->nama = Input::get('nama_profile');
		$profile->id_cabang = 
		$profile->tanggal_revisi = Carbon::now();
		
	}
}
?>