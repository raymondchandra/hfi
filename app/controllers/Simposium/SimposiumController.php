<?php

class SimposiumController extends BaseController {
	public function view_index($id){
		return View::make('pages.simposium.front.simposium_main',compact('id'));
	}
	
	public function view_login($id){
		return View::make('pages.simposium.front.simposium_login',compact('id'));
	}
	
	public function view_user($id,$id_peserta){
		$peserta = Peserta::find($id_peserta);
		return View::make('pages.simposium.front.simposium_user',compact('id','peserta'));
	}
	
	public function view_registrasi($id){
		return View::make('pages.simposium.front.simposium_registrasi',compact('id'));
	}
	
	public function view_tanggal(){
		return View::make('pages.simposium.front.simposium_tanggal');
	}
	
	public function view_lokasi(){
		return View::make('pages.simposium.front.simposium_lokasi');
	}
	
	public function view_peserta($id){
		$pesertas = Peserta::where('id_kegiatan','=',$id)->get();
		return View::make('pages.simposium.front.simposium_peserta',compact('pesertas'));
	}
	
	public function view_style_simposium(){
		return View::make('pages.simposium.admin.style_simposium');
	}
	
	
	public function register(){
		$id_kegiatan = Input::get('input_id');
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
		$spesialisasi = Input::get('spesialisasi');
		$judul_paper = Input::get('input_judul_paper');
		$abstrak_paper = Input::get('input_abstrak');
		
		if(strcmp($password,$password_again)==0){
			$exist = Peserta::where('username','=',$email)->get();
			if(count($exist)>=1){
				return Redirect::to('simposium/registrasi/'.$id_kegiatan)->with('message','E-mail telah terdaftar');
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
				$peserta->spesialisasi = $spesialisasi;
				$peserta->status_bayar =0;
				$peserta->bukti_bayar ="";
				$peserta->paper =$judul_paper;
				$peserta->save();
				return Redirect::to('simposium/login/'.$id_kegiatan)->with('message','Pendaftaran Berhasil');
			}
		}
		else{
			return Redirect::to('simposium/registrasi/'.$id_kegiatan)->with('message','Password tidak cocok');
		}
	}
	
	public function login(){
		$id_kegiatan = Input::get('id_kegiatan');
		$username = Input::get('username');
		$password = Input::get('password');
		
		Session::flush();
		
		$peserta = Peserta::where('username','=',$username)->get();
		
		if(count($peserta)>0){
			if(strcmp($username,'admin')==0){
				if (Hash::check($password, $peserta[0]['password']))
				{
					Session::push('session_user_id',$peserta[0]['id']);
					return Redirect::to('simposium/admin/'.$id_kegiatan);
				}
				else{
					return Redirect::to('simposium/login/'.$id_kegiatan)->with('message','Username atau Password Salah');
				}
			}
			else{
				if (Hash::check($password, $peserta[0]['password']))
				{
					Session::push('session_user_id',$peserta[0]['id']);
					Session::push('session_kegiatan',$id_kegiatan);
					return Redirect::to('simposium/'.$id_kegiatan);
				}
				else{
					return Redirect::to('simposium/login/'.$id_kegiatan)->with('message','Username atau Password Salah');
				}
			}
		}
		else{
			return Redirect::to('simposium/login/'.$id_kegiatan)->with('message','Username atau Password Salah');
		}
		
	}
	
	public function logout($id){
		Session::flush();
		return Redirect::to('simposium/login/'.$id);
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
		$spesialisasi = Input::get('spesialisasi');
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
		
		return  Redirect::to('simposium/user/'.$id_kegiatan.'/'.$id_peserta)->with('message','Berhasil Merubah Data');
		
	}
	
	
	public function upload_paper(){
		$id = Input::get('id_kegiatan'); 
		$id_peserta = Input::get('id_peserta');
		if(Input::hasFile('filePaper')){
			 
			$file = Input::file('filePaper');
			
			$destination ='assets/file_upload/simposium/'.$id.'/'.$id_peserta.'/';
			
			$peserta = Peserta::find($id_peserta);
			
			
			if($peserta->path_paper != ""){
				try{
					File::delete($peserta->path_paper);
				}
				catch(Exception $e){
					return Redirect::to('simposium/user/'.$id.'/'.$id_peserta)->with('message','Gagal Mengunggah Paper');
				}
			}
			$peserta->path_paper = $destination . $file->getClientOriginalName();
			try{
				$peserta->save();
				$file->move($destination,$file->getClientOriginalName());
				return Redirect::to('simposium/user/'.$id.'/'.$id_peserta)->with('message','Berhasil Mengunggah Paper');
			}
			catch(Exception $e){
				return Redirect::to('simposium/user/'.$id.'/'.$id_peserta)->with('message','Gagal Mengunggah Paper');
			}
		}
		else{
			return Redirect::to('simposium/user/'.$id.'/'.$id_peserta);
		}
	}
	
	public function upload_bayar(){
		$id = Input::get('id_kegiatan');
		$id_peserta = Input::get('id_peserta');
		if(Input::hasFile('file_bukti_bayar')){
			
			$file = Input::file('file_bukti_bayar');
			
			$destination ='assets/file_upload/simposium/'.$id.'/'.$id_peserta.'/';
			
			$peserta = Peserta::find($id_peserta);
			$peserta->bukti_bayar = $destination . 'bukti_bayar.jpg';
			
			try{
				$peserta->save();
				$file->move($destination,'bukti_bayar.jpg');
				return Redirect::to('simposium/user/'.$id.'/'.$id_peserta)->with('message','Berhasil Mengunggah Bukti Bayar');
			}
			catch(Exception $e){
				return Redirect::to('simposium/user/'.$id.'/'.$id_peserta)->with('message','Gagal Mengunggah Bukti Bayar');
			}
		}
		else{
			return Redirect::to('simposium/user/'.$id.'/'.$id_peserta);
		}
	
	}

	
}

?>