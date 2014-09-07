
<script>
$(document).ready(function(){
	$( ".loader" ).fadeOut( 200, function(){});
});
</script>	
<div class='admin_title'>Beranda Anggota HFI</div>
<div class='editor_container' style="height:350px;">

<textarea name="beranda" class="editor" id="editorHome"> 
	{{$konten_home}}
</textarea>
</div>
<input style="margin-left:920px;" type='button' name="submit_beranda_anggota" id='submit_change_home' value='Rubah'></input>


<div class='admin_title'>Aturan Menjadi Anggota HFI</div>
<div class='editor_container' style="height:350px;">

<textarea name="textarea" class="editor" id="editorReg"> 
	{{$konten_aturan}}
</textarea>
</div>
<input style="margin-left:920px; margin-bottom:50px;" type='button' name="submit_aturan_anggota" id='submit_change_reg' value='Rubah'></input>


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
