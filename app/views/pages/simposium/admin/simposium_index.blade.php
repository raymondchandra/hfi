@extends('layouts.simposium_admin')
@section('content')
<script>
	var id = '{{$id}}';

</script>

<div class="container_12">
	<div class="grid_12">
		<div class='admin_title'>{{$nama_kegiatan}}</div>
		
		<div>
			<div>
				<div><a href='general/{{$id}}' id='general_button'>Umum</a></div>
				<div><a href='konten/{{$id}}' id='konten_button'>Konten</a></div>
				<div><a href='harga/{{$id}}' id='harga_button'>Harga</a></div>
				<div><a href='peserta/{{$id}}' id='peserta_button'>Peserta</a></div>
			</div>

			<div >
				
				<div><a href='pesan/{{$id}}' id='pesan_button'>Pesan</a></div>
				<div><a href='berkas/{{$id}}' id='berkas_button'>Berkas</a></div>
				<div><a href='template/{{$id}}' id='template_button'>Template</a></div>
			</div>
		</div>
	</div>
</div>
@stop