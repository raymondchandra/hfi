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
	
	public function view_akun_admin()
	{
		return View::make('pages.admin.akun.akun_admin');
	}
	
	public function get_akun_baru()
	{
		return $this->get_akun(0);
	}
	
	public function get_akun_aktif()
	{
		$akun = Account::where('status_aktif','=','1')->where('role','=','0')->get();
		$r = array();
		foreach($akun as $row){
			$account_id = $row->id;
			$r[$account_id]['username'] = $row->username;
			$anggota = $row->profile;
			$r[$account_id]['no_anggota'] = $anggota->no_anggota;
			$r[$account_id]['nama'] = $anggota->nama;
			$r[$account_id]['batas_aktif'] = $row->batas_aktif;
			$r[$account_id]['cabang'] = Cabang::where('id','=',$anggota->id_cabang)->first()->nama;
			$r[$account_id]['tanggal'] = $anggota->tanggal_revisi;
			
		}
		return json_encode($r);
		
	}
	
	public function get_akun_nonaktif()
	{
		return $this->get_akun(2);
	}
	
	public function get_akun_admin()
	{
		$akun = Account::where('status_aktif','=','1')->where('role','=','1')->get();
		$r = array();
		foreach($akun as $row){
			$account_id = $row->id;
			$r[$account_id]['username'] = $row->username;
			
		}
		return json_encode($r);
	}
	
	public function get_akun($status){
		$akun = Account::where('status_aktif','=',$status)->get();
		$r = array();
		foreach($akun as $row){
			$account_id = $row->id;
			$r[$account_id]['username'] = $row->username;
			$anggota = $row->profile;
			$r[$account_id]['no_anggota'] = $anggota->no_anggota;
			$r[$account_id]['nama'] = $anggota->nama;
			$r[$account_id]['batas_aktif'] = $row->batas_aktif;
			$r[$account_id]['cabang'] = Cabang::where('id','=',$anggota->id_cabang)->first()->nama;
			$r[$account_id]['tanggal'] = $anggota->tanggal_revisi;
			
		}
		return json_encode($r);
	}
	
	
	//find username
	public function findUsername($status)
	{
		$username = Input::get('username');
		$token = Input::get('token');
		$akun = Account::where('status_aktif','=',$status)->where('username','LIKE','%'.$username.'%');
		if ($status == 1) {
			$akun = $akun->where('role','=','0')->get();
		}else{
			$akun = $akun->get();
		}
		$ret['token'] = $token;
		$r = array();
		foreach($akun as $row){
			$account_id = $row->id;
			$r[$account_id]['username'] = $row->username;
			$anggota = $row->profile;
			$r[$account_id]['no_anggota'] = $anggota->no_anggota;
			$r[$account_id]['nama'] = $anggota->nama;
			$r[$account_id]['batas_aktif'] = $row->batas_aktif;
			$r[$account_id]['cabang'] = Cabang::where('id','=',$anggota->id_cabang)->first()->nama;
			$r[$account_id]['tanggal'] = $anggota->tanggal_revisi;
			
		}
		$ret['data'] = $r;
		return json_encode($ret);
		
	}
	
	//aktivasi
	public function activateAccount()
	{
		$id = Input::get('id');
		$length = Input::get('length');
		$newData = Input::get('newData');
		
		if($newData == "yes"){
			UserController::addNomerAnggota($id);
		}
		
		$akun = Account::find($id);		
		$addBatas = Carbon::now()->addYears($length-1);
			$new_batas_aktif = new DateTime();
			$new_batas_aktif->setDate($addBatas->year, 12, 31);
		$akun->batas_akif = Carbon::createFromFormat('Y-m-d', $new_batas_aktif);
				
		$akun->status_aktif = 1;
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
		$length = Input::get('length');
		$akun = Account::find($id);

		$addBatas = Carbon::createFromFormat('Y-m-d', $akun->batas_aktif)->addYears($length-1);
			$new_batas_aktif = new DateTime();
			$new_batas_aktif->setDate($addBatas->year, 12, 31);			
		// $akun->batas_aktif = Carbon::createFromFormat('Y-m-d', $akun->batas_aktif)->addYears($length);
			$akun->batas_aktif = Carbon::createFromFormat('Y-m-d', $new_batas_aktif);
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
		$newPass = Input::get('newPass');
		$reNewPass = Input::get('reNewPass');
		if(strlen($newPass) < 8) return '0';
		if($newPass != $reNewPass) return '1';
		$akun = Account::find($id);
		$akun->password = Hash::make($newPass);
		try{
			$akun->save();
			return 'success';
		}catch(Exception $e){
			return $e;
		}
	}
	
}

?>