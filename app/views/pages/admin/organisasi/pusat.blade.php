<div class="container_12">
	<div class="grid_12">
	<div class='admin_title'>Pusat</div>
		
		<div id="detail" class="cabang_list" style="margin-left: 20px !important; margin-top: 30px !important;">
			{{$detailPusat}}
		</div>
		<hr style="margin-top: 30px; margin-left: 20px;"/>
		<div id="uploadttg" style="margin-left: 20px !important;">
			<h3>Gambar Tanda Tangan Ketua HFI</h3>
			<img id="gambar_tanda_tangan" src="assets/img/tandatangan.jpg" alt="tandatangan" width="118" height="63"/>
			{{ Form::file('uploadSignature', array('name'=>'uploadSignature','id'=>'uploadSignature', 'accept' => "image/*")) }}
			{{ Form::submit('Unggah Tanda Tangan', array('id'=>'ok_edit_tanda_tangan_button', 'style' => 'display: block; margin-left: 100px; margin-top: 20px;')) }}
		</div>		
		<script>
			$('body').on('change','#uploadSignature',function(){
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

