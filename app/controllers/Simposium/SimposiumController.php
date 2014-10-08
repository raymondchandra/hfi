<?php
use Carbon\Carbon;

class SimposiumController extends BaseController {

	public function getKonten($type,$id)
	{
		$text = KegiatanKonten::where('id_kegiatan','=',$id)->where('tipe','=',$type)->first();
		if($text == null){
			return "";
		}else
		{
			return $text->konten;
		}
	}
	public function view_index($id){
		Session::forget('session_kegiatan');
		Session::push('session_kegiatan',$id);
		$text = $this->getKonten('halaman depan',$id);

		$kegiatan = Kegiatan2::find($id);
		$simpIct = $kegiatan->tipe;
		return View::make('pages.simposium.front.simposium_main',compact('id','text','simpIct'));
	}
	
	public function view_login($id){
		Session::forget('session_kegiatan');
		Session::push('session_kegiatan',$id);
		$kegiatan = Kegiatan2::find($id);
		if(count($kegiatan)==1){
			$simpIct = $kegiatan->tipe;
			return View::make('pages.simposium.front.simposium_login',compact('id','simpIct'));
		}
		else{
			$simpIct = 1;
			return View::make('pages.simposium.front.simposium_login',compact('id','simpIct'));
		}
		
	}
	
	public function view_user($id_peserta,$id){
		$kegiatan = Kegiatan2::find($id);
		$simpIct = $kegiatan->tipe;
		$peserta = Peserta::where('id','=',$id_peserta)->where('id_kegiatan','=',$id)->get();
		if(count($peserta)==1){
			return View::make('pages.simposium.front.simposium_user',compact('id','peserta','simpIct'));
		}
		else{
			return $this->logout($id);
		}
		
	}
	
	public function view_registrasi($id){
		Session::forget('session_kegiatan');
		Session::push('session_kegiatan',$id);
		$kegiatan = Kegiatan2::find($id);
		$simpIct = $kegiatan->tipe;
		if($kegiatan->openRegistration == 0){
			if($simpIct == 3)
			{
				return Redirect::to('event/'.$id)->with('message','Pendaftaran sudah ditutup');
			}else if($simpIct == 4){
				return Redirect::to('event/'.$id)->with('message','Registration is closed');
			}
		}
		$text = $this->getKonten('registrasi',$id);
		$date= date_create($kegiatan->early_start);
		$early_start = date_format($date,"d-m-Y");
		$date= date_create($kegiatan->early_finish);
		$early_finish = date_format($date,"d-m-Y");
		$harga = Harga::where('id_kegiatan','=',$id)->get();
		
		return View::make('pages.simposium.front.simposium_registrasi',compact('id','text','early_start','early_finish','harga','simpIct'));
	}
	
	public function view_konten($type,$id){
		Session::forget('session_kegiatan');
		Session::push('session_kegiatan',$id);
		$text = $this->getKonten($type,$id);
		$kegiatan = Kegiatan2::find($id);
		$simpIct = $kegiatan->tipe;

		if($simpIct == 3){
			$title = ucwords($type);
		}else{
			if($type == "tanggal penting"){
				$title = "Important Dates";
			}else if($type == "lokasi"){
				$title = "Location";
			}else if($type == "akomodasi"){
				$title = "Accomodation";
			}else if($type == "program"){
				$title = "Program";
			}else if($type == "prosiding"){
				$title = "Proceeding";
			}else if($type == "panitia"){
				$title = "Organizer";
			}else if($type == "kontak"){
				$title = "Contact";
			}
		}
		return View::make('pages.simposium.front.simposium_konten',compact('type','title','text','id','simpIct'));
	}
	
	public function view_peserta($id){
		Session::forget('session_kegiatan');
		Session::push('session_kegiatan',$id);
		$pesertas = Peserta::where('id_kegiatan','=',$id)->get();
		$kegiatan = Kegiatan2::find($id);
		$simpIct = $kegiatan->tipe;
		return View::make('pages.simposium.front.simposium_peserta',compact('id','pesertas','simpIct'));
	}
	
	public function view_style_simposium(){
		return View::make('pages.simposium.admin.style_simposium');
	}
	
	public static function getHeader($id){
		$file = Kegiatanfile::where('id_kegiatan','=',$id)->where('tipe','=','header')->first();
		if($file == null)
			return '';
		else
			return $file->file_path;
	}

