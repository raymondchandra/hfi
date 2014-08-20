<?php

class KegiatanController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		return View::make('pages.kegiatan');
	}

	//public function get_all_kegiatan()
	//public function get_kegiatan_info()
}

?>