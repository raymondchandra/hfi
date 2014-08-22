<div class='admin_title'>Beranda Anggota HFI</div>
<div class='editor_container'>

<textarea name="beranda" class="editor" id="editorHome"> 

</textarea>
</div>
<input type='button' name="submit_beranda_anggota" id='submit_change_home' value='Rubah'></input>


<div class='admin_title'>Aturan Menjadi Anggota HFI</div>
<div class='editor_container'>

<textarea name="textarea" class="editor" id="editorReg"> 

</textarea>
</div>
<input type='button' name="submit_aturan_anggota" id='submit_change_reg' value='Rubah'></input>


<script>
	$('.editor').jqte();
	
	$('#submit_change_home').click(function(){

		$.ajax({
			type: 'PUT',
			url: 'admin/editAnggotaHome',
			data: {
                "updateAnggotaHome": $('#editorHome').val()
            },
			success: function(response){
				alert(response);
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		},'json');
	});
	
	$('#submit_change_reg').click(function(){
		
		$.ajax({
			type: 'PUT',
			url: 'admin/editAnggotaReg',
			data: {
                "updateAnggotaRegulasi": $('#editorReg').val()
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
