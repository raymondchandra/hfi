<?php

use Carbon\Carbon;

class Kegiatan2AdminController extends BaseController {
	
	public $restful = true;
	
	public function view_index($type)
	{
		$kegiatans = $this->get_all_kegiatan($type);
		if($type==3){
			return View::make('pages.admin.kegiatan.kegiatan_simposium',compact('kegiatans','type'));
		}else{
			return View::make('pages.admin.kegiatan.kegiatan_ictap',compact('kegiatans','type'));
		}
		
		
	}
	
	public function get_all_kegiatan($jenis)
	{
		$kegiatan = Kegiatan2::where('tipe','=',$jenis)->orderBy('waktu_mulai','DESC')->paginate(10);
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
		if($kegiatan != null)
		{
			$nama_kegiatan = $kegiatan->nama;
		}
		else
		{
			$nama_kegiatan = "kosong";
		}
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
		$header = Kegiatanfile::where('id_kegiatan','=',$id)->where('tipe','=','header')->first();
		$sponsors = Kegiatanfile::where('id_kegiatan','=',$id)->where('tipe','=','sponsor')->get();
		return View::make('pages.simposium.admin.simposium_header',compact('id','nama_kegiatan','header','sponsors'));
	}

	public function update_header($id)
	{	
		if(Input::hasFile('filePhoto'))
		{
			$file = Input::file('filePhoto');
			$destinationPath = "assets/file_upload/kegiatan/berkas/";
			$fileName = $file->getClientOriginalName();
			
			$berkas = Kegiatanfile::where('id_kegiatan','=',$id)->where('tipe','=','header')->first();
		
			if($berkas != NULL){
				//delete foto lama
				$pathLama = $berkas -> file_path;
				File::delete($pathLama);
			}else{
				$berkas = new Kegiatanfile();
			}
			$berkas -> timestamps = false;
			$berkas -> id_kegiatan = $id;
			$berkas -> nama = 'header';
			$berkas -> uploaded = Carbon::now();
			$berkas -> tipe = 'header';
			try {
				$berkas -> save();
			} catch (Exception $e) {
				return $e;
			}
			
			
			$berkas_id = $berkas->id;
			$destinationPath .= $berkas_id;
			$destinationPath .= "/";
			
			if(!file_exists($destinationPath))
			{
				File::makeDirectory($destinationPath, $mode = 0777, true, true);
			}
			$uploadSuccess = $file->move($destinationPath, $fileName);
			$berkas -> file_path = $destinationPath.$fileName;

			try {
				$berkas -> save();
				return 'success';
			} catch (Exception $e) {
				return $e;
			}
		}else
		{
			return 'failed';
		}
	}

	public function tambah_sponsor($id)
	{
		if(Input::hasFile('filePhoto'))
		{
			$file = Input::file('filePhoto');
			$destinationPath = "assets/file_upload/kegiatan/berkas/";
			$fileName = $file->getClientOriginalName();
			
			
			$berkas = new Kegiatanfile();
			$berkas -> timestamps = false;
			$berkas -> id_kegiatan = $id;
			$berkas -> nama = 'sponsor';
			$berkas -> uploaded = Carbon::now();
			$berkas -> tipe = 'sponsor';
			try {
				$berkas -> save();
			} catch (Exception $e) {
				return $e;
			}
			
			
			$berkas_id = $berkas->id;
			$destinationPath .= $berkas_id;
			$destinationPath .= "/";
			
			if(!file_exists($destinationPath))
			{
				File::makeDirectory($destinationPath, $mode = 0777, true, true);
			}
			$uploadSuccess = $file->move($destinationPath, $fileName);
			$berkas -> file_path = $destinationPath.$fileName;

			try {
				$berkas -> save();
				return 'success';
			} catch (Exception $e) {
				return $e;
			}
		}else
		{
			return 'failed';
		}
	}