	public static function getSponsor($id){
		$files = Kegiatanfile::where('id_kegiatan','=',$id)->where('tipe','=','sponsor')->get();
		
		return $files;
	}

	public function register(){
		$id_kegiatan = Input::get('input_id');
		$kegiatan = Kegiatan2::find($id_kegiatan);
		$username = Input::get('input_user');
		$name= Input::get('input_nama');
		$institusi= Input::get('input_institusi'); 
		$profesi= Input::get('input_profesi');
		$email= Input::get('input_email');
		$alamat= Input::get('input_alamat');
		$password= Input::get('input_password');
		$password_again= Input::get('input_password_again');
		$is_paper = Input::get('is_paper');
		$gender = Input::get('gender');
		//$spesialisasi = Input::get('spesialisasi');
		$judul_paper = Input::get('input_judul_paper');
		$abstrak_paper = Input::get('input_abstrak');
		
		
		
		if(strcmp($password,$password_again)==0){
			$exist = Peserta::where('username','=',$email)->get();
			if(count($exist)>=1){
				return Redirect::to('event/registrasi/'.$id_kegiatan)->with('message','E-mail telah terdaftar');
			}
			else{
				$peserta = new Peserta();
				$peserta->id_kegiatan =$id_kegiatan;
				
				$peserta->username =$username;
				$peserta->password =Hash::make($password);
				$peserta->nama =$name;
				$peserta->institusi =$institusi;
				$peserta->pekerjaan =$profesi;
				$peserta->email =$email;
				$peserta->alamat =$alamat;
				$peserta->status ='Partisipan';
				$peserta->is_paper =$is_paper;
				$peserta->presentasi =$gender;
				$peserta->abstract =$abstrak_paper;
				//$peserta->spesialisasi = $spesialisasi;
				$peserta->status_bayar =0;
				$peserta->bukti_bayar ="";
				$peserta->paper =$judul_paper;
				$peserta->abstract_read = 0;
				$peserta->paper_read = 0;
				$peserta->save();
				
				$format1 = '%s';
				$format2 = '%1$02d';
				$format3 = '%1$03d';
				$tahun = date('Y');

				$nomor_kegiatan=$id_kegiatan;
				$list_peserta = Peserta::where('id_kegiatan','=','$id_kegiatan');
				$nomor_peserta=count($list_peserta);
				$tahun_kegiatan =  sprintf($format1,$tahun);
				$nomor_keg =  sprintf($format2,$nomor_kegiatan);
				$nomor_pes = sprintf($format3,$nomor_peserta);

				$nomorAnggota = $tahun_kegiatan.$nomor_keg.$nomor_pes;
				$peserta->nomor_peserta = $nomorAnggota;
				
				$peserta->save();
				$this->createEmail("Registrasi", $id_kegiatan,  $peserta->id);
				
				if($kegiatan->tipe == 3){
					return Redirect::to('event/login/'.$id_kegiatan)->with('message','Pendaftaran Berhasil');
				}else if($kegiatan->tipe == 4){
					return Redirect::to('event/login/'.$id_kegiatan)->with('message','Registration Success');
					}
			}
		}
		else{
			if($kegiatan->tipe == 3){
			return Redirect::to('event/registrasi/'.$id_kegiatan)->with('message','Password tidak cocok');
					}else if($kegiatan->tipe == 4){
					return Redirect::to('event/registrasi/'.$id_kegiatan)->with('message','Password does not match');
					}
					
		}
		
	}
	
