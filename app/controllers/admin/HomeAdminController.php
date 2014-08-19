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
		$deskripsi_selamat_datang = HomeController::get_konten('welcome');
		return View::make('pages.admin.home.welcome' , compact('deskripsi_selamat_datang'));
	}
	
	public function view_about()
	{
		$tentang_hfi = HomeController::get_konten('tentang');
		return View::make('pages.admin.home.about' , compact('tentang_hfi'));
	}
	
	public function view_visi()
	{
		$visi_hfi = HomeController::get_konten('visi');
		return View::make('pages.admin.home.visi' , compact('visi_hfi'));
	}
	
	public function view_misi()
	{
		$misi_hfi = HomeController::get_konten('misi');
		return View::make('pages.admin.home.misi' , compact('misi_hfi'));
	}
	
	public function view_regulasi()
	{
		return View::make('pages.admin.home.regulasi'); 
	}

	
}

?>