	public function hapus_sponsor($id)
	{
		$id_sponsor = Input::get('id_sponsor');
		
		$berkas = Kegiatanfile::find($id_sponsor);
		try {
			$berkas->delete();
			return 'success';
		} catch (Exception $e) {
			return $e;
		}
	}

	public function update_sponsor($id)
	{	
		if(Input::hasFile('filePhoto'))
		{
			$file = Input::file('filePhoto');
			$destinationPath = "assets/file_upload/kegiatan/berkas/";
			$fileName = $file->getClientOriginalName();
			$id_sponsor = Input::get('id_sponsor');
			$berkas = Kegiatanfile::find($id_sponsor);
		
			if($berkas != NULL){
				//delete foto lama
				$pathLama = $berkas -> file_path;
				File::delete($pathLama);
			}else{
				return 'Not found';
			}
			$berkas -> timestamps = false;
			$berkas -> id_kegiatan = $id;
			$berkas -> nama = 'sponsor';
			$berkas -> uploaded = Carbon::now();
			$berkas -> tipe = 'sponsor';
			try {
				$berkas -> save();
			} catch (Exception $e) {
				return $e;
			}
			
			
			$berkas_id = $berkas->id;
			$destinationPath .= $berkas_id;
			$destinationPath .= "/";
			
			if(!file_exists($destinationPath))
			{
				File::makeDirectory($destinationPath, $mode = 0777, true, true);
			}
			$uploadSuccess = $file->move($destinationPath, $fileName);
			$berkas -> file_path = $destinationPath.$fileName;

			try {
				$berkas -> save();
				return 'success';
			} catch (Exception $e) {
				return $e;
			}
		}else
		{
			return 'failed';
		}
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
		$harga = Harga::where('id_kegiatan','=',$id)->get();
		return View::make('pages.simposium.admin.simposium_harga',compact('id','kegiatan','tanggal_mulai','tanggal_selesai','harga'));
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

	public function tambahHarga($id){


		$input = array(
			'kategori' => Input::get('kategori'),
			'early' => Input::get('early'),
			'normal' => Input::get('normal'),
			'header' => Input::get('header')
		);
		
		$rules = array(
			'kategori' => 'required',
			'early' => '',
			'normal' => '',
			'header' => ''
		);

		//validate
		$validator = Validator::make($input, $rules);
		if ($validator->fails())
		{
			return 'Gagal menambah harga';//$validator->messages();
		}
		//save
		try {
			$harga = new Harga();
			$harga->id_kegiatan = $id;
			$harga->kategori = $input['kategori'];
			$harga->harga_early = $input['early'];
			$harga->harga_normal = $input['normal'];
			$harga->isHeader = $input['header'];
			$harga->timestamps = false;

			$harga->save();

			return 'success';
		} catch (Exception $e) {
			return $e;
		}
	}

	public function editHarga($id){

		$idBener = Input::get('id');
		$input = array(
			'kategori' => Input::get('kategori'),
			'early' => Input::get('early'),
			'normal' => Input::get('normal'),
			'header' => Input::get('header')
		);
		
		$rules = array(
			'kategori' => 'required',
			'early' => '',
			'normal' => '',
			'header' => ''
		);

		//validate
		$validator = Validator::make($input, $rules);
		if ($validator->fails())
		{
			return 'Gagal merubah harga';//$validator->messages();
		}
		//save
		try {
			$harga = Harga::find($idBener);
			$harga->kategori = $input['kategori'];
			$harga->harga_early = $input['early'];
			$harga->harga_normal = $input['normal'];
			$harga->isHeader = $input['header'];
			$harga->timestamps = false;

			$harga->save();

			return 'success';
		} catch (Exception $e) {
			return $e;
		}
	}

	public function hapus_harga($id){
		$idBener = Input::get('id');
		$harga = Harga::find($idBener);
		try {
			$harga->delete();
			return 'success';
		} catch (Exception $e) {
			return $e;
		}
	}

	public function view_peserta($id)
	{
		$pesertas = $this->get_peserta_of($id);
		return View::make('pages.simposium.admin.simposium_peserta',compact('id','pesertas'));
	}

	
	public function get_peserta_of($id){
		$pesertas = Peserta::where('id_kegiatan','=',$id)->get();
		if(count($pesertas)!=0){
			return $pesertas;
		}
		else{
			return null;
		}
	}
	
	public function get_one_peserta($id){
		$peserta = Peserta::find($id);
		return $peserta;
	}
	
	public function update_status_pembayaran(){
		$id = Input::get('id');
		$status = Input::get('bayar');
		
		$peserta = Peserta::find($id);
		
		if(count($peserta)==1){
			$peserta->status_bayar = $status;
		
			$peserta->save();
			
			return "Berhasil";
		}
		else{
				return "Gagal";
		}
	}
	
	public function update_status_abstrak(){
		$id = Input::get('id');
		$status = Input::get('bayar');
		
		$peserta = Peserta::find($id);
		
		if(count($peserta)==1){
			$peserta->abstract_read = $status;
		
			$peserta->save();
			
			return "Berhasil";
		}
		else{
			return "Gagal";
		}
	}
	
	public function update_status_paper(){
		$id = Input::get('id');
		$status = Input::get('bayar');
		
		$peserta = Peserta::find($id);
		
		if(count($peserta)==1){
			$peserta->paper_read = $status;
		
			$peserta->save();
			
			return "Berhasil";
		}
		else{
			return "Gagal";
		}
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
	
	public function getMessageById()
	{
		$id = Input::get('id_pesan');
		$msg = Pesan::find($id);
		$msg -> timestamps = false;
		$msg -> read = 1;
		try
		{
			$msg->save();
		}
		catch(Exception $e)
		{
		
		}
		$msg['nama'] = $this->getNamaPesertaFromId($msg['id_peserta']);
		return $msg;
	}
	
	public function getMessageReply()
	{
		$id = Input::get('id_pesan');
		$rep = Reply::where('pesan_id', '=', $id)->orderBy('created_at', 'DESC')->get();
		return $rep;
	}
		
	
	
	public function replyMessage()
	{
		if(Input::hasFile('attachment'))
		{
			$rep = new Reply();
			$rep -> timestamps = false;
			
			$file = Input::file('attachment');
			$fileName = $file->getClientOriginalName();
			$destinationPath = "assets/file_upload/reply_attachment/";
			
			$rep -> pesan_id = Input::get('id_pesan');
			$rep -> message = Input::get('text');
			$rep -> attachment = $fileName;
			$rep -> created_at = Carbon::now();
		
			try
			{
				$rep -> save();
				$id = $rep->id;
				$destinationPath .= $id."/";
				if(!file_exists($destinationPath))
				{
					File::makeDirectory($destinationPath, $mode = 0777, true, true);
					$uploadSuccess = $file->move($destinationPath, $fileName);
				}
				else
				{
					$uploadSuccess = $file->move($destinationPath, $fileName);
				}
				//dapetin pesan
				$psn = Pesan::where('id','=',$pesan_id)->first();
				//dapetin peserta
				$psrt = Peserta::where('id','=',$psn->id_peserta)->first();
				$data = array(
					'text'=>$templateContext
				);
				Mail::queue('emails.simposiumPesan', $data, function($message)
				{
					$message->to($psrt->email)->subject("Re-".$psn->subject);
					$message->attach($destinationPath.$fileName);
				});
				
				return $rep;
			}
			catch(Exception $e)
			{
				return "Gagal membalas pesan";
			}
		}
		else
		{
			$rep = new Reply();
			$rep -> timestamps = false;
			
			
			$rep -> pesan_id = Input::get('id_pesan');
			$rep -> message = Input::get('text');
			$rep -> attachment = "-";
			$rep -> created_at = Carbon::now();
		
			try
			{
				$rep -> save();
				//dapetin pesan
				$psn = Pesan::where('id','=',$pesan_id)->first();
				//dapetin peserta
				$psrt = Peserta::where('id','=',$psn->id_peserta)->first();
				$data = array(
					'text'=>$templateContext
				);
				Mail::queue('emails.simposiumPesan', $data, function($message)
				{
					$message->to($psrt->email)->subject("Re-".$psn->subject);
				});
				return $rep;
			}
			catch(Exception $e)
			{
				return "Gagal membalas pesan ".$e;
			}
		}
	}
	
	//pindahin-------
	public function updateTemplate()
	{
		$type = Input::get('type');
		$id = Input::get('id');
		$text = Input::get('text');
		if($type === "Registrasi")
		{
			return $this->updateRegTemplate($id,$text);
		}
		else if($type === "Penerimaan Abstrak")
		{
			return $this->updateAbsTemplate($id,$text);
		}
		else if($type === "Surat Undangan")
		{
			return $this->updateInvTemplate($id,$text);
		}
		else if($type === "Penerimaan Paper Lengkap")
		{
			return $this->updatePapTemplate($id,$text);
		}
		else
		{
			
		}
	}
	
	public function getRegTemplate($id)
	{
		$template = Template::where('id_kegiatan', '=' , $id)->where('tipe', '=', 'reg')->first();
		
		return $template;
	}
	
	public function updateRegTemplate($id, $text)
	{ 
		$template = Template::where('id_kegiatan', '=' , $id)->where('tipe', '=', 'reg')->first();
		$template->timestamps = false;
			
		if($template == null)
		{
			$template = new Template();
			$template->id_kegiatan = $id;
			$template->tipe = 'reg';
			$template->text = $text;
			
			try
			{
				$template->save();return "berhasil update";
			}
			catch(Exception $e)
			{
				return "gagal update";
			}
		}
		else
		{
			$template->text = $text;
			try
			{
				$template->save();return "berhasil update";
			}
			catch(Exception $e)
			{
				return "gagal update";
			}
		}
	}
	
	public function getAbsTemplate($id)
	{
		$template = Template::where('id_kegiatan', '=' , $id)->where('tipe', '=', 'abs')->first();
		
		return $template;
	}
	
	public function updateAbsTemplate($id, $text)
	{
		$template = Template::where('id_kegiatan', '=' , $id)->where('tipe', '=', 'abs')->first();
		$template->timestamps = false;
			
		if($template == null)
		{
			$template = new Template();
			$template->id_kegiatan = $id;
			$template->tipe = 'abs';
			$template->text = $text;
			
			try
			{
				$template->save();return "berhasil update";
			}
			catch(Exception $e)
			{
				return "gagal update";
			}
		}
		else
		{
			$template->text = $text;
			try
			{
				$template->save();return "berhasil update";
			}
			catch(Exception $e)
			{
				return "gagal update";
			}
		}
	}
	
	public function getPapTemplate($id)
	{
		$template = Template::where('id_kegiatan', '=' , $id)->where('tipe', '=', 'pap')->first();
		
		return $template;
	}
	
	public function updatePapTemplate($id, $text)
	{
		$template = Template::where('id_kegiatan', '=' , $id)->where('tipe', '=', 'pap')->first();
		$template->timestamps = false;
		if($template == null)
		{
			$template = new Template();			
			$template->id_kegiatan = $id;
			$template->tipe = 'pap';
			$template->text = $text;
			
			try
			{
				$template->save();
				return "berhasil update";
			}
			catch(Exception $e)
			{
				return "gagal update";
			}
		}
		else
		{
			$template->text = $text;
			try
			{
				$template->save();
				return "berhasil update";
			}
			catch(Exception $e)
			{
				return "gagal update";
			}
		}
	}
	
	public function getInvTemplate($id)
	{
		$template = Template::where('id_kegiatan', '=' , $id)->where('tipe', '=', 'inv')->first();
		
		return $template;
	}
	
	public function updateInvTemplate($id, $text)
	{
		$template = Template::where('id_kegiatan', '=' , $id)->where('tipe', '=', 'inv')->first();
		$template->timestamps = false;
		
		if($template == null)
		{
			$template = new Template();
			$template->id_kegiatan = $id;
			$template->tipe = 'inv';
			$template->text = $text;
			
			try
			{
				$template->save();
				return "berhasil update";
			}
			catch(Exception $e)
			{
				return "gagal update";
			}
		}
		else
		{
			$template->text = $text;
			try
			{
				$template->save();
				return "berhasil update";
			}
			catch(Exception $e)
			{
				return "gagal update";
			}
		}
	}
	
	//--------

	public function view_berkas($id)
	{
		$kegiatan = Kegiatan2::find($id);
		$nama_kegiatan = $kegiatan->nama;
		$files = Kegiatanfile::where('id_kegiatan','=',$id)->where('tipe','=','other')->paginate(20);
		return View::make('pages.simposium.admin.simposium_file',compact('id','nama_kegiatan','files'));
	}

	public function add_berkas($id){
		//return 'tes';
		if(Input::hasFile('fileBerkas'))
		{
			$file = Input::file('fileBerkas');
			$destinationPath = "assets/file_upload/kegiatan/berkas/";
			$fileName = $file->getClientOriginalName();
			$berkas = new Kegiatanfile();
			$berkas -> timestamps = false;
			$berkas ->id_kegiatan = $id;
			$berkas -> nama = Input::get("nama_berkas");
			$berkas -> uploaded = Carbon::now();
			$berkas -> tipe = 'other';
			try {
				$berkas -> save();
				
			} catch (Exception $e) {
				return $e;
			}
			
			
			$berkas_id = $berkas->id;
			$destinationPath .= $berkas_id;
			$destinationPath .= "/";
			if(!file_exists($destinationPath))
			{
				File::makeDirectory($destinationPath, $mode = 0777, true, true);
				$uploadSuccess = $file->move($destinationPath, $fileName);
				$berkas -> file_path = $destinationPath.$fileName;
				
			}
			else
			{
				$uploadSuccess = $file->move($destinationPath, $fileName);
				$berkas -> file_path = $destinationPath.$fileName;
			}
			try {
				$berkas -> save();
				return 'success';
			} catch (Exception $e) {
				return $e;
			}
		}
		else
		{
			return "Tidak ada berkas";
		}
	}

	public function del_berkas($id){
		$id_berkas = Input::get('id_berkas');
		$berkas = Kegiatanfile::find($id_berkas);
		try {
			$berkas->delete();
			return 'success';
		} catch (Exception $e) {
			return $e;
		}

	}
	public function view_template($id)
	{
		$kegiatan = Kegiatan2::find($id);
		$nama_kegiatan = $kegiatan->nama;
		return View::make('pages.simposium.admin.simposium_template_index',compact('id','nama_kegiatan'));
	}

	public function view_template_editor($type,$id)
	{
		$kegiatan = Kegiatan2::find($id);
		$nama_kegiatan = $kegiatan->nama;
		$title = $type;
		
		if($type === "Registrasi")
		{
			$template = $this->getRegTemplate($id);
			if(count($template) == 0)
			{
				$text = "";
			}
			else
			{
				$text = $template->text;
			}
		}
		else if($type === "Penerimaan Abstrak")
		{
			$template = $this->getAbsTemplate($id);
			if(count($template) == 0)
			{
				$text = "";
			}
			else
			{
				$text = $template->text;
			}
		}
		else if($type === "Surat Undangan")
		{
			$template = $this->getInvTemplate($id);
			if(count($template) == 0)
			{
				$text = "";
			}
			else
			{
				$text = $template->text;
			}
		}
		else if($type === "Penerimaan Paper Lengkap")
		{
			$template = $this->getPapTemplate($id);
			if(count($template) == 0)
			{
				$text = "";
			}
			else
			{
				$text = $template->text;
			}
		}
		else
		{
			$text = "";
		}
		
		return View::make('pages.simposium.admin.simposium_template_editor',compact('type','id','nama_kegiatan','title','text'));

	}
}
