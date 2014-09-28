<?php

use Carbon\Carbon;

class Kegiatan2AdminController extends BaseController {
	
	public $restful = true;
	
	public function view_index($type)
	{
		$kegiatans = $this->get_all_kegiatan($type);
		return View::make('pages.admin.kegiatan.kegiatan_simposium',compact('kegiatans','type'));
		
	}
	
	public function get_all_kegiatan($jenis)
	{
		$kegiatan = Kegiatan::where('type','=',$jenis)->orderBy('waktu_mulai')->paginate(10);
		if(count($kegiatan) == 0)
		{
			return NULL;
		}
		else
		{
			return $kegiatan;
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

		$kegiatan->uploaded_by = Auth::user()->id;
		$kegiatan->type = Input::get('type');

		$kegiatan->timestamps = false;

		try {
			$kegiatan->save();
			return 'success';
		} catch (Exception $e) {
    		return 'Caught exception: '. $e->getMessage(). "\n";
		}
	}

	//delete
	public function delete_kegiatan($id){
		$kegiatan = Kegiatan::find($id);
		try {
			$kegiatan->delete();
			return 'success';
		} catch (Exception $e) {
			return $e;
		}
	}

	public function view_detail($id)
	{
		$kegiatan = Kegiatan::find($id);
		$nama_kegiatan = $kegiatan->nama_kegiatan;
		$type = $kegiatan->type;
		return View::make('pages.admin.kegiatan.simposium_index',compact('id','nama_kegiatan','type'));
	}

	public function view_general($id)
	{
		return View::make('pages.admin.kegiatan.simposium_general',compact('id'));
	}

	public function view_konten($id)
	{
		return View::make('pages.admin.kegiatan.simposium_konten_index',compact('id'));
	}

	public function view_harga($id)
	{
		return View::make('pages.admin.kegiatan.simposium_harga',compact('id'));
	}

	public function view_peserta($id)
	{
		return View::make('pages.admin.kegiatan.simposium_peserta',compact('id'));
	}

	public function view_pesan($id)
	{
		return View::make('pages.admin.kegiatan.simposium_pesan',compact('id'));
	}

	public function view_sponsor($id)
	{
		return View::make('pages.admin.kegiatan.simposium_sponsor',compact('id'));
	}
}
