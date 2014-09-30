<div class="container_12">
	<div class="grid_12">
	<div class='admin_title'>Pusat</div>
		
		<div id="detail" class="cabang_list" style="margin-left: 20px !important; margin-top: 30px !important;">
			{{$detailPusat}}
		</div>
		<hr style="margin-top: 30px; margin-left: 20px;"/>
		<div id="uploadttg" style="margin-left: 20px !important;">
			<h3>Gambar Tanda Tangan Ketua HFI</h3>
			<form id="form_edit_tanda_tangan">
				<img id="gambar_tanda_tangan" src="" alt="tandatangan" width="118" height="63"/>
				{{ Form::file('fileTandaTangan', array('name'=>'fileTandaTangan','id'=>'fileTandaTangan', 'accept' => "image/*")) }}
				{{ Form::submit('Unggah Tanda Tangan', array('id'=>'ok_edit_tanda_tangan_button', 'style' => 'display: block; margin-left: 100px; margin-top: 20px;')) }}
			</form>	
		</div>		
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

