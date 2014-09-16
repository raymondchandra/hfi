<?php
use Carbon\Carbon;

Route::get('/tes', function(){
	$destinationPath = "assets/file_upload/berkas/7/";
	
	if(!file_exists($destinationPath))
	{
		echo $destinationPath." GA ADA";
		File::makeDirectory($destinationPath, $mode = 0777, true, true);
	}
	else
	{
		echo $destinationPath." ADA";
	}
});


//test upload ajax
Route::get('/test', ['as' => 'test', 'uses' => 'LainController@view_test']);
Route::post('/putSlideTest', ['as' => 'test.a', 'uses' => 'HomeAdminController@update_foto_gallery']);
//end of test

//Redirect
Route::get('/redirect', ['as' => 'redirect' , 'uses' => 'AccountController@view_redirect']);

//Logout
Route::get('/logout', ['as' => 'logout' , 'uses' => 'AccountController@postLogout']);

//view
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@view_index']);
Route::get('/organisasi', ['as' => 'organisasi', 'uses' => 'OrganisasiController@view_index']);
	//route ke sidebar
	Route::get('/cabang', ['as' => 'cabang', 'uses' => 'OrganisasiController@view_cabang']);
Route::get('/kegiatan', ['as' => 'kegiatan', 'uses' => 'KegiatanController@view_index']);
Route::get('/publikasi/{id}', ['as' => 'publikasi', 'uses' => 'PublikasiController@view_index']);
Route::get('anggota', ['as' => 'anggota', 'uses' => 'AnggotaController@view_index']);
	//route ke sidebar
	Route::get('/ketentuan', ['as' => 'ketentuan', 'uses' => 'AnggotaController@view_ketentuan']);
Route::get('/kontak', ['as' => 'kontak', 'uses' => 'KontakController@view_index']);
Route::get('/lain', ['as' => 'lain', 'uses' => 'LainController@view_index']);

//account view
Route::get('/login', ['as' => 'login', 'uses' => 'AccountController@view_login', 'before' => 'checkLogin']);
Route::get('/registrasi', ['as' => 'registrasi', 'uses' => 'AccountController@view_registrasi']);
Route::get('/forgotpassword', ['as' => 'forgotpassword', 'uses' => 'AccountController@view_forgotpassword']);
Route::get('/ubahpassword', ['as' => 'changepassword', 'uses' => 'AccountController@view_changepassword']);

//get daftar cabang buat registrasi	
Route::get('/registrasi/daftarcabang', ['as' => 'registrasi.daftarcabang', 'uses' => 'AccountController@view_registrasi']);
Route::post('/registrasi/checkExist', ['as' => 'registrasi.checkExist', 'uses' => 'AccountController@checkExist']);

//user view
Route::group(['prefix' => 'user', 'before' => 'authUser'], function () {
	Route::get('/', ['as' => 'profile', 'uses' => 'UserController@view_profile']);
	Route::get('/carianggota', ['as' => 'carianggota', 'uses' => 'UserController@view_carianggota']);
	Route::get('/berkas', ['as' => 'berkas', 'uses' => 'UserController@view_berkas']);
	Route::get('/cetakkartu', ['as' => 'cetakkartu', 'uses' => 'UserController@view_cetakkartu']);
	
	//user get route	
	Route::get('/getDaftarAnggota', ['as' => 'getDaftarAnggota', 'uses'=>'UserController@search_anggota']);
	
	//user put route 
		Route::put('/editProfile', ['as' => 'editProfile', 'uses' => 'UserController@edit_profile']);
	//ganti password
});


