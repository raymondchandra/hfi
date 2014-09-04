<?php

class HomeController extends BaseController {

	public function view_index()
	{
		//bikin variable
		$deskripsi_selamat_datang = $this->get_konten('welcome');
		
		$tentang_hfi = $this->get_konten('tentang');
		
		$visi_hfi = $this->get_konten('visi');
		
		$misi_hfi = $this->get_konten('misi');
		
		$regulasi_hfi = $this->get_all_regulasi();
		
		$arr = $this->setHeader();
		
		$slideshow = $this->get_slideshow();
		
		return View::make('pages.home', compact('deskripsi_selamat_datang', 'tentang_hfi', 'visi_hfi', 'misi_hfi', 'regulasi_hfi', 'arr','slideshow'));
	}
	
	public static function get_konten($tipe)
	{
		$konten_welcome = Konten::where('tipe_konten', '=', $tipe)->first();
		if(count($konten_welcome) != 0)
		{
			
			return $konten_welcome->konten;
		}else
		{
			return "";
		}
	}
	
	//public function get_slideshow(){}
		
	public function get_all_regulasi()
	{		
		$regulations = Regulasi::all();
		//$regulations = Regulasi::paginate(5);
		if($regulations==null){
			return "kosong";
		}else{			
			return $regulations;
		}		
	}
	
	public function get_slideshow()
	{
		$gal = Gallery::where('type','=', '1')->get();
		//echo "AAAA";
		if(count($gal) != 0)
		{
			return $gal;
			
		}else
		{
			return "Failed";
		}
	}
	
}