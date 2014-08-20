<?php

class PublikasiAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_jenis()
	{
		return View::make('pages.admin.publikasi.ilmiahPopuler');
	}
	
	public function view_ketentuan()
	{
		return View::make('pages.admin.publikasi.ketentuanPublikasi');
	}
	
	public function view_karyaLain()
	{
		return View::make('pages.admin.publikasi.karyaTulisLain');
	}
	
	public function view_populer()
	{
		return View::make('pages.admin.publikasi.ilmiahPopuler');
	}

}

?>