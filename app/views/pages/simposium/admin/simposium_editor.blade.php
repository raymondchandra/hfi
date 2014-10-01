<script>
	var id = '{{$id}}';
</script>

<div class="container_12">
	<div class="grid_12">
		<div class='admin_title'>{{$nama_kegiatan}}</div>
		<div>{{$title}}</div>
		<a href='javascript:void(0)' onClick='history.back();' >Back</a>

		<div class='editor_container'>
			<textarea name="textarea" id = 'jqteText' class="editor">
				{{$text}}
			</textarea>
			<input type='button' id='submit_change' value='Ubah' class="button btn btn-success" style="margin-left: auto; margin-right: auto; display: block "></input>
		</div>
		
		<script>
			$('.editor').jqte();
			
			/*$('#submit_change').click(function(){
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
			});*/
		</script>
	</div>
</div>