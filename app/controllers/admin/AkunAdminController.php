<?php

use Carbon\Carbon;

class AkunAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_akun_baru()
	{
		return View::make('pages.admin.akun.akun_baru');
	}
	
	public function view_akun_aktif()
	{
		return View::make('pages.admin.akun.akun_aktif');
	}
	
	public function view_akun_nonaktif()
	{
		return View::make('pages.admin.akun.akun_non_aktif');
	}
}

?>