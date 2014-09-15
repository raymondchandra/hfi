@extends('layouts.default')
@section('content')
	<div class="grid_4 push_4">
		<div class="login_content">
			<div class="table">
				<div class="table_cell">


						
						<div class="login_container">
							<div class="alert_wrong_pass">
								@if(Session::has('message'))
									<p class="alert" style="margin: 0px !important;">{{ Session::get('message') }}</p>
								@endif
							</div>
							
							<h1 class="logintitle">
								Login
							</h1>
							<div class="form">
								{{ Form::open(array('url' => '/signin')) }}
								<form>
									<!-- PENTING! Untuk menghilangka notifikasi error cukup tambahkan kelas 'hide' pada element bersangkutan -->
									{{ Form::text('username', Input::old('username'), array('placeholder'=>'Username')) }} 
									

									<!-- PENTING! Untuk menghilangka notifikasi error cukup tambahkan kelas 'hide' pada element bersangkutan -->
									{{ Form::password('password', array('placeholder' => 'password'), Input::old('password')) }}
									
									<div style="display: block; position: relative; width: 100$; height: 30px; overflow: hidden;">
										{{ Form::submit('Login', array('class' => 'login')) }}
										{{ Form::checkbox('remember_me', 'yes', null, ['style' => 'margin-top: 8px;']) }}
										<span style="line-height: 30px; margin-left: 0x; float: right;">Remember Me</span>
									</div>
									<a href="forgotpassword" class="lupa_pass">
										Lupa Password?
									</a>
								</form>								
								{{ Form::token() }}
								{{ Form::close() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop