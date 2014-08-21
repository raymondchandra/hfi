<?php

class OrganisasiController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		return View::make('pages.organisasi');
	}
	
	public function view_cabang()
	{
		return View::make('pages.cabang');
	}

	
	//pengurus
	//public function get_pengurus()
	
	//cabang
	//public function get_all_cabang()
	//public function get_cabang_info()
	
}

?>