	public function login(){
		$id_kegiatan = Input::get('id_kegiatan');
		$username = Input::get('username');
		$password = Input::get('password');
		
		Session::forget('session_admin_id');
		Session::forget('session_user_id');
		if(strcmp($username,'admin')==0){
			$kegiatan = Kegiatan2::find($id_kegiatan);
			if(count($kegiatan)==1){
				if($kegiatan->admin_aktif!=0){
					if (Hash::check($password, $kegiatan->pass_admin))
					{
						Session::push('session_admin_id',$kegiatan[0]['id']);
						return Redirect::to('event/admin/'.$id_kegiatan);
					}	
					else{
						if($kegiatan->tipe == 3){
						
						return Redirect::to('event/login/'.$id_kegiatan)->with('message','Username atau Password Salah');
						}else if($kegiatan->tipe == 4){
						
						return Redirect::to('event/login/'.$id_kegiatan)->with('message','Username or Password is not Correct');
						}
					}
				}
				else{
					if($kegiatan->tipe == 3){
						return Redirect::to('event/login/'.$id_kegiatan)->with('message','Username ini tidak aktif');
						}else if($kegiatan->tipe == 4){
						return Redirect::to('event/login/'.$id_kegiatan)->with('message','This username is not active');
						}
						
				}
			}
			else{
				if($kegiatan->tipe == 3){
						return Redirect::to('event/login/'.$id_kegiatan)->with('message','Username ini tidak aktif');
				}else if($kegiatan->tipe == 4){
					return Redirect::to('event/login/'.$id_kegiatan)->with('message','This username is not active');
				}
			}
			
		}
		else{
			$peserta = Peserta::where('username','=',$username)->get();
			$kegiatan = Kegiatan2::find($id_kegiatan);
			if(count($peserta)>0){
				if (Hash::check($password, $peserta[0]['password']))
				{
					Session::push('session_user_id',$peserta[0]['id']);
					return Redirect::to('event/'.$id_kegiatan);
				}
				else{
					if($kegiatan->tipe == 3){
					
					return Redirect::to('event/login/'.$id_kegiatan)->with('message','Username atau Password Salah');
					}else if($kegiatan->tipe == 4){
					
					return Redirect::to('event/login/'.$id_kegiatan)->with('message','Username or Password is not Correct');
					}
				}
			}
		}
	}
	
	public function logout($id){
		Session::forget('session_admin_id');
		Session::forget('session_user_id');
		return Redirect::to('event/login/'.$id);
	}
	
	public function edit_profil(){
		$id_kegiatan = Input::get('id_kegiatan');
		$id_peserta = Input::get('id_peserta');
		$name= Input::get('input_nama');
		$institusi= Input::get('input_institusi');
		$profesi= Input::get('input_profesi');
		$email= Input::get('input_email');
		$alamat= Input::get('input_alamat');
		$password= Input::get('input_password');
		$password_again= Input::get('input_password_again');
		//$is_paper = Input::get('is_paper');
		$gender = Input::get('gender');
		//$spesialisasi = Input::get('spesialisasi');
		$judul_paper = Input::get('input_judul_paper');
		$abstrak_paper = Input::get('input_abstrak');
		
		
		$peserta = Peserta::find($id_peserta);
		
		$peserta->username =$email;
		
		if(strcmp($password,"")!=0 && strcmp($password,$password_again) == 0){
			$peserta->password =Hash::make($password);
		}
		
		$peserta->nama =$name;
		$peserta->institusi =$institusi;
		$peserta->pekerjaan =$profesi;
		$peserta->email =$email;
		$peserta->alamat =$alamat;
		$peserta->status ='Partisipan';
		if($peserta->is_paper==1){
			$peserta->presentasi =$gender;
			$peserta->abstract =$abstrak_paper;
			$peserta->paper =$judul_paper;
		}
		
		$peserta->save();
		$kegiatan = Kegiatan2::find($id_kegiatan);
		if($kegiatan->tipe == 3){
		return  Redirect::to('event/user/'.$id_kegiatan.'/'.$id_peserta)->with('message','Berhasil Mengubah Data');
					}else if($kegiatan->tipe == 4){
						return Redirect::to('event/user/'.$id.'/'.$id_peserta)->with('message','Failed Changing Data');
					}
		
	}
	
	
	public function upload_paper($id){
		$id = Input::get('id_kegiatan'); 
		$id_peserta = Input::get('id_peserta');
		if(Input::hasFile('filePaper')){
			 
			$file = Input::file('filePaper');
			
			$destination ='assets/file_upload/simposium/'.$id.'/'.$id_peserta.'/';
			
			$peserta = Peserta::find($id_peserta);
			
			$kegiatan = Kegiatan2::find($id);
			if($peserta->path_paper != ""){
				try{
					File::delete($peserta->path_paper);
				}
				catch(Exception $e){
					if($kegiatan->tipe == 3){
					return Redirect::to('event/user/'.$id.'/'.$id_peserta)->with('message','Gagal Mengunggah Paper');
					}else if($kegiatan->tipe == 4){
						return Redirect::to('event/user/'.$id.'/'.$id_peserta)->with('message','Failed Uploading Paper');
					}
				}
			}
			$peserta->path_paper = $destination . $file->getClientOriginalName();
			
			try{
				$peserta->save();
				$file->move($destination,$file->getClientOriginalName());
				if($kegiatan->tipe == 3){
				return Redirect::to('event/user/'.$id.'/'.$id_peserta)->with('message','Berhasil Mengunggah Paper');
				}else if($kegiatan->tipe == 4){
					return Redirect::to('event/user/'.$id.'/'.$id_peserta)->with('message','Success Uploading Paper');
				}
			}
			catch(Exception $e){
				if($kegiatan->tipe == 3){
				return Redirect::to('event/user/'.$id.'/'.$id_peserta)->with('message','Gagal Mengunggah Paper');
				}else if($kegiatan->tipe == 4){
					return Redirect::to('event/user/'.$id.'/'.$id_peserta)->with('message','Failed Uploading Paper');
				}
			}
		}
		else{
			return Redirect::to('event/user/'.$id.'/'.$id_peserta);
		}
	}
	
