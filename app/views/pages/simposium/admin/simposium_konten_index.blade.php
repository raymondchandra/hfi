<script>
	var id = '{{$id}}';
</script>

<div class="container_12">
	<div class="grid_12">
		<div class='admin_title'>{{$nama_kegiatan}}</div>
		<div>Konten</div>
		<a href='javascript:void(0)' onClick='history.back();' >Back</a>

		<div>
			<div>
				<div><a href='header/{{$id}}' >Header</a></div>
				<div><a href='sponsor/{{$id}}' >Sponsor</a></div>
				<div><a href='editor/halaman depan/{{$id}}' >Halaman Depan</a></div>
				<div><a href='editor/tanggal penting/{{$id}}' >Tanggal Penting</a></div>
			</div>

			<div >
				
				<div><a href='editor/lokasi/{{$id}}'>Lokasi</a></div>
				<div><a href='editor/akomodasi/{{$id}}'>Akomodasi</a></div>
				<div><a href='editor/program/{{$id}}'>Program</a></div>
				<div><a href='editor/registrasi/{{$id}}'>Registrasi</a></div>
			</div>
			<div >
				
				<div><a href='editor/prosiding/{{$id}}'>Prosiding</a></div>
				<div><a href='editor/panitia/{{$id}}'>Panitia</a></div>
				<div><a href='editor/kontak/{{$id}}'>Kontak</a></div>
			</div>
		</div>
		
	</div>
</div>