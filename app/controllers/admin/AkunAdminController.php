<?php

use Carbon\Carbon;

class AkunAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_akun_baru()
	{
		return View::make('pages.admin.akun.akun_baru');
	}
	
	public function view_akun_aktif()
	{
		return View::make('pages.admin.akun.akun_aktif');
	}
	
	public function view_akun_nonaktif()
	{
		return View::make('pages.admin.akun.akun_non_aktif');
	}
	
	public function get_akun_baru()
	{
		return $this->get_akun(0);
	}
	
	public function get_akun_aktif()
	{
		return $this->get_akun(1);
		
	}
	
	public function get_akun_nonaktif()
	{
		return $this->get_akun(2);
	}
	
	public function get_akun($status){
		$akun = Account::where('status_aktif','=',$status)->get();
		$r = array();
		foreach($akun as $row){
			$account_id = $row->id;
			$r[$account_id]['username'] = $row->username;
			$anggota = $row->profile;
			$r[$account_id]['username'] = $anggota->no_anggota;
			$r[$account_id]['nama'] = $anggota->nama;
			$r[$account_id]['batas_aktif'] = $anggota->batas_aktif;
			$r[$account_id]['cabang'] = Cabang::where('id','=',$anggota->id_cabang)->first()->nama;
			$r[$account_id]['tanggal'] = $anggota->tanggal_revisi;
			
		}
		return json_encode($r);
	}
	
	
	//find username
	public function findUsername($status)
	{
		$username = Input::get('username');
		$akun = Account::where('username','LIKE','%'.$username.'%','AND')->where('status_aktif','=',$status)->get();
		$r = array();
		foreach($akun as $row){
			$account_id = $row->id;
			$r[$account_id]['username'] = $row->username;
			$anggota = $row->profile;
			$r[$account_id]['username'] = $anggota->no_anggota;
			$r[$account_id]['nama'] = $anggota->nama;
			$r[$account_id]['batas_aktif'] = $anggota->batas_aktif;
			$r[$account_id]['cabang'] = Cabang::where('id','=',$anggota->id_cabang)->first()->nama;
			$r[$account_id]['tanggal'] = $anggota->tanggal_revisi;
			
		}
		return json_encode($r);
		
	}
	
	//aktivasi
	public function activateAccount()
	{
		$id = Input::get('id');
		$length = Input:get('length');
		$akun = Account::find($id);
		$akun->batas_aktif = Carbon::now()->addYears($length);
		try{
			$akun->save();
			return 'success';
		}catch(Exception $e){
			return $e;
		}
	}
	
	//perpanjang
	public function extendAccount()
	{
		$id = Input::get('id');
		$length = Input:get('length');
		$akun = Account::find($id);
		$akun->batas_aktif = Carbon::createFromFormat('Y-m-d', $akun->batas_aktif)->addYears($length);
		try{
			$akun->save();
			return 'success';
		}catch(Exception $e){
			return $e;
		}
	}
	
	//reset Password
	public function resetPassword()
	{
		$id = Input::get('id');
		$newPass = Input:get('newPass');
		$reNewPass = Input:get('reNewPass');
		if($newPass == $reNewPass){
			$akun = Account::find($id);
			$akun->password = Hash::make($newPass);
			try{
				$akun->save();
				return 'success';
			}catch(Exception $e){
				return $e;
			}
		}else{
			return 'password tidak sama';
		}
		
	}
	
}

?>