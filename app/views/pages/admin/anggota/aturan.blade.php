<div class='admin_title'>Beranda Anggota HFI</div>
<div class='editor_container'>

<textarea name="beranda" class="editor"> 
<!-- diisi beranda yang ada di database -->
</textarea>
</div>
<input type='button' id='submit_change_beranda' value='Rubah'></input>


<div class='admin_title'>Aturan Menjadi Anggota HFI</div>
<div class='editor_container'>

<textarea name="textarea" class="editor"> 
<!-- diisi aturan yang ada di database-->
</textarea>
</div>
<input type='button' id='submit_change_aturan' value='Rubah'></input>


<script>
	$('.editor').jqte();
	
	$('#submit_change').click(function(){
		alert($('.editor').val());
	});
</script>