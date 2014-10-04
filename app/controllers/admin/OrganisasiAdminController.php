<?php

use Carbon\Carbon;

	class OrganisasiAdminController extends BaseController {
		
		public $restful = true;
		
		public function view_cabang()
		{
			return View::make('pages.admin.organisasi.cabang');
		}
		
		/*public function view_pengurus()
		{
			$arr = $this->setHeader();
			$arr2 = $this->get_all_cabang();			
			return View::make('pages.admin.organisasi.pengurus', compact('arr', 'arr2'));
		}*/
		
		public function view_detail($id)
		{
			$cabang = $this->get_cabang($id);
			$pengurus = $this->get_pengurus($id);
			return View::make('pages.admin.organisasi.detailCabang',compact('id','cabang','pengurus'));
		}
		
		public function view_pusat()
		{
			$id = 1;
			$cabang = $this->get_cabang($id);
			$pengurus = $this->get_pengurus($id);
			return View::make('pages.admin.organisasi.pusat')->nest('detailPusat','pages.admin.organisasi.detailCabang',compact('id','cabang','pengurus'));
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
			$count = Cabang::where('tipe','=',0)->get();
			if(count($count) != 0)
			{
				return $count;
			}else
			{
				return "";
			}
		}
		
		//get semua pengurus untuk id_cabang tertentu
		public function get_pengurus($id_cabang)
		{
			$count = DB::table('pengurus')->where('id_cabang', $id_cabang)->paginate(10);
			if(count($count) != 0)
			{
				return $count;
			}else{
				return "";
			}
		}
		
		public function get_semua_pengurus()
		{			
			$id_cabang = Input::get('id_cabang');
			$count = DB::table('pengurus')->where('id_cabang', $id_cabang)->paginate(10);
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
		
		public function get_cabang($id)
		{
			$count = Cabang::find($id);
			if(count($count) != 0)
			{
				return $count;
				
			}else
			{
				return NULL;
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
			try {
				$cabang->save();
				return "Berhasil menambah cabang.";
			} catch (Exception $e) {
				return $e;
			}
			
		}
		
		/*public function tambah_pengurus()
		{
			if(Input::hasFile('filePeng'))
			{				
				$file = Input::file('filePeng');
				$destinationPath = "assets/file_upload/pengurus/";
				$fileName = $file->getClientOriginalName();
				$uploadSuccess = $file->move($destinationPath, $fileName);
				
				$peng = new Pengurus();
				$peng -> timestamps = false;
				$peng -> periode = Input::get('periode');
				$peng -> file_path = $destinationPath.$fileName;
				$peng -> uploaded_by = Auth::user()->id;
				$peng -> tanggal_upload = Carbon::now();
				//$peng -> id_cabang = $this->get_id_cabang(Input::get('hficabang'));
				$peng -> id_cabang = Input::get('id_cabang');
				$peng -> save();
				
				return "success";	
			}else{
				return "failed";				
			}
		}*/
		
		//tambah pengurus 
		public function tambah_pengurus()
		{
			if(Input::hasFile('filePeng'))
			{
				$file = Input::file('filePeng');
				$destinationPath = "assets/file_upload/pengurus/";
				$fileName = $file->getClientOriginalName();
				
				$periode = Input::get('periode');
				$uploaded_id = Auth::user()->id;				
				$upload_time = Carbon::now(); //tanggal_upload				
				$id_cabang = Input::get('id_cabang');
				
				$peng = new Pengurus();
				$peng -> timestamps = false;
				$peng -> periode = $periode;
				$peng -> uploaded_by = $uploaded_id;
				$peng -> tanggal_upload = $upload_time;
				$peng -> id_cabang = $id_cabang;
				$peng -> save();
				
				$id_pengurus = $peng->id;
				$destinationPath .= $id_pengurus;
				$destinationPath .= "/";
				if(!file_exists($destinationPath))
				{
					File::makeDirectory($destinationPath, $mode = 0777, true, true);
					$uploadSuccess = $file->move($destinationPath, $fileName);
					$peng -> file_path = $destinationPath.$fileName;
					$peng -> save();
				}
				else
				{
					$uploadSuccess = $file->move($destinationPath, $fileName);
					$peng -> file_path = $destinationPath.$fileName;
					$peng -> save();
				}
				return "Berhasil menambah pengurus";
			}
			else
			{
				return "Gagal menambah pengurus";
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
				$parentpath = "assets/file_upload/pengurus/";
				$fileDir = $parentpath.$id_pengurus;
				File::deleteDirectory($fileDir);
				$pengurus->delete();
				//$pengurus->delete();
				return "success";
			}
			else 
			{
				return "fail";
			}
			//File::deleteDirectory($directoryPath);
		}

		//upload tandatangan
		public function edit_tandatangan()
		{
			if(Input::hasFile('fileTandaTangan'))
			{
				$file = Input::file('fileTandaTangan');
				$destinationPath = "assets/file_upload/tandatangan/";
				$fileName = "tandatangan.jpg";
				$uploadSuccess = $file->move($destinationPath, $fileName);				
								
				return "Berhasil edit tandatangan";
			}
			else
			{
				return "Gagal edit tandatangan";
			}
		}
		
		// cek tandatangan
		public function UrlExists()
		{
			if(file_exists("assets/file_upload/tandatangan/tandatangan.jpg")){
				return "ada";
			}else{
				return "gaada";
			}						
		}	
	}

?>