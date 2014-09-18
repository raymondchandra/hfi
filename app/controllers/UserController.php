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
			$date= date_create(Auth::user()->batas_aktif);
			$tanggal_aktif = date_format($date,"d-m-Y");
			$date= date_create($profile->tanggal_lahir);
			$profile->tanggal_lahir = date_format($date,"d-m-Y");
			$result = array('data' => $profile, 'cabang' => $cabang->nama, 'status_aktif' => $status_aktif, 'batas_aktif' => $tanggal_aktif, 'siteUrl' => $siteUrl);
			
			$arr = $this->setHeader();
				//ambil cabang dari database
				$listcabang = $this->get_all_cabang();
			$pendidikans = $this->getPendidikan($profile->id);
			return View::make('pages.profileanggota', compact('arr', 'listcabang','pendidikans'))->with('data' , $result);
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
	
	//tes
	public function view_cetakkartu(){
		
		$profile = Auth::user()->profile;
		$arr = $this->setHeader();
		$nama_cabang = Cabang::find($profile->id_cabang)->nama;
		$date = Carbon::createFromFormat('Y-m-d', Auth::user()->batas_aktif)->format('d F Y');
		
		$thisyear = Carbon::now()->year;
		$alamatHFIPusat = Cabang::find(1)->alamat;
		return View::make('pages.cetakkartu', compact('arr','profile','date','nama_cabang','thisyear','alamatHFIPusat'));
	} 
	
	public function view_carianggota()
	{
		$arr = $this->setHeader();
			//ambil cabang dari database
			$cabang = $this->get_all_cabang(); //return null kalo kosong
			if($cabang==null){
				$cabang = null;
			}			
			$listcabang = array("pilih" => "pilih!");								
			foreach($cabang as $value){				
				$listcabang[$value] = $value;				
			}	
		return View::make('pages.carianggota', compact('arr', 'listcabang'));
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
	
	public function search_anggota()
	{
		$nama = Input::get('nama');					
		$penelitian = Input::get('penelitian');			
		$gelarPendidikan = Input::get('gelarPendidikan');
		$lokasiPendidikan = Input::get('lokasiPendidikan');
		$institusi = Input::get('institusi');
		$surel = Input::get('surel');
		$status = Input::get('status');
		if($status === 'yes')
		{
			$aktif = 1;
		}
		else
		{
			$aktif = 0;
		}
		$cabang = Input::get('cabang');
		if($cabang == 0)
		{
			$id_cab = Cabang::where('nama', '=', $cabang)->select('cabang.id')->first();
		}
		else
		{
			$id_cab = "";
		}
		$jenis_kelamin = Input::get('jenis_kelamin');
		if($jenis_kelamin === 'pria')
		{
			$kode_jk = 1;
		}
		else
		{
			$kode_jk = 0;
		}
		$spesialisasi = Input::get('spesialisasi');
		$profesi = Input::get('profesi');
		
		$res = Anggota::join('pendidikan', 'profile.id', '=', 'pendidikan.id_profile')
						->join('auth', 'profile.id', '=' ,'auth.profile_id')
						
						->where('nama', 'LIKE' ,'%'.$nama.'%')
						->where('tema_penelitian', 'LIKE', '%'.$penelitian.'%')
						->where('gelar', 'LIKE', '%'.$gelarPendidikan.'%')
						->where('lokasi', 'LIKE', '%'.$lokasiPendidikan.'%')
						->where('institusi', 'LIKE', '%'.$institusi.'%')
						->where('email', 'LIKE', '%'.$surel.'%')
						->where('status_aktif', '=', $aktif)
						->where('id_cabang', 'LIKE', $id_cab)
						->where('spesialisasi', 'LIKE', '%'.$spesialisasi.'%')
						->where('profesi', 'LIKE', '%'.$profesi.'%')
						->where('gender', '=', $kode_jk)
						->get();		
		return $res;
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
	
	public function getPendidikan($profile_id)
	{	
		$pendidikan = Pendidikan::where('id_profile', '=' , $profile_id)->get();
		if($pendidikan==NULL){
			return null;
		}else{
			return $pendidikan;
		}
	}
	
	//edit_profile
	public function edit_profile(){
		
		$id_profile = Auth::user()->profile->id;
		$profile = Anggota::find($id_profile);
		$profile->nama = Input::get('nama');
		$cabang_id = Cabang::where('nama', '=', Input::get('cabang'))->first()->id;
		$profile->id_cabang = $cabang_id;
		$profile->tanggal_revisi = Carbon::now();
		$profile -> gender = Input::get('gender');
		$profile -> tempat_lahir = Input::get('tempatlahir');
		$datepiece = explode('-',Input::get('tanggallahir'));
		
		//return $datepiece[0];
		$date = $datepiece[2].'-'.$datepiece[1].'-'.$datepiece[0];
		
		$profile -> tanggal_lahir = $date;
		$profile -> tema_penelitian = Input::get('temapenelitian');
		$profile -> spesialisasi = Input::get('spesialisasi');
		$profile -> profesi = Input::get('profesi');
		$profile -> institusi = Input::get('institusi');
		$profile -> alamat = Input::get('alamat');
		$profile -> kota = Input::get('kota');
		$profile -> kodepos = Input::get('kodepos');
		$profile -> negara = Input::get('negara');
		$profile -> telepon = Input::get('telepon');
		$profile -> hp = Input::get('hp');
		$profile -> fax = Input::get('fax');
		$profile -> email = Input::get('email');
		$profile -> situs = Input::get('situs');
		$profile -> keterangan = Input::get('keterangan');
		$profile -> timestamps = false;
		
		try{
			$profile -> save();
		}catch(Exception $e){
			
			return $e;
		}
		
		//delete dulu pendidikannya
		try{
			DB::table('pendidikan')->where('id_profile', '=', $id_profile)->delete();
		}catch(Exception $e){
			return $e;
		}
		
		for($i = 1; $i <= 5; $i++){
			$gelar = Input::get('selPendidikan'.$i);
			$lokasi =  Input::get('pendidikan'.$i);
			
			if($lokasi != ""){
				$pend = new Pendidikan();
				$pend->timestamps = false;
				$pend->id_profile = $id_profile;
				$pend->gelar = $gelar;
				$pend->lokasi = $lokasi;
				try{
					$pend->save();
				}catch(Exception $e){
					return $e;
					
				}
				
			}
		}
		
		return 'success';		
	}
	
	//edit foto profile
	public function edit_foto_profile()
	{				
		if(Input::hasFile('fileFoto'))
		{					
			$imgType = Input::file('fileFoto')->getMimeType();				
			if(substr($imgType,0,6) != "image/"){
				return "failed";
			}
		
			$file = Input::file('fileFoto');
			$destinationPath = "assets/file_upload/img/";
			$fileName = $file->getClientOriginalName();
			$uploadSuccess   = $file->move($destinationPath, $fileName);
			
			$id_profile = Auth::user()->profile->id;
			$profile = Anggota::find($id_profile);
		
			$profile -> timestamps = false;			
			$profile -> foto_profile = $destinationPath.$fileName;
			$profile -> save();
											
			return "success";		
			//return $imgType;
		}
		else
		{
			return "failed";			
		}
	} 
	
}
?>