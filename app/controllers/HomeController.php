<?php

class HomeController extends BaseController {

	public function view_index()
	{
		//bikin variable
		$deskripsi_selamat_datang = $this->get_konten('welcome');
		
		$tentang_hfi = $this->get_konten('tentang');
		
		$visi_hfi = $this->get_konten('visi');
		
		$misi_hfi = $this->get_konten('misi');
		
		$alamat_hfi = $this->get_cabang('alamat');
		
		$telepon_hfi = $this->get_cabang('telp');
		
		$fax_hfi = $this->get_cabang('fax');
		
		$email_hfi = $this->get_cabang('email');
		
		$arr = $this->setHeader();
		
		return View::make('pages.home', compact('deskripsi_selamat_datang', 'tentang_hfi', 'visi_hfi', 'misi_hfi', 'arr'));
	}
	
	public static function get_konten($tipe)
	{
		$konten_welcome = Konten::where('tipe_konten', '=', $tipe)->first();
		if(count($konten_welcome) != 0)
		{
			
			return $konten_welcome->konten;
		}else
		{
			return "";
		}
	}
	
	public function get_cabang($kembalian)
	{
		return Cabang::where('tipe','=', '1')->first()->$kembalian;
	}
	
	//public function get_slideshow(){}
	//public function get_regulasi(){}
	
}