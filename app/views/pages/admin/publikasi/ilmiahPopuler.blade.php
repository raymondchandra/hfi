<div class='admin_title'>Ilmiah Populer</div>
<div class='editor_container'>
<textarea name="pub_populer" id = 'pub_populer' class="editor"> 
{{$pub_populer}}
</textarea>
</div>
<input type='button' id='submit_change' value='Rubah'></input>

<script>
	$('.editor').jqte();
	
	$('#submit_change').click(function(){
		$.ajax({
			type: 'PUT',
			url: 'admin/editPubPopuler',
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