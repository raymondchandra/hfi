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
		//
		if($captcha == $_SESSION['phrase'])
		{
			
			$data = array(
				'text' => $isi_pesan,
				'nama' => $nama,
				'profesi' => $profesi,
				'institusi' => $institusi
			);
			
			$address = array(
				'email' => $email,
				'subject' => $subjek_pesan,
				'nama' => $nama
			);
			//return $nama." ".$email." ".$profesi." ".$institusi;
			Mail::queue('emails.lupaPass', $data, function($message) use($address)
			{
				$message->from($address['email'], $address['nama']);
				$message->to("admin@hfi.com")->subject($address['subject']);
			});
			
			return "Email Anda sudah terkirim, pihak HFI akan segera membalas email Anda. Terimakasih";
		}
		else
		{
			return "Harap masukkan data dengan benar";
		}
		
	}
	
	
	
	//public function get_kontak()
	//public function send_email(){}
}

?>