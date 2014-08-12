<?php

class BerkasAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		return View::make('hello');
	}

}

?>