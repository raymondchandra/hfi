<?php

use Carbon\Carbon;
class KegiatanAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_index($jenis)
	{
		$kegiatans = KegiatanController::get_all_kegiatan($jenis);
		if($jenis == 1){
			return View::make('pages.admin.kegiatan.kegiatan_nasional',compact('kegiatans'));
		}
		elseif($jenis == 2){
			return View::make('pages.admin.kegiatan.kegiatan_internasional',compact('kegiatans'));
		}
	}
	
	public function get_kegiatan(){
		$id = Input::get('id_kegiatan');
		$kegiatan = Kegiatan::find($id);
		if(count($kegiatan) == 1){
			return $kegiatan;
		}
		else{
			return null;
		}
	}
	
	public function add_kegiatan()
	{
		$kegiatan = new Kegiatan();
		$kegiatan->nama_kegiatan = Input::get('nama_kegiatan');
		$kegiatan->tempat = Input::get('tempat');
		$datepiece = explode('.',Input::get('tanggal_mulai'));
		$date_start = $datepiece[2].'-'.$datepiece[1].'-'.$datepiece[0].' '.Input::get('waktu_mulai').':00';
		$datepiece = explode('.',Input::get('tanggal_selesai'));
		$date_finish = $datepiece[2].'-'.$datepiece[1].'-'.$datepiece[0].' '.Input::get('waktu_selesai').':00';
		$kegiatan->waktu_mulai = $date_start;
		$kegiatan->waktu_selesai = $date_finish;
		$kegiatan->deskripsi = Input::get('deskripsi');
		$kegiatan->uploaded_by = Auth::user()->id;
		$kegiatan->link = Input::get('link');
		$kegiatan->type = Input::get('type');
		$kegiatan->timestamps = false;
		
		try {
			$kegiatan->save();
			$destination = 'assets/file_upload/kegiatan/'.$kegiatan->id.'/';
			if(Input::hasFile('brosur')){
				$photo = Input::file('brosur');
				$kegiatan->brosur_kegiatan = $destination.$photo->getClientOriginalName();
				$photo->move($destination, $photo->getClientOriginalName());
			}
			$kegiatan->save();
			return "Berhasil Tambah Kegiatan";
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
		$datepiece = explode('.',Input::get('tanggal_mulai'));
		$date_start = $datepiece[2].'-'.$datepiece[1].'-'.$datepiece[0].' '.Input::get('waktu_mulai').':00';
		$datepiece = explode('.',Input::get('tanggal_selesai'));
		$date_finish = $datepiece[2].'-'.$datepiece[1].'-'.$datepiece[0].' '.Input::get('waktu_selesai').':00';
		$kegiatan->waktu_mulai = $date_start;
		$kegiatan->waktu_selesai = $date_finish;
		$kegiatan->deskripsi = Input::get('deskripsi');
		$kegiatan->uploaded_by = Auth::user()->id;
		$kegiatan->link = Input::get('link');
		$kegiatan->type = Input::get('type');
		$kegiatan->timestamps = false;
		
		try {
			$kegiatan->save();
			$destination = 'assets/file_upload/kegiatan/'.$kegiatan->id.'/';
			if(Input::hasFile('brosur')){
				$photo = Input::file('brosur');
				$kegiatan->brosur_kegiatan = $destination.$photo->getClientOriginalName();
				$photo->move($destination, $photo->getClientOriginalName());
			}
			$kegiatan->save();
			return "Berhasil Rubah Data Kegiatan";
		} catch (Exception $e) {
    		return 'Caught exception: '. $e->getMessage(). "\n";
		}
	}
	
	public function del_kegiatan()
	{
		$id_kegiatan = Input::get('id_kegiatan');
		$kegiatan = Kegiatan::find($id_kegiatan);
		if(count($kegiatan)!=1){
			return "";
		}
		if($kegiatan->type == 1 || $kegiatan->type == 2){
			try {
				$kegiatan->delete();
				return "Berhasil Hapus Kegiatan";
			} catch (Exception $e) {
	    		return 'Caught exception: '. $e->getMessage(). "\n";
			}
		}else{
			return 'Error Delete';
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