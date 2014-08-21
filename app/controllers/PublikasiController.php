<?php

class PublikasiController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
	
		$arr = $this->setHeader();
		return View::make('pages.publikasi', compact('arr'));
	}

	//public function get_publikasi_jurnal()
	//public function get_publikasi_populer()
}

?>