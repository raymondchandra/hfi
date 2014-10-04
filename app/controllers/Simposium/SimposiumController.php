<?php

class SimposiumController extends BaseController {
	public function view_index(){
		return View::make('pages.simposium.front.simposium_main');
	}
	
	public function view_login(){
		return View::make('pages.simposium.front.simposium_login');
	}
	
	public function view_user(){
		return View::make('pages.simposium.front.simposium_user');
	}
	
	public function view_registrasi(){
		return View::make('pages.simposium.front.simposium_registrasi');
	}
	
	public function view_tanggal(){
		return View::make('pages.simposium.front.simposium_tanggal');
	}
	
	public function view_lokasi(){
		return View::make('pages.simposium.front.simposium_lokasi');
	}
	
	public function view_peserta(){
		return View::make('pages.simposium.front.simposium_peserta');
	}
	
	public function view_style_simposium(){
		return View::make('pages.simposium.admin.style_simposium');
	}
	
	
	public function register(){
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
				return Redirect::to('test/simposium_register')->with('message','E-mail telah terdaftar');
			}
			else{
				$peserta = new Peserta();
				$peserta->id_kegiatan =1;
				$peserta->username =$email;
				$peserta->password =Hash::make($password);
				$peserta->nama =$name;
				$peserta->institusi =$institusi;
				$peserta->pekerjaan =$profesi;
				$peserta->email =$email;
				$peserta->alamat =$alamat;
				$peserta->presentasi =$is_paper;
				$peserta->abstrak =$abstrak_paper;
				$peserta->status_bayar =0;
				$peserta->invitation_letter =0;
				
				$peserta->save();
				
				return Redirect::to('simposium/login')->with('message','Pendaftaran Berhasil');
			}
		}
		else{
			return Redirect::to('test/simposium_register')->with('message','Password tidak cocok');
		}
		
	}
	
	public function login(){
		$username = Input::get('username');
		$password = Input::get('password');
		
		Session::flush();
		
		$peserta = Peserta::where('username','=',$username)->get();
		
		if(count($peserta)>0){
			if(strcmp($username,'admin')==0){
				if (Hash::check($password, $peserta[0]['password']))
				{
					Session::push('session_user_id',$peserta[0]['id']);
					return Redirect::to('simposium/admin/0');
				}
				else{
					return Redirect::to('simposium/login')->with('message','Username atau Password Salah');
				}
			}
			else{
				if (Hash::check($password, $peserta[0]['password']))
				{
					Session::push('session_user_id',$peserta[0]['id']);
					return Redirect::to('simposium');
				}
				else{
					return Redirect::to('simposium/login')->with('message','Username atau Password Salah');
				}
			}
			
		}
		else{
			return Redirect::to('simposium/login')->with('message','Username atau Password Salah');
		}
		
	}
	
	public function logout(){
		Session::flush();
		return Redirect::to('test/simposium_login');
	}

	
}

?>