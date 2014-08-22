<div class='admin_title'>Visi HFI</div>
<div class='editor_container'>
<textarea name="visi_message" id = 'visi_message' class="editor"> 

</textarea>
</div>
<input type='button' id='submit_change' value='Rubah'></input>

<script>
	$('.editor').jqte();
	
	$('#submit_change').click(function(){
		alert($('.editor').val());
	});
</script>