<?php

class KontakController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		return View::make('pages.kontak');
	}

	//public function get_kontak()
	//public function send_email(){}
}

?>