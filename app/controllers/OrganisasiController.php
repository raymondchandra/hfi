<?php

class OrganisasiController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
	
		$arr = $this->setHeader();
		$pengs = $this->get_all_pengurus();
		return View::make('pages.organisasi', compact('arr', 'pengs'));
	}
	
	public function view_cabang()
	{
		$arr = $this->setHeader();
		$arr2 = $this->get_semua_cabang();
			$arr3 = $this->get_all_pengurus();
		return View::make('pages.cabang', compact('arr','arr2','arr3'));
	}
	



	//cabang
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
	
	// pengurus
	// public function get_all_pengurus()
	// {
		// $id_cabang = Input::get('id_cabang');
		// $count = DB::table('pengurus')->where('id_cabang', $id_cabang)->get();
		// if(count($pengs) == 0)
		// {
			// kalo return "" bakal kebaca array isinya 1 (string "") 
			// makanya diganti jadi return null
			// return ""; 			
			// return null;
		// }
		// else
		// {
			// return $pengs;
		// }
	// }
	// pengurus
	public function get_semua_pengurus()
	{			
		$id_cabang = Input::get('id_cabang');
		$count = DB::table('pengurus')->where('id_cabang','=', $id_cabang)->paginate(10);
		if(count($count) != 0)
		{
			return $count;
		}else{
			return "";
		}
	}
}

?>