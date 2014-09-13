<?php

use Carbon\Carbon;

class BerkasAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		// $arr = $this->setHeader();	
			// ngambil nama pengunggah tiap berkas
			// $listberkas = $this->get_all_berkas();	//return null kalo kosong				
			// if($listberkas!=null){
				// $arrPengunggah = array();
				// foreach($listberkas as $value){
					// $pengunggah = DB::table('profile')->where('id', $value['uploaded_by'])->pluck('nama');
					// $arrPengunggah[] = $pengunggah;
				// }
			// }else{
				// $arrPengunggah = null;
			// }					
		// return View::make('pages.admin.berkas.berkas', compact('arr', 'arrPengunggah'));
		//return View::make('pages.admin.berkas.berkas', compact('arr'));
		return View::make('pages.admin.berkas.berkas');
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
			$berkas -> nama_file = Input::get("nama_berkas");
			$berkas -> path_file = $destinationPath.$fileName;
			//$berkas -> uploaded_by = Auth::user()->profile_id;			
			$berkas -> uploaded_by = Input::get("id_pengunggah");
			$berkas -> uploaded_date = Carbon::now();
			$berkas -> deskripsi = Input::get("deskripsi_berkas");
			
			$berkas -> save();
			
			//return Redirect::to('/admin')->with('message', "berhasil menambah file berkas");
			return "Berhasil menambah berkas";
		}
		else
		{
			//return Redirect::to('/admin')->with('message', "gagal menambah file berkas");
			return "Gagal menambah berkas";
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
	
	public function edit_berkas()
	{
		$id_berkas = Input::get("id_berkas");
		$berkas = Berkas::find($id_berkas);
		if($berkas!=null){
			$berkas->nama_file = Input::get("nama_berkas");
			$berkas->deskripsi = Input::get("deskripsi_berkas");
			$berkas->timestamps = false;
			$berkas->save();
			return "Berhasil Edit";
		}else{
			return "Gagal Edit";
		}		
	}
	
	public function get_all_berkas()
	{
		$count = Berkas::all();
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
}

?>