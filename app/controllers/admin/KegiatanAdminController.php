<?php

class KegiatanAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		return View::make('pages.admin.kegiatan.kegiatan');
	}

}

?>