<?php

use Carbon\Carbon;

class AccountController extends BaseController {
	
	public $restful = true;
	
	public function postSignIn()
	{
		$username = Input::get('username');
		$password = Input::get('password');
		$data = array('username'=>$username, 'password'=>$password);
		$remember_me = Input::get('remember_me') === 'yes';
		if($remember_me == true)
		{
			if(Auth::attempt($data, $remember_me))
			{
				if(Auth::user()->status_aktif == 1)
				{
					if(Auth::user()->role == 0)
					{					
						return Redirect::to('/user');
						
					}
					else
					{
						return Redirect::to('/admin');
					}
				}
				else
				{
					Auth::logout();
					return Redirect::to('/login')->with('message', "akun ini memerlukan perpanjangan aktivasi.");
				}
			}
			else
			{
				return Redirect::to('/login')->with('message', 'username dan password tidak tepat.');
			}
		}
		else
		{
			if(Auth::attempt($data, false))
			{
				
				
				if(Auth::user()->status_aktif == 1)
				{
					if(Auth::user()->role == 0)
					{					
						return Redirect::to('/user');
						
					}
					else
					{
						return Redirect::to('/admin');
					}
				}
				else
				{
					Auth::logout();
					return Redirect::to('/login')->with('message', "akun ini memerlukan perpanjangan aktivasi.");
				}
			}
			else
			{
				return Redirect::to('/login')->with('message', 'username dan password tidak tepat.');
			}
		}
		
		
		
	}
	
	public function postLogout()
	{
		Auth::logout();
		return Redirect::to('/login')->with('message', 'Anda telah keluar.');
	}
	
	public function postRegis()
	{
		
		
		$username = Input::get('username');
		$password = Input::get('password');
			
		$cekCount = DB::table('auth')->where('username', $username)->first();
		
		if(count($cekCount) == 0)
		{
			
			$nama = Input::get('nama');
			$cabangHFI = Input::get('hficabang');
			$tempatLahir = Input::get('tempatlahir');
			$date = Input::get('tanggallahir');
			$datepiece = explode('.',$date);
			$date = $datepiece[2].'-'.$datepiece[1].'-'.$datepiece[0];
			if (Input::get('gender') == "pria") {
				$gender = 1;
			}else{
				$gender = 0;
			}
			$tema = Input::get('temapenelitian');
			$spesialisasi = Input::get('spesialisasi');
			$profesi = Input::get('profesi');
			$institusi = Input::get('institusi');
			$alamat = Input::get('alamatkontak');
			$kota = Input::get('kota');
			$kodepos = Input::get('kodepos');
			$negara= Input::get('negara');
			$telp1 = Input::get('telepon');
			$telp2 = Input::get('telepon2');
			$fax = Input::get('fax');
			$hp = Input::get('hp');
			$email = Input::get('email');
			$situs = Input::get('situs');
			$keterangan = Input::get('keteranganlain');
			$persetujuan = Input::get('persetujuan');
			
			
			$cabang_id = Cabang::where('nama', '=', $cabangHFI)->first()->id;
			$ang = new Anggota();
			$ang->timestamps = false;
			$ang -> nama = $nama;
			
			//nomer Anggota
			$no_anggota = "";
			$ang ->no_anggota = $no_anggota;
			$ang -> tanggal_revisi = Carbon::now();
			$ang -> id_cabang = $cabang_id;
			$ang -> tempat_lahir = $tempatLahir;
			$ang -> tanggal_lahir = $date;
			$ang -> gender = $gender;
			$ang -> tema_penelitian = $tema;
			$ang -> spesialisasi = $spesialisasi;
			$ang -> profesi = $profesi;
			$ang -> institusi = $institusi;
			$ang -> alamat = $alamat;
			$ang -> kota = $kota;
			$ang -> kodepos = $kodepos;
			$ang -> negara = $negara;
			$ang -> telepon = $telp1+'-'+$telp2;
			$ang -> hp = $hp;
			$ang -> fax = $fax;
			$ang -> email = $email;
			$ang -> situs = $situs;
			$ang -> keterangan = $keterangan;
			$ang -> save();
			
			$profile_id = $ang->id;
			$acc = new Account();
			$acc->timestamps = false;
			$acc->username = $username;
			$acc->profile_id = $profile_id;
			$acc->password = Hash::make($password);
			$acc->status_aktif = 0;
			$acc->save();
			
			
			for($i = 1; $i <= 5; $i++){
				$gelar = Input::get('selPendidikan'.$i);
				$lokasi =  Input::get('pendidikan'.$i);
				if($lokasi != ""){
					$pend = new Pendidikan();
					$pend->timestamps = false;
					$pend->id_profile = $profile_id;
					$pend->gelar = $gelar;
					$pend->lokasi = $lokasi;
					$pend->save();
				}
			}
			return Redirect::to('/')->with('message', 'Terima kasih telah melakukan pendaftar, silahkan menyelesaikan administrasi pembayaran.');
		}else
		{
			return Redirect::to('/registrasi')->with('message', 'Error')->withErrors('Username telah terdaftar')->withInput();
		}
	}
	
	public function checkExist()
	{
		$username = Input::get('username');
		$cekCount = DB::table('auth')->where('username', $username)->first();
		
		if(count($cekCount) == 0)
		{
			return 'ok';
		}
		else{
			return 'exist';
		}
	}
	
	public function changePass()
	{
		$rules = array(
			'oldPass' => 'required',
			'newPass' => 'required|min:8',
			'reNewPass' => 'required|min:8'
		);
		
	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails())
	    {
	        return $validator->messages();
	    }
	
		$oldPass = Input::get('oldPass');
		$newPass = Input::get('newPass');
		$reNewPass = Input::get('reNewPass');
		$id = Auth::user()->id;
		if(Hash::check($oldPass,Auth::user()->password)){
			if($newPass == $reNewPass)
			{
				$acc = Account::where('id', '=', $id)->first();
				$acc->password = Hash::make($newPass);
				$acc->save();
				return 'success';
			}else
			{
				return 'reNewPass';
			}
			
		}else return 'oldPass';
		
		
	}
	
	public function generateRandomString($length = 10) 
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	
	public function lupaPassword()
	{
		
	}
	
	public function view_login()
	{
		$arr = $this->setHeader();
		return View::make('pages.login', compact('arr'));
	}
	
	
	
	//tes
	public function view_forgotpassword(){
		$arr = $this->setHeader();
		return View::make('pages.forgotpassword', compact('arr'));
	} 
	
	//tes
	public function view_changepassword(){
		$arr = $this->setHeader();
		return View::make('pages.changepassword', compact('arr'));
	} 
	
	//return semua cabang di database
	public function view_registrasi()
	{
		$arr = $this->setHeader();
		$arr2 = $this->get_all_cabang();
		return View::make('pages.registrasi', compact('arr', 'arr2'));
	}
	
	public function view_redirect()
	{
		$arr = $this->setHeader();

		return View::make('pages.redirect', compact('arr'));
	}
	
	public function get_all_cabang()
	{
		//$count = Cabang::select('nama')->get();
		$count = DB::table('cabang')->orderBy('nama','asc')->lists('nama','nama');
		if(count($count) != 0)
		{
			return $count;
		}else
		{
			return "";
		}
	}
	
	
	

}

?>