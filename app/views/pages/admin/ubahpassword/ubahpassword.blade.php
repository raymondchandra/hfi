<script>
$(document).ready(function(){
	$( ".loader" ).fadeOut( 200, function(){});
});

$("#btnChangePassword").click(function(){
	$("#err1").hide();
	$("#err2").hide();
	$("#err3").hide();
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
			if(data == "success"){
				alert('Berhasil mengubah password');
				$( ".loader" ).fadeIn( 200, function(){});
				$('.admin_control_panel').load('admin/ubahpassword');
			}else if(data == "oldPass"){
				$("#err1").show();

			}else if(data == "reNewPass"){
				$("#err3").show();
			}else{
				$.each(data,function(row){
					
					if(row == "oldPass"){
						$("#err1").show();
					}else if(row == "newPass"){
						$("#err2").show();
					}else if(row == "reNewPass"){
						$("#err3").show();
					}

				});
			}
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

					
					<form class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-sm-3">Password Lama</label>
							{{ Form::password('oldpassword', array('placeholder' => 'password lama','id' => 'oldPass', 'class' => 'form-control col-sm-5') , Input::old('oldpassword')) }}
							<span class="error" id="err1" style="display: none; margin-left: 10px;" class="col-sm-3">
								Maaf password Anda tidak cocok!
							</span>
						</div>


						<div class="form-group">
							<label class="control-label col-sm-3">Password Baru</label>
							{{ Form::password('newpassword', array('placeholder' => 'password baru','id' => 'newPass', 'class' => 'form-control col-sm-5'), Input::old('newpassword')) }}
							<span class="error" id="err2" style="display: none; margin-left: 10px;" class="col-sm-3">
								Panjang password minimal 8 karakter
							</span>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-3">Ketik Ulang Password Baru</label>
							{{ Form::password('retypenewpassword', array('placeholder' => 'Ketik ulang password baru','id' => 'reNewPass', 'class' => 'form-control col-sm-5'), Input::old('retypenewpassword')) }}
							<!-- PENTING! Untuk menghilangka notifikasi error cukup tambahkan kelas 'hide' pada element bersangkutan -->
							<span class="error" id="err3" style="display: none; margin-left: 10px;" class="col-sm-3">
								Maaf password Anda tidak sama!
							</span>
						</div>


						<div class="form-group">
							{{ Form::button('Ubah Password', array('id' => 'btnChangePassword', 'class'=>'btn btn-success col-sm-push-2')) }}
						</div>


					</form>		
					
					
				</div>
			</div>
		</div>
	</div>
</div>