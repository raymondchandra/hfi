<div class="container_12">
	<div class="grid_12">
		<script>
			var arrIDBerkas = "";		
			function getBerkas(){
				$.ajax({
					url: 'admin/berkas/daftarberkas',
					type: 'GET',
					success: function(data){				
						if(data==0){
							//alert("kosong");							
							$('.list_berkas').html("Tidak terdapat berkas di dalam database");
						}
						else{
							//alert("masuk");
							//atur					
							var length = data.length;								
							var list = "<tr>";
								list+="<td class='nama_berkas'>Nama Berkas</td>";
								//list+="<td class='pengunggah_berkas'>Pengunggah Berkas</td>";
								list+="<td class='tanggal_unggah_berkas'>Tanggal Unggah</td>";
								list+="<td class='deskripsi_berkas'>Deskripsi Berkas</td>";
								list+="<td class='edit_berkas'>&nbsp;</td>";
								list+="<td class='delete_berkas'>&nbsp;</td>";
							list+="</tr>";
							arrIDBerkas = [];
							var i = 0;
							for(i = 0; i<length; i++){
								arrIDBerkas[i] = data[i]['id'];
								list+="<tr>";
									list+="<td class='nama_berkas'>"+data[i]['nama_file']+"</td>";									
									list+="<td class='tanggal_unggah_berkas'>"+data[i]['uploaded_date']+"</td>";
									list+="<td class='deskripsi_berkas'> <input type='hidden' value='"+data[i]['deskripsi']+"'/> <button style='width:120px; margin-top:0px;' class='button_show_deskripsi' type='submit'>Lihat Deskripsi</button> </td>";							
									list+="<td class='edit_berkas'> <input type='button' value='v' class='edit_info_berkas' /><input type='hidden' class='id_berkas' value='"+i+"' /></td>";
									list+="<td class='delete_berkas'><input type='button' value='x' class='hapus_berkas' /><input type='hidden' class='id_berkas' value='"+i+"' /></td>";
								list+="</tr>";
							}
							$('.list_berkas').html(list);							
						}
						$(".loader").fadeOut(200, function(){});
					},
					error: function(errorThrown){
						alert(errorThrown);
					}
				});
			}
			$(document).ready(function(){		
				getBerkas();		
			});
		</script>

		<div class='admin_title'>e-Berkas</div>
		<div id='tambah_berkas_link' style='display: block;width: 100%;margin-left: 0px !important;overflow: hidden;'><a href='javascript:void(0)' id='tambah_berkas' class='command_button'>Tambah Berkas Baru</a></div>

		<div class="berkas_list_container">
			<div class="berkas_list"> 		
				
				<table class='list_berkas'>		
				</table>
				<script>	
					var id_edit_berkas;
					
					$('body').on('click','.button_show_deskripsi',function(){									
						$(".pop_up_super_c_deskripsi_berkas").fadeIn(277, function(){});				
						var nama = $(this).parent().prev().prev().text();						
						var deskripsi = $(this).prev().val();
						$('#judul_deskripsi').html(nama);
						$('#isi_deskripsi').html(deskripsi);
						$('html').css('overflow-y', 'hidden');				
					});
				
					$('body').on('click','.edit_info_berkas',function(){				
						$(".pop_up_super_c_edit_berkas").fadeIn(277, function(){});
						var nama = $(this).parent().prev().prev().prev().text();						
							//alert(nama);					
						var deskripsi = $(this).parent().prev().children("input").val();																
						//var deskripsi = $(this).prev().val();																										
							//alert(deskripsi);
						
						//ambil id berkas buat ok_edit_berkas
						id_edit_berkas = $(this).next().val();
							//alert(arrIDBerkas[id_edit_berkas]);
														
						$('#up_nama_berkas').val(nama);				
						$('#up_deskripsi_berkas').val(deskripsi);							
						$('html').css('overflow-y', 'hidden');				
					});
					
					$('body').on('click','.ok_edit_berkas',function(){			
						//$id = $(this).next().val();					
						//$new_edit_nama = $(this).parent().siblings('.nama_berkas').children('#td_up_nama_berkas').children('#up_nama_berkas').val();
						$nama_berkas = $(this).parent().parent().prev().prev().children('#td_up_nama_berkas').children('#up_nama_berkas').val();;					
							alert($nama_berkas);					
						//$pengunggah_berkas = $(this).parent().siblings('.pengunggah_berkas').children('#up_pengunggah_berkas').val();
						$deskripsi_berkas = $(this).parent().parent().prev().children('#td_up_deskripsi_berkas').children('#up_deskripsi_berkas').val();				
						//var deskripsi_berkas = $(this).parent().prev().children('#up_deskripsi_berkas').val();
							alert($deskripsi_berkas);
						//ajax update
						$.ajax({
							url: 'admin/berkas/editberkas',
							type: 'PUT',
							data: {
								// 'id_berkas' : arrIDBerkas[$id],
								'id_berkas' : arrIDBerkas[id_edit_berkas],							
								'nama_berkas' : $nama_berkas,
								// 'pengunggah_berkas' : $pengunggah_berkas,
								'deskripsi_berkas' : $deskripsi_berkas
							},
							success:function(data){						
								$( ".pop_up_super_c_edit_berkas" ).fadeOut( 200, function(){});
								getBerkas();
								//alert(data);
							},
							error:function(jqXHR, textStatus, errorThrown){							
								alert("eror");
								alert(errorThrown);
							}
						});
					});
				
					$('body').on('click','.hapus_berkas',function(){
						$(".loader").fadeIn(200, function(){});
						$id = $(this).next().val();
						//ajax delete
						$.ajax({
							url: 'admin/berkas/deleteberkas',
							type: 'DELETE',
							data: {
								'id_berkas' : arrIDBerkas[$id]
							},
							success: function(data){						
								getBerkas();						
							},
							error:function(jqXHR, textStatus, errorThrown){
								alert(errorThrown);
							}
						});
					});
											
					$('.exit').click(function() {$( ".pop_up_super_c_deskripsi_berkas" ).fadeOut( 200, function(){});});	
					$('.exit').click(function() {$( ".pop_up_super_c_tambah_berkas" ).fadeOut( 200, function(){});});	
					$('.exit').click(function() {$( ".pop_up_super_c_edit_berkas" ).fadeOut( 200, function(){});});	
					
					$('.pop_up_super_c_deskripsi_berkas').click(function (e)
					{
						var container = $('.pop_up_cell_deskripsi_berkas');
						if (container.is(e.target) )// if the target of the click is the container...
						{
							$( ".pop_up_super_c_deskripsi_berkas" ).fadeOut( 200, function(){});
							$('html').css('overflow-y', 'auto');
						}
					});
					$('.pop_up_super_c_tambah_berkas').click(function (e)
					{
						var container = $('.pop_up_cell_tambah_berkas');
						if (container.is(e.target) )// if the target of the click is the container...
						{
							$( ".pop_up_super_c_tambah_berkas" ).fadeOut( 200, function(){});
							$('html').css('overflow-y', 'auto');
						}
					});
					$('.pop_up_super_c_edit_berkas').click(function (e)
					{
						var container = $('.pop_up_cell_edit_berkas');
						if (container.is(e.target) )// if the target of the click is the container...
						{
							$( ".pop_up_super_c_edit_berkas" ).fadeOut( 200, function(){});
							$('html').css('overflow-y', 'auto');
						}
					});
					
					$('#tambah_berkas').click(function(){
						$(".pop_up_super_c_tambah_berkas").fadeIn(277, function(){});				
						$('html').css('overflow-y', 'hidden');				
					});						
					
					// $('body').on('click','#button_tambah_berkas',function(){
						// $nama = $('#new_nama').val();
							// alert($nama);
						// $pengunggah = $('#new_pengunggah').text();
							// alert($pengunggah);
						// $deskripsi = $('#new_deskripsi').val();				
							// alert($deskripsi);
						// $.ajax({
							// type: 'POST',
							// url: 'admin/berkas/tambahberkas',
							// data: {
								// 'nama_berkas' : $nama,
								// 'pengunggah_berkas' : $pengunggah,
								// 'deskripsi_berkas' : $deskripsi
							// },
							// success: function(data){
								// $(".pop_up_super_c_tambah_berkas").fadeOut(200, function(){});
								// alert(data);
								// getBerkas();
							// },
							// error:function(errorThrown){
								// alert(errorThrown);
							// }
						// });
					// });
				</script>
			</div>
		</div>
		<!--pop up lihat deskripsi berkas-->
		<div class="pop_up_super_c_deskripsi_berkas" style="display: none;">
			<a class="exit close_56_deskripsi_berkas" ></a>
			<div class="pop_up_tbl_deskripsi_berkas">
				<div class="pop_up_cell_deskripsi_berkas">
					<div class="container_12">			
					<div class="div_detail_berkas" style="background:#fff; margin-top:130px;">								
						<h3 id="judul_deskripsi"></h3>
						<div id="div_isi_deskripsi">
							<p id="isi_deskripsi"></p>
						</div>			
					</div>
					</div>			
				</div>		
			</div>
		</div>
		<!--pop up tambah berkas-->
		<div class=" pop_up_super_c_tambah_berkas" style="display: none;">
			<a class="exit close_56_tambah_berkas" ></a>
			<div class="pop_up_tbl_tambah_berkas">
				<div class="pop_up_cell_tambah_berkas">
					<div class="container_12">			
					<div class="div_detail_berkas" style="background: #fff; margin-top:130px; width:600px !important;">
						<h2>Detail Berkas</h2>
						<div id="div_form_berkas">
							<!-- postBerkas-->		
							<form class='tambah_berkas_form'>
								<table class="table_berkas">
									<tr>
										<td style="width:150px !important;">Nama Berkas</td>
										<td><pre>:   </pre></td>
										<td>{{ Form::text('nama_berkas', Input::old('nama_berkas'), array('id' => 'new_nama', 'style' => 'width:350px !important;')) }}</td>
									</tr>
									<tr style="display:none;">
										<td>Pengunggah</td>
										<td><pre>:   </pre></td>							
										<td id="new_pengunggah">{{ Form::hidden('id_pengunggah', Auth::user()->id, array('id'=>'new_id_pengunggah')) }}</td>
									</tr>
									<tr>
										<td>Deskripsi Berkas</td>
										<td><pre>:   </pre></td>
										<td>{{ Form::textarea('deskripsi_berkas', Input::old('deskripsi_berkas'), array('id' => 'new_deskripsi')) }}</td>
									</tr>
									<tr>
										<td>File Berkas</td>
										<td><pre>:   </pre></td>
										<td>{{ Form::file('fileBerkas', array('name'=>'fileBerkas', 'id'=>'fileBerkas'))}}</td>
									</tr>
									<tr>
										<!--<td><input type='button' value='Tambah' id="tambah_cabang_button"/></td>-->							
										<td colspan="3">{{ Form::submit('Tambah Berkas', array('class' => 'button'))}}</td>
									</tr>					
								</table>	
							</form>
							<script>
								jQuery.validator.setDefaults({
								  debug: true,
								  success: "valid"
								});
								$(".tambah_berkas_form").validate({
									rules:{
										nama_berkas: {
											required: true
										},
										deskripsi_berkas: {
											required: true
										},
										fileBerkas: {
											required: true
										}
									},
									messages:{
										nama_berkas: {
											required: "Mohon isi nama berkas"
										},
										deskripsi_berkas: {
											required: "Mohon isi deskripsi berkas"
										},
										fileBerkas: {
											required: "Mohon file diisi"
										}
									},
									submitHandler:function(form){
										// $nama_berkas = $('#new_nama').val();
											//alert($nama_berkas);
										// $id_pengunggah = $('#new_id_pengunggah').text();
											//alert($id_pengunggah);
										// $deskripsi_berkas = $('#new_deskripsi').val();
											//alert($deskripsi_berkas);
										// $fileBerkas = $('#fileBerkas').val();
											//alert($fileBerkas);
										var data, xhr;
										data = new FormData();
											// fileBerkas
											// nama_berkas
											// id_pengunggah
											// deskripsi_berkas
										data.append('nama_berkas', $('#new_nama').val());											
										data.append('id_pengunggah', $('#new_id_pengunggah').val());
										data.append('deskripsi_berkas', $('#new_deskripsi').val());
										data.append('fileBerkas', $('#fileBerkas')[0].files[0]);
										$.ajax({
											url: 'admin/postBerkas',
											type: 'POST',
											data: data,
											processData: false,
											contentType: false,
											success: function(as){
												$(".pop_up_super_c_tambah_berkas").fadeOut( 200, function(){
													$(".loader").fadeIn(200, function(){
														getBerkas();
														alert('Berhasil menambah berkas');
													});													
												});
											},
											error:function(errorThrown){
												alert('Gagal menambah berkas');
												$(".pop_up_super_c_tambah_berkas").fadeOut( 200, function(){});
												alert(errorThrown);
											}
										});
									}
								});
							</script>
						</div>
					</div>
					</div>			
				</div>		
			</div>
		</div>
		<!--pop up edit berkas-->
		<div class=" pop_up_super_c_edit_berkas" style="display: none;">
			<a class="exit close_56_edit_berkas" ></a>
			<div class="pop_up_tbl_edit_berkas">
				<div class="pop_up_cell_edit_berkas">
					<div class="container_12">			
					<div class="div_detail_berkas" style="background: #fff; margin-top:130px; width:600px !important;">
						<h2>Perbarui Berkas</h2>
						<div id="div_form_berkas">					
							<table class="table_berkas">
								<tr>
									<td class="nama_berkas">Nama Berkas</td>
									<td><pre>:   </pre></td>
									<td id="td_up_nama_berkas"><p id="tesnama" style="display:none;">test</p><input id="up_nama_berkas" type="text" value="" style="width:350px !important;"/></td>
								</tr>						
								<tr>
									<td class="deskripsi_berkas">Deskripsi Berkas</td>
									<td><pre>:   </pre></td>
									<td id="td_up_deskripsi_berkas"><textarea id="up_deskripsi_berkas" rows="12"></textarea></td>
								</tr>						
								<tr>							
									<td colspan="3"><button class="ok_edit_berkas">Edit Berkas</button></td>
								</tr>						
							</table>					
						</div>
					</div>
					</div>			
				</div>		
			</div>
		</div>
	</div>
</div>