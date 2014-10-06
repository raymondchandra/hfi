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
			//$( ".menu_lain_pop" ).fadeIn( 277, function(){});
			$("#lainTitle").val(data.title);
			$('.jqte_editor').html(data.konten);
			$('#submit_change').val('Ubah');
			$( ".loader" ).fadeOut( 200, function(){});
		}
		
	});
	
}

function hapus(id){
	popupId = id;
	//$(".pop_up_super_c_hapus_regulasi").fadeIn(277, function(){});
	
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
				//$(".pop_up_super_c_hapus_regulasi").fadeOut(200, function(){});
				if(response == "success"){

					alert("Sukses menghapus data.");
					$( ".loader" ).fadeIn( 200, function(){});
					$('.admin_control_panel').load('admin/lain');
					$('.modal-backdrop').removeClass('in');
					setTimeout(function() {
						$('.modal-backdrop').remove();
					}, 500);
				}
				else{
					alert(response);
					$('.modal-backdrop').removeClass('in');
					setTimeout(function() {
						$('.modal-backdrop').remove();
					}, 500);
				}
				ajaxOnce = true;
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
				$('.modal-backdrop').removeClass('in');
				setTimeout(function() {
					$('.modal-backdrop').remove();
				}, 500);
			}
		},'json');
	};

});							
$('body').on('click','.batal_hapus_regulasi',function(){
	//$(".pop_up_super_c_hapus_regulasi").fadeOut(200, function(){});
});

//$('exit').click(function() {$(".pop_up_super_c_hapus_regulasi").fadeOut(200, function(){});});

/*$('.pop_up_super_c_hapus_regulasi').click(function (e)
{
	var container = $('.pop_up_cell_hapus_regulasi');
		if (container.is(e.target) )// if the target of the click is the container...
		{
			$( ".pop_up_super_c_hapus_regulasi" ).fadeOut( 200, function(){});
			$('html').css('overflow-y', 'auto');
		}
	});*/
</script>	

<div class="container_12">
	<div class="grid_12">

		<div class='admin_title'>Lain-lain</div>
		<div id="Laincontent">

			<div id='div_tambah_lain'><a data-toggle="modal" data-target=".menu_lain_pop"  href='javascript:void(0)' id='tambah_lain'  class='command_button f_menu_lain_popuper'>+ Menu Lain</a></div>
			<sapn class="clearfix"></span>
			<div id="listLain">
				@if($lains == NULL)
				<span>Tidak terdapat menu lain-lain yang diunggah</span>
				@else
				<table class="table">
					<thead><tr>
						<th>Menu</th>
						<th>Tanggal Edit</th>
						<th>&nbsp;</th>
					</tr></thead>
					<tbody>
					@foreach($lains as $lain)
					<tr>
						<td style='vertical-align:middle !important; width:350px; overflow:hidden; margin-right:30px;'>{{$lain->title}}</td>
						<td style='vertical-align:middle !important; width:350px;'>{{$lain->tanggal_edit}}</td>
						<td style='vertical-align:middle !important;'>
							<input data-toggle='modal' data-target='.menu_lain_pop' type='button' value='Edit' class='editLain btn btn-waring' onClick='edit({{$lain->id}})'/>
							<input data-toggle='modal' data-target='.pop_up_super_c_hapus_regulasi' type='button' value='Hapus' class='hapusLain btn btn-danger' onClick='hapus({{$lain->id}})'/>
						</td>
					</tr>
					@endforeach
				</tbody>
				</table>
				@endif
				
			</div>
		</div>
	</div>
	</div>
	
	
	
	
	<!--pop up start-->
	<div class="modal fade menu_lain_pop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4>Tambah Menu Lain</h4>
				</div>
				<div class="modal-body">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-sm-3">Judul</label>
							<input type="text" id="lainTitle" value="" class="form-control col-sm-8"/> 
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Deskripsi</label>
							<div class=" col-sm-8">
								<textarea name="lain" id = 'lainArea' class="editor"></textarea> 

							</div>	
						</div>
					</div>
				</div> 
				<div class="modal-footer">	
					<input type='button' data-dismiss="modal" id='submit_change' value='Tambah' style="margin: 0px;" class="btn btn-success"></input>
				</div>		
			</div>
		</div>
		</div>

		<!-- pop up hapus regulasi  pop_up_super_c_hapus_regulasi-->
	<div class="modal fade pop_up_super_c_hapus_regulasi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4>Tambah Menu Lain</h4>
				</div>


							<h2 style="text-align:center;">Anda yakin ingin menghapus berkas ini?</h2>							
							<table border="0" style="margin-left:auto; margin-right:auto;">
								<tr>
									<td><button class="ok_hapus_regulasi btn btn-primary">Ya</button></td>
									<td>&nbsp;</td>
									<td><button data-dismiss="modal" class="batal_hapus_regulasi  btn btn-primary">Tidak</button></td>
								</tr>
							</table>
								
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
			//$( ".menu_lain_pop" ).fadeIn( 277, function(){});
			$("#lainTitle").val("");
			$('.jqte_editor').html("");
			$('#submit_change').val('Tambah');
			popupId = -1;
		});

		//$('.exit').click(function() {$( ".pop_up_super_c" ).fadeOut( 200, function(){});});	

		/*$('.pop_up_super_c').click(function (e)
		{
			var container = $('.pop_up_cell');

			if (container.is(e.target) )// if the target of the click is the container...
			{
				$( ".pop_up_super_c" ).fadeOut( 200, function(){});
				$('html').css('overflow-y', 'auto');
			}
		});*/
</script>
<!--pop up end-->


