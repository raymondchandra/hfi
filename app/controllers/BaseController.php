<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	
	protected function setHeader()
	{
		$alamat_hfi = $this->get_cabang('alamat');
		
		$telepon_hfi = $this->get_cabang('telp');
		
		$fax_hfi = $this->get_cabang('fax');
		
		$email_hfi = $this->get_cabang('email');
		
		$arr = array('alamat_hfi' => $alamat_hfi, 'telp' => $telepon_hfi, 'fax_hfi' => $fax_hfi, 'email_hfi' => $email_hfi);
		
		return $arr;
	}
	
	private function get_cabang($kembalian)
	{
		$count = Cabang::where('tipe','=', '1')->first();
		if(count($count) != 0)
		{
			return $count->$kembalian;
		}else
		{
			return "";
		}
	}

}