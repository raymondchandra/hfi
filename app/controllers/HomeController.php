<?php

class HomeController extends BaseController {

	public function view_index()
	{
		return View::make('pages.home');
	}
}