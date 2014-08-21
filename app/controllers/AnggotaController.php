<?php

class AnggotaController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		return View::make('pages.anggota');		
	}
	
	public function view_ketentuan()
	{
		return View::make('pages.ketentuan');
	}

	//public function get_anggota_beranda()
	//public function get_anggota_ketentuan()
}

?>