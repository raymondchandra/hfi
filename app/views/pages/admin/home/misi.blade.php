<div class='admin_title'>Misi HFI</div>
<div class='editor_container'>
<textarea name="misi_message" id = 'misi_message' class="editor"> 

</textarea>
</div>
<input type='button' id='submit_change' value='Rubah'></input>

<script>
	$('.editor').jqte();
	
	$('#submit_change').click(function(){
		alert($('.editor').val());
	});
</script>