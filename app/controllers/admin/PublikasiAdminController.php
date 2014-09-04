<?php
use Carbon\Carbon;
class PublikasiAdminController extends BaseController {
	
	public $restful = true;
	
	public function view_jenis()
	{
		$pub_jenis = PublikasiController::get_konten('pub_jenis');
		return View::make('pages.admin.publikasi.jenisPublikasi',compact('pub_jenis'));
	}
	
	public function view_ketentuan()
	{
		$pub_ketentuan = PublikasiController::get_konten('pub_ketentuan');
		return View::make('pages.admin.publikasi.ketentuanPublikasi',compact('pub_ketentuan'));
	}
	
	public function view_karyaLain()
	{
		$pub_lain = PublikasiController::get_konten('pub_lain');
		return View::make('pages.admin.publikasi.karyaTulisLain',compact('pub_lain'));
	}
	
	public function view_populer()
	{
		$pub_populer = PublikasiController::get_konten('pub_populer');
		return View::make('pages.admin.publikasi.ilmiahPopuler',compact('pub_populer'));
	}
	
	public function update_jenis()
	{
		$text = Input::get('update');
		
		$id = Auth::user()->id;
		$konten_id = Konten::where('tipe_konten', '=', 'pub_jenis')->first();
		
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
			$konten -> tipe_konten = 'pub_jenis';
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = $id;
			$konten -> save();
			
			return "Success Insert";
		}
	}
	
	public function update_ketentuan()
	{
		$text = Input::get('update');
		$id = Auth::user()->id;
		$konten_id = Konten::where('tipe_konten', '=', 'pub_ketentuan')->first();
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
			$konten -> tipe_konten = 'pub_ketentuan';
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = $id;
			
			$konten -> save();
			
			return "Success Insert";
		}
	}
	
	public function update_karyaLain()
	{
		$text = Input::get('update');
		$id = Auth::user()->id;
		$konten_id = Konten::where('tipe_konten', '=', 'pub_lain')->first();
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
			$konten -> tipe_konten = 'pub_lain';
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = $id;
			
			$konten -> save();
			
			return "Success Insert";
		}
	}
	
	public function update_populer()
	{
		$text = Input::get('update');
		$id = Auth::user()->id;
		$konten_id = Konten::where('tipe_konten', '=', 'pub_populer')->first();
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
			$konten -> tipe_konten = 'pub_populer';
			$konten -> tanggal_edit = Carbon::now();
			$konten -> edited_by = $id;
			
			$konten -> save();
			
			return "Success Insert";
		}
	}
	
	

}

?>