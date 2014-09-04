<div class='admin_title'>Karya Tulis Lain</div>
<div class='editor_container'>
<textarea name="pub_lain" id = 'pub_lain' class="editor"> 
{{$pub_lain}}

</textarea>
</div>
<input type='button' id='submit_change' value='Rubah'></input>

<script>
	$('.editor').jqte();
	
	$('#submit_change').click(function(){
		$.ajax({
			type: 'PUT',
			url: 'admin/editPubLain',
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