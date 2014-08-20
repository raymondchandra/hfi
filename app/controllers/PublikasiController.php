<?php

class PublikasiController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		return View::make('pages.publikasi');
	}

	//public function get_publikasi_jurnal()
	//public function get_publikasi_populer()
}

?>