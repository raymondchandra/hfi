<?php

class AnggotaController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		return View::make('pages.anggota');
	}
	
	public function view_ketentuandanperjanjiananggota()
	{
		return View::make('pages.ketentuandanperjanjiananggota');
	}

}

?>