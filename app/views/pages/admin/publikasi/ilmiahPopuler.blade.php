
<script>
$(document).ready(function(){
	$( ".loader" ).fadeOut( 200, function(){});
});
</script>	
<div class="container_12">
	<div class="grid_12">
<div class='admin_title'>Ilmiah Populer</div>
<div class='editor_container'>
<textarea name="pub_populer" id = 'pub_populer' class="editor"> 
{{$pub_populer}}
</textarea>
<input type='button' id='submit_change' value='Ubah' style="margin-left: auto; margin-right: auto; " class="button btn btn-success center-block"></input>
</div>

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
	</div>
</div>