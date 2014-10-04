<!doctype html>
<html>
<head>
	@include('includes.head')
	<!-- Latest compiled and minified CSS -->
</head>
<body>
	<script>
		var id_sponsor = -1;
		$(document).ready(function(){
			$('#headerBtn').click(function(){
				$('#gambar_header_edit').attr('src',$('#img_header').attr('src'));
				$('#fileHeader').val('');
			});	
			$('#tambahSponsorBtn').click(function(){
				$('#gambar_tambah_sponsor').attr('src','');
				$('#fileTambahSponsor').val('');
			});
			$('.sponsor_img').click(function(){
				id_sponsor = $(this).next().val();
				$('#gambar_ubah_sponsor').attr('src',$(this).attr('src'));
				$('#file_ubah_sponsor').val('');
			});
		});
	</script>
	<div style="width: 100%; background: #ededed;">
<div class="container_12" >	
	<div class="grid_12">
		@if(count($header) != 0)
			<img id="img_header" src="{{ asset($header->file_path) }}" width="940" alt="simpsium hfi"/>
		@else
			<img id="img_header" src="{{asset('asdf')}}" width="940" alt="simpsium hfi"/>
		@endif
		<button id="headerBtn" data-toggle="modal" data-target=".pop_up_ubah_header" style="position: absolute; top:20px; right: 20px;" class="btn btn-success">
			Ubah Header
		</button>
	</div>
</div>
</div>
<div class="container_12">
	<div class="grid_12 s_sponsor_area">
		@if(count($sponsors) != 0)
			@foreach($sponsors as $sponsor)
				<img data-toggle="modal" data-target=".pop_up_ubah_sponsor"  class="sponsor_img" src="{{ asset($sponsor->file_path) }}" width="64" alt="simpsium hfi"/>
				<input type="hidden" value="{{$sponsor->id}}" />
			@endforeach
		@endif
		<span class="clearfix"></span>
		<button  data-toggle="modal" data-target=".pop_up_tambah_sponsor" style="margin-top: 10px;" class="btn btn-success">
			Tambah Sponsor
		</button>
	</div>
	<style>
		.sponsor_img {
			cursor: pointer;
		}

		.sponsor_img:hover {
			background-color: #eee;
		}
	</style>
</div>
	<div class="container_12">
	<div class="grid_12 s_sponsor_area">
		<a href="#">
			Sign In
		</a>
		|
		<a href="#">
			Log In
		</a>
	</div>
</div>

	
<script>
	var id = '{{$id}}';
</script>

<div class="container_12">
	<div class="grid_12">
		<h1 class=''>{{$nama_kegiatan}}</h1>
		<style>
			.breadcrumb li {
				padding-left: 0px;
				margin-left: 0px;
			}
		</style>
		<ol class="breadcrumb">
			<li><a onClick='history.back();' >Dashboard</a></li>
			<li class="active">Header dan Sponsor</li>
		</ol>


	</div>
</div>



<!-- Modal Pop Up Ubah Header -->
<div class="modal fade pop_up_ubah_header" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Ubah Header</h4>
      		</div>
			
			<form id="form_edit_tanda_tangan">
				<div class="modal-body" style="">
					<div id="uploadttg" style="margin-left: 20px !important;">
						
							<img id="gambar_header_edit" src="" alt="tandatangan" width="800" style="min-height:272px; display: block; height: 272px;"/>
							{{ Form::file('fileHeader', array('name'=>'fileHeader','id'=>'fileHeader', 'accept' => "image/*")) }}
						
					</div>
					
				</div>
				<div class="modal-footer">
					<div class="form-group konten_pesan">
						{{ Form::submit('Ubah Gambar', array('id'=>'ok_edit_tanda_tangan_button', 'style' => '', 'class'=>'btn btn-success')) }}
					</div>
				</div>
			</form>	
			<script>
					//post edit tandatangan
					jQuery.validator.setDefaults({
					  debug: true,
					  success: "valid"
					});
					$("#form_edit_tanda_tangan").validate({
						rules: {
							fileHeader :{
								required : true
							}
						}, messages : {
							fileHeader : {
								required : "Mohon isi file "
							}
						},
						submitHandler:function(form){		
							var data, xhr;
							var url = '{{URL::route('admin.kegiatan2.editHeader',array($id))}}';
							data = new FormData();						
							data.append('filePhoto', $('#fileHeader')[0].files[0]);						
							$.ajax({
								url: url,
								type: 'POST',
								data: data,
								processData: false,
								contentType: false,					
								success: function(as){			
									if(as == 'success'){
										alert("Berhasil mengubah header");
										location.reload();
									}	else{
										alert(as);
									}																	
								},
								error:function(errorThrown){
									alert(errorThrown);
								}
							});
						}
					});
				
					$('body').on('change','#fileHeader',function(){
						var i = 0, len = this.files.length, img, reader, file;
						for ( ; i < len; i++ ) {
							file = this.files[i];
							if (!!file.type.match(/image.*/)) {
								if ( window.FileReader ) {
									reader = new FileReader();
									reader.onloadend = function (e) { 
										showUploadedItem(e.target.result, file.fileName);
									};
									reader.readAsDataURL(file);
								}
								imageUpload = file;
							}	
						}
					});			
					function showUploadedItem (source) {		
						$('#gambar_header_edit').attr('src',source);
					} 
				</script>  
		</div>
	</div>
</div>
	
