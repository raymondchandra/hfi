<!doctype html>
<html>
<head>
	@include('includes.head')
	<!-- Latest compiled and minified CSS -->
</head>
<body>
	<div style="width: 100%; background: #ededed;">
<div class="container_12" >	
	<div class="grid_12">
		
		<img src="{{ asset('assets/img/simposium_header.jpg') }}" width="940" alt="simpsium hfi"/>
			<button  data-toggle="modal" data-target=".pop_up_ubah_header" style="position: absolute; top:20px; right: 20px;" class="btn btn-success">
			Ubah Header
		</button>
	</div>
</div>
</div>
<div class="container_12">
	<div class="grid_12 s_sponsor_area">
		<img data-toggle="modal" data-target=".pop_up_ubah_sponsor"  class="sponsor_img" src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img data-toggle="modal" data-target=".pop_up_ubah_sponsor" class="sponsor_img" src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img data-toggle="modal" data-target=".pop_up_ubah_sponsor" class="sponsor_img" src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img data-toggle="modal" data-target=".pop_up_ubah_sponsor" class="sponsor_img" src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img data-toggle="modal" data-target=".pop_up_ubah_sponsor" class="sponsor_img" src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img data-toggle="modal" data-target=".pop_up_ubah_sponsor" class="sponsor_img" src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img data-toggle="modal" data-target=".pop_up_ubah_sponsor" class="sponsor_img" src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img data-toggle="modal" data-target=".pop_up_ubah_sponsor" class="sponsor_img" src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
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
					
						<img id="gambar_tanda_tangan" src="" alt="tandatangan" width="800" style="min-height:272px; display: block; height: 272px;"/>
						{{ Form::file('fileTandaTangan', array('name'=>'fileTandaTangan','id'=>'fileTandaTangan', 'accept' => "image/*")) }}
					
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="form-group konten_pesan">
					{{ Form::submit('Unggah Tanda Tangan', array('id'=>'ok_edit_tanda_tangan_button', 'style' => '', 'class'=>'btn btn-success')) }}
				</div>
			</div>
			</form>	
			<script>
					$(document).ready(function(){	
						
						$.ajax({
							url : 'admin/cekTandaTangan',
							type: 'GET'	,								
							success: function(result){
								//alert(result);										
								if(result=="ada"){
									$('#gambar_tanda_tangan').attr('src','assets/file_upload/tandatangan/tandatangan.jpg?timestamp=1357571065');
								}else{
									$('#gambar_tanda_tangan').attr('src','');
								}																	
							},
							error: function(errorThrown){
								alert(errorThrown);						
							}
						});				
					});
					
					
				
					//post edit tandatangan
					jQuery.validator.setDefaults({
					  debug: true,
					  success: "valid"
					});
					$("#form_edit_tanda_tangan").validate({
						rules: {
							fileTandaTangan :{
								required : true
							}
						}, messages : {
							fileTandaTangan : {
								required : "Mohon isi file tandatangan"
							}
						},
						submitHandler:function(form){		
							var data, xhr;
							data = new FormData();						
							data.append('fileTandaTangan', $('#fileTandaTangan')[0].files[0]);						
							$.ajax({
								url: 'admin/postTandaTangan',
								type: 'POST',
								data: data,
								processData: false,
								contentType: false,					
								success: function(as){			
									alert(as);
									$(".loader").fadeIn( 377, function(){								
										$('.admin_control_panel').load('admin/organisasi/pusat'); 								
										$(".loader").fadeOut( 377, function(){
											// alert("Berhasil Update Foto Slideshow");												
										});
									});																			
								},
								error:function(errorThrown){
									//alert("Gagal Update Foto Slideshow");
									alert(errorThrown);
								}
							});
						}
					});
				
					$('body').on('change','#fileTandaTangan',function(){
						var i = 0, len = this.files.length, img, reader, file;
						
							//document.getElementById("images").disabled = true;
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
						//var image = "<img src='"+source+"' alt='tandatangan' width=118 height=63 />"										
						$('#gambar_tanda_tangan').attr('src',source);
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

			<form id="form_edit_tanda_tangan">
			<div class="modal-body" style="">
				<div id="uploadttg" style="margin-left: 20px !important;">
					
						<img id="gambar_tanda_tangan" src="" alt="tandatangan" width="200" style="min-height:200px; display: block; height: 200px;"/>
						{{ Form::file('fileTandaTangan', array('name'=>'fileTandaTangan','id'=>'fileTandaTangan', 'accept' => "image/*")) }}
					
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="form-group konten_pesan">
					{{ Form::submit('Unggah Tanda Tangan', array('id'=>'ok_edit_tanda_tangan_button', 'style' => '', 'class'=>'btn btn-success')) }}
				</div>
			</div>
			</form>	
			<script>
					$(document).ready(function(){	
						
						$.ajax({
							url : 'admin/cekTandaTangan',
							type: 'GET'	,								
							success: function(result){
								//alert(result);										
								if(result=="ada"){
									$('#gambar_tanda_tangan').attr('src','assets/file_upload/tandatangan/tandatangan.jpg?timestamp=1357571065');
								}else{
									$('#gambar_tanda_tangan').attr('src','');
								}																	
							},
							error: function(errorThrown){
								alert(errorThrown);						
							}
						});				
					});
					
					
				
					//post edit tandatangan
					jQuery.validator.setDefaults({
					  debug: true,
					  success: "valid"
					});
					$("#form_edit_tanda_tangan").validate({
						rules: {
							fileTandaTangan :{
								required : true
							}
						}, messages : {
							fileTandaTangan : {
								required : "Mohon isi file tandatangan"
							}
						},
						submitHandler:function(form){		
							var data, xhr;
							data = new FormData();						
							data.append('fileTandaTangan', $('#fileTandaTangan')[0].files[0]);						
							$.ajax({
								url: 'admin/postTandaTangan',
								type: 'POST',
								data: data,
								processData: false,
								contentType: false,					
								success: function(as){			
									alert(as);
									$(".loader").fadeIn( 377, function(){								
										$('.admin_control_panel').load('admin/organisasi/pusat'); 								
										$(".loader").fadeOut( 377, function(){
											// alert("Berhasil Update Foto Slideshow");												
										});
									});																			
								},
								error:function(errorThrown){
									//alert("Gagal Update Foto Slideshow");
									alert(errorThrown);
								}
							});
						}
					});
				
					$('body').on('change','#fileTandaTangan',function(){
						var i = 0, len = this.files.length, img, reader, file;
						
							//document.getElementById("images").disabled = true;
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
						//var image = "<img src='"+source+"' alt='tandatangan' width=118 height=63 />"										
						$('#gambar_tanda_tangan').attr('src',source);
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

			<form id="form_edit_tanda_tangan">
			<div class="modal-body" style="">
				<div id="uploadttg" style="margin-left: 20px !important;">
					
						<img id="gambar_tanda_tangan" src="" alt="tandatangan" width="200" style="min-height:200px; display: block; height: 200px;"/>
						{{ Form::file('fileTandaTangan', array('name'=>'fileTandaTangan','id'=>'fileTandaTangan', 'accept' => "image/*")) }}
					
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="form-group konten_pesan">
					{{ Form::submit('Unggah Tanda Tangan', array('id'=>'ok_edit_tanda_tangan_button', 'style' => '', 'class'=>'btn btn-success')) }}
				</div>
			</div>
			</form>	
			<script>
					$(document).ready(function(){	
						
						$.ajax({
							url : 'admin/cekTandaTangan',
							type: 'GET'	,								
							success: function(result){
								//alert(result);										
								if(result=="ada"){
									$('#gambar_tanda_tangan').attr('src','assets/file_upload/tandatangan/tandatangan.jpg?timestamp=1357571065');
								}else{
									$('#gambar_tanda_tangan').attr('src','');
								}																	
							},
							error: function(errorThrown){
								alert(errorThrown);						
							}
						});				
					});
					
					
				
					//post edit tandatangan
					jQuery.validator.setDefaults({
					  debug: true,
					  success: "valid"
					});
					$("#form_edit_tanda_tangan").validate({
						rules: {
							fileTandaTangan :{
								required : true
							}
						}, messages : {
							fileTandaTangan : {
								required : "Mohon isi file tandatangan"
							}
						},
						submitHandler:function(form){		
							var data, xhr;
							data = new FormData();						
							data.append('fileTandaTangan', $('#fileTandaTangan')[0].files[0]);						
							$.ajax({
								url: 'admin/postTandaTangan',
								type: 'POST',
								data: data,
								processData: false,
								contentType: false,					
								success: function(as){			
									alert(as);
									$(".loader").fadeIn( 377, function(){								
										$('.admin_control_panel').load('admin/organisasi/pusat'); 								
										$(".loader").fadeOut( 377, function(){
											// alert("Berhasil Update Foto Slideshow");												
										});
									});																			
								},
								error:function(errorThrown){
									//alert("Gagal Update Foto Slideshow");
									alert(errorThrown);
								}
							});
						}
					});
				
					$('body').on('change','#fileTandaTangan',function(){
						var i = 0, len = this.files.length, img, reader, file;
						
							//document.getElementById("images").disabled = true;
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
						//var image = "<img src='"+source+"' alt='tandatangan' width=118 height=63 />"										
						$('#gambar_tanda_tangan').attr('src',source);
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