//admin route
Route::group(['prefix' => 'admin', 'before' => 'authAdmin'], function () {
//Route::group(['prefix' => 'admin'], function () {
	Route::get('/', ['as' => 'adminPanel', 'uses' => 'HomeAdminController@view_adminPanel']);
	//home
	Route::get('/home/slide', ['as' => 'admin.home.slide', 'uses' => 'HomeAdminController@view_slide']);
	Route::get('/home/welcome', ['as' => 'admin.home.welcome', 'uses' => 'HomeAdminController@view_welcome']);
	Route::get('/home/about', ['as' => 'admin.home.about', 'uses' => 'HomeAdminController@view_about']);
	Route::get('/home/visi', ['as' => 'admin.home.visi', 'uses' => 'HomeAdminController@view_visi']);
	Route::get('/home/misi', ['as' => 'admin.home.misi', 'uses' => 'HomeAdminController@view_misi']);
	Route::get('/home/regulasi', ['as' => 'admin.home.regulasi', 'uses' => 'HomeAdminController@view_regulasi']); 
	//end of home
	
	//organisasi
	Route::get('/organisasi/cabang', ['as' => 'admin.organisasi.cabang', 'uses' => 'OrganisasiAdminController@view_cabang']);
	Route::get('/organisasi/pengurus', ['as' => 'admin.organisasi.pengurus', 'uses' => 'OrganisasiAdminController@view_pengurus']);
	//end of organisasi
	
	Route::get('/kegiatan', ['as' => 'admin.kegiatan', 'uses' => 'KegiatanAdminController@view_index']);
	
	//publikasi
	Route::get('/publikasi/jenis', ['as' => 'admin.publikasi.jenis', 'uses' => 'PublikasiAdminController@view_jenis']);
	Route::get('/publikasi/ketentuan', ['as' => 'admin.publikasi.ketentuan', 'uses' => 'PublikasiAdminController@view_ketentuan']);
	Route::get('/publikasi/karyaLain', ['as' => 'admin.publikasi.karyaLain', 'uses' => 'PublikasiAdminController@view_karyaLain']);
	Route::get('/publikasi/populer', ['as' => 'admin.publikasi.populer', 'uses' => 'PublikasiAdminController@view_populer']);
	//end of publikasi
	
	//anggota
	Route::get('/anggota/aturan', ['as' => 'admin.anggota.aturan', 'uses' => 'AnggotaAdminController@view_aturan']);
	Route::get('/anggota/akun', ['as' => 'admin.anggota.akun', 'uses' => 'AnggotaAdminController@view_akun']);
	Route::get('/anggota/daftar', ['as' => 'admin.anggota.daftar', 'uses' => 'AnggotaAdminController@view_anggota']);
	//end of anggota
	
	//akun
	Route::get('/akun/baru', ['as' => 'admin.akun.baru', 'uses' => 'AkunAdminController@view_akun_baru']); 
	Route::get('/akun/aktif', ['as' => 'admin.akun.aktif', 'uses' => 'AkunAdminController@view_akun_aktif']);
	Route::get('/akun/nonaktif', ['as' => 'admin.akun.nonaktif', 'uses' => 'AkunAdminController@view_akun_nonaktif']);
	//end of akun
	
	//kegiatan
	Route::get('/kegiatan', ['as' => 'admin.kegiatan', 'uses' => 'KegiatanAdminController@view_index']);
	//end of kegiatan
	
	//publikasi
	Route::get('/publikasi/jenis', ['as' => 'admin.publikasi.jenis', 'uses' => 'PublikasiAdminController@view_jenis']);
	Route::get('/publikasi/ketentuan', ['as' => 'admin.publikasi.ketentuan', 'uses' => 'PublikasiAdminController@view_ketentuan']);
	Route::get('/publikasi/karyalain', ['as' => 'admin.publikasi.karyalain', 'uses' => 'PublikasiAdminController@view_karyaLain']);
	Route::get('/publikasi/ilmiahpopuler', ['as' => 'admin.publikasi.ilmiahpopuler', 'uses' => 'PublikasiAdminController@view_populer']);
	//end of publikasi
	
	//berkas
	Route::get('/berkas', ['as' => 'admin.berkas', 'uses' => 'BerkasAdminController@view_index']);
	//end of berkas
	
	Route::get('/lain', ['as' => 'admin.lain', 'uses' => 'LainAdminController@view_lain']);
	
	//ubahpassword
	Route::get('/ubahpassword', ['as' => 'admin.ubahpassword', 'uses' => 'UbahpasswordAdminController@view_index']);
	//end of ubahpassword
	
	
	//admin get route
	Route::get('/organisasi/daftarcabang', ['as' => 'admin.organisasi.daftarcabang', 'uses' => 'OrganisasiAdminController@get_semua_cabang']);
	Route::get('/organisasi/satucabang', ['as' => 'admin.organisasi.satucabang', 'uses' => 'OrganisasiAdminController@get_satu_cabang']);
	Route::get('/organisasi/daftarpengurus', ['as' => 'admin.organisasi.daftarpengurus', 'uses' => 'OrganisasiAdminController@get_semua_pengurus']);
	Route::get('/home/daftarregulasi', ['as' => 'admin.home.daftarregulasi', 'uses' => 'HomeAdminController@get_all_regulasi']);
	Route::get('/berkas/daftarberkas', ['as' => 'admin.berkas.daftarberkas', 'uses' => 'BerkasAdminController@get_all_berkas']);
	
	//akun get route
	Route::get('/akun/getBaru', ['as' => 'admin.akun.getBaru', 'uses' => 'AkunAdminController@get_akun_baru']);
	Route::get('/akun/getAktif', ['as' => 'admin.akun.getAktif', 'uses' => 'AkunAdminController@get_akun_aktif']);
	Route::get('/akun/getNonaktif', ['as' => 'admin.akun.getNonaktif', 'uses' => 'AkunAdminController@get_akun_nonaktif']);
	Route::get('/akun/findUsername/{status}', ['as' => 'admin.akun.findUsername', 'uses' => 'AkunAdminController@findUsername']);
	
	//anggota get route
	Route::get('/anggota/getDaftarAnggota', ['as' => 'admin.anggota.getDaftarAnggota', 'uses'=>'AnggotaAdminController@search_anggota']);
		
	//admin post route
	Route::post('/organisasi/tambahcabang', ['as' => 'admin.organisasi.tambahcabang', 'uses' => 'OrganisasiAdminController@tambah_cabang']);
	
			
	//post slideshow
	//upload regulasi
	Route::post('/postRegulasi', ['as' => 'admin.postRegulasi', 'uses' => 'HomeAdminController@add_regulasi']);
	//upload pengurus
	Route::post('/postPengurus', ['as' => 'admin.postPengurus', 'uses' => 'OrganisasiAdminController@tambah_pengurus']);
	//post cabang
	//post kegiatan
	Route::post('/kegiatan', ['as' => 'admin.addKegiatan', 'uses' => 'KegiatanAdminController@add_kegiatan']);
	//upload berkas
	Route::post('/postBerkas', ['as' => 'admin.postBerkas', 'uses' => 'BerkasAdminController@tambah_berkas']);
	
	//admin put route
	Route::put('/editWelcome', ['as' => 'admin.editWelcome', 'uses' => 'HomeAdminController@update_welcome']);
	Route::put('/editTentang', ['as' => 'admin.editTentang', 'uses' => 'HomeAdminController@update_tentang']);
	Route::put('/editVisi', ['as' => 'admin.editVisi', 'uses' => 'HomeAdminController@update_visi']);
	Route::put('/editMisi', ['as' => 'admin.editMisi', 'uses' => 'HomeAdminController@update_misi']);
	
	//edit slideshow
	Route::post('/editSlideShow', ['as' => 'admin.editSlideShow', 'uses' => 'HomeAdminController@update_foto_gallery']);
	//edit caption
	Route::put('/editCaption', ['as' => 'admin.editCaption', 'uses' => 'HomeAdminController@update_caption']);
	//edit regulasi
	//edit pengurus
	//edit cabang
	Route::put('/organisasi/editcabang', ['as' => 'admin.organisasi.editcabang', 'uses' => 'OrganisasiAdminController@edit_cabang']);
	//edit kegiatan
	Route::put('/kegiatan', ['as' => 'admin.editKegiatan', 'uses' => 'KegiatanAdminController@edit_kegiatan']);
	Route::put('/fotokegiatan', ['as' => 'admin.editFotoKegiatan', 'uses' => 'KegiatanAdminController@edit_fotoKegiatan']);
	
	
	//edit publikasi
	Route::put('/editPubJenis', ['as' => 'admin.editPubJenis', 'uses' => 'PublikasiAdminController@update_jenis']);
	Route::put('/editPubKetentuan', ['as' => 'admin.editPubKetentuan', 'uses' => 'PublikasiAdminController@update_ketentuan']);
	Route::put('/editPubLain', ['as' => 'admin.editPubLain', 'uses' => 'PublikasiAdminController@update_karyaLain']);
	Route::put('/editPubPopuler', ['as' => 'admin.editPubPopuler', 'uses' => 'PublikasiAdminController@update_populer']);
	
	//edit akun
	Route::put('/activateAccount', ['as' => 'admin.activateAccount', 'uses' => 'AkunAdminController@activateAccount']);
	Route::put('/extendAccount', ['as' => 'admin.extendAccount', 'uses' => 'AkunAdminController@extendAccount']);
	Route::put('/resetPassword', ['as' => 'admin.resetPassword', 'uses' => 'AkunAdminController@resetPassword']);
	
	//edit lain
	Route::put('/editLain', ['as' => 'admin.editLain', 'uses' => 'LainAdminController@update_lain']);
	
	
	//edit beranda anggota
	Route::put('/editAnggotaHome', ['as' => 'admin.editAnggotaHome', 'uses' => 'AnggotaAdminController@update_home']);
	//edit aturan anggota
	Route::put('/editAnggotaReg', ['as' => 'admin.editAnggotaReg', 'uses' => 'AnggotaAdminController@update_regulasi']);
	//aktivasi akun
	//reset password
	//edit berkas
	Route::put('/berkas/editberkas', ['as' => 'admin.berkas.editberkas', 'uses' => 'BerkasAdminController@edit_berkas']);
	
	Route::put('/changePass', ['as' => 'admin.changePass', 'uses' => 'AccountController@changePass']);
	//admin delete route
	
	//delete regulasi
	Route::delete('/home/deleteregulasi', ['as' => 'admin.home.deleteregulasi', 'uses' => 'HomeAdminController@delete_regulasi']);
	//delete pengurus
	Route::delete('/organisasi/deletepengurus', ['as' => 'admin.organisasi.deletepengurus', 'uses' => 'OrganisasiAdminController@delete_pengurus']);
	//delete cabang 
	Route::delete('/organisasi/deletecabang', ['as' => 'admin.organisasi.deletecabang', 'uses' => 'OrganisasiAdminController@delete_cabang']);
	//delete kegiatan
	Route::delete('/kegiatan', ['as' => 'admin.deleteKegiatan', 'uses' => 'KegiatanAdminController@del_kegiatan']);
	//delete berkas
	Route::delete('/berkas/deleteberkas', ['as' => 'admin.berkas.deleteberkas', 'uses' => 'BerkasAdminController@delete_berkas']);
});

//post route
Route::post('/signin', ['as' => 'signin', 'uses' => 'AccountController@postSignIn']);
Route::post('/regis', ['as' => 'regis', 'uses' => 'AccountController@postRegis']);
//Route::post('/sendEmail', ['as' => 'sendEmail', 'uses' => 'KontakController@send_email']);
Route::post('/postRegulasi', ['as' => 'postRegulasi', 'uses' => 'HomeAdminController@add_regulasi']);
//Route::post('/postPengurus', ['as' => 'postPengurus', 'uses' => 'OrganisasiAdminController@tambah_pengurus']);
//Route::post('/postBerkas', ['as' => 'postBerkas', 'uses' => 'BerkasAdminController@tambah_berkas']);

Route::put('/changePass', ['as' => 'changePass', 'uses' => 'AccountController@changePass']);


//Route::get('/getDaftarAnggota', ['as' => 'daftarAnggota', 'uses'=>'AnggotaAdminController@search_anggota']);







