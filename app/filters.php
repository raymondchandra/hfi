<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('authUser', function()
{
	if (Auth::guest()) 
	{	
		return Redirect::guest('login');
	}
	else
	{
		if(Auth::user()->role == 1)
		{
			$message = "Anda tidak memiliki hak akses untuk halaman ini";
			return Redirect::to('redirect')->with('message', $message);
		}
	}
	
});

Route::filter('authSimposium', function($request)
{
	$path = explode('/',Request::path());
	$id_kegiatan =  $path[count($path)-1];

	if(Session::get('session_user_id') == NULL){
		return Redirect::to('event/login/'.$id_kegiatan)->with('message','Silahkan Login Terlebih Dahulu');
	}
	else if(Session::get('session_kegiatan')[0] != $id_kegiatan){
		return Redirect::to('event/login/'.$id_kegiatan)->with('message','Silahkan Login Terlebih Dahulu');
	}
	
}); 

Route::filter('checkSimposium', function($request)
{

	$path = explode('/',Request::path());
	$id_kegiatan =  $path[count($path)-1];

	if(Session::get('session_kegiatan')[0] != $id_kegiatan){
		Session::forget('session_admin_id');
		Session::forget('session_user_id');
		return Redirect::to('event/'.$id_kegiatan);
	}
});

Route::filter('authSimposiumAdmin', function($request)
{
	$req_path = Request::path();
	$path = explode('/',$req_path);
	$id_kegiatan =  $path[count($path)-1];
	if(Auth::check())
	{
		if(Auth::user()->role == 1)
		{
			Session::push('session_admin_id','super_admin');
		}
		else if(Session::get('session_kegiatan')[0] != $id_kegiatan){
			return Redirect::to('event/login/'.$id_kegiatan)->with('message','Silahkan Login Terlebih Dahulu');
		}
		else{
			return Redirect::to('event/login/'.$id_kegiatan)->with('message','Silahkan Login Terlebih Dahulu');
		}
		
		
	}
	else{
		if(Session::get('session_admin_id') == NULL){
			return Redirect::to('event/login/'.$id_kegiatan)->with('message','Silahkan Login Terlebih Dahulu');
		}
		else if(Session::get('session_kegiatan')[0] !== $id_kegiatan){
			return Redirect::to('event/login/'.$id_kegiatan)->with('message','Silahkan Login Terlebih Dahulu');
		}else{

		}
	}

});

Route::filter('checkLogin', function()
{
	if(Auth::check())
	{
		$message = "Anda sudah login";
		if(Auth::user()->role == 1)
		{
			return Redirect::to('redirect')->with('message', $message);
		}
		else
		{
			return Redirect::to('redirect')->with('message', $message);
		}
		
	}
});

Route::filter('authAdmin', function()
{
	if (Auth::guest())
	{
		return Redirect::guest('login');
	}
	else
	{
		if(Auth::user()->role == 0)
		{
			$message = "Anda tidak memiliki hak akses untuk halaman ini";
			return Redirect::to('redirectAdmin')->with('message', $message);
		}
	}
});

Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});