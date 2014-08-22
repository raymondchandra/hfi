<?php

class AnggotaController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		$konten = Konten::where('tipe_konten', '=', 'anggota_home')->first();
		$isiKonten = $konten->konten;
		$arr = $this->setHeader();
		return View::make('pages.anggota', compact('arr', 'isiKonten'));		
	}
	
	public function view_ketentuan()
	{
		$konten = Konten::where('tipe_konten', '=', 'anggota_ketentuan')->first();
		$isiKonten = $konten->konten;
		$arr = $this->setHeader();
		return View::make('pages.ketentuan', compact('arr', 'isiKonten'));
	}

	//public function get_anggota_beranda()
	//public function get_anggota_ketentuan()
}

?>