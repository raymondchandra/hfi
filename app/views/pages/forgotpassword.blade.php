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
								Lupa Password
							</h1>
							<div class="form">
								<form>
									<!--<input type="text"  placeholder="Username"/>-->
									{{ Form::text('username', Input::old('username'), array('id'=>'usrnm','placeholder'=>'Username')) }}
									<!--<input type="password" placeholder="Password"/>-->
									{{ Form::text('email', Input::old('email'), array('id'=>'eml','placeholder'=>'email')) }}
									<!--<input type="button" value="Log In" class="login"/>-->
									<div style="display: block; position: relative; width: 100$; height: 30px; overflow: hidden;">
										{{ Form::button('Kirim Email', array('id'=>'sendButton','class' => 'lupaPass')) }}
									</div>
								</form>								 
							</div>
							<script>
								$('#sendButton').click(function(){
									$username = $('#usrnm').val();
									$email = $('#eml').val();
									var data = new FormData();
									data.append('email', $email);
									data.append('username', $username);
									$.ajax({
										type: 'POST',
										url: '{{URL::route('user.lupaPass')}}',
										data: data,
										processData : false,
										contentType : false,
										success: function(response){
											alert(response);
										},
										error: function(jqXHR, textStatus, errorThrown){
											alert(errorThrown);
										}
									},'json');

								});
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop