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
							var list = "<thead><tr>";
							list+="<th class='nama_berkas'>Nama Berkas</th>";
								//list+="<td class='pengunggah_berkas'>Pengunggah Berkas</td>";
								list+="<th class='tanggal_unggah_berkas'>Tanggal Unggah</th>";
								list+="<th class='deskripsi_berkas'>Deskripsi Berkas</th>";
								list+="<th class='edit_berkas'>&nbsp;</th>";
								list+="<th class='delete_berkas'>&nbsp;</th>";
								list+="</tr></thead>";
								list+="<tbody>";
								arrIDBerkas = [];
								var i = 0;
								for(i = 0; i<length; i++){
									arrIDBerkas[i] = data[i]['id'];
									list+="<tr>";
									list+="<td class='nama_berkas'>"+data[i]['nama_file']+"</td>";									
									list+="<td class='tanggal_unggah_berkas'>"+data[i]['uploaded_date']+"</td>";
									list+="<td class='deskripsi_berkas'> <input type='hidden' value='"+data[i]['deskripsi']+"'/> <button data-toggle='modal' data-target='.pop_up_super_c_deskripsi_berkas' style='margin-top: 4px;' class='button_show_deskripsi btn btn-primary' type='submit'>Lihat Deskripsi</button> </td>";							
									list+="<td class='edit_berkas'> <input data-toggle='modal' data-target='.pop_up_super_c_edit_berkas' type='button' value='edit' class='edit_info_berkas btn btn-warning' /><input type='hidden' class='id_berkas' value='"+i+"' /></td>";
									list+="<td class='delete_berkas'><input data-toggle='modal' data-target='.pop_up_super_c_hapus_berkas' type='button' value='x' class='hapus_berkas btn btn-danger' /><input type='hidden' class='id_berkas' value='"+i+"' /></td>";
									list+="</tr>";
								}
								list+="</tbody>";
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
<div id='tambah_berkas_link' style='display: block;width: 100%;margin-left: 0px !important;overflow: hidden;'>
	<a href='javascript:void(0)' id='tambah_berkas' class='btn btn-success pull-right' data-toggle="modal" data-target=".pop_up_super_c_tambah_berkas">Tambah Berkas Baru</a>
</div>

<div class="berkas_list_container">
	<div class="berkas_list"> 		

		<table class='list_berkas table'>		
		</table>
		<script>	
		var id_edit_berkas;
		var id_hapus_berkas;

		$('body').on('click','.button_show_deskripsi',function(){									
			//$(".pop_up_super_c_deskripsi_berkas").fadeIn(277, function(){});				
			var nama = $(this).parent().prev().prev().text();						
			var deskripsi = $(this).prev().val();
			$('#judul_deskripsi').html(nama);
			$('#isi_deskripsi').html(deskripsi);
			//$('html').css('overflow-y', 'hidden');				
		});

		$('body').on('click','.edit_info_berkas',function(){		
			//$(".loader").fadeIn(100, function(){});	

			//setTimeout(function(){
			//	$(".pop_up_super_c_edit_berkas").fadeIn(150, function(){});
			//}, 150);


			//$(".loader").fadeOut(200, function(){});	

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

							//$(".pop_up_super_c_edit_berkas").children("*").css('display','block').css('visibility:','visible');				
						});

		$('body').on('click','.ok_edit_berkas',function(){			
						//$id = $(this).next().val();					
						//$new_edit_nama = $(this).parent().siblings('.nama_berkas').children('#td_up_nama_berkas').children('#up_nama_berkas').val();
						$nama_berkas = $(this).parent().parent().prev().prev().children('#td_up_nama_berkas').children('#up_nama_berkas').val();;					
							//alert($nama_berkas);					
						//$pengunggah_berkas = $(this).parent().siblings('.pengunggah_berkas').children('#up_pengunggah_berkas').val();
						$deskripsi_berkas = $(this).parent().parent().prev().children('#td_up_deskripsi_berkas').children('#up_deskripsi_berkas').val();				
						//var deskripsi_berkas = $(this).parent().prev().children('#up_deskripsi_berkas').val();
							// alert($deskripsi_berkas);
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
								//$( ".pop_up_super_c_edit_berkas" ).fadeOut( 200, function(){});
								getBerkas();
								$('.modal-backdrop').removeClass('in');
								setTimeout(function() {
									$('.modal-backdrop').remove();
								}, 500);	
								//alert(data);
							},
							error:function(jqXHR, textStatus, errorThrown){							
								// alert("eror");
								alert(errorThrown);
								$('.modal-backdrop').removeClass('in');
								setTimeout(function() {
									$('.modal-backdrop').remove();
								}, 500);	
							}
						});
					});

					// $('body').on('click','.hapus_berkas',function(){
						// $(".loader").fadeIn(200, function(){});
						// $id = $(this).next().val();
						// ajax delete
						// $.ajax({
							// url: 'admin/berkas/deleteberkas',
							// type: 'DELETE',
							// data: {
								// 'id_berkas' : arrIDBerkas[$id]
							// },
							// success: function(data){						
								// getBerkas();						
							// },
							// error:function(jqXHR, textStatus, errorThrown){
								// alert(errorThrown);
							// }
						// });
					// });
$('body').on('click','.hapus_berkas',function(){						
	//$(".pop_up_super_c_hapus_berkas").fadeIn(277, function(){});
	$id = $(this).next().val();

						//ambil id berkas buat ok_hapus_berkas
						id_hapus_berkas = $id;						
					});
$('body').on('click','.ok_hapus_berkas',function(){
						//ajax delete
						$.ajax({
							url: 'admin/berkas/deleteberkas',
							type: 'DELETE',
							data: {
								'id_berkas' : arrIDBerkas[id_hapus_berkas]
							},
							success: function(data){
								//$(".pop_up_super_c_hapus_berkas").fadeOut(200, function(){});
								alert("berhasil hapus");
								getBerkas();
								$('.modal-backdrop').removeClass('in');
								setTimeout(function() {
									$('.modal-backdrop').remove();
								}, 500);						
							},
							error:function(jqXHR, textStatus, errorThrown){
								alert(errorThrown);
								$('.modal-backdrop').removeClass('in');
								setTimeout(function() {
									$('.modal-backdrop').remove();
								}, 500);	
							}
						});
					});
$('body').on('click','.batal_hapus_berkas',function(){
	//$(".pop_up_super_c_hapus_berkas").fadeOut(200, function(){});
});

//$('.exit').click(function() {$( ".pop_up_super_c_deskripsi_berkas" ).fadeOut( 200, function(){});});	
//$('.exit').click(function() {$( ".pop_up_super_c_tambah_berkas" ).fadeOut( 200, function(){});});	
//$('.exit').click(function() {$( ".pop_up_super_c_edit_berkas" ).fadeOut( 200, function(){});});	
//$('.exit').click(function() {$( ".pop_up_super_c_hapus_berkas").fadeOut( 200, function(){});});

/*$('.pop_up_super_c_deskripsi_berkas').click(function (e)
{
	var container = $('.pop_up_cell_deskripsi_berkas');
						if (container.is(e.target) )// if the target of the click is the container...
						{
							$( ".pop_up_super_c_deskripsi_berkas" ).fadeOut( 200, function(){});
							$('html').css('overflow-y', 'auto');
						}
					});*/
//$('.pop_up_super_c_tambah_berkas').click(function (e)
//{
	//var container = $('.pop_up_cell_tambah_berkas');
	//					if (container.is(e.target) )// if the target of the click is the container...
	//					{
	//						$( ".pop_up_super_c_tambah_berkas" ).fadeOut( 200, function(){});
	//						$('html').css('overflow-y', 'auto');
	//					}
	//				});
/*$('.pop_up_super_c_edit_berkas').click(function (e)
{
	var container = $('.pop_up_cell_edit_berkas');
						if (container.is(e.target) )// if the target of the click is the container...
						{
							$( ".pop_up_super_c_edit_berkas" ).fadeOut( 200, function(){});
							$('html').css('overflow-y', 'auto');
						}
					});*/
/*$('.pop_up_super_c_hapus_berkas').click(function (e)
{
	var container = $('.pop_up_cell_hapus_berkas');
						if (container.is(e.target) )// if the target of the click is the container...
						{
							$( ".pop_up_super_c_hapus_berkas" ).fadeOut( 200, function(){});
							$('html').css('overflow-y', 'auto');
						}
					});*/

$('#tambah_berkas').click(function(){
	//$(".pop_up_super_c_tambah_berkas").fadeIn(277, function(){});				
//	$('html').css('overflow-y', 'hidden');				
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
<!--<div class="pop_up_super_c_deskripsi_berkas" style="display: none;">
	<a class="exit close_56_deskripsi_berkas" ></a>
	<div class="pop_up_tbl_deskripsi_berkas">
		<div class="pop_up_cell_deskripsi_berkas">-->

			<div class="modal fade pop_up_super_c_deskripsi_berkas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							Deskripsi Berkas
						</div>
						<div class="modal-body">	
							<div class="form-horizontal">
								<div class="form-group">
									<label class="control-label col-sm-3">Judul Deskripsi</label>
									<p id="judul_deskripsi" class="form-control-static col-sm-8"></p>
								</div>	
								<div class="form-group">
									<label class="control-label col-sm-3">Isi Deksripsi</label>
									<p id="isi_deskripsi" class="form-control-static col-sm-8"></p>

								</div>	
							</div>	
						</div>		



					</div>		
				</div>
			</div>

			<!--pop up edit berkas-->
<!--<div class="pop_up_super_c_edit_berkas" style="display: none;">
	<a class="exit close_56_edit_berkas" ></a>
	<div class="pop_up_tbl_edit_berkas">
		<div class="pop_up_cell_edit_berkas">-->

			<div class="modal fade pop_up_super_c_edit_berkas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">	


						<h2>Perbarui Berkas</h2>
						<div id="div_form_berkas">					
							<table class="table_berkas">
								<tr>
									<td class="nama_berkas">Nama Berkas</td>
									<td id="td_up_nama_berkas"><p id="tesnama" style="display:none;">test</p><input id="up_nama_berkas" type="text" value="" style="width:350px !important;"/></td>
								</tr>						
								<tr>
									<td class="deskripsi_berkas">Deskripsi Berkas</td>
									<td id="td_up_deskripsi_berkas">
										<textarea id="up_deskripsi_berkas" rows="12" autofocus onclick="this.focus();this.select()" >
										</textarea>
									</td>
								</tr>						
								<tr>							
									<td><button class="ok_edit_berkas">Edit Berkas</button></td>
								</tr>						
							</table>					
						</div>


					</div>		
				</div>
			</div>
			<script>
			setTimeout(function(){

			//	$('.pop_up_super_c_edit_berkas').css('display','none');
		}, 100);
			</script> 


			<!--pop up tambah berkas-->

			<div class="modal fade bs-example-modal-lg pop_up_super_c_tambah_berkas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">	
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="myModalLabel">Detail Berkas</h4>
						</div>	
						<form class='tambah_berkas_form form-horizontal'>
							<div class="modal-body" id="div_form_berkas">


								<div class="form-group">
									<label class=" control-label col-sm-3">Nama Berkas</label>
									{{ Form::text('nama_berkas', Input::old('nama_berkas'), array('id' => 'new_nama', 'class' => 'form-control col-sm-5')) }}
								</div>

								<div class="form-group" style="visibility: hidden;">
									<label class=" control-label col-sm-3" style="visibility: hidden;">Pengunggah</label>
									<span id="new_pengunggah">{{ Form::hidden('id_pengunggah', Auth::user()->id, array('id'=>'new_id_pengunggah', 'class' => 'form-control col-sm-5')) }}</span>
								</div>

								<div class="form-group">
									<label class=" control-label col-sm-3">Deskripsi Berkas</label>
									{{ Form::textarea('deskripsi_berkas', Input::old('deskripsi_berkas'), array('id' => 'new_deskripsi', 'class' => 'form-control col-sm-5')) }}
								</div>

								<div class="form-group">
									<label class=" control-label col-sm-3">File Berkas</label>
									{{ Form::file('fileBerkas', array('name'=>'fileBerkas', 'id'=>'fileBerkas', 'class' => ' col-sm-5'))}}
								</div>
							</div>

							<div class="modal-footer">
								{{ Form::submit('Tambah Berkas', array('class' => 'btn btn-success'))}}

							</div>

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
									alert('Berhasil menambah berkas ini ajax');
								// alert(as);
								// alert(data);
								//$(".pop_up_super_c_tambah_berkas").fadeOut( 200, function(){
								//	$(".loader").fadeIn(200, function(){
									getBerkas();
								//		alert('Berhasil menambah berkas ini ajax');
								//	});													
								//});
							$('.modal-backdrop').removeClass('in');
							setTimeout(function() {
								$('.modal-backdrop').remove();
							}, 500);
						},
						error:function(errorThrown){
							alert('Gagal menambah berkas ini ajax');
								// alert(as);
								// alert(data);
								//$(".pop_up_super_c_tambah_berkas").fadeOut( 200, function(){});
								alert(errorThrown);
								$('.modal-backdrop').removeClass('in');
								setTimeout(function() {
									$('.modal-backdrop')..remove();
								}, 500);
							}
						});
}
});
</script>
</div>
</div>
</div>

		<!--pop up edit berkas-
		<div class=" pop_up_super_c_edit_berkas" style="display: none;">
			<a class="exit close_56_edit_berkas" ></a>
			<div class="pop_up_tbl_edit_berkas">
				<div class="pop_up_cell_edit_berkas">
					<div class="container_12">			
					<div class="div_detail_berkas" style="background: #fff; width:600px !important;">
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
		</div>->

		<!-- pop up hapus berkas -->
		<div class="modal fade pop_up_super_c_hapus_berkas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header bg-danger">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						Perhatian!
					</div>
					<div class="modal-body">
						<h4 style="text-align: center;">Anda yakin ingin menghapus berkas ini?</h4>				
						<div class="form-horizontal">
							<div class="form-group">
								<button class="ok_hapus_berkas btn btn-primary form-control col-sm-2 col-sm-push-3">Ya</button>
								<button  data-dismiss="modal" class="batal_hapus_berkas btn btn-primary  form-control col-sm-2  col-sm-push-5">Tidak</button>
							</div>
						</div>
					</div>
				</div>		
			</div>
		</div>


	</div>
</div>