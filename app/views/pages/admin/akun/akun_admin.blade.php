<script>
	var token = 0;
	var activeId = -1;
	function openPopup(id){
		activeId = id;
	}
	
	$(document).ready(function(){
		
		var url = '{{ URL::route('admin.akun.getAdmin')}}';
		$.get(url,function(data){
			var temp = "";
			var obj = JSON.parse(data);
			$.each(obj,function(index, value){
				temp += '<div class="username_akun">'+value.username+'</div>';
				temp += '<div class="command">';
				temp += '<a href="javascript:void(0)" class="akun_aktif_ubahpass_trigger" onClick="openPopup('+index+');">Reset Password</a>';
				temp += '</div></li>';
			});
			$(".list_akun").html(temp);
			$( ".loader" ).fadeOut( 200, function(){});
		});
		
		$("#btnChangePassword").click(function(){
			var input = {
				id : activeId,
				newPass : $("#newPass").val(),
				reNewPass : $("#reNewPass").val()
			};
			$.ajax({
				type: 'PUT',
				url: '{{URL::route('admin.resetPassword');}}',
				data: input,
				success: function(data) {
					if(data == 'success'){
						alert("Berhasil mengubah password.");
						$( ".loader" ).fadeIn( 200, function(){});
 						$('.admin_control_panel').load('admin/akun/aktif');
					}else if(data == 0){
						$("#errNewPass").show();
					}else if(data == '1'){
						$("#errReNewPass").show();
					}
				}
			});
			
			
		});
	});
	
</script>
<div class='container_12'>
<div class='grid_12'>
<div class='admin_title'>Akun Admin</div>

<div class="holder"></div>
<div class='list_legend_akun'>
	<ul>
		<li class="username_akun">
			Username
		</li>
		<li class="command">
			
		</li>
	</ul> 
</div>

<div class="admin_akun_list">
	<ul class="list_akun" id="jpage_list_akun"> 
		
	</ul>
</div>
<div class="holder"></div>

<script>
$(document).ready(function () {
    setTimeout(function(){
	$(function() {
		/* initiate plugin */
		$("div.holder").jPages({
			containerID : "jpage_list_akun",
			perPage : 10
		});
		/* on select change */
		$("select").change(function(){
			/* get new nº of items per page */
		  var newPerPage = parseInt( $(this).val() );
		  /* destroy jPages and initiate plugin again */
		  $("div.holder").jPages("destroy").jPages({
				containerID   : "jpage_list_akun",
				perPage       : newPerPage
			});
		});
	});
    }, 500);
});
</script>


<!--pop up reset password-->
<div class=" pop_up_super_c akun_aktif_ubahpass_pop" style="display: none;">
	<a class="exit close_56" ></a>
	<div class="pop_up_tbl">
		<div class="pop_up_cell">
			<div class="container_12">			
				<div class="grid_8 push_2 pop_up_container" style="background: #fff; padding: 20px;">
					<h3 style="width: 100%; text-align: center;">
						Ubah Password
					</h3>
						<span class="clear"></span>
							{{ Form::password('newpassword', array('placeholder' => 'Ketik password baru','id' => 'newPass', 'style' => 'width: 300px; float: left;line-height: 22px;'), Input::old('newpassword')) }}
						<!-- PENTING! Untuk menghilangka notifikasi error cukup tambahkan kelas 'hide' pada element bersangkutan -->
						<span class="error" id="errNewPass">
							Panjang password minimal 8 karakter
						</span>
						
						<span class="clear"></span>
						{{ Form::password('retypenewpassword', array('placeholder' => 'Ketik ulang password baru','id' => 'reNewPass', 'style' => 'width: 300px; float: left;line-height: 22px;'), Input::old('retypenewpassword')) }}
						<!-- PENTING! Untuk menghilangka notifikasi error cukup tambahkan kelas 'hide' pada element bersangkutan -->
						<span class="error" id="errReNewPass">
							Password Anda tidak sama!
						</span>
						
						<span class="clear"></span>
						<div style="display: block; position: relative;overflow: hidden;">
							{{ Form::button('Ubah Password', array('id' => 'btnChangePassword')) }}
						</div>
				</div>
			</div>			
		</div>		
	</div>
</div>


<script>
	/*Script yang digunakan untuk LOADING ANIMATION*/
	$('body').on('click','.akun_baru_aktivasi_trigger',function(){
		
		$( ".akun_baru_aktivasi_pop" ).fadeIn( 277, function(){});
	});
	
	/*external container area exit trigger*/
	$('.exit').click(function() {$( ".pop_up_super_c" ).fadeOut( 200, function(){});});	

	 
	$('body').on('click','.akun_aktif_ubahpass_trigger',function(){
		
	
		$( ".akun_aktif_ubahpass_pop" ).fadeIn( 277, function(){});
		$("#errNewPass").hide();
		$("#errReNewPass").hide();
	});
	/*external container area exit trigger*/
	$('.exit').click(function() {$( ".pop_up_super_c" ).fadeOut( 200, function(){});});	


	$('.pop_up_super_c').click(function (e)
	{
		var container = $('.pop_up_cell');

		if (container.is(e.target) )// if the target of the click is the container...
		{
			$( ".pop_up_super_c" ).fadeOut( 200, function(){});
			$('html').css('overflow-y', 'auto');
		}
	});
								
</script>
</div>
</div>

