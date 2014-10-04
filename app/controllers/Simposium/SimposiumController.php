<?php

class SimposiumController extends BaseController {
	
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
				return "Wrong";
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
				
				return "OK";
			}
		}
		else{
			return "Wrong";
		}
		
	}
	
	public function login(){
		$username = Input::get('username');
		$password = Input::get('password');
		
		$peserta = Peserta::where('username','=',$username)->where('password','=',Hash::make($password))->get();
		
		if(count($peserta)==1){
			return "OK";
		}
		else{
			return Hash::make($password);
		}
		
	}

	
}

?>