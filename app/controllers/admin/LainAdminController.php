<?php
use Carbon\Carbon;
class LainAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_lain()
	{
		$lain = LainController::get_konten('lain');
		return View::make('pages.admin.lain.lain',compact('lain'));
	}
	
	
	public function update_lain()
	{
		$text = Input::get('update');
		
		$id = Auth::user()->id;
		$konten_id = Konten::where('tipe_konten', '=', 'lain')->first();
		
		if(count($konten_id) != 0)
		{
			$konten = Konten::find($konten_id->id);
			$konten->konten = $text;
			$konten->timestamps = false;
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = $id;
			
			$konten->save();
			return "Success Update";
		}else
		{
			
			$konten = new Konten();
			$konten -> timestamps = false;
			$konten -> konten = $text;
			$konten -> tipe_konten = 'lain';
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = $id;
			$konten -> save();
			
			return "Success Insert";
		}
	}
}

?>