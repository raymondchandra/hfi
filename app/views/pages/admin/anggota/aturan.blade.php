<div class='admin_title'>Beranda Anggota HFI</div>
<div class='editor_container'>

<textarea name="beranda" class="editor"> 
<!-- diisi beranda yang ada di database -->
</textarea>
</div>
<input type='button' name="submit_beranda_anggota" id='submit_change' value='Rubah'></input>


<div class='admin_title'>Aturan Menjadi Anggota HFI</div>
<div class='editor_container'>

<textarea name="textarea" class="editor"> 
<!-- diisi aturan yang ada di database-->
</textarea>
</div>
<input type='button' name="submit_aturan_anggota" id='submit_change' value='Rubah'></input>


<script>
	$('.editor').jqte();
	
	$('#submit_change').click(function(){
		alert($('.editor').val());
	});
</script>