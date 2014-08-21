<?php

class KegiatanController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
	
		$arr = $this->setHeader();
		return View::make('pages.kegiatan', compact('arr'));
	}

	//public function get_all_kegiatan()
	//public function get_kegiatan_info()
}

?>