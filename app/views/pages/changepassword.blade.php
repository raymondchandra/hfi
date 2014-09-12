@extends('layouts.default')
@section('content')
<script>
	
	function changePass(){
		var input = {
			oldPass : $("#oldPass").val(),
			newPass : $("#newPass").val(),
			reNewPass : $("#reNewPass").val()
		};
		$.ajax({
	        url: '{{ URL::route('changePass') }}',
	        type: 'PUT',
	        data: input,
	        success: function (data) {
	            $.each(data,function(row){
					alert(row);
				});
	        }
	    });
	}
</script>
	<div class="grid_4 push_4">
		<div class="login_content">
			<div class="table">
				<div class="table_cell">


						
						<div class="login_container">
							<div class="alert_wrong_pass">
									<p class="alert" style="margin: 0px !important;">
										Warning ditempatkan disini
									</p>
							</div>
							
							<h1 class="logintitle">
								Ubah Password 
							</h1>
							<div class="form">
								<form>
									<!--<input type="text"  placeholder="Username"/>-->
									{{ Form::password('oldpassword', array('placeholder' => 'password lama','id' => 'oldPass') , Input::old('oldpassword')) }}
									<!--<input type="password" placeholder="Password"/>-->
									{{ Form::password('newpassword', array('placeholder' => 'password baru','id' => 'newPass'), Input::old('newpassword')) }}
									{{ Form::password('retypenewpassword', array('placeholder' => 'Ketik ulang password baru','id' => 'reNewPass'), Input::old('retypenewpassword')) }}
									<!--<input type="button" value="Log In" class="login"/>-->
									<div style="display: block; position: relative; width: 100%; overflow: hidden;">
										{{ Form::button('Ubah Password', array('onClick' => 'changePass()')) }}
									</div>
								</form>					
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop