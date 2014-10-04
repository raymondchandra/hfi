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
		$datepiece = explode('-',Input::get('tanggal_mulai'));
		$date_start = $datepiece[2].'-'.$datepiece[1].'-'.$datepiece[0];
		$datepiece = explode('-',Input::get('tanggal_selesai'));
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
		$kegiatan = Kegiatan2::find($id);
		$kegiatan->nama = Input::get('nama');
		$kegiatan->tempat = Input::get('tempat');
		$datepiece = explode('-',Input::get('tanggal_mulai'));
		$date_start = $datepiece[2].'-'.$datepiece[1].'-'.$datepiece[0];
		
		$datepiece = explode('-',Input::get('tanggal_selesai'));
		$date_finish = $datepiece[2].'-'.$datepiece[1].'-'.$datepiece[0];
		$kegiatan->waktu_mulai = $date_start;
		$kegiatan->waktu_selesai = $date_finish;
		$kegiatan->timestamps = false;
		try {
			$kegiatan->save();
			return 'success';
		} catch (Exception $e) {
    		return 'Caught exception: '. $e->getMessage(). "\n";
		}
	}

	public function edit_status($id){
		$kegiatan = Kegiatan2::find($id);
		$kegiatan->openRegistration = Input::get('status');
		$kegiatan->timestamps = false;
		try {
			$kegiatan->save();
			return 'success';
		} catch (Exception $e) {
    		return 'Caught exception: '. $e->getMessage(). "\n";
		}
	}

	public function edit_stat_admin($id){
		$kegiatan = Kegiatan2::find($id);
		$kegiatan->admin_aktif = Input::get('status');

		$kegiatan->timestamps = false;
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

		$kegiatan->timestamps = false;
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
		$date= date_create($kegiatan->waktu_mulai);
		$tanggal_mulai = date_format($date,"d-m-Y");
		$date= date_create($kegiatan->waktu_selesai);
		$tanggal_selesai = date_format($date,"d-m-Y");
		return View::make('pages.simposium.admin.simposium_general',compact('id','kegiatan','tanggal_mulai','tanggal_selesai'));
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
		
		$konten = KegiatanKonten::where('tipe', '=', $type)->first();
		$text = "";
		if($konten != null){
			$text = $konten->konten;
		}
		
		return View::make('pages.simposium.admin.simposium_editor',compact('type','id','nama_kegiatan','title','text'));
	}

	public function edit_editor($id)
	{
		$text = Input::get('text');
		$type = Input::get('type');

		$konten_id = KegiatanKonten::where('tipe', '=', $type)->first();
		if(count($konten_id) != 0)
		{
			$konten = KegiatanKonten::find($konten_id->id);
			$konten->konten = $text;
			$konten->timestamps = false;
			$konten -> tanggal_edit = Carbon::now();

			$konten->save();
			return "Success Update";
		}else
		{
			$konten = new KegiatanKonten();
			$konten -> timestamps = false;
			$konten -> konten = $text;
			$konten -> tipe = $type;
			$konten -> tanggal_edit = Carbon::now();
			$konten -> id_kegiatan = $id;
			$konten -> save();
			
			return "Success Insert";
		}
		return 'asdf';
	}

	public function view_harga($id)
	{

		$kegiatan = Kegiatan2::find($id);
		$date= date_create($kegiatan->early_start);
		$tanggal_mulai = date_format($date,"d-m-Y");
		$date= date_create($kegiatan->early_finish);
		$tanggal_selesai = date_format($date,"d-m-Y");
		return View::make('pages.simposium.admin.simposium_harga',compact('id','kegiatan','tanggal_mulai','tanggal_selesai'));
	}

	public function edit_early($id){
		$kegiatan = Kegiatan2::find($id);
		$datepiece = explode('-',Input::get('tanggal_mulai'));
		$date_start = $datepiece[2].'-'.$datepiece[1].'-'.$datepiece[0];
		$datepiece = explode('-',Input::get('tanggal_selesai'));
		$date_finish = $datepiece[2].'-'.$datepiece[1].'-'.$datepiece[0];
		$kegiatan->early_start = $date_start;
		$kegiatan->early_finish = $date_finish;

		$kegiatan->timestamps = false;
		try {
			$kegiatan->save();
			return 'success';
		} catch (Exception $e) {
    		return 'Caught exception: '. $e->getMessage(). "\n";
		}
	}

	public function view_peserta($id)
	{
		return View::make('pages.simposium.admin.simposium_peserta',compact('id'));
	}

	public function view_pesan($id)
	{
		$pesan = Pesan::where('id_kegiatan', '=', $id)->get();
		foreach($pesan as $msg)
		{
			$msg['nama'] = $this->getNamaPesertaFromId($msg['id_peserta']);
		}
		return View::make('pages.simposium.admin.simposium_pesan',compact('id','pesan'));
	}
	
	public function getNamaPesertaFromId($id)
	{
		$nama = Peserta::where('id' ,'=' ,$id)->first();
		
		return $nama->nama;
	}
	
	public function getMessageById($id)
	{
		$msg = Pesan::find($id);
		return $msg;
	}
	
	public function getMessageReply($id)
	{
		$rep = Reply::where('id_pesan', '=', $id)->get();
		
		return $rep;
	}
	
	//pindahin-------
	public function getRegTemplate($id)
	{
		$template = Template::where('id_kegiatan', '=' , $id)->where('type', '=', 'reg')->get();
		
		return $template;
	}
	
	public function updateRegTemplate($id, $text)
	{
		$template = Template::where('id_kegiatan', '=' , $id)->where('type', '=', 'reg')->get();
		
		if($template == null)
		{
			$template = new Template();
			$template->id_kegiatan = $id;
			$template->tipe = 'reg';
			$template->text = $text;
			
			try
			{
				$template->save();
			}
			catch(Exception $e)
			{
				
			}
		}
		else
		{
			$template->text = $text;
			try
			{
				$template->save();
			}
			catch(Exception $e)
			{
				
			}
		}
	}
	
	public function getAbsTemplate($id)
	{
		$template = Template::where('id_kegiatan', '=' , $id)->where('type', '=', 'abs')->get();
		
		return $template;
	}
	
	public function updateAbsTemplate($id, $text)
	{
		$template = Template::where('id_kegiatan', '=' , $id)->where('type', '=', 'abs')->get();
		
		if($template == null)
		{
			$template = new Template();
			$template->id_kegiatan = $id;
			$template->tipe = 'abs';
			$template->text = $text;
			
			try
			{
				$template->save();
			}
			catch(Exception $e)
			{
				
			}
		}
		else
		{
			$template->text = $text;
			try
			{
				$template->save();
			}
			catch(Exception $e)
			{
				
			}
		}
	}
	
	public function getPapTemplate($id)
	{
		$template = Template::where('id_kegiatan', '=' , $id)->where('type', '=', 'pap')->get();
		
		return $template;
	}
	
	public function updatePapTemplate($id, $text)
	{
		$template = Template::where('id_kegiatan', '=' , $id)->where('type', '=', 'pap')->get();
		
		if($template == null)
		{
			$template = new Template();
			$template->id_kegiatan = $id;
			$template->tipe = 'pap';
			$template->text = $text;
			
			try
			{
				$template->save();
			}
			catch(Exception $e)
			{
				
			}
		}
		else
		{
			$template->text = $text;
			try
			{
				$template->save();
			}
			catch(Exception $e)
			{
				
			}
		}
	}
	
	public function getPdfTemplate($id)
	{
		$template = Template::where('id_kegiatan', '=' , $id)->where('type', '=', 'pdf')->get();
		
		return $template;
	}
	
	public function updatePdfTemplate($id, $text)
	{
		$template = Template::where('id_kegiatan', '=' , $id)->where('type', '=', 'pdf')->get();
		
		if($template == null)
		{
			$template = new Template();
			$template->id_kegiatan = $id;
			$template->tipe = 'pdf';
			$template->text = $text;
			
			try
			{
				$template->save();
			}
			catch(Exception $e)
			{
				
			}
		}
		else
		{
			$template->text = $text;
			try
			{
				$template->save();
			}
			catch(Exception $e)
			{
				
			}
		}
	}
	
	//--------

	public function view_berkas($id)
	{
		return View::make('pages.simposium.admin.simposium_sponsor',compact('id'));
	}

	public function view_template($id)
	{
		return View::make('pages.simposium.admin.simposium_sponsor',compact('id'));
	}
}
