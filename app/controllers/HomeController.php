<?php

class HomeController extends BaseController {

	public function view_index()
	{
		//bikin variable
		$deskripsi_selamat_datang = $this->get_welcome();
		
		$tentang_hfi = $this->get_tentang();
		
		$visi_hfi = $this->get_visi();
		
		$misi_hfi = $this->get_misi();
		
		return View::make('pages.home', compact('deskripsi_selamat_datang', 'tentang_hfi', 'visi_hfi', 'misi_hfi'));
		
		//return View::make('pages.home', 
		//	array(
		//	'deskripsi_selamat_datang' => $getfromdbdesc
		//	) 
		//);
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
}