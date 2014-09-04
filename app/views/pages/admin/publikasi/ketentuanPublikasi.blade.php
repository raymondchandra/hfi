<div class="container_12">
	<div class="grid_12">
<div class='admin_title'>Ketentuan Umum</div>
<div class='editor_container'>
<textarea name="pub_ketentuan" id = 'pub_ketentuan' class="editor"> 
{{$pub_ketentuan}}

</textarea>
<input type='button' id='submit_change' value='Rubah' style="margin-left: auto; margin-right: auto; "></input>
</div>

<script>
	$('.editor').jqte();
	
	$('#submit_change').click(function(){
		$.ajax({
			type: 'PUT',
			url: 'admin/editPubKetentuan',
			data: {
                "update": $('.editor').val()
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