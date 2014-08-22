<?php

class KontakController extends BaseController {
	
	public $restful = true;
	
	public function view_index()
	{
	
		$arr = $this->setHeader();
		return View::make('pages.kontak', compact('arr'));
	}

	
	public function kirim_email_kontak()
	{
		$nama = Input::get('nama');
		$email = Input::get('email');
		$profesi = Input::get('profesi');
		$institusi = Input::get('institusi');
		$subjek_pesan = Input::get('subjek');
		$isi_pesan = Input::get('isi_pesan');
		$captcha = Input::get('captcha');
		
		return Redirect::to('/kontak')->with('message', 'Terima kasih, e-[mail anda telah terkirim silahkan menunggu balasan');
		
	}
	
	
	
	//public function get_kontak()
	//public function send_email(){}
}

?>