@extends('layouts.default')
@section('content')
	<div class="grid_4 push_4">
		<div class="login_content">
			<div class="table">
				<div class="table_cell">


						
						<div class="login_container">
							<div class="alert_wrong_pass">
								@if(Session::has('message'))
									<p class="alert" style="margin: 0px !important;">
										Username atau email anda tidak terdaftar
									</p>
								@endif
							</div>
							
							<h1 class="logintitle">
								Ubah Password 
							</h1>
							<div class="form">
								{{ Form::open(array('url' => '/signin')) }}
								<form>
									<!--<input type="text"  placeholder="Username"/>-->
									{{ Form::password('oldpassword', Input::old('oldpassword')) }}
									<!--<input type="password" placeholder="Password"/>-->
									{{ Form::password('newpassword', Input::old('newpassword')) }}
									
									{{ Form::password('retypenewpassword', Input::old('retypenewpassword')) }}
									<!--<input type="button" value="Log In" class="login"/>-->
									<div style="display: block; position: relative; width: 100$; height: 30px; overflow: hidden;">
										{{ Form::submit('Ubah Password', array('class' => 'login')) }}
									</div>
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