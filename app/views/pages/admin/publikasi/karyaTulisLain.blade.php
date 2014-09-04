<div class="container_12">
	<div class="grid_12">
<div class='admin_title'>Karya Tulis Lain</div>
<div class='editor_container'>
<textarea name="pub_lain" id = 'pub_lain' class="editor"> 
{{$pub_lain}}

</textarea>
<input type='button' id='submit_change' value='Rubah' style="margin-left: auto; margin-right: auto; "></input>
</div>

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
	</div>
</div>