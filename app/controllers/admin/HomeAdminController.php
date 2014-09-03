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
		$slideshow = get_slideshow;
		return View::make('pages.admin.home.slideshow', compact('slideshow'));
		//return View::make('pages.admin.home.slideshow');
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
		if(Input::hasFile('fileReg'))
		{
			
			$file = Input::file('fileReg');
			$destinationPath = "assets/file_upload/regulasi/";
			$fileName = $file->getClientOriginalName();
			$uploadSuccess   = $file->move($destinationPath, $fileName);
			
			$reg = new Regulasi();
			$reg -> timestamps = false;
			$reg -> versi = Input::get('versi');
			$reg -> file_path = $destinationPath.$fileName;
			$reg -> uploaded_by = Auth::user()->id;
			$reg -> tanggal_upload = Carbon::now();
			
			$reg -> save();
			

			//return "success";
			return Redirect::to('/admin')->with('message', "berhasil menambah file regulasi");
		}
		else
		{
			//return "failed";
			return Redirect::to('/admin')->with('message', "gagal menambah file regulasi");
		}
	}
	
	public function get_all_regulasi()
	{		
		$regulations = Regulasi::all();
		//$regulations = Regulasi::paginate(5);
		if($regulations==null){
			return "";
		}else{			
			return $regulations;
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
			$regulasi->delete();
			return "Success Delete";
		}
		else 
		{
			return "Failed Delete";
		}
	}
		
	public function update_gallery(){
	}

	public function update_foto_gallery()
	{	
		//$slideshow= 'Success';
		//return View::make('pages.adminPanel' , compact('slideshow'));
		
		//return Redirect::to('/admin')->with('editSlideShow',"'Success'");
		
		if(Input::hasFile('photo'))
		{
			$id_img = Input::get('id_photo');
			$id = Auth::user()->id;
			$img_upload = Input::file('photo');
			$file_name = $img_upload->getClientOriginalName();
			$destination = 'assets/file_upload/slideshow/';
			
			
			if(count($id_img) != 0 && $id_img!= 0 )
			{
				$gallery = Gallery::find($id_img);
				$pathLama = $gallery -> file_path;
				File::delete($pathLama);
				$uploadSuccess   = $img_upload->move($destination, $file_name);
				$gallery -> timestamps = false;
				$gallery -> tanggal_upload = Carbon::now();
				$gallery -> uploaded_by = $id;
				$gallery -> file_path = $destination.$file_name;
				$gallery->save();
				return Redirect::to('/admin')->with('editSlideShow',"'Success'");
			}else
			{
				$uploadSuccess   = $img_upload->move($destination, $file_name);
				$gallery = new Gallery();
				$gallery -> timestamps = false;
				$gallery -> type = '1';
				$gallery -> tanggal_upload = Carbon::now();
				$gallery -> uploaded_by = $id;
				$gallery -> file_path = $destination.$file_name;
				$gallery -> save();
				return Redirect::to('/admin')->with('editSlideShow',"'Success'");
			}
		}else
		{
			return Redirect::to('/admin')->with('editSlideShow',"'Failed'");
		}
		
	
	}
	
	public function update_caption()
	{
		$caption = Input::get('caption');
		$id = Auth::user()->id;
		$id_caption = Input::get('idCaption');
		if(count($id_caption) != 0)
		{
			$gallery = Gallery::find($id_caption->id);
			$gallery->kapsion = $caption;
			$gallery->timestamps = false;
			$gallery -> tanggal_upload = Carbon::now();
			$gallery -> uploaded_by = $id;
			
			$gallery->save();
			return "Success Update";
		}else
		{
			$gallery = new Gallery();
			$gallery -> timestamps = false;
			$gallery -> kapsion = $caption;
			$gallery -> type = '1';
			$gallery -> tanggal_upload = Carbon::now();
			$gallery -> uploaded_by = $id;
			
			$gallery -> save();
			
			return "Success Insert";
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