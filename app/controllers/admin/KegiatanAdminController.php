<?php

class KegiatanAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_index($jenis)
	{
		$kegiatans = KegiatanController::get_all_kegiatan();
		if($jenis == 0){
			return View::make('pages.admin.kegiatan.kegiatan_nasional',compact('kegiatans'));
		}
		elseif($jenis == 1){
			return View::make('pages.admin.kegiatan.kegiatan_internasional',compact('kegiatans'));
		}
		elseif($jenis == 2){
			return View::make('pages.admin.kegiatan.kegiatan',compact('kegiatans'));
		}
		else{
			return View::make('pages.admin.kegiatan.kegiatan',compact('kegiatans'));
		}
		
	}
	
	public function add_kegiatan()
	{
		$kegiatan = new Kegiatan();
		$kegiatan->nama_kegiatan = Input::get('nama_kegiatan');
		$kegiatan->tempat = Input::get('tempat');
		$kegiatan->waktu_mulai = Input::get('waktu_mulai');
		$kegiatan->waktu_selesai = Input::get('waktu_selesai');
		$kegiatan->deskripsi = Input::get('deskripsi');
		$kegiatan->uploaded_by = Auth::user()->id;
		$kegiatan->link = Input::get('link');
		$kegiatan->timestamps = false;
		try {
			$kegiatan->save();
			return "Success Insert";
		} catch (Exception $e) {
    		return 'Caught exception: '. $e->getMessage(). "\n";
		}	
		
	}
	
	public function edit_kegiatan()
	{
		$id_kegiatan = Input::get('id_kegiatan');
		$kegiatan = Kegiatan::find($id_kegiatan);
		$kegiatan->nama_kegiatan = Input::get('nama_kegiatan');
		$kegiatan->tempat = Input::get('tempat');
		$kegiatan->waktu_mulai = Input::get('waktu_mulai');
		$kegiatan->waktu_selesai = Input::get('waktu_selesai');
		$kegiatan->deskripsi = Input::get('deskripsi');
		$kegiatan->uploaded_by = Auth::user()->id;
		$kegiatan->link = Input::get('link');
		$kegiatan->timestamps = false;
		try {
			$kegiatan->save();
			return "Success Update";
		} catch (Exception $e) {
    		return 'Caught exception: '. $e->getMessage(). "\n";
		}
	}
	
	public function del_kegiatan()
	{
		$id_kegiatan = Input::get('id_kegiatan');
		$kegiatan = Kegiatan::find($id_kegiatan);
		try {
			$kegiatan->delete();
			return "Success Delete";
		} catch (Exception $e) {
    		return 'Caught exception: '. $e->getMessage(). "\n";
		}
		
	}
	
	public function edit_fotoKegiatan()
	{
		if(Input::hasFile('photo'))
		{
			$id_kegiatan = Input::get('id_kegiatan');
			$id = Auth::user()->id;
			$img_upload = Input::file('photo');
			$file_name = $img_upload->getClientOriginalName();
			
			
			$kegiatan = Kegiatan::find($id_kegiatan);
			if($kegiatan == NULL)
			{
				//error
				return "Gagal Update Foto";
			}
			else
			{
				$pathLama = $kegiatan -> brosur_kegiatan;
				if($pathLama != NULL)
				{
					File::delete($pathLama);
					$destination = 'assets/file_upload/kegiatan/'.$kegiatan->id;
				}
				$uploadSuccess   = $img_upload->move($destination, $file_name);
				$kegiatan -> timestamps = false;
				$kegiatan->brosur_kegiatan = $destination.$file_name;
				$kegiatan->save();
				return "Success Update Foto";
				
			}
		}else
		{
			return "Gagal Update Foto";
		}
	}
}

?>