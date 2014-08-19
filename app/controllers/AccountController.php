<?php

use Carbon\Carbon;

class AccountController extends BaseController {
	
	public $restful = true;
	
	public function postSignIn()
	{
		$username = Input::get('username');
		$password = Input::get('password');
		$data = array('username'=>$username, 'password'=>$password);
	
		if(Auth::attempt($data))
		{
			$user = Account::where('username', '=', $username)->first();
			
			
			if($user->status_aktif == 1)
			{
				if($user->role == 0)
				{
					$authId = $user->id;
					$profile = Anggota::where('auth_id', '=' , $authId)->first();
					$cabang = Cabang::where('id', '=' , $profile->id_cabang)->first();
					if($user->status_aktif == 1)
					{
						$status_aktif = "Anggota Aktif";
					}
					else
					{
						$status_aktif = "Anggota Tidak Aktif";
					}
					
					$siteUrl = "//".$profile->situs;
					
					$foto_profile = $profile->foto_profile;
					$nama = $profile->nama;
					$id = $profile->id;
					$revisi = $profile->tanggal_revisi;
					$penelitian = $profile->tema_penelitian;
					$spesialisasi = $profile->spesialisasi;
					$profesi = $profile->profesi;
					$institusi = $profile->institusi;
					$pendidikan = $profile->pendidikan;
					$alamat = $profile;
					$telepon = $profile->telepon;
					$hp = $profile->hp;
					$fax = $profile->fax;
					$email = $profile->email;
					$situs_show = $profile->situs;
					$keterangan = $profile->keterangan;
					
					$tanggal_aktif = $user->batas_aktif;
					$result = array('foto' => $foto_profile, 'nama' => $nama, 'id' => $id, 'revisi' => $revisi, 'penelitian' => $penelitian, 'spesialisasi' => $spesialisasi, 'profesi' => $profesi, 'institusi'=> $institusi, 'pendidikan' => $pendidikan, 'telepon' => $telepon, 'hp' => $hp, 'fax' => $fax, 'email' => $email, 'situs_show' => $situs_show, 'keterangan' => $keterangan, 'cabang' => $cabang->nama, 'status_aktif' => $status_aktif, 'batas_aktif' => $tanggal_aktif, 'siteUrl' => $siteUrl);
					//var_dump($result);
					
					Session::put('data', $result);
					return Redirect::to('/profile')->with('data', $result);
					
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
		return View::make('pages.login');
	}
	
	public function view_registrasi()
	{
		return View::make('pages.registrasi');
	}

	//newcode
	public function view_profile()
	{
		return View::make('pages.profileanggota');
	}
	//endnewcode
}

?>