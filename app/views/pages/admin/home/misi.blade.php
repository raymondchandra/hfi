<div class='admin_title'>Misi HFI</div>
<div class='editor_container'>
<textarea name="misi_message" id = 'misi_message' class="editor"> 
{{$misi_hfi}}
</textarea>
</div>
<input type='button' id='submit_change' value='Rubah'></input>

<script>
	$('.editor').jqte();
	
	$('#submit_change').click(function(){
		$.ajax({
			type: 'PUT',
			url: 'admin/editMisi',
			data: {
                "updateMisi": $('.editor').val()
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