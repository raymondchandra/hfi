<script>
$(document).ready(function(){
	$( ".loader" ).fadeOut( 200, function(){});
});
</script>	
<div class="container_12">
	<div class="grid_12">
		<div class='admin_title'>Visi HFI</div>
		<div class='editor_container'>
		<textarea name="visi_message" id = 'visi_message' class="editor"> 
		{{$visi_hfi}}
		</textarea>
		<input type='button' id='submit_change' value='Rubah'  style="margin-left: auto; margin-right: auto; "></input>
		</div>

		<script>
			$('.editor').jqte();
			
			$('#submit_change').click(function(){
				$.ajax({
					type: 'PUT',
					url: 'admin/editVisi',
					data: {
						"updateVisi": $('.editor').val()
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