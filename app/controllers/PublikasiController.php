<?php

class PublikasiController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
	
		$arr = $this->setHeader();
		return View::make('pages.publikasi', compact('arr'));
	}

	public function get_publikasi_jurnal()
	{
		return PublikasiController::get_konten("pub_jenis");
	}
	
	public function get_publikasi_ketentuan()
	{
		return PublikasiController::get_konten("pub_ketentuan");
	}
	
	public function get_publikasi_lain()
	{
		return PublikasiController::get_konten("pub_lain");
	}
	
	public function get_publikasi_populer()
	{
		return PublikasiController::get_konten("pub_lain");
	}

	public static function get_konten($tipe)
	{
		$konten = Konten::where('tipe_konten', '=', $tipe)->first();
		if(count($konten) != 0)
		{
			
			return $konten->konten;
		}else
		{
			return "";
		}
	}
}

?>