<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('pages.home');
});

Route::get('about', function()
{
	return View::make('pages.about');
}
);

Route::get('projects', function()
{
	return View::make('pages.projects');
}
);

Route::get('contact', function()
{
	return View::make('pages.contact');
}
);


Route::get('laravelregistrasianggota',function()
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
);

/*
//route ke halaman pascaregistrasi -> redirect ke folder pages, file pascaregistrasi
Route::get('pascaregistrasi',function()
{
	return View::make('pages.pascaregistrasi');
}
);*/
