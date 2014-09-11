<?php

class PublikasiController extends BaseController {
	
	public $restful = true;
	
	/**
     * Show the profile for the given user.
     */
	
    public function view_index($id)
    {
       	$current = "";
		$publikasi = "";
        
		if($id==1){
			$publikasi = $this->get_publikasi_jurnal();
			$current = "Jenis publikasi yang dikelola";
		}
		else if($id==2){
			$publikasi = $this->get_publikasi_ketentuan();
			$current = "Ketentuan umum publikasi di jurnal-jurnal HFI";
		}
		else if($id==3){
			$publikasi = $this->get_publikasi_lain();
			$current = "Karya-karya tulis lain";
		}
		else if($id==4){
			$publikasi = $this->get_publikasi_populer();
			$current = "Publikasi Ilmiah Populer";
		}
			
		
		$arr = $this->setHeader();
		return View::make('pages.publikasi', compact('arr', 'current', 'publikasi'));
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
		return PublikasiController::get_konten("pub_populer");
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