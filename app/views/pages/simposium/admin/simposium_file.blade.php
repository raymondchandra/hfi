@extends('layouts.simposium_admin')
@section('content')
<script>
	var id = '{{$id}}';
	var id_hapus_berkas = -1;
	
</script>

<div class="container_12">
	<div class="grid_12">
		<div class='admin_title'>{{$nama_kegiatan}}</div>
		<div>Berkas</div>
		<a href='javascript:void(0)' onClick='history.back();' >Back</a>
		<div id='tambah_berkas_link' style='display: block;width: 100%;margin-left: 0px !important;overflow: hidden;'><a href='javascript:void(0)' id='tambah_berkas' class='command_button'>Tambah Berkas Baru</a></div>


		<div class="berkas_list_container">
			@if($files == null)
				Tidak ada berkas yang diunggah.
			@else
			<table class='list_berkas'>
				<tr>
					<td class='nama_berkas'>Nama Berkas</td>
					<td class='url'>URL lengkap</td>
					<td class='tanggal_unggah_berkas'>Tanggal Unggah</td>
					<td class='delete_berkas'>&nbsp;</td>
				</tr>
				@foreach($files as $file)
					<tr>
						<td class='nama_berkas'>{{$file->nama}}</td>
						<td class='url'>{{$file->file_path}}</td>
						<td class='tanggal_unggah_berkas'>{{$file->uploaded}}</td>
						<td class='delete_berkas'><input type='button' value='x' class='hapus_berkas btn btn-danger' /><input type='hidden' class='id_berkas' value='{{$file->id}}' /></td>
					</tr>
				@endforeach	
			</table>
			<?php $files->links(); ?>
			@endif
		</div>
		<!--pop up tambah berkas-->
		<div class=" pop_up_super_c_tambah_berkas" style="display: none;">
			<a class="exit close_56_tambah_berkas" ></a>
			<div class="pop_up_tbl_tambah_berkas">
				<div class="pop_up_cell_tambah_berkas">
					<div class="container_12">			
					<div class="div_detail_berkas" style="background: #fff; width:600px !important;">
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
										fileBerkas: {
											required: true
										}
									},
									messages:{
										nama_berkas: {
											required: "Mohon isi nama berkas"
										},
										fileBerkas: {
											required: "Mohon file diisi"
										}
									},
									submitHandler:function(form){
										var url = '{{URL::route('admin.kegiatan2.tambahBerkas',array($id))}}';
										var data, xhr;
										data = new FormData();
										data.append('nama_berkas', $('#new_nama').val());			
										data.append('deskripsi_berkas', $('#new_deskripsi').val());
										data.append('fileBerkas', $('#fileBerkas')[0].files[0]);
										$.ajax({
											url: url,
											type: 'POST',
											data: data,
											processData: false,
											contentType: false,
											success: function(as){
												if(as == "success"){
													alert('Berhasil mengunggah berkas');
													location.reload();
												}else{
													alert(as);
												}
											},
											error:function(errorThrown){
												alert('Gagal mengunggah berkas');
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

		<!-- pop up hapus berkas -->
		<div class=" pop_up_super_c_hapus_berkas" style="display: none;">
			<a class="exit close_56_hapus_berkas" ></a>
			<div class="pop_up_tbl_hapus_berkas">
				<div class="pop_up_cell_hapus_berkas">
					<div class="container_12">			
						<div class="div_hapus_berkas" style="background: #fff; width:600px !important; padding-top:40px;">
							<h2 style="text-align:center;">Anda yakin ingin menghapus berkas ini?</h2>							
							<table border="0" style="margin-left:auto; margin-right:auto;">
								<tr>
									<td><button class="ok_hapus_berkas">Ya</button></td>
									<td>&nbsp;</td>
									<td><button class="batal_hapus_berkas">Tidak</button></td>
								</tr>
							</table>
						</div>
					</div>			
				</div>		
			</div>
		</div>
	</div>
</div>
<script>
	$('#tambah_berkas').click(function(){
		$(".pop_up_super_c_tambah_berkas").fadeIn(277, function(){});				
		$('html').css('overflow-y', 'hidden');				
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

	$('body').on('click','.hapus_berkas',function(){						
		$(".pop_up_super_c_hapus_berkas").fadeIn(277, function(){});
		//ambil id berkas buat ok_hapus_berkas
		id_hapus_berkas = $(this).next().val();				
	});
	$('body').on('click','.ok_hapus_berkas',function(){
		//ajax delete
		var url = '{{URL::route('admin.kegiatan2.hapusBerkas',array($id))}}';
		$.ajax({
			url: url,
			type: 'DELETE',
			data: {
				'id_berkas' : id_hapus_berkas
			},
			success: function(data){
				if(data == "success")
				{
					alert("Berhasil menghapus berkas");
					location.reload();
				}else{
					alert(data);
				}					
			},
			error:function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
	});
	$('body').on('click','.batal_hapus_berkas',function(){
		$(".pop_up_super_c_hapus_berkas").fadeOut(200, function(){});
	});

	$('.pop_up_super_c_hapus_berkas').click(function (e)
	{
		var container = $('.pop_up_cell_hapus_berkas');
		if (container.is(e.target) )// if the target of the click is the container...
		{
			$( ".pop_up_super_c_hapus_berkas" ).fadeOut( 200, function(){});
			$('html').css('overflow-y', 'auto');
		}
	});		
	$('.exit').click(function() {$( ".pop_up_super_c_tambah_berkas" ).fadeOut( 200, function(){});});	
	$('.exit').click(function() {$( ".pop_up_super_c_hapus_berkas").fadeOut( 200, function(){});});

</script>


@stop
