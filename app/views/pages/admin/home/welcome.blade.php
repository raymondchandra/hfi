<div class='admin_title'>Welcome Message</div>
<div class='editor_container'>
<textarea name="textarea" class="editor">
 
</textarea>
</div>
<input type='button' id='submit_change' value='Rubah'></input>

<script>
	$('.editor').jqte();
	
	$('#submit_change').click(function(){
		alert($('.editor').val());
	});
</script>