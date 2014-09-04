<?php

use Carbon\Carbon;

class BerkasAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		$arr = $this->setHeader();	
			//ngambil nama pengunggah tiap berkas
			$listberkas = $this->get_all_berkas();	//return null kalo kosong				
			if($listberkas!=null){
				$arrPengunggah = array();
				foreach($listberkas as $value){
					$pengunggah = DB::table('profile')->where('id', $value['uploaded_by'])->pluck('nama');
					$arrPengunggah[] = $pengunggah;
				}
			}else{
				$arrPengunggah = null;
			}					
		return View::make('pages.admin.berkas.berkas', compact('arr', 'arrPengunggah'));
	}		
	
	public function tambah_berkas()
	{
		if(Input::hasFile('fileBerkas'))
		{
			$file = Input::file('fileBerkas');
			$destinationPath = "assets/file_upload/berkas/";
			$fileName = $file->getClientOriginalName();
			$uploadSuccess = $file->move($destinationPath, $fileName);
						
			$berkas = new Berkas();
			$berkas -> timestamps = false;
			$berkas -> nama_file = Input::get("nama_file");
			$berkas -> path_file = $destinationPath.$fileName;
			$berkas -> uploaded_by = UserController::getProfileId(Auth::user()->id);
			$berkas -> uploaded_date = Carbon::now();
			$berkas -> deskripsi = Input::get("deskripsi");
			
			$berkas -> save();
			
			return Redirect::to('/admin')->with('message', "berhasil menambah file berkas");
		}
		else
		{
			return Redirect::to('/admin')->with('message', "gagal menambah file berkas");
		}
	}
	
	public function delete_berkas()
	{
		$id_berkas = Input::get("id_berkas");
		$berkas = Berkas::find($id_berkas);
		$file = $berkas -> path_file;
		$file = $file;
		if(File::exists($file))
		{
			File::delete($file);
			$berkas -> delete();
			return "Success Delete";
		}
		else
		{
			return "Failed Delete";
		}
	}
	
	public function get_all_berkas()
	{
		$count = Berkas::all();
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
}

?>