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
		$keyword = Input::get('keyword');
		
		//$query = Anggota::whereRaw('')
	}
}

?>