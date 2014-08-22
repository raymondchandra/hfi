<div class='admin_title'>Visi HFI</div>
<div class='editor_container'>
<textarea name="visi_message" id = 'visi_message' class="editor"> 
{{$visi_hfi}}
</textarea>
</div>
<input type='button' id='submit_change' value='Rubah'></input>

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