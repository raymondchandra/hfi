<?php

use Carbon\Carbon;

class AnggotaAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_aturan()
	{
		return View::make('pages.admin.anggota.aturan');
	}
	
	public function view_akun()
	{
		return View::make('pages.admin.anggota.aturan');
	}
	
	public function view_anggota()
	{
		return View::make('pages.admin.anggota.aturan');
	}
	
	public function update_home()
	{
		$konten_home = Input::get('updateWelcome');
		$id = Auth::user()->id;
		$konten_id = Konten::where('tipe_konten', '=', 'welcome')->first();
		/*
		if($konten_id == null)
		{
			$konten = Konten::find($konten_id->id);
			$konten->konten = $konten_welcome;
			$konten->timestamps = false;
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = Anggota::where('auth_id', '=' , $id)->first()->id;
			
			$konten->save();
			return "Success Update";
		}
		else
		{
		
		}
		*/
	}
}

?>