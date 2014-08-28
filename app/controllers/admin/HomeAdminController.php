<?php

use Carbon\Carbon;

class HomeAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_adminPanel()
	{
		return View::make('pages.adminpanel');
	}
	
	/*public function view_index()
	{
		return View::make('pages.admin.home.slideshow');
	}*/
	
	public function view_slide()
	{
		return View::make('pages.admin.home.slideshow');
	}
	
	public function view_welcome()
	{
		$deskripsi_selamat_datang = HomeController::get_konten('welcome');
		return View::make('pages.admin.home.welcome' , compact('deskripsi_selamat_datang'));
	}
	
	public function view_about()
	{
		$tentang_hfi = HomeController::get_konten('tentang');
		return View::make('pages.admin.home.about' , compact('tentang_hfi'));
	}
	
	public function view_visi()
	{
		$visi_hfi = HomeController::get_konten('visi');
		return View::make('pages.admin.home.visi' , compact('visi_hfi'));
	}
	
	public function view_misi()
	{
		$regulations = get_all_regulasi();
		$misi_hfi = HomeController::get_konten('misi');
		return View::make('pages.admin.home.misi' , compact('misi_hfi', 'regulations'));
	}
	
	public function view_regulasi()
	{
		return View::make('pages.admin.home.regulasi'); 
	}
	
	public function update_welcome()
	{
		$konten_welcome = Input::get('updateWelcome');
		$id = Auth::user()->id;
		$konten_id = Konten::where('tipe_konten', '=', 'welcome')->first();
		if(count($konten_id) != 0)
		{
			$konten = Konten::find($konten_id->id);
			$konten->konten = $konten_welcome;
			$konten->timestamps = false;
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = Anggota::where('auth_id', '=' , $id)->first()->id;
			
			$konten->save();
			return "Success Update";
		}else
		{
			$konten = new Konten();
			$konten -> timestamps = false;
			$konten -> konten = $konten_welcome;
			$konten -> tipe_konten = 'welcome';
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = Anggota::where('auth_id', '=' , $id)->first()->id;
			
			$konten -> save();
			
			return "Success Insert";
		}
	}
	
	public function update_tentang()
	{
		$konten_welcome = Input::get('updateAbout');
		$id = Auth::user()->id;
		$konten_id = Konten::where('tipe_konten', '=', 'tentang')->first();
		if(count($konten_id) != 0)
		{
			$konten = Konten::find($konten_id->id);
			$konten->konten = $konten_welcome;
			$konten->timestamps = false;
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = Anggota::where('auth_id', '=' , $id)->first()->id;
			
			$konten->save();
			return "Success Update";
		}else
		{
			$konten = new Konten();
			$konten -> timestamps = false;
			$konten -> konten = $konten_welcome;
			$konten -> tipe_konten = 'tentang';
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = Anggota::where('auth_id', '=' , $id)->first()->id;
			
			$konten -> save();
			
			return "Success Insert";
		}
	}
	
	public function update_visi()
	{
		$konten_welcome = Input::get('updateVisi');
		$id = Auth::user()->id;
		$konten_id = Konten::where('tipe_konten', '=', 'visi')->first();
		if(count($konten_id) != 0)
		{
			$konten = Konten::find($konten_id->id);
			$konten->konten = $konten_welcome;
			$konten->timestamps = false;
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = Anggota::where('auth_id', '=' , $id)->first()->id;
			
			$konten->save();
			return "Success Update";
		}else
		{
			$konten = new Konten();
			$konten -> timestamps = false;
			$konten -> konten = $konten_welcome;
			$konten -> tipe_konten = 'visi';
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = Anggota::where('auth_id', '=' , $id)->first()->id;
			
			$konten -> save();
			
			return "Success Insert";
		}
	}
	
	public function update_misi()
	{
		$konten_welcome = Input::get('updateMisi');
		$id = Auth::user()->id;
		$konten_id = Konten::where('tipe_konten', '=', 'misi')->first();
		if(count($konten_id) != 0)
		{
			$konten = Konten::find($konten_id->id);
			$konten->konten = $konten_welcome;
			$konten->timestamps = false;
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = Anggota::where('auth_id', '=' , $id)->first()->id;
			
			$konten->save();
			return "Success Update";
		}else
		{
			$konten = new Konten();
			$konten -> timestamps = false;
			$konten -> konten = $konten_welcome;
			$konten -> tipe_konten = 'misi';
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = Anggota::where('auth_id', '=' , $id)->first()->id;
			
			$konten -> save();
			
			return "Success Insert";
		}
	}
	
	public function add_regulasi()
	{
		if(Input::hasFile('fileReg'))
		{
			$file = Input::file('fileReg');
			$destination = "assets/file_upload/regulasi/";
			$fileName = $file->getClientOriginalName();
			$uploadSuccess   = $file->move($destinationPath, $filename);
			
			$reg = new Regulasi();
			$reg -> timestamps = false;
			$reg -> versi = Input::get('versi');
			$reg -> file_path = $destination.$fileName;
			$reg -> uploaded_by = UserController::getProfileId(Auth::user()->id);
			$reg -> tanggal_upload = Carbon::now();
			
			$reg -> save();
			
			return "success";
			
		}
		else
		{
			return "failed";
		}
	}
	
	public function get_all_regulasi()
	{
		$regulations = Regulasi::all();
		return $regulations;
	}
	
	public function update_gallery()
	{
		
	}
	
}

?>