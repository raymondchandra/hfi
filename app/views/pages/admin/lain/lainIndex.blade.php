<script>
	var popupId = -1;
$(document).ready(function(){
	$( ".loader" ).fadeOut( 200, function(){});
});

function edit(id){
	popupId = id;
	$( ".loader" ).fadeIn( 200, function(){});
	
	$.get('admin/lain/getDetail/'+popupId,function(data){
		if(data == 0){
			
			$( ".loader" ).fadeOut( 200, function(){});
			alert('Error');
		}else{
			$( ".menu_lain_pop" ).fadeIn( 277, function(){});
			$("#lainTitle").val(data.title);
			$('.jqte_editor').html(data.konten);
			$('#submit_change').val('Ubah');
			$( ".loader" ).fadeOut( 200, function(){});
		}
		
	});
	
}

function hapus(id){
	popupId = id;
	$(".pop_up_super_c_hapus_regulasi").fadeIn(277, function(){});
	
}
</script>
<script>
	var ajaxOnce = true;													
	$('body').on('click','.ok_hapus_regulasi',function(){
		if (ajaxOnce) {
			ajaxOnce = false;
			
			
			$.ajax({
				type: 'DELETE',
				url: 'admin/lain/'+popupId,
				success: function(response){
					$(".pop_up_super_c_hapus_regulasi").fadeOut(200, function(){});
					if(response == "success"){

						alert("Sukses menghapus data.");
						$( ".loader" ).fadeIn( 200, function(){});
				 		$('.admin_control_panel').load('admin/lain');
					}
					else{
						alert(response);
					}
					ajaxOnce = true;
				},
				error: function(jqXHR, textStatus, errorThrown){
					alert(errorThrown);
				}
			},'json');
		};
		
	});							
	$('body').on('click','.batal_hapus_regulasi',function(){
		$(".pop_up_super_c_hapus_regulasi").fadeOut(200, function(){});
	});
	
	$('exit').click(function() {$(".pop_up_super_c_hapus_regulasi").fadeOut(200, function(){});});
	
	$('.pop_up_super_c_hapus_regulasi').click(function (e)
	{
		var container = $('.pop_up_cell_hapus_regulasi');
		if (container.is(e.target) )// if the target of the click is the container...
		{
			$( ".pop_up_super_c_hapus_regulasi" ).fadeOut( 200, function(){});
			$('html').css('overflow-y', 'auto');
		}
	});
</script>	

<div class="container_12">
	<div class="grid_12">

		<div class='admin_title'>Lain-lain</div>
		<div id="Laincontent">

			<div id='div_tambah_lain'><a href='javascript:void(0)' id='tambah_lain'  class='command_button f_menu_lain_popuper'>+ Menu Lain</a></div>
			<div id="listLain">
				@if($lains == NULL)
					<span>Tidak terdapat menu lain-lain yang diunggah</span>
				@else
					<table border=0 style='width:800px;'>
						<tr>
							<td><h6>Menu</h6></td>
							<td><h6>Tanggal Edit</h6></td>
							<td>&nbsp;</td>
						</tr>
					@foreach($lains as $lain)
						<tr>
							<td style='vertical-align:middle !important; width:350px; overflow:hidden; margin-right:30px;'>{{$lain->title}}</td>
							<td style='vertical-align:middle !important; width:350px;'>{{$lain->tanggal_edit}}</td>
							<td style='vertical-align:middle !important; width:100px;'><input type='button' value='v' class='editLain' onClick='edit({{$lain->id}})'/><input type='button' value='x' class='hapusLain' onClick='hapus({{$lain->id}})'/></td>
						</tr>
					@endforeach
					</table>
				@endif
				
			</div>
		</div>
	</div>
	
	
	
	
	<!--pop up start-->
	<div class=" pop_up_super_c menu_lain_pop" style="display: none;">
		<a class="exit close_56" ></a>
		<div class="pop_up_tbl">
			<div class="pop_up_cell">
				<div class="container_12">			
					<div class="grid_12 pop_up_container" style="background: #fff; padding: 20px;">
						<h2> Tambah Menu Lain </h2>
						<div class='editor_container'>
							<span> Judul : </span> <input type="text" id="lainTitle" value="" /> 
							<textarea name="lain" id = 'lainArea' class="editor"> 
							
							</textarea>
							<input type='button' id='submit_change' value='Tambah' style="margin-left: auto; margin-right: auto; " class="button"></input>
						</div>
					</div>
				</div>			
			</div>		
		</div>
	</div>

	<!-- pop up hapus regulasi -->
	<div class=" pop_up_super_c_hapus_regulasi" style="display: none;">
		<a class="exit close_56_hapus_regulasi" ></a>
		<div class="pop_up_tbl_hapus_regulasi">
			<div class="pop_up_cell_hapus_regulasi">
				<div class="container_12">			
					<div class="div_hapus_regulasi" style="background: #fff; width:600px !important; padding-top:40px;">
						<h2 style="text-align:center;">Anda yakin ingin menghapus berkas ini?</h2>							
						<table border="0" style="margin-left:auto; margin-right:auto;">
							<tr>
								<td><button class="ok_hapus_regulasi">Ya</button></td>
								<td>&nbsp;</td>
								<td><button class="batal_hapus_regulasi">Tidak</button></td>
							</tr>
						</table>
					</div>
				</div>			
			</div>		
		</div>
	</div>

	<script>
		$('.editor').jqte();
		
		$('#submit_change').click(function(){
			if(popupId == -1){
				$.ajax({
					type: 'POST',
					url: 'admin/lain',
					data: {
						"title" : $("#lainTitle").val(),
		                "update": $('.editor').val()
		            },
					success: function(response){
						if(response == 1){
							alert("Judul tidak boleh kosong.");
						}else if(response == 2){
							alert("Success Insert");
							$( ".loader" ).fadeIn( 200, function(){});
		 					$('.admin_control_panel').load('admin/lain');
						}else if(response == 3){
							alert("Anda hanya dapat memiliki 15 menu lain-lain");
						}
						else{
							alert(response);
						}
					},
					error: function(jqXHR, textStatus, errorThrown){
						alert(errorThrown);
					}
				},'json');
			}else{
				$.ajax({
					type: 'PUT',
					url: 'admin/editLain',
					data: {
						"title" : $("#lainTitle").val(),
		                "update": $('.editor').val(),
		                "id" : popupId
		            },
					success: function(response){
						if(response == 0){
							alert("Error. Not Found");
						}else if(response == 1){
							alert("Judul tidak boleh kosong.");
						}else if(response == 2){
							alert("Success Update");
							$( ".loader" ).fadeIn( 200, function(){});
		 					$('.admin_control_panel').load('admin/lain');
						}else{
							alert(response);
						}
					},
					error: function(jqXHR, textStatus, errorThrown){
						alert(errorThrown);
					}
				},'json');

			}
				
		});
	</script>

	<script>
		$('body').on('click','.f_menu_lain_popuper',function(){
			$( ".menu_lain_pop" ).fadeIn( 277, function(){});
			$("#lainTitle").val("");
			$('.jqte_editor').html("");
			$('#submit_change').val('Tambah');
			popupId = -1;
		});
		
		$('.exit').click(function() {$( ".pop_up_super_c" ).fadeOut( 200, function(){});});	
			
		$('.pop_up_super_c').click(function (e)
		{
			var container = $('.pop_up_cell');

			if (container.is(e.target) )// if the target of the click is the container...
			{
				$( ".pop_up_super_c" ).fadeOut( 200, function(){});
				$('html').css('overflow-y', 'auto');
			}
		});
	</script>
	<!--pop up end-->
	
</div>
