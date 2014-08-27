<?php

use Carbon\Carbon;

class AnggotaAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_aturan()
	{
		$konten_home = Konten::where('tipe_konten', '=', 'anggota_home')->first()->konten;
		$konten_aturan = Konten::where('tipe_konten', '=', 'anggota_ketentuan')->first()->konten;
		return View::make('pages.admin.anggota.aturan', compact('konten_home', 'konten_aturan'));
	}
	
	public function view_akun()
	{
		return View::make('pages.admin.anggota.daftarAkun');
	}
	
	public function view_anggota()
	{
		return View::make('pages.admin.anggota.daftarAnggota');
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
			$konten -> edited_by = Anggota::where('auth_id', '=' , $id)->first()->id;
			
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
			$konten -> edited_by = Anggota::where('auth_id', '=' , $id)->first()->id;
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
			$konten -> edited_by = Anggota::where('auth_id', '=' , $id)->first()->id;
			
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
			$konten -> edited_by = Anggota::where('auth_id', '=' , $id)->first()->id;
			return "Success Update";
		}

	}
}

?>