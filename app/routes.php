<?php

//model binding
//Route::model('post', 'Post');

Route::get('/tes', function(){

});

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
Route::get('/publikasi', ['as' => 'publikasi', 'uses' => 'PublikasiController@view_index']);
Route::get('/anggota', ['as' => 'anggota', 'uses' => 'AnggotaController@view_index']);
	//route ke sidebar
	Route::get('/ketentuan', ['as' => 'ketentuan', 'uses' => 'AnggotaController@view_ketentuan']);
Route::get('/kontak', ['as' => 'kontak', 'uses' => 'KontakController@view_index']);

//account view
Route::get('/login', ['as' => 'login', 'uses' => 'AccountController@view_login', 'before' => 'checkLogin']);
Route::get('/registrasi', ['as' => 'registrasi', 'uses' => 'AccountController@view_registrasi']);
Route::get('/cetakkartu', ['as' => 'cetakkartu', 'uses' => 'AccountController@view_cetakkartu']);
Route::get('/forgotpassword', ['as' => 'forgotpassword', 'uses' => 'AccountController@view_forgotpassword']);
Route::get('/ubahpassword', ['as' => 'changepassword', 'uses' => 'AccountController@view_changepassword']);

//get daftar cabang buat registrasi	
Route::get('/registrasi/daftarcabang', ['as' => 'registrasi.daftarcabang', 'uses' => 'AccountController@view_registrasi']);
	
    
//user view
Route::group(['prefix' => 'user', 'before' => 'authUser'], function () {
	Route::get('/', ['as' => 'profile', 'uses' => 'UserController@view_profile']);
	Route::get('/carianggota', ['as' => 'carianggota', 'uses' => 'UserController@view_carianggota']);
	Route::get('/berkas', ['as' => 'berkas', 'uses' => 'UserController@view_berkas']);
	
	//user get route
	
	//user put route 
	//Route::put('/editProfile', ['as' => 'editProfile', 'uses' => 'UserController@edit_profile']);
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
	Route::get('/home/slideshow', ['as' => 'admin.home.slideshow', 'uses' => 'HomeAdminController@view_slide']);
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
	
	
	//admin get route
	Route::get('/organisasi/daftarcabang', ['as' => 'admin.organisasi.daftarcabang', 'uses' => 'OrganisasiAdminController@get_semua_cabang']);
	Route::get('/organisasi/daftarpengurus', ['as' => 'admin.organisasi.daftarpengurus', 'uses' => 'OrganisasiAdminController@get_semua_pengurus']);
	Route::get('/home/daftarregulasi', ['as' => 'admin.home.daftarregulasi', 'uses' => 'HomeAdminController@get_all_regulasi']);
	
	//admin post route
	Route::post('/organisasi/tambahcabang', ['as' => 'admin.organisasi.tambahcabang', 'uses' => 'OrganisasiAdminController@tambah_cabang']);
	
	
	//post slideshow
	//upload regulasi
		//Route::post('/postRegulasi', ['as' => 'admin.postRegulasi', 'uses' => 'HomeAdminController@add_regulasi']);
	//upload pengurus
	//post cabang
	//post kegiatan
	//upload berkas
	
	//admin put route
	Route::put('/editWelcome', ['as' => 'admin.editWelcome', 'uses' => 'HomeAdminController@update_welcome']);
	Route::put('/editTentang', ['as' => 'admin.editTentang', 'uses' => 'HomeAdminController@update_tentang']);
	Route::put('/editVisi', ['as' => 'admin.editVisi', 'uses' => 'HomeAdminController@update_visi']);
	Route::put('/editMisi', ['as' => 'admin.editMisi', 'uses' => 'HomeAdminController@update_misi']);
	
	//edit slideshow
	Route::put('/editSlideShow', ['as' => 'admin.editSlideShow', 'uses' => 'HomeAdminController@update_foto_gallery']);
	//edit caption
	Route::put('/editCaption', ['as' => 'admin.editCaption', 'uses' => 'HomeAdminController@update_caption']);
	//edit regulasi
	//edit pengurus
	//edit cabang
	Route::put('/organisasi/editcabang', ['as' => 'admin.organisasi.editcabang', 'uses' => 'OrganisasiAdminController@edit_cabang']);
	//edit kegiatan
	
	//edit jenis publikasi
	//edit ketentuan
	//edit karya tulis lain
	//edit ilmiah populer
	
	//edit beranda anggota
	Route::put('/editAnggotaHome', ['as' => 'admin.editAnggotaHome', 'uses' => 'AnggotaAdminController@update_home']);
	//edit aturan anggota
	Route::put('/editAnggotaReg', ['as' => 'admin.editAnggotaReg', 'uses' => 'AnggotaAdminController@update_regulasi']);
	//aktivasi akun
	//reset password
	//edit berkas
	
	//admin delete route
	
	//delete regulasi
	Route::delete('/home/deleteregulasi', ['as' => 'admin.home.deleteregulasi', 'uses' => 'HomeAdminController@delete_regulasi']);
	//delete pengurus
	Route::delete('/organisasi/deletepengurus', ['as' => 'admin.organisasi.deletepengurus', 'uses' => 'OrganisasiAdminController@delete_pengurus']);
	//delete cabang
	Route::delete('/organisasi/deletecabang', ['as' => 'admin.organisasi.deletecabang', 'uses' => 'OrganisasiAdminController@delete_cabang']);
	//delete kegiatan
	//delete berkas
});

//post route
Route::post('/signin', ['as' => 'signin', 'uses' => 'AccountController@postSignIn']);
Route::post('/regis', ['as' => 'regis', 'uses' => 'AccountController@postRegis']);
//Route::post('/sendEmail', ['as' => 'sendEmail', 'uses' => 'KontakController@send_email']);
Route::post('/postRegulasi', ['as' => 'postRegulasi', 'uses' => 'HomeAdminController@add_regulasi']);
Route::post('/postPengurus', ['as' => 'postPengurus', 'uses' => 'OrganisasiAdminController@tambah_pengurus']);


Route::get('/tes', function(){
	$cabang = new Cabang();
	
	$cabang -> tipe = '1';
	$cabang -> timestamps = false;
	$cabang -> nama = 'cabang jakarta';
	
	$cabang -> save();

	$acc = new Account();	
	
	$acc -> username = 'user';
	$acc -> timestamps = false;
	$acc -> password = Hash::make('passUsr');
	$acc -> status_aktif = '1';
	$acc -> role = '0';
	
	$acc -> save();
	
	$usr = new Anggota();
	
	$accTmp = Account::where('username', '=', 'user')->first()->id;
	
	$usr -> auth_id = $accTmp;
	$usr -> timestamps = false;
	$usr -> nama = "user";
	$idCbg = Cabang::where('nama', '=', 'cabang jakarta')->first()->id;
	$usr -> id_cabang = $idCbg;
	
	$usr -> save();
	
	$accAdmin = new Account();
	
	
	$accAdmin -> username = 'admin';
	$accAdmin -> timestamps = false;
	$accAdmin -> password = Hash::make('passAdm');
	$accAdmin -> status_aktif = '1';
	$accAdmin -> role = '1';
	
	$accAdmin ->save();
	
	$usrAdmin = new Anggota();
	$accAdminTmp = Account::where('username', '=', 'admin')->first()->id;
	$usrAdmin -> auth_id = $accAdminTmp;
	$usrAdmin -> timestamps = false;
	$usrAdmin -> name = 'admin';
	$usrAdmin -> id_cabang = $idCbg;
	
	$usrAdmin ->save();
	
});






