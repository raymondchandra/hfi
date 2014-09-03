<?php

use Carbon\Carbon;

	class OrganisasiAdminController extends BaseController {
		
		public $restful = true;
		
		public function view_cabang()
		{
			return View::make('pages.admin.organisasi.cabang');
		}
		
		public function view_pengurus()
		{
			$arr = $this->setHeader();
			$arr2 = $this->get_all_cabang();			
			return View::make('pages.admin.organisasi.pengurus', compact('arr', 'arr2'));
		}		
		public function get_all_cabang()
		{
			//$count = Cabang::select('nama')->get();
			$count = DB::table('cabang')->orderBy('nama','asc')->lists('nama','nama');
			if(count($count) != 0)
			{
				return $count;
			}else
			{
				return "";
			}
		}
		
		public function get_id_cabang($nama_cabs)
		{
			$id = Cabang::where('nama', '=', $nama_cabs)->first();			
			return $id->id;
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
		
		public function get_semua_pengurus()
		{
			$count = Pengurus::all();
			if(count($count) != 0)
			{
				return $count;
			}else{
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
		
		public function tambah_pengurus()
		{
			if(Input::hasFile('filePeng'))
			{				
				$file = Input::file('filePeng');
				$destinationPath = "assets/file_upload/pengurus/";
				$fileName = $file->getClientOriginalName();
				$uploadSuccess   = $file->move($destinationPath, $fileName);
				
				$peng = new Pengurus();
				$peng -> timestamps = false;
				$peng -> periode = Input::get('periode');
				$peng -> file_path = $destinationPath.$fileName;
				$peng -> uploaded_by = UserController::getProfileId(Auth::user()->id);
				$peng -> tanggal_upload = Carbon::now();
				$peng -> id_cabang = $this->get_id_cabang(Input::get('hficabang'));
				
				$peng -> save();
				
				// return "success";	
				return Redirect::to('/admin')->with('message','berhasil menambah file pengurus');
			}
			else
			{
				// return "failed";
				return Redirect::to('/admin')->with('message','gagal menambah file pengurus');
			}
		}
		
		public function delete_cabang()
		{
			$id_cabang = Input::get('id_cabang');
			$cabang = Cabang::find($id_cabang);
			
			$cabang->delete();
			
			return "Success Delete";
		}
		
		public function delete_pengurus()
		{
			$id_pengurus = Input::get('id_pengurus');
			$pengurus = Pengurus::find($id_pengurus);
			$file = $pengurus->file_path;
			if(File::exists($file))
			{
				File::delete($file);
				$pengurus->delete();
				return "Success Delete";
			}
			else 
			{
				return "Failed Delete";
			}
		}
	}

?>