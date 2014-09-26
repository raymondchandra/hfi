<script>
// $(document).ready(function(){
	// $( ".loader" ).fadeOut( 200, function(){});
// });
</script>	

	<div class="container_12">
		<div class="grid_12">
			<script>
				var arrIDRegulasi = "";
				var arrFILEPATHRegulasi = "";
				function getRegulasi(){
					$.ajax({
						url: 'admin/home/daftarregulasi',
						type: 'GET',
						success: function(data){
							//alert(data);
							if(data==0)
							{
								var list = "<tr>";
								list+="<td>Tidak terdapat regulasi di dalam database</td>";
								list+="<td></td>";
								list+="</tr>";
								$('.tabel_list_regulasi').html(list);
								//$('#preview_pdf_regulasi').html("");
							}
							else
							{
								//atur
								var length = data.length;
								var list = "";
								arrIDRegulasi = [];
								arrFILEPATHRegulasi = [];
								//sementara looping sampe 10 dulu berhubung blom pagination
								if(length>=10){
									length = 10;
								}
								for($i=0; $i<length; $i++){
									arrIDRegulasi[$i] = data[$i]['id'];
									arrFILEPATHRegulasi[$i] = data[$i]['file_path'];
									list+="<tr style='padding-top:5px; padding-bottom: 5px; '>";							
									list+="<td><a href='javascript:void(0)' class='versi_regulasi' style='line-height: 36px; margin-right: 10px;' value='"+data[$i]['file_path']+"'>"+data[$i]['versi']+"</a></td>";
									list+="<td><p style='display:none;'>"+data[$i]['file_path']+"</p><input type='button' value='hapus' class='hapus_regulasi btn btn-danger'/><input type='hidden' class='id_regulasi' value='"+$i+"'/> </td>";
									list+="</tr>";
								}
								$('.tabel_list_regulasi').html(list);
								//set awal pdf viewer, kalo engga ga bakal bisa refresh pdf viewer
								//$('#pdf_viewer_regulasi').attr("data",data['0']['file_path']);
								$('#preview_pdf_regulasi').html("<object data='' type='application/pdf' width='100%' id='pdf_viewer_regulasi'></object>");						
							}
							$( ".loader" ).fadeOut( 200, function(){});
						},
						error:function(errorThrown){
							alert(errorThrown);
						}
					});				
				}
				
				$(document).ready(function() {
					getRegulasi();
				});
				
				// Ajax pagination :
				$('.pagination a').on('click', function (event) {
					event.preventDefault();
					if ( $(this).attr('href') != '#' ) {
						$("html, body").animate({ scrollTop: 0 }, "fast");
						$('#test').load($(this).attr('href'));
					}
				});
			</script>

			<div class='admin_title'>Regulasi</div>
				<div class='regulasi_container'>
				</div>	
				<div id='sidelist_regulasi'>					
					<div id='list_regulasi'>			
						<table border=0 class="tabel_list_regulasi">								
						</table>
						<script>
							var id_hapus_regulasi;
						
							$('body').on('click','.hapus_regulasi',function(){
								$(".pop_up_super_c_hapus_regulasi").fadeIn(277, function(){});
								$id = $(this).next().val();
								
								//ambil id regulasi buat ok_hapus_regulasi
								id_hapus_regulasi = $id;
							});													
							$('body').on('click','.ok_hapus_regulasi',function(){
								//$id = $(this).next().val();
								//ajax delete
								$.ajax({
									url: 'admin/home/deleteregulasi',
									type: 'DELETE',
									data: {
										'id_regulasi' : arrIDRegulasi[id_hapus_regulasi]
									},
									success: function(data){
										$(".pop_up_super_c_hapus_regulasi").fadeOut(200, function(){});
										$(".loader").fadeIn( 277, function(){});						
										getRegulasi();
										//blank preview pdf
										$('#preview_pdf_regulasi').html("<object data='' type='application/pdf' width='100%' id='pdf_viewer_regulasi'></object>");
										//alert(data);
									},
									error: function(jqXHR, textStatus, errorThrown){
										alert(errorThrown);
									}
								});
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
					</div>	
				</div>					
					<!--<div id='pages'>									
					</div>	-->							
				<div id='preview_pdf_regulasi'>
					<!--<object data="assets/img/Chapter_4.pdf" type="application/pdf" width="100%" id="pdf_viewer_regulasi"></object>-->
					<!--<object data="<?php //echo $arrRegulasi['0']['file_path']?>" type="application/pdf" width="100%" id="pdf_viewer_regulasi"></object>-->
					<object data="" type="application/pdf" width="100%" id="pdf_viewer_regulasi"></object>		
				</div>
					<span class="clear">
					</span>
				<div id='unggah_regulasi'>				
					<form class='tambah_regulasi_form'>				
						<ul>
							<li style="margin-top:5px;">{{ Form::file('fileReg', array('id'=>'fileReg','accept'=>"application/pdf")) }}</li>
							<li style="margin-top:5px;">Versi : {{ Form::text('versi', Input::old('versi'), array('id'=>'versi', 'style' => 'width: 180px;')) }}</li>				
							<li style="margin-top:5px;">{{ Form::submit('Unggah Regulasi', array('id'=>'tambah_regulasi_button', 'class' => 'button btn btn-success')) }}</li>
						</ul>
					</form>					
				</div>
			
		
			<script>	
				$('body').on('click','.versi_regulasi',function(){
					var file_path = $(this).attr('value');							
					//$('#pdf_viewer_regulasi').attr("data", file_path).hide().show();
					//$('#pdf_viewer_regulasi').attr("data", file_path);
					$('#preview_pdf_regulasi').html("<object data='"+file_path+"' type='application/pdf' width='100%' id='pdf_viewer_regulasi'></object>");
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
								getRegulasi();						
								$('#fileReg').val("");	
								$('#versi').val("");							
								alert("Berhasil Menambah Regulasi");												
							},
							error:function(errorThrown){
								alert("Gagal Menambah Regulasi");
								alert(errorThrown);
							}
						});
					}
				});
			</script>	
			
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
	
