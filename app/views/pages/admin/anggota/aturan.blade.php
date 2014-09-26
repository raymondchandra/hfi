<div class="container_12">
	<div class="grid_12">
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
<input class="button btn btn-success" type='button' name="submit_beranda_anggota" id='submit_change_home' value='Ubah' style='margin-left: auto; margin-right: auto; display: block;'></input>


<div class='admin_title'>Aturan Menjadi Anggota HFI</div>
<div class='editor_container' style="height:350px;">

<textarea name="textarea" class="editor" id="editorReg"> 
	{{$konten_aturan}}
</textarea>
</div>
<input class="button btn btn-success"  style="margin-bottom:50px; margin-left: auto; margin-right: auto; display: block;" type='button' name="submit_aturan_anggota" id='submit_change_reg' value='Ubah'></input>


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
	</div>
</div>
