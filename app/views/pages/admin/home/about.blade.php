<div class='admin_title'>Tentang HFI</div>
<div class='editor_container'>
<textarea name="about_message" id = 'about_message' class="editor">

</textarea>
</div>
<input type='button' id='submit_change' value='Rubah'></input>

<script> 
	$('.editor').jqte();
	
	$('#submit_change').click(function(){
		alert($('.editor').val());
	});
</script>