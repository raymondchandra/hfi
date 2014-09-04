<?php

class KegiatanAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
		$kegiatans = KegiatanController::get_all_kegiatan(); 
		return View::make('pages.admin.kegiatan.kegiatan',compact('kegiatans'));
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
		
	}
}

?>