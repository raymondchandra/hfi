
<script>
$(document).ready(function(){
	$( ".loader" ).fadeOut( 200, function(){});
});
</script>	
<div class="container_12">
	<div class="grid_12">
<div class='admin_title'>Lain-lain</div>
<div class='editor_container'>
<textarea name="lain" id = 'lain' class="editor"> 
{{$lain}}
</textarea>
<input type='button' id='submit_change' value='Rubah' style="margin-left: auto; margin-right: auto; "></input>
</div>

<script>
	$('.editor').jqte();
	
	$('#submit_change').click(function(){
		$.ajax({
			type: 'PUT',
			url: 'admin/editLain',
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