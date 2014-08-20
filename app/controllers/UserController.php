<?php
class UserController extends BaseController {
	
	public $restful = true;
	
	public function view_profile()
	{
		return View::make('pages.profileanggota');
	}
	
	public function view_carianggota()
	{
		return View::make('pages.carianggota');
	}
	
	public function view_berkas()
	{
		return View::make('pages.berkas');
	}
}
?>