<?php

class AnggotaController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		$arr = $this->setHeader();
		return View::make('pages.anggota', compact('arr'));		
	}
	
	public function view_ketentuan()
	{
		$arr = $this->setHeader();
		return View::make('pages.ketentuan', compact('arr'));
	}

	//public function get_anggota_beranda()
	//public function get_anggota_ketentuan()
}

?>