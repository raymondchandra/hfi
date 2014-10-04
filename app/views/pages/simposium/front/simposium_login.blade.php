@extends('layouts.simposium')
@section('content')
<div class="container_12">
	<div class="grid_6 push_3">
			<div class="panel panel-default" style="margin-top: 50px; margin-bottom: 50px;">
					<div class="panel-body">
					{{Session::get('message')}}
						{{ Form::open(array('url' => 'login','method'=>'post')) }}
							
						  <div class="form-group">
							<label for="exampleInputEmail1">Username</label>
							<input type="email" name='username' class="form-control" id="" placeholder="Enter email" style="padding-left: 0px; padding-right: 0px; text-indent: 6px;">
						  </div>
						  <div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" name='password' class="form-control" id="" placeholder="Password" style="padding-left: 0px; padding-right: 0px; text-indent: 6px;">
						  </div>
						 
						  <button type="submit" class="btn btn-success">Log In</button> 
						  <button type="submit" class="btn btn-danger">Batal</button> 
						{{ Form::close() }}
					</div>
				</div>
	<!--	<div class="login_content">
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
								{{ Form::text('username', Input::old('username'), array('placeholder'=>'Username')) }} 
								

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
		</div>-->
	</div>
</div>
@stop