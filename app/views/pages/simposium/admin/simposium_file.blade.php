@extends('layouts.simposium_admin')
@section('content')
<script>
var id = '{{$id}}';
var id_hapus_berkas = -1;

</script>

<div class="container_12">
	<div class="grid_12">
		<h1 class='admin_title'>{{$nama_kegiatan}}</h1>
		
		<style>
		.breadcrumb li {
			padding-left: 0px;
			margin-left: 0px;
		}
		</style>
		<ol class="breadcrumb">
			<li><a href="{{ URL::to('event/admin', $id) }}"  >@if($simpIct == 3) Beranda  @else @if($simpIct == 4) Dashboard @endif @endif</a></li><!-- onClick='history.back();' -->
			<li class="active">@if($simpIct == 3) Berkas @else @if($simpIct == 4) File @endif @endif</li>
		</ol>


		<h3>@if($simpIct == 3) Berkas @else @if($simpIct == 4) File @endif @endif</h3>




		<div id='tambah_berkas_link' style='display: block;width: 100%;margin-left: 0px !important;overflow: hidden;'>
			<a data-toggle="modal" data-target=".pop_up_super_c_tambah_berkas"  href='javascript:void(0)' id='tambah_berkas' class='command_button'>
				<span class="glyphicon glyphicon-plus"></span>
				Tambah File Baru
			</a>
		</div>


		<div class="berkas_list_container">
			@if($files == null)
			@if($simpIct == 3) Tidak ada berkas yang diunggah  @else @if($simpIct == 4) There are no uploaded files @endif @endif
			@else
			<table class='list_berkas table'>
				<tr>
					@if($simpIct == 3) 
					<td class='nama_berkas'>Nama Berkas</td>
					<td class='url'>URL lengkap</td>
					<td class='tanggal_unggah_berkas'>Tanggal Unggah</td>
					@else @if($simpIct == 4)  
					<td class='nama_berkas'>File Name</td>
					<td class='url'>Full URL</td>
					<td class='tanggal_unggah_berkas'>Upload date</td>
					@endif @endif 
					
					<td class='delete_berkas'>&nbsp;</td>
				</tr>
				@foreach($files as $file)
				<tr>
					<td class='nama_berkas'>{{$file->nama}}</td>
					<td class='url'>{{$file->file_path}}</td>
					<td class='tanggal_unggah_berkas'>{{$file->uploaded}}</td>
					<td class='delete_berkas'><input data-toggle="modal" data-target=".pop_up_super_c_hapus_berkas" type='button' value='Delete' class='hapus_berkas btn btn-danger' /><input type='hidden' class='id_berkas' value='{{$file->id}}' /></td>
				</tr>
				@endforeach	
			</table>
			<?php $files->links(); ?>
			@endif
		</div>
		<!--pop up tambah berkas-->
		<!--<div class=" pop_up_super_c_tambah_berkas" style="display: none;">
			<a class="exit close_56_tambah_berkas" ></a>
			<div class="pop_up_tbl_tambah_berkas">
				<div class="pop_up_cell_tambah_berkas">-->

					<div class="modal fade pop_up_super_c_tambah_berkas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4>@if($simpIct == 3) Detail Berkas  @else @if($simpIct == 4) File detail @endif @endif </h4>
								</div>
								
								<!-- postBerkas-->		
								<form class='tambah_berkas_form form-horizontal'>
									<div class="modal-body">
										<div class="form-group">
											<label class=" control-label col-sm-3">@if($simpIct == 3) Nama Berkas @else @if($simpIct == 4) File Name @endif @endif </label>

											{{ Form::text('nama_berkas', Input::old('nama_berkas'), array('id' => 'new_nama', 'class' => 'form-control col-sm-5')) }}
										</div>
										<div class="form-group">
											<label class=" control-label col-sm-3">@if($simpIct == 3) Berkas @else @if($simpIct == 4) Files @endif @endif </label>

											{{ Form::file('fileBerkas', array('name'=>'fileBerkas', 'id'=>'fileBerkas', 'class'=>'col-sm-5'))}}
										</div>


									</div>
									<div class="modal-footer">
										<!--<td><input type='button' value='Tambah' id="tambah_cabang_button"/></td>-->							
										@if($simpIct == 3) 
										{{ Form::submit('Tambah Berkas', array('class' => 'btn btn-success'))}}
										@else @if($simpIct == 4)  
										{{ Form::submit('Add File', array('class' => 'btn btn-success'))}}
										@endif @endif 
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
										fileBerkas: {
											required: true
										}
									},
									messages:{
										@if($simpIct == 3) 
										nama_berkas: {
											required: "Mohon isi nama berkas"
										},
										fileBerkas: {
											required: "Mohon file diisi"
										}
										@else @if($simpIct == 4)  
										nama_berkas: {
											required: "Please fill the file name"
										},
										fileBerkas: {
											required: "Please add the file"
										}
										@endif @endif 

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
													@if($simpIct == 3) 
													alert('Berhasil mengunggah berkas');
													@else @if($simpIct == 4)  
													alert('Success uploading file');
													@endif @endif 
													location.reload();
													$('.modal-backdrop').removeClass('in');
													setTimeout(function() {
														$('.modal-backdrop').remove();
													}, 500);	
												}else{
													alert(as);
													$('.modal-backdrop').removeClass('in');
													setTimeout(function() {
														$('.modal-backdrop').remove();
													}, 500);	
												}
											},
											error:function(errorThrown){
												@if($simpIct == 3) 

												alert('Gagal mengunggah berkas');
												@else @if($simpIct == 4)  
												alert('Failed to upload file');
												@endif @endif 
												$('.modal-backdrop').removeClass('in');
												setTimeout(function() {
													$('.modal-backdrop').remove();
												}, 500);	
											}
										});
}
});
</script>
</div>		
</div>
</div>

