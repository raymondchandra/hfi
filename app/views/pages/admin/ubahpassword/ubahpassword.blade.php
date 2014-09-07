<script>
$(document).ready(function(){
	$( ".loader" ).fadeOut( 200, function(){});
});

$("#btnChangePassword").click(function(){
	var input = {
			oldPass : $("#oldPass").val(),
			newPass : $("#newPass").val(),
			reNewPass : $("#reNewPass").val()
		};
		$.ajax({
	        url: '{{ URL::route('admin.changePass') }}',
	        type: 'PUT',
	        data: input,
	        success: function (data) {
	            $.each(data,function(row){
					alert(row);
				});
	        }
	    });
	
	

});
</script>
<div class="container_12">
	<div class="grid_12">
	<div class='admin_title'>Ubah Password</div>
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
					
					<div class="form">
						<form>
							<!--<input type="text"  placeholder="Username"/>-->
							{{ Form::password('oldpassword', array('placeholder' => 'password lama','id' => 'oldPass') , Input::old('oldpassword')) }}
							<!--<input type="password" placeholder="Password"/>-->
							{{ Form::password('newpassword', array('placeholder' => 'password baru','id' => 'newPass'), Input::old('newpassword')) }}
							
							{{ Form::password('retypenewpassword', array('placeholder' => 'Ketik ulang password baru','id' => 'reNewPass'), Input::old('retypenewpassword')) }}
							<!--<input type="button" value="Log In" class="login"/>-->
							<div style="display: block; position: relative; width: 100$; height: 30px; overflow: hidden;">
								{{ Form::button('Ubah Password', array('id' => 'btnChangePassword')) }}
							</div>
						</form>								 
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>