	public function upload_bayar($id){
		$id = Input::get('id_kegiatan');
		$id_peserta = Input::get('id_peserta');
		if(Input::hasFile('file_bukti_bayar')){
			
			$file = Input::file('file_bukti_bayar');
			
			$destination ='assets/file_upload/simposium/'.$id.'/'.$id_peserta.'/';
			
			$peserta = Peserta::find($id_peserta);
			$peserta->bukti_bayar = $destination . 'bukti_bayar.jpg';
			$kegiatan = Kegiatan2::find($id);
			try{
				$peserta->save();
				$file->move($destination,'bukti_bayar.jpg');
				if($kegiatan->tipe == 3){
					return Redirect::to('event/user/'.$id.'/'.$id_peserta)->with('message','Berhasil Mengunggah Bukti Bayar');
				}else if($kegiatan->tipe == 4){
					return Redirect::to('event/user/'.$id.'/'.$id_peserta)->with('message','Success Uploading Proof of Payment');
				}
			}
			catch(Exception $e){
				if($kegiatan->tipe == 3){
					return Redirect::to('event/user/'.$id.'/'.$id_peserta)->with('message','Gagal Mengunggah Bukti Bayar');
				}else if($kegiatan->tipe == 4){
					return Redirect::to('event/user/'.$id.'/'.$id_peserta)->with('message','Failed Uploading Proof of Payment');
				}
			}
		}
		else{
			return Redirect::to('event/user/'.$id.'/'.$id_peserta);
		}
	
	}
	
	public function createMessage($id)
	{
		$psn = new Pesan();
		$psn -> timestamps = false;
		$psn -> read = 0;
		if(Input::hasFile('attachment'))
		{
			$file = Input::file('attachment');
			$fileName = $file->getClientOriginalName();
			$destinationPath = "assets/file_upload/pesan_attachment/";
			
			$psn -> id_kegiatan = Input::get('id_kegiatan');
			$psn -> id_peserta = Input::get('id_peserta');
			$psn -> message = Input::get('text');
			$psn -> subject = Input::get('subject');
			$psn -> created_at = Carbon::now();
			$psn -> attachment = $fileName;
			
			try
			{
				$psn -> save();
				$id = $psn->id;
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
				
				return $psn;
			}
			catch(Exception $e)
			{
				return "Gagal mengirim pesan";
			}
		}
		else
		{
			$psn -> id_kegiatan = Input::get('id_kegiatan');
			$psn -> id_peserta = Input::get('id_peserta');
			$psn -> message = Input::get('text');
			$psn -> subject = Input::get('subject');
			$psn -> created_at = Carbon::now();
			$psn -> attachment = "-";
			
			try
			{
				$psn -> save();
				return $psn;
			}
			catch(Exception $e)
			{
				return "Gagal mengirim pesan";
			}
		}
	}
	