<!-- pop up hapus berkas -->
<!--<div class=" pop_up_super_c_hapus_berkas" style="display: none;">
	<a class="exit close_56_hapus_berkas" ></a>
	<div class="pop_up_tbl_hapus_berkas">
		<div class="pop_up_cell_hapus_berkas">-->

			<div class="modal fade pop_up_super_c_hapus_berkas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header bg-danger">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4>Perhatian!</h4>
						</div>

						
								<h3 style="text-align:center;">Anda yakin ingin menghapus berkas ini?</h3>							
								<table border="0" style="margin-left:auto; margin-right:auto;">
									<tr>
										@if($simpIct == 3) 
										<td><button class="ok_hapus_berkas" data-dismiss="modal">Ya</button></td>
										<td>&nbsp;</td>
										<td><button class="batal_hapus_berkas" data-dismiss="modal">Tidak</button></td>
										@else @if($simpIct == 4)  
										<td><button class="ok_hapus_berkas" data-dismiss="modal">Yes</button></td>
										<td>&nbsp;</td>
										<td><button class="batal_hapus_berkas" data-dismiss="modal">No</button></td>
										@endif @endif 

									</tr>
								</table>
									
					</div>		
				</div>
			</div>
		</div>
	</div>
	<script>
	$('#tambah_berkas').click(function(){
	//$(".pop_up_super_c_tambah_berkas").fadeIn(277, function(){});				
	//$('html').css('overflow-y', 'hidden');				
});

/*$('.pop_up_super_c_tambah_berkas').click(function (e)
{
	var container = $('.pop_up_cell_tambah_berkas');
		if (container.is(e.target) )// if the target of the click is the container...
		{
			$( ".pop_up_super_c_tambah_berkas" ).fadeOut( 200, function(){});
			$('html').css('overflow-y', 'auto');
		}
	});		*/

$('body').on('click','.hapus_berkas',function(){						
	//$(".pop_up_super_c_hapus_berkas").fadeIn(277, function(){});
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
					@if($simpIct == 3) 
					alert("Berhasil menghapus berkas");
					@else @if($simpIct == 4)  
					alert('Success deleting file');
					@endif @endif 
					
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
//	$(".pop_up_super_c_hapus_berkas").fadeOut(200, function(){});
});

/*$('.pop_up_super_c_hapus_berkas').click(function (e)
{
	var container = $('.pop_up_cell_hapus_berkas');
		if (container.is(e.target) )// if the target of the click is the container...
		{
			$( ".pop_up_super_c_hapus_berkas" ).fadeOut( 200, function(){});
			$('html').css('overflow-y', 'auto');
		}
	});		*/
//$('.exit').click(function() {$( ".pop_up_super_c_tambah_berkas" ).fadeOut( 200, function(){});});	
//$('.exit').click(function() {$( ".pop_up_super_c_hapus_berkas").fadeOut( 200, function(){});});

</script>


@stop
