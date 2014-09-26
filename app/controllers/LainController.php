<?php

class LainController extends BaseController {
	
	public $restful = true;
	
	/**
     * Show the profile for the given user.
     */
	
    public function view_index($id)
    {
       	$lain = $this->getLain($id);
       
		$arr = $this->setHeader();
		return View::make('pages.lain', compact('arr', 'lain'));
    }
	
	public function view_test()
    {
		return View::make('pages.test');
    }
	
	
	public function getLain($id)
	{
		return Lain1::find($id);
	}

	public static function getAllMenu(){
		$lains = Lain1::all();
		return $lains;
	}
}

?>