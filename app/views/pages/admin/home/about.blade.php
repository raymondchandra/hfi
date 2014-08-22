<div class='admin_title'>Tentang HFI</div>
<div class='editor_container'>
<textarea name="about_message" id = 'about_message' class="editor">
{{$tentang_hfi}}
</textarea>
</div>
<input type='button' id='submit_change' value='Rubah'></input>

<script> 
	$('.editor').jqte();
	
	$('#submit_change').click(function(){
		$.ajax({
			type: 'PUT',
			url: 'admin/editTentang',
			data: {
                "updateAbout": $('.editor').val()
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