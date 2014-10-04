<?php

class KegiatanController extends BaseController {
	
	public $restful = true;
	
	public function view_index($jenis)
	{
		$kegiatans = KegiatanController::get_all_kegiatan($jenis); 
		$arr = $this->setHeader();
		return View::make('pages.kegiatan', compact('arr','kegiatans'));
	}

	public static function get_all_kegiatan($jenis)
	{
		$kegiatan = Kegiatan::where('type','=',$jenis)->orderBy('waktu_mulai')->paginate(5);
		if(count($kegiatan) == 0)
		{
			return NULL;
		}
		else
		{
			return $kegiatan;
		}
	}
	
}

?>