	public function createEmail($type, $id_keg, $id_peserta)
	{
		//dapetin peserta
		$peserta = Peserta::where('id','=',$id_peserta)->first();
		//dapetin kegiatan;
		$kegiatan = Kegiatan2::where('id','=',$id_keg)->first();
		//replace isi template;
		if($type === "Registrasi")
		{
			//dapetin template Reg;
			$template = Template::where('id_kegiatan','=',$id_keg)->where('tipe','=','reg')->first();
			$attachment = "empty";
		}
		else if($type === "Penerimaan Abstrak")
		{
			//dapetin template Abstrak;
			$template = Template::where('id_kegiatan','=',$id_keg)->where('tipe','=','abs')->first();
			
			//dapetin template surat undangan
			
			if($kegiatan != null)
			{
				$pdfPath = "assets/file_upload/invitation_pdf/invitation.pdf".$kegiatan->id."-".$peserta->id;
				if(!file_exists($pdfPath))
				{
					$html = "<html><body>";
					$pdfTemplate = Template::where('id_kegiatan','=',$id_keg)->where('tipe','=','inv')->first();
					$pdfContent = $pdfTemplate->text;
					$pdfContent = str_replace("*nama*",$peserta->nama,$pdfContent);
					$pdfContent = str_replace("*email*",$peserta->email,$pdfContent);
					$pdfContent = str_replace("*username*",$peserta->username,$pdfContent);
					$pdfContent = str_replace("*institusi*",$peserta->institusi,$pdfContent);
					$pdfContent = str_replace("*pekerjaan*",$peserta->pekerjaan,$pdfContent);
					$pdfContent = str_replace("*alamat*",$peserta->alamat,$pdfContent);
					$pdfContent = str_replace("*status*",$peserta->status,$pdfContent);
					$pdfContent = str_replace("*abstrak*",$peserta->abstrak,$pdfContent);
					//$pdfContent = str_replace("*spesialisasi*",$peserta->spesialisasi,$pdfContent);
					$pdfContent = str_replace("*paper*",$peserta->paper,$pdfContent);
					
					$pdfContent = str_replace("*nama_kegiatan*",$kegiatan->nama,$pdfContent);
					$pdfContent = str_replace("*tempat_kegiatan*",$kegiatan->tempat,$pdfContent);
					$pdfContent = str_replace("*kegiatan_mulai*",$kegiatan->waktu_mulai,$pdfContent);
					$pdfContent = str_replace("*kegiatan_selesai*",$kegiatan->waktu_selesai,$pdfContent);
					$html .= $pdfTemplate."</body></html>";
					File::put($pdfPath, PDF::load($html, 'A4', 'portrait')->output());
					$attachment = $pdfPath;
				}
				else
				{
					$attachment = $pdfPath;
				}
			}
			else
			{
				return false;
			}
			
		}
		else if($type === "Penerimaan Paper Lengkap")
		{
			//dapetin template paper
			$template = Template::where('id_kegiatan','=',$id_keg)->where('tipe','=','pap')->first();
			$attachment = "empty";
		}
		else
		{
			
		}	
		if($template != null && ($peserta != null && $kegiatan !=null))
		{
			$templateContext = $template->text;
			$templateContext = str_replace("*nama*",$peserta->nama,$templateContext);
			$templateContext = str_replace("*email*",$peserta->email,$templateContext);
			$templateContext = str_replace("*username*",$peserta->username,$templateContext);
			$templateContext = str_replace("*institusi*",$peserta->institusi,$templateContext);
			$templateContext = str_replace("*pekerjaan*",$peserta->pekerjaan,$templateContext);
			$templateContext = str_replace("*alamat*",$peserta->alamat,$templateContext);
			$templateContext = str_replace("*status*",$peserta->status,$templateContext);
			$templateContext = str_replace("*abstrak*",$peserta->abstract,$templateContext);
			//$templateContext = str_replace("*spesialisasi*",$peserta->spesialisasi,$templateContext);
			$templateContext = str_replace("*paper*",$peserta->paper,$templateContext);
			
			$templateContext = str_replace("*nama_kegiatan*",$kegiatan->nama,$templateContext);
			$templateContext = str_replace("*tempat_kegiatan*",$kegiatan->tempat,$templateContext);
			$templateContext = str_replace("*kegiatan_mulai*",$kegiatan->waktu_mulai,$templateContext);
			$templateContext = str_replace("*kegiatan_selesai*",$kegiatan->waktu_selesai,$templateContext);
			
			
			$data = array(
				'text'=>$templateContext
			);
			$address = array(
				'email'=>$peserta->email,
				'subject'=>$type." ".$kegiatan->nama,
				'attachment'=>$attachment
			);
			//return $nama." ".$email." ".$profesi." ".$institusi;
			Mail::queue('emails.simposium', $data, function($message) use($address)
			{
				$message->to($address['email'])->subject($address['subject']);
				if($address['attachment'] === "empty")
				{
					
				}
				else
				{
					$message->attach($address['attachment'] );
				}
			});
			
		}
			
	}

	
}

?>