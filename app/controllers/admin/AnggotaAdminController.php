<?php

use Carbon\Carbon;

class AnggotaAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_aturan()
	{

		//$konten_home = Konten::where('tipe_konten', '=', 'anggota_home')->first()->konten;
		$konten_home = Konten::where('tipe_konten', '=', 'anggota_home')->first();
		 if(count($konten_home) != 0)
		 {			
			$konten_home->konten;
		}else
		{
			$konten_home = "";
		}
		//$konten_aturan = Konten::where('tipe_konten', '=', 'anggota_ketentuan')->first()->konten;
		 $konten_aturan = Konten::where('tipe_konten', '=', 'anggota_ketentuan')->first();
		 if(count($konten_aturan) != 0)
		 {			
			 $konten_aturan->konten;
		 }else
		 {
			 $konten_aturan = "";
		 }

		$konten_home = AnggotaController::getKonten('anggota_home');
		$konten_aturan = AnggotaController::getKonten('anggota_ketentuan');;

		return View::make('pages.admin.anggota.aturan', compact('konten_home', 'konten_aturan'));
	}
	
	public function view_akun()
	{
		return View::make('pages.admin.anggota.daftarAkun');
	}
	
	public function view_anggota()
	{
		$arr2 = $this->get_all_cabang();
		return View::make('pages.admin.anggota.daftarAnggota', compact('arr2'));
	}
	
	public function update_home()
	{
		$konten_home = Input::get('updateAnggotaHome');
		//echo $konten_home;
		$id = Auth::user()->id;
		$konten_id = Konten::where('tipe_konten', '=', 'anggota_home')->first();

		if($konten_id != null)
		{
			$konten = Konten::find($konten_id->id);
			$konten->konten = $konten_home;
			$konten->timestamps = false;
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = $id;
			
			$konten->save();
			return "Success Update";
		}
		else
		{
			$konten = new Konten();
			$konten->tipe_konten = 'anggota_home';
			$konten->konten = $konten_home;
			$konten->timestamps = false;
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = $id;
			return "Success Update";
		}
	}
	
	public function update_regulasi()
	{
		$konten_home = Input::get('updateAnggotaRegulasi');

		$id = Auth::user()->id;
		$konten_id = Konten::where('tipe_konten', '=', 'anggota_ketentuan')->first();

		if($konten_id != null)
		{
			$konten = Konten::find($konten_id->id);
			$konten->konten = $konten_home;
			$konten->timestamps = false;
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = $id;
			
			$konten->save();
			return "Success Update";
		}
		else
		{
			$konten = new Konten();
			$konten->tipe_konten = 'anggota_ketentuan';
			$konten->konten = $konten_home;
			$konten->timestamps = false;
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = $id;
			return "Success Update";
		}

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
}

?>