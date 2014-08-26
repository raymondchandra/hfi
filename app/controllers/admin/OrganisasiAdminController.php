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
			$id_cabang = Input::get('id_cabang');
			$cabang = Cabang::find($id_cabang);
			$cabang->nama = Input::get('nama_cabang');
			$cabang->telp = Input::get('telp_cabang');
			$cabang->fax = Input::get('fax_cabang');
			$cabang->email = Input::get('email_cabang');
			$cabang->link = Input::get('link_cabang');
			$cabang->alamat = Input::get('alamat_cabang');
			$cabang->timestamps = false;
				
			$cabang->save();
			return "Success Update";
		}
		
		public function get_satu_cabang()
		{
			$id_cabang = Input::get('id_cabang');
			$count = Cabang::where('id','=', $id_cabang)->get();
			if(count($count) != 0)
			{
				return $count;
				
			}else
			{
				return "Fail";
			}
		}
		
		public function tambah_cabang()
		{
			$cabang = new Cabang();
			$cabang->nama = Input::get('nama_cabang');
			$cabang->telp = Input::get('telp_cabang');
			$cabang->fax = Input::get('fax_cabang');
			$cabang->email = Input::get('email_cabang');
			$cabang->link = Input::get('link_cabang');
			$cabang->alamat = Input::get('alamat_cabang');
			$cabang->timestamps = false;
				
			$cabang->save();
			return "Success Update";
		}
	}

?>