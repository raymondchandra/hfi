<?php

//model binding
//Route::model('post', 'Post');
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
Route::get('/login', ['as' => 'login', 'uses' => 'AccountController@view_login']);
Route::get('/registrasi', ['as' => 'registrasi', 'uses' => 'AccountController@view_registrasi']);
	
    
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
//Route::group(['prefix' => 'admin', 'before' => 'authAdmin'], function () {
Route::group(['prefix' => 'admin'], function () {
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
	Route::get('/berkas', ['as' => 'admin.berkas', 'uses' => 'BerkasAdminController@view_index']);
	
	//admin get route
	
	//admin post route
	//post slideshow
	//upload regulasi
	//upload pengurus
	//post cabang
	//post kegiatan
	//upload berkas
	
	//admin put route
	Route::put('/editWelcome', ['as' => 'editWelcome', 'uses' => 'HomeAdminController@update_welcome']);
	//edit tentang
	//edit visi
	//edit misi
	//edit slideshow
	//edit regulasi
	//edit pengurus
	//edit cabang
	//edit kegiatan
	//edit jenis publikasi
	//edit ketentuan
	//edit karya tulis lain
	//edit ilmiah populer
	//edit aturan anggota
	//aktivasi akun
	//reset password
	//edit berkas
	
	//admin delete route
	//Route::delete('/editWelcome',............
	//delete regulasi
	//delete pengurus
	//delete cabang
	//delete kegiatan
	//delete berkas
});

//post route
Route::post('/signin', ['as' => 'signin', 'uses' => 'AccountController@postSignIn']);
Route::post('/regis', ['as' => 'regis', 'uses' => 'AccountController@postRegis']);
//Route::post('/sendEmail', ['as' => 'sendEmail', 'uses' => 'KontakController@send_email']);






