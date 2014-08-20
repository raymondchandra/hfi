<?php

class AnggotaAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_aturan()
	{
		return View::make('pages.admin.anggota.aturan');
	}
	
	public function view_akun()
	{
		return View::make('pages.admin.anggota.aturan');
	}
	
	public function view_anggota()
	{
		return View::make('pages.admin.anggota.aturan');
	}
	
}

?>