<!-- Modal Pop Up Tambah Sponsor -->
<div class="modal fade pop_up_tambah_sponsor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Tambah Sponsor</h4>
      		</div>

			<form id="form_tambah_sponsor">
			<div class="modal-body" style="">
				<div id="uploadttg" style="margin-left: 20px !important;">
					
						<img id="gambar_tambah_sponsor" src="" alt="tandatangan" width="200" style="min-height:200px; display: block; height: 200px;"/>
						{{ Form::file('fileTambahSponsor', array('name'=>'fileTambahSponsor','id'=>'fileTambahSponsor', 'accept' => "image/*")) }}
					
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="form-group konten_pesan">
					{{ Form::submit('Ubah Gambar', array('id'=>'ok_edit_tanda_tangan_button', 'style' => '', 'class'=>'btn btn-success')) }}
				</div>
			</div>
			</form>	
			<script>

				
					//post edit tandatangan
					jQuery.validator.setDefaults({
					  debug: true,
					  success: "valid"
					});
					$("#form_tambah_sponsor").validate({
						rules: {
							fileTambahSponsor :{
								required : true
							}
						}, messages : {
							fileTambahSponsor : {
								required : "Mohon isi file"
							}
						},
						submitHandler:function(form){		
							var data, xhr;
							var url = "{{URL::route('admin.kegiatan2.addSponsor',array($id))}}";
							data = new FormData();						
							data.append('filePhoto', $('#fileTambahSponsor')[0].files[0]);						
							$.ajax({
								url: url,
								type: 'POST',
								data: data,
								processData: false,
								contentType: false,					
								success: function(as){			
									if(as == 'success'){
										alert("Berhasil menambah sponsor");
										location.reload();
									}			else{
										alert(as);
									}												
								},
								error:function(errorThrown){
									//alert("Gagal Update Foto Slideshow");
									alert(errorThrown);
								}
							});
						}
					});
				
					$('body').on('change','#fileTambahSponsor',function(){
						var i = 0, len = this.files.length, img, reader, file;
						
							//document.getElementById("images").disabled = true;
						for ( ; i < len; i++ ) {
							file = this.files[i];
							if (!!file.type.match(/image.*/)) {
								if ( window.FileReader ) {
									reader = new FileReader();
									reader.onloadend = function (e) { 
										showUploadedItem2(e.target.result, file.fileName);
									};
									reader.readAsDataURL(file);
								}
								imageUpload = file;
							}	
						}
					});			
					function showUploadedItem2 (source) {																									
						//var image = "<img src='"+source+"' alt='tandatangan' width=118 height=63 />"										
						$('#gambar_tambah_sponsor').attr('src',source);
					} 
				</script>  
		</div>
	</div>
</div>

<!-- Modal Pop Up Ubah Sponsor -->
<div class="modal fade pop_up_ubah_sponsor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Ubah Sponsor</h4>
      		</div>

			<form id="form_ubah_sponsor">
			<div class="modal-body" style="">
				<div id="uploadttg" style="margin-left: 20px !important;">
					
						<img id="gambar_ubah_sponsor" src="" alt="tandatangan" width="200" style="min-height:200px; display: block; height: 200px;"/>
						{{ Form::file('file_ubah_sponsor', array('name'=>'file_ubah_sponsor','id'=>'file_ubah_sponsor', 'accept' => "image/*")) }}
					
				</div>
				
			</div>
			<div class="modal-footer">

				<div class="form-group konten_pesan">
					<button id="delButton">Delete</button>
					{{ Form::submit('Unggah Gambar', array('id'=>'ok_edit_tanda_tangan_button', 'style' => '', 'class'=>'btn btn-success')) }}
				</div>
			</div>
			</form>	
			<script>
					$("#delButton").click(function(e){
						e.preventDefault();
						//ajax delete
						var url = '{{URL::route('admin.kegiatan2.delSponsor',array($id))}}';
						$.ajax({
							url: url,
							type: 'DELETE',
							data: {
								'id_sponsor' : id_sponsor
							},
							success: function(data){
								if(data == "success")
								{
									alert("Berhasil menghapus sponsor");
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
					//post edit tandatangan
					jQuery.validator.setDefaults({
					  debug: true,
					  success: "valid"
					});
					$("#form_ubah_sponsor").validate({
						rules: {
							file_ubah_sponsor :{
								required : true
							}
						}, messages : {
							file_ubah_sponsor : {
								required : "Mohon isi file"
							}
						},
						submitHandler:function(form){		
							var data, xhr;
							var url = '{{URL::route('admin.kegiatan2.editSponsor',array($id))}}';
							data = new FormData();						
							data.append('filePhoto', $('#file_ubah_sponsor')[0].files[0]);
							data.append('id_sponsor',id_sponsor);						
							$.ajax({
								url: url,
								type: 'POST',
								data: data,
								processData: false,
								contentType: false,					
								success: function(as){			
									if(as == 'success'){
										alert("Berhasil mengubah sponsor");
										location.reload();
									}			else{
										alert(as);
									}																
								},
								error:function(errorThrown){
									alert(errorThrown);
								}
							});
						}
					});
				
					$('body').on('change','#file_ubah_sponsor',function(){
						var i = 0, len = this.files.length, img, reader, file;
						for ( ; i < len; i++ ) {
							file = this.files[i];
							if (!!file.type.match(/image.*/)) {
								if ( window.FileReader ) {
									reader = new FileReader();
									reader.onloadend = function (e) { 
										showUploadedItem3(e.target.result, file.fileName);
									};
									reader.readAsDataURL(file);
								}
								imageUpload = file;
							}	
						}
					});			
					function showUploadedItem3 (source) {																									
						$('#gambar_ubah_sponsor').attr('src',source);
					} 
				</script>  
		</div>
	</div>
</div>

	<footer class="row">
		@include('includes.footer')
	</footer>
	
	@include('includes.modals.loading')

</html>