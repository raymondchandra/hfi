<script>
	var id = '{{$id}}';
</script>

<div class="container_12">
	<div class="grid_12">
		<div class='admin_title'>{{$nama_kegiatan}}</div>
		<div>Sponsor</div>
		<a href='javascript:void(0)' onClick='history.back();' >Back</a>
		<div id="sponsorList">
			<img src="" alt="foto2">
			<img src="" alt="foto2">
			<img src="" alt="foto2">
			<img src="" alt="foto2">
		</div>

		<div id="uploadttg" style="margin-left: 20px !important;">
			<form id="form_edit_tanda_tangan">
				<img id="gambar_tanda_tangan" src="" alt="tandatangan" width="118" height="63"/>
				{{ Form::file('fileTandaTangan', array('name'=>'fileTandaTangan','id'=>'fileTandaTangan', 'accept' => "image/*")) }}
				{{ Form::submit('Unggah Tanda Tangan', array('id'=>'ok_edit_tanda_tangan_button', 'style' => 'display: block; margin-left: 100px; margin-top: 20px;')) }}
			</form>	
		</div>
	</div>
</div>