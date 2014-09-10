
<script>
$(document).ready(function(){
	$( ".loader" ).fadeOut( 200, function(){});
});
</script>	
<div class="container_12">
	<div class="grid_12">
		<div class='admin_title'>Welcome Message</div>
		<div class='editor_container'>
			<textarea name="textarea" id = 'welcome_message' class="editor">
				{{$deskripsi_selamat_datang}}
			</textarea>
			<input type='button' id='submit_change' value='Ubah' class="button" style="margin-left: auto; margin-right: auto; "></input>
		</div>


		<script>
			$('.editor').jqte();
			
			$('#submit_change').click(function(){
				//alert($('.editor').val());
				$.ajax({
					type: 'PUT',
					url: 'admin/editWelcome',
					data: {
						"updateWelcome": $('.editor').val()
					},
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