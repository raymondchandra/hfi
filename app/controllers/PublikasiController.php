<?php

class PublikasiController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		return View::make('pages.publikasi');
	}

}

?>