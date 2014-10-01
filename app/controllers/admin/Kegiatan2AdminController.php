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
		$kegiatan = Kegiatan2::where('tipe','=',$jenis)->orderBy('waktu_mulai')->paginate(10);
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
		$kegiatan = new Kegiatan2();
		$kegiatan->nama = Input::get('nama_kegiatan');
		$kegiatan->tempat = Input::get('tempat');
		$datepiece = explode('.',Input::get('tanggal_mulai'));
		$date_start = $datepiece[2].'-'.$datepiece[1].'-'.$datepiece[0];
		$datepiece = explode('.',Input::get('tanggal_selesai'));
		$date_finish = $datepiece[2].'-'.$datepiece[1].'-'.$datepiece[0];
		$kegiatan->waktu_mulai = $date_start;
		$kegiatan->waktu_selesai = $date_finish;

		$kegiatan->tipe = Input::get('type');

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
		$kegiatan = Kegiatan2::find($id);
		try {
			$kegiatan->delete();
			return 'success';
		} catch (Exception $e) {
			return $e;
		}
	}

	public function edit_kegiatan($id){
		return 'as';
		/*$kegiatan = Kegiatan2::find($id);
		$kegiatan->nama = Input::get('nama');
		$kegiatan->tempat = Input::get('tempat');
		$datepiece = explode('.',Input::get('tanggal_mulai'));
		$date_start = $datepiece[2].'-'.$datepiece[1].'-'.$datepiece[0];
		$datepiece = explode('.',Input::get('tanggal_selesai'));
		$date_finish = $datepiece[2].'-'.$datepiece[1].'-'.$datepiece[0];
		$kegiatan->waktu_mulai = $date_start;
		$kegiatan->waktu_selesai = $date_finish;

		try {
			$kegiatan->save();
			return 'success';
		} catch (Exception $e) {
    		return 'Caught exception: '. $e->getMessage(). "\n";
		}*/
	}

	public function edit_status($id){
		$kegiatan = Kegiatan2::find($id);
		$kegiatan->openRegistration = Input::get('status');

		try {
			$kegiatan->save();
			return 'success';
		} catch (Exception $e) {
    		return 'Caught exception: '. $e->getMessage(). "\n";
		}
	}

	public function edit_stat_admin($id){
		$kegiatan = Kegiatan2::find($id);
		$kegiatan->status_admin = Input::get('status');

		try {
			$kegiatan->save();
			return 'success';
		} catch (Exception $e) {
    		return 'Caught exception: '. $e->getMessage(). "\n";
		}
	}

	public function edit_pass_admin($id){
		$kegiatan = Kegiatan2::find($id);
		$password = Hash::make(Input::get('pass'));
		$kegiatan->pass_admin = $password;

		try {
			$kegiatan->save();
			return 'success';
		} catch (Exception $e) {
    		return 'Caught exception: '. $e->getMessage(). "\n";
		}
	}

	public function view_detail($id)
	{
		$kegiatan = Kegiatan2::find($id);
		$nama_kegiatan = $kegiatan->nama;
		return View::make('pages.simposium.admin.simposium_index',compact('id','nama_kegiatan'));
	}

	public function view_general($id)
	{
		$kegiatan = Kegiatan2::find($id);
		$nama_kegiatan = $kegiatan->nama;
		return View::make('pages.simposium.admin.simposium_general',compact('id','nama_kegiatan'));
	}

	public function view_konten($id)
	{
		$kegiatan = Kegiatan2::find($id);
		$nama_kegiatan = $kegiatan->nama;
		return View::make('pages.simposium.admin.simposium_konten_index',compact('id','nama_kegiatan'));
	}

	

	public function view_header($id)
	{
		$kegiatan = Kegiatan2::find($id);
		$nama_kegiatan = $kegiatan->nama;
		return View::make('pages.simposium.admin.simposium_header',compact('id','nama_kegiatan'));
	}

	public function view_sponsor($id)
	{
		$kegiatan = Kegiatan2::find($id);
		$nama_kegiatan = $kegiatan->nama;
		return View::make('pages.simposium.admin.simposium_sponsor',compact('id','nama_kegiatan'));
	}

	public function view_editor($type,$id)
	{
		$kegiatan = Kegiatan2::find($id);
		$nama_kegiatan = $kegiatan->nama;
		$title = ucwords($type);
		$text = "editor";
		return View::make('pages.simposium.admin.simposium_editor',compact('id','nama_kegiatan','title','text'));
	}

	public function view_harga($id)
	{
		return View::make('pages.simposium.admin.simposium_harga',compact('id'));
	}

	public function view_peserta($id)
	{
		return View::make('pages.simposium.admin.simposium_peserta',compact('id'));
	}

	public function view_pesan($id)
	{
		return View::make('pages.simposium.admin.simposium_pesan',compact('id'));
	}

	public function view_berkas($id)
	{
		return View::make('pages.simposium.admin.simposium_sponsor',compact('id'));
	}

	public function view_template($id)
	{
		return View::make('pages.simposium.admin.simposium_sponsor',compact('id'));
	}
}
