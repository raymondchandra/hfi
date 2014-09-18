<div class="container_12">
	<div class="grid_12">
	<div class='admin_title'>Pusat</div>
		
		<div id="detail" class="cabang_list" style="margin-left: 20px !important; margin-top: 30px !important;">
			{{$detailPusat}}
		</div>
		<hr style="margin-top: 30px; margin-left: 20px;"/>
		<div id="uploadttg" style="margin-left: 20px !important;">
			<h3>Gambar Tanda Tangan Ketua HFI</h3>
			<img src="" alt="" width="118" height="63"/>
			{{ Form::file('uploadSignature', array('name'=>'uploadSignature','id'=>'uploadSignature')) }}
		</div>
	</div>
</div>