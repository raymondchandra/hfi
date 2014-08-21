<?php

class OrganisasiController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
	
		$arr = $this->setHeader();
		return View::make('pages.organisasi', compact('arr'));
	}
	
	public function view_cabang()
	{
		$arr = $this->setHeader();
		$arr2 = $this->get_semua_cabang();
		return View::make('pages.cabang', compact('arr','arr2'));
	}

	public function get_semua_cabang()
	{
		$count = Cabang::where('tipe','=', '0')->get();
		if(count($count) != 0)
		{
			return $count;
			
		}else
		{
			return "";
		}
	}
	
	//pengurus
	//public function get_pengurus()
	
	//cabang
	//public function get_all_cabang()
	//public function get_cabang_info()
	
}

?>