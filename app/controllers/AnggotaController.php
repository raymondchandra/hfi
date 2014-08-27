<?php

class AnggotaController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		$isiKonten = getKonten('anggota_home');
		$arr = $this->setHeader();
		return View::make('pages.anggota', compact('arr', 'isiKonten'));		
	}
	
	public function view_ketentuan()
	{
		$isiKonten = getKonten('anggota_ketentuan');
		$arr = $this->setHeader();
		return View::make('pages.ketentuan', compact('arr', 'isiKonten'));
	}
	
	public static getKonten($tipe)
	{
		$konten = Konten::where('tipe_konten', '=', $tipe)->first();
		if($konten == null)
		{
			$isiKonten = "";
		}
		else
		{
			$isiKonten = $konten->konten;
		}
		
		return $isiKonten
	}

	//public function get_anggota_beranda()
	//public function get_anggota_ketentuan()
}

?>