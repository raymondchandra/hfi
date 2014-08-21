<?php

class KontakController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
	
		$arr = $this->setHeader();
		return View::make('pages.kontak', compact('arr'));
	}

	//public function get_kontak()
	//public function send_email(){}
}

?>