<?php

class KegiatanController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		$kegiatans = $this->get_all_kegiatan(); 
		$arr = $this->setHeader();
		return View::make('pages.kegiatan', compact('arr','kegiatans'));
	}

	public function get_all_kegiatan()
	{
		$kegiatan = Kegiatan::orderBy('waktu_mulai')->paginate(2);
		if(count($kegiatan) == 0)
		{
			return NULL;
		}
		else
		{
			return $kegiatan;
		}
	}
	
	//public function get_kegiatan_info()
}

?>