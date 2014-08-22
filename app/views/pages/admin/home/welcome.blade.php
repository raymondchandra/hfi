<div class='admin_title'>Welcome Message</div>
<div class='editor_container'>
{{Form::open(array('url' => 'editWelcome','method'=>'put'))}}
	<textarea name="welcome_message" id = 'welcome_message' class="editor">
		{{$deskripsi_selamat_datang}}
	</textarea>
	<input type='button' id='submit_change' value='Rubah'></input>
{{Form::close()}}
</div>


<script>
	$('.editor').jqte();
	
	$('#submit_change').click(function(){
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
	});
</script>