<?php

class LainController extends BaseController {
	
	public $restful = true;
	
	/**
     * Show the profile for the given user.
     */
	
    public function view_index()
    {
       	$lain = $this->getLain();
       
		$arr = $this->setHeader();
		return View::make('pages.lain', compact('arr', 'lain'));
    }
	
	public function view_test()
    {
		return View::make('pages.test');
    }
	
	
	public function getLain()
	{
		return LainController::get_konten("lain");
	}
	
	public static function get_konten($tipe)
	{
		$konten = Konten::where('tipe_konten', '=', $tipe)->first();
		if(count($konten) != 0)
		{
			
			return $konten->konten;
		}else
		{
			return "";
		}
	}
}

?>