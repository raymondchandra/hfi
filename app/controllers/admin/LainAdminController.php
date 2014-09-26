<?php
use Carbon\Carbon;

class LainAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_lain()
	{
		$lains = $this->getAllLain();
		return View::make('pages.admin.lain.lainIndex',compact('lains'));
	}
	
	public function getAllLain()
	{
		$lains = Lain1::all();
		return $lains;
	}

	//get
	public function getLain($id)
	{
		$lain = Lain1::find($id);
		return $lain;
	}

	public function add_lain()
	{
		$text = Input::get('update');
		$title = Input::get('title');

		if($title == "") return 1;
		$id = Auth::user()->id;
		$lain = new Lain1();

		$lain -> timestamps = false;
		$lain -> konten = $text;
		$lain -> title = $title;
		$lain -> tanggal_edit = Carbon::now();
		$lain -> edited_by = $id;
		
		
		try {
			
			$lain -> save();
			return 2;
		} catch (Exception $e) {
			return $e;
		}
	}

	public function update_lain()
	{
		$id = Input::get('id');
		$text = Input::get('update');
		$title = Input::get('title');
		if($title == "") return 1;
		$accountId = Auth::user()->id;

		$lain = Lain1::find($id);

		if(count($lain) != 0)
		{
			$lain->timestamps = false;
			$lain -> konten = $text;
			$lain -> title = $title;
			$lain -> tanggal_edit = Carbon::now();
			$lain -> edited_by = $accountId;
			try {
				$lain -> save();
				return 2;
			} catch (Exception $e) {
				return $e;
			}
		}else
		{
			return 0;
			
		}
	}

	//delete
	public function delete_lain($id){
		$lain = Lain1::find($id);
		try {
			$lain->delete();
			return 'success';
		} catch (Exception $e) {
			return $e;
		}
	}
}

?>