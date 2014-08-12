<?php

class KegiatanController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		return View::make('pages.kegiatan');
	}

}

?>