<?php

class OrganisasiControllerController extends BaseController {
	
	public $restful = true;
	
	public function view_cabang()
	{
		return View::make('pages.admin.organisasi.cabang');
	}
	
	public function view_pengurus()
	{
		return View::make('pages.admin.organisasi.pengurus');
	}

}

?>