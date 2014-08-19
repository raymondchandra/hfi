<?php

class HomeAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		return View::make('pages.admin.home.slideshow');
	}
	
	public function view_slide()
	{
		return View::make('pages.admin.home.slideshow');
	}
	
	public function view_welcome()
	{
		$deskripsi_selamat_datang = $this->get_welcome();
		return View::make('pages.admin.home.welcome' , compact('deskripsi_selamat_datang'));
	}
	
	public function view_about()
	{
		$tentang_hfi = $this->get_tentang();
		return View::make('pages.admin.home.about' , compact('tentang_hfi'));
	}
	
	public function view_visi()
	{
		$visi_hfi = $this->get_visi();
		return View::make('pages.admin.home.visi' , compact('visi_hfi'));
	}
	
	public function view_misi()
	{
		$misi_hfi = $this->get_misi();
		return View::make('pages.admin.home.misi' , compact('misi_hfi'));
	}
	
	public function view_regulasi()
	{
		return View::make('pages.admin.home.regulasi'); 
	}
	
	
	public function get_welcome()
	{
		$konten_welcome = Konten::where('tipe_konten', '=', 'welcome')->first()->konten;
		return $konten_welcome;
	}
	
	public function get_tentang()
	{
		$konten_tentang = Konten::where('tipe_konten', '=', 'tentang')->first()->konten;
		return $konten_tentang;
	}
	
	public function get_visi()
	{
		$konten_visi = Konten::where('tipe_konten', '=', 'visi')->first()->konten;
		return $konten_visi;
	}
	
	public function get_misi()
	{
		$konten_misi = Konten::where('tipe_konten', '=', 'misi')->first()->konten;
		return $konten_misi;
	}

	public function update_welcome()
	{
		
	}
}

?>