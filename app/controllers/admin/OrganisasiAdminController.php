<?php

	class OrganisasiAdminController extends BaseController {
		
		public $restful = true;
		
		public function view_cabang()
		{
			$arr = $this->get_semua_cabang();
			return View::make('pages.admin.organisasi.cabang', compact('arr'));
		}
		
		public function view_pengurus()
		{
			return View::make('pages.admin.organisasi.pengurus');
		}

		public function get_semua_cabang()
		{
			$count = Cabang::all();
			if(count($count) != 0)
			{
				return $count;
			}else
			{
				return "";
			}
		}
		
		
		public function edit_cabang()
		{
			
		}
	}

?>