<?php

//model binding
//Route::model('post', 'Post');
Route::get('/tes', function()
{
	
});

//view
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@view_index']);
Route::get('/organisasi', ['as' => 'organisasi', 'uses' => 'OrganisasiController@view_index']);
Route::get('/kegiatan', ['as' => 'kegiatan', 'uses' => 'KegiatanController@view_index']);
Route::get('/publikasi', ['as' => 'publikasi', 'uses' => 'PublikasiController@view_index']);
Route::get('/anggota', ['as' => 'anggota', 'uses' => 'AnggotaController@view_index']);
	//route ke sidebar
	Route::get('/ketentuan', ['as' => 'ketentuan', 'uses' => 'AnggotaController@view_ketentuan']);
Route::get('/kontak', ['as' => 'kontak', 'uses' => 'KontakController@view_index']);

//account view
Route::get('/login', ['as' => 'login', 'uses' => 'AccountController@view_login']);
Route::get('/registrasi', ['as' => 'registrasi', 'uses' => 'AccountController@view_registrasi']);
	//route sementara buat setelah login ---->> ntar masuk ke route ini lewat nama profile di bagian kanan atas 
	Route::get('/profile', ['as' => 'profile', 'uses' => 'AccountController@view_profile']);
	//carianggota
	Route::get('/carianggota', ['as' => 'carianggota', 'uses' => 'AnggotaController@view_carianggota']);
    
//user view
Route::group(['prefix' => 'user', 'before' => 'auth'], function () {

Route::get('/berkas', ['as' => 'berkas', 'uses' => 'BerkasController@view_index']);	
	//route sementara buat setelah login ---->> ntar masuk ke route ini lewat nama profile di bagian kanan atas 
	//Route::get('/')

});

//admin route
Route::group(['prefix' => 'admin', 'before' => 'auth'], function () {
	//home
	Route::get('/home/slide', ['as' => 'admin.home.slide', 'uses' => 'HomeAdminController@view_slide']);
	Route::get('/home/welcome', ['as' => 'admin.home.welcome', 'uses' => 'HomeAdminController@view_welcome']);
	Route::get('/home/about', ['as' => 'admin.home.about', 'uses' => 'HomeAdminController@view_about']);
	Route::get('/home/visi', ['as' => 'admin.home.visi', 'uses' => 'HomeAdminController@view_visi']);
	Route::get('/home/misi', ['as' => 'admin.home.misi', 'uses' => 'HomeAdminController@view_misi']);
	Route::get('/home/regulasi', ['as' => 'admin.home.regulasi', 'uses' => 'HomeAdminController@view_regulasi']); 
	//end of home
	Route::get('/organisasi', ['as' => 'admin.organisasi', 'uses' => 'OrganisasiAdminController@view_index']);
	Route::get('/kegiatan', ['as' => 'admin.kegiatan', 'uses' => 'KegiatanAdminController@view_index']);
	Route::get('/publikasi', ['as' => 'admin.publikasi', 'uses' => 'PublikasiAdminController@view_index']);
	Route::get('/anggota', ['as' => 'admin.anggota', 'uses' => 'AnggotaAdminController@view_index']);
	Route::get('/berkas', ['as' => 'admin.berkas', 'uses' => 'BerkasAdminController@view_index']);
	//Route::get('/kontak', ['as' => 'kontak', 'uses' => 'KontakController@view_index']);
});

//Route::get('/admin_slideshow', ['as' => 'admin_slideshow', 'uses' => 'HomeAdminController@view_index']);


Route::get('/adminpanel', function()
{
	return View::make('pages.adminpanel');	
}
);



//controller
//Route::controller('acc', 'AccountController');
Route::post('/signin', ['as' => 'signin', 'uses' => 'AccountController@postSignIn']);
Route::post('/regis', ['as' => 'regis', 'uses' => 'AccountController@postRegis']);

//admin update konten
Route::post('/editWelcome', ['as' => 'editWelcome', 'uses' => 'HomeAdminController@update_welcome']);



//yg d bawah ini harus d ganti...
/*Route::get('laravelregistrasianggota',function()
{
	return View::make('pages.laravelregistrasianggota');
}
);

//route ke halaman registrasi -> redirect ke folder pages, file registrasi.blade.php
Route::get('registrasianggota',function()
{
	return View::make('pages.registrasianggota');
}
);

//route ke halaman homeanggota -> redirect ke folder pages, file homeanggota.blade.php
Route::get('homeanggota', function()
{
	return View::make('pages.homeanggota');
}
);


//route ke halaman daftaranggota -> redirect ke folder pages, file daftaranggota.blade.php
Route::get('daftaranggota', function()
{
	return View::make('pages.daftaranggota');
}
);

//route ke halaman ketentuananggota -> redirect ke folder pages, file ketentuananggota.blade.php
Route::get('ketentuananggota', function()
{
	return View::make('pages.ketentuananggota');
}
);*/

/*
//route ke halaman pascaregistrasi -> redirect ke folder pages, file pascaregistrasi
Route::get('pascaregistrasi',function()
{
	return View::make('pages.pascaregistrasi');
}
);*/

//route ke halaman profileanggota -> redirect ke folder pages, file profileanggota.blade.php
/*Route::get('profileanggota', function()
{
	return View::make('pages.profileanggota');
}
);*/
