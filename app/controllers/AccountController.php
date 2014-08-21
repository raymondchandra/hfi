<?php

use Carbon\Carbon;

class AccountController extends BaseController {
	
	public $restful = true;
	
	public function postSignIn()
	{
		$username = Input::get('username');
		$password = Input::get('password');
		$data = array('username'=>$username, 'password'=>$password);
		
		if(Input::get('remember_me') === 'yes')
		{
			if(Auth::attempt($data, true))
			{
				
				
				if(Auth::user()->status_aktif == 1)
				{
					if(Auth::user()->role == 0)
					{					
						return Redirect::to('/user');
						
					}
					else
					{
						echo("success user admin");
					}
				}
				else
				{
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
						echo("success user admin");
					}
				}
				else
				{
					return Redirect::to('/login')->with('message', "akun ini memerlukan perpanjangan aktivasi.");
				}
			}
			else
			{
				return Redirect::to('/login')->with('message', 'username dan password tidak tepat.');
			}
		}
		
		
		
	}
	
	public function postRegis()
	{
		$username = Input::get('username');
		$password = Input::get('password');
			
		$cekCount = DB::table('auth')->where('username', $username)->first();
		
		if(count($cekCount) == 0)
		{
			
			$acc = new Account();
			$acc->timestamps = false;
			$acc->username = $username;
			$acc->password = Hash::make($password);
			$acc->status_aktif = 0;
			$acc->save();
			
			$nama = Input::get('nama');
			$cabangHFI = Input::get('hficabang');
			$tempatLahir = Input::get('tempatlahir');
			$tgl = Input::get('tanggallahir');
			$bln = Input::get('bulanlahir');
			$thn = Input::get('tahunlahir');
			$gender = Input::get('gender');
			$tema = Input::get('temapenelitian');
			$spesialisasi = Input::get('spesialisasi');
			$pend = Input::get('pendidikan');
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
			
			
			$auth_id = Account::where('username', '=', $username)->first()->id;
			$cabang_id = Cabang::where('nama', '=', $cabangHFI)->first()->id;
			$ang = new Anggota();
			$ang->timestamps = false;
			$ang -> auth_id = $auth_id;
			$ang -> id = $username;
			$ang -> nama = $nama;
			$ang -> tanggal_revisi = Carbon::now();
			$ang -> id_cabang = $cabang_id;
			$ang -> tema_penelitian = $tema;
			$ang -> spesialisasi = $spesialisasi;
			$ang -> profesi = $profesi;
			$ang -> institusi = $institusi;
			$ang -> pendidikan = $pend;
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
			return Redirect::to('/')->with('message', 'Terima kasih telah melakukan pendaftar, silahkan menyelesaikan administrasi pembayaran. Keterangan lebih lanjut dapat 
			dilihat pada <a href="/anggota">Anggota</a>');
		}else
		{
			return Redirect::to('/registrasi')->with('message', 'Error')->withErrors('Username telah terdaftar')->withInput();
		}
	}
	
	public function view_login()
	{
		$arr = $this->setHeader();
		return View::make('pages.login', compact('arr'));
	}
	
	public function view_registrasi()
	{
		$arr = $this->setHeader();
		return View::make('pages.registrasi', compact('arr'));
	}
}

?>