<script>
	var count =1;
	var page = 1;
	$(document).ready(function(){
		count = '{{$regulasis->count()}}';
		var temp = '{{$current}}';
		if(temp != "") page = temp;
		$( ".loader" ).fadeOut( 200, function(){});
	});

	$('body').on('click','.versi_regulasi',function(){
		var file_path = $(this).attr('value');
		$('#preview_pdf_regulasi').html("<object data='"+file_path+"' type='application/pdf' width='100%' id='pdf_viewer_regulasi'></object>");
	});
	$('.pagination a').on('click', function (event) {
	    event.preventDefault();
	    if ( $(this).attr('href') != '#' ) {
	        $("html, body").animate({ scrollTop: 0 }, "fast");
	        $('.admin_control_panel').load($(this).attr('href'));
	    }
	});
	jQuery.validator.setDefaults({
	  debug: true,
	  success: "valid"
	});
	$(".tambah_regulasi_form").validate({
		rules: {
			fileReg :{
				required : true
			},
			versi : {
				required : true
			}
		}, messages : {
			fileReg : {
				required : "Mohon isi file regulasi"
			},
			versi : {
				required : "Mohon isi versi regulasi"
			}
		},
		submitHandler:function(form){		
			var data, xhr;
			data = new FormData();
			// $fileReg = $('#fileReg').val();					
			// $versi = $('#versi').val();						
			data.append('fileReg', $('#fileReg')[0].files[0]);
			data.append('versi', $('#versi').val());		
			$.ajax({
				url: 'admin/postRegulasi',
				type: 'POST',
				data: data,
				processData: false,
				contentType: false,					
				success: function(as){			
					$(".loader").fadeIn( 277, function(){});
					alert("Berhasil Menambah Regulasi");
					$('.admin_control_panel').load('admin/home/regulasi'); 												
				},
				error:function(errorThrown){
					alert("Gagal Menambah Regulasi");
					alert(errorThrown);
				}
			});
		}
	});
</script>	

<script>
							var id_hapus_regulasi;
						
							$('body').on('click','.hapus_regulasi',function(){
								$(".pop_up_super_c_hapus_regulasi").fadeIn(277, function(){});
								$id = $(this).next().val();
								
								//ambil id regulasi buat ok_hapus_regulasi
								id_hapus_regulasi = $id;
							});
							var ajaxOnce = true;													
							$('body').on('click','.ok_hapus_regulasi',function(){
								if (ajaxOnce) {
									ajaxOnce = false;
									//$id = $(this).next().val();
									//ajax delete
									
									
									$.ajax({
										url: 'admin/home/deleteregulasi',
										type: 'DELETE',
										data: {
											'id_regulasi' : id_hapus_regulasi
										},
										success: function(data){
											if(data == "Success Delete"){
												alert("Sukses menghapus data.");
											}
											$(".pop_up_super_c_hapus_regulasi").fadeOut(200, function(){});
											$(".loader").fadeIn( 277, function(){});						
											
											if(count == 1) page--;
											$('.admin_control_panel').load('admin/home/regulasi?page='+page); 	
											//$('.admin_control_panel').load('admin/home/regulasi'); 	
											ajaxOnce = true;
										},
										error: function(jqXHR, textStatus, errorThrown){
											alert(errorThrown);
											ajaxOnce = true;
										}
									});

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
	<div class='admin_title'>Regulasi</div>
		<div class='regulasi_container'>
		</div>
		<div id='sidelist_regulasi'>					
			<div id='list_regulasi'>			
				<table border=0 class="tabel_list_regulasi">
					@if($regulasis == NULL)
						<tr>
							<td>Tidak terdapat regulasi di dalam database</td>
							<td></td>
						</tr>
					@else
						@foreach($regulasis as $regulasi)
							<tr style='padding-top:5px; padding-bottom: 5px;'>
								<td><a href='javascript:void(0)' class='versi_regulasi' style='line-height: 36px; margin-right: 10px;' value='{{$regulasi->file_path}}'>{{$regulasi->versi}}</a></td>
								<td><input type='button' value='hapus' class='hapus_regulasi btn btn-danger'/><input type='hidden' class='id_regulasi' value='{{$regulasi->id}}'/></td>
							</tr>
						@endforeach
					@endif
											
				</table>
				<?php echo $regulasis->links(); ?>
			</div>	
		</div>					
						
		<div id='preview_pdf_regulasi'>
			<object data="" type="application/pdf" width="100%" id="pdf_viewer_regulasi"></object>		
		</div>
			<span class="clear">
			</span>
		<div id='unggah_regulasi'>				
			<form class='tambah_regulasi_form'>				
				<ul>
					<li style="margin-top:5px;">{{ Form::file('fileReg', array('id'=>'fileReg','accept'=>"application/pdf")) }}</li>
					<li style="margin-top:5px;">Periode : {{ Form::text('versi', Input::old('versi'), array('id'=>'versi', 'style' => 'width: 180px;','placeholder' => 'YYYY - YYYY')) }}</li>				
					<li style="margin-top:5px;">{{ Form::submit('Unggah Regulasi', array('id'=>'tambah_regulasi_button', 'class' => 'button btn btn-success')) }}</li>
				</ul>
			</form>					
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
	
</div>
</div>
	
