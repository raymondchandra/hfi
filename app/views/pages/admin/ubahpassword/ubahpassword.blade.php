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
					 
					
						<form>
							{{ Form::password('oldpassword', array('placeholder' => 'password lama','id' => 'oldPass', 'style' => 'width: 300px; float: left;') , Input::old('oldpassword')) }}
							<!-- PENTING! Untuk menghilangka notifikasi error cukup tambahkan kelas 'hide' pada element bersangkutan -->
							<span class="error">
								Maaf password Anda tidak cocok!
							</span>
							
							<span class="clear"></span>
							{{ Form::password('newpassword', array('placeholder' => 'password baru','id' => 'newPass', 'style' => 'width: 300px; float: left;'), Input::old('newpassword')) }}
							<!-- PENTING! Untuk menghilangka notifikasi error cukup tambahkan kelas 'hide' pada element bersangkutan -->
							<span class="error">
								Panjang password minimal 8 karakter
							</span>
							
							<span class="clear"></span>
							{{ Form::password('retypenewpassword', array('placeholder' => 'Ketik ulang password baru','id' => 'reNewPass', 'style' => 'width: 300px; float: left;'), Input::old('retypenewpassword')) }}
							<!-- PENTING! Untuk menghilangka notifikasi error cukup tambahkan kelas 'hide' pada element bersangkutan -->
							<span class="error">
								Maaf password Anda tidak sama!
							</span>
							
							<span class="clear"></span>
							<div style="display: block; position: relative;overflow: hidden;">
								{{ Form::button('Ubah Password', array('id' => 'btnChangePassword')) }}
							</div>
							
							
						</form>		
					
					
				</div>
			</div>
		</div>
	</div>
</div>