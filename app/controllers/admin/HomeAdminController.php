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
		$slideshow = $this->get_slideshow();
		
		return View::make('pages.admin.home.slideshow', compact('slideshow'));
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
		$misi_hfi = HomeController::get_konten('misi');
		return View::make('pages.admin.home.misi' , compact('misi_hfi', 'regulations'));
	}
	
	public function view_regulasi()
	{
		//$regulations = $this->get_all_regulasi();
		//return View::make('pages.admin.home.regulasi', compact('regulations')); 				
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
			$konten -> edited_by = $id;
			
			$konten->save();
			return "Success Update";
		}else
		{
			$konten = new Konten();
			$konten -> timestamps = false;
			$konten -> konten = $konten_welcome;
			$konten -> tipe_konten = 'welcome';
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = $id;
			
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
			$konten -> edited_by = $id;
			
			$konten->save();
			return "Success Update";
		}else
		{
			$konten = new Konten();
			$konten -> timestamps = false;
			$konten -> konten = $konten_welcome;
			$konten -> tipe_konten = 'tentang';
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = $id;
			
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
			$konten -> edited_by = $id;
			
			$konten->save();
			return "Success Update";
		}else
		{
			$konten = new Konten();
			$konten -> timestamps = false;
			$konten -> konten = $konten_welcome;
			$konten -> tipe_konten = 'visi';
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = $id;
			
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
			$konten -> edited_by = $id;
			
			$konten->save();
			return "Success Update";
		}else
		{
			$konten = new Konten();
			$konten -> timestamps = false;
			$konten -> konten = $konten_welcome;
			$konten -> tipe_konten = 'misi';
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = $id;
			
			$konten -> save();
			
			return "Success Insert";
		}
	}
	
	public function add_regulasi()
	{
		// $rules = array(
			// 'versi' => 'required',
			// 'fileReg' => 'required'
		// );		
		// $validator = Validator::make(Input::all(), $rules);		
		// if($validator->fails())
		// {
			// return $validator->messages();
		// }
		
		if(Input::hasFile('fileReg'))
		{			
			$file = Input::file('fileReg');
			$destinationPath = "assets/file_upload/regulasi/";
			$fileName = $file->getClientOriginalName();
			// $uploadSuccess   = $file->move($destinationPath, $fileName);
			
			$reg = new Regulasi();
			$reg -> timestamps = false;
			$reg -> versi = Input::get('versi');
			//$reg -> file_path = $destinationPath.$fileName;
			$reg -> uploaded_by = Auth::user()->id;
			$reg -> tanggal_upload = Carbon::now();
			
			$reg -> save();
			
			$id_regulasi = $reg->id;
			$destinationPath .= $id_regulasi;
			$destinationPath .= "/";
			
			if(!file_exists($destinationPath))
			{
				File::makeDirectory($destinationPath, $mode = 0777, true, true);
				$uploadSuccess = $file->move($destinationPath, $fileName);
				$reg -> file_path = $destinationPath.$fileName;
				$reg ->save();
			}
			else
			{
				$uploadSuccess = $file->move($destinationPath, $fileName);
				$reg -> file_path = $destinationPath.$fileName;
				$reg -> save();
			}
			
			return "success";			
		}
		else
		{
			return "failed";
			
		}
	}
	
	public function get_all_regulasi()
	{		
		$count = Regulasi::all();
		//$regulations = Regulasi::paginate(5);
		//if($regulations==null){
		//echo $count;
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
	

	public function delete_regulasi()
	{
		$id_regulasi = Input::get('id_regulasi');
		$regulasi = Regulasi::find($id_regulasi);
		$file = $regulasi -> file_path;
		$file = $file;
		if(File::exists($file))
		{
			File::delete($file);
			$directory = "assets/file_upload/regulasi/".$regulasi->id;
			File::deleteDirectory($directory);
			$regulasi->delete();
			return "Success Delete";
		}
		else 
		{
			return "Failed Delete";
		}
	}
	
	//update foto slide
	public function update_foto_gallery()
	{	
		if(Input::hasFile('filePhoto'))
		{
			/*$imgType = Input::file('filePhoto')->getMimeType();				
			if(substr($imgType,0,6) != "image/"){
				return "gagal, harus berupa image!";
			}*/
			$id_img = Input::get('id_photo');
			$id = Auth::user()->id;
			
			$img_upload = Input::file('filePhoto');
			$file_name = $img_upload->getClientOriginalName();
			$destination = 'assets/file_upload/slideshow/'.$id_img.'/';
			
			$gallery = Gallery::find($id_img);
			if($gallery != NULL){ 
				//delete foto lama
				$pathLama = $gallery -> file_path;
				File::delete($pathLama);
			}else{
				$gallery = new Gallery();
				$gallery -> type = '1';
			}
			
			$uploadSuccess = $img_upload->move($destination, $file_name);
			$gallery -> timestamps = false;
			$gallery -> tanggal_upload = Carbon::now();
			$gallery -> uploaded_by = $id;
			$gallery -> file_path = $destination.$file_name;
			try{
				$gallery->save();
				return 'success';
			} catch (Exception $e) {
				return 'failed1';
			}
		}else
		{
			return 'failed2';
		}
	}
	
	public function update_caption()
	{
		$caption = Input::get('caption');
		$id = Auth::user()->id;
		$id_caption = Input::get('idCaption');
		$gallery = Gallery::find($id_caption);
		if($gallery==NULL) return 2; //ga ad gambar
		$gallery->kapsion = $caption;
		$gallery->timestamps = false;
		$gallery -> tanggal_upload = Carbon::now();
		$gallery -> uploaded_by = $id;
		try{
			$gallery->save();
			return 1; //success
		}catch(Exception $e){
			return $e;	
		}
	}
	
	public function get_slideshow()
	{
		$gal = Gallery::where('type','=', '1')->get();
		if(count($gal) != 0)
		{
			return $gal;
			
		}else
		{
			return "Failed";
		}
	}
}

?>