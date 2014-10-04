@extends('layouts.simposium_admin')
@section('content')
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
			<li><a href="{{ URL::to('simposium/admin', $id) }}"  >Dashboard</a></li><!-- onClick='history.back();' -->
			<li class="active">Konten</li>
		</ol>
	</div>
</div>

<div class="container_12" style="padding-bottom: 20px;">

				<a href='header/{{$id}}' class="grid_3 simposium_block">
					Header</a>
				<a href='editor/halaman depan/{{$id}}' class="grid_3 simposium_block">
					Halaman Depan</a>
				<a href='editor/tanggal penting/{{$id}}' class="grid_3 simposium_block">
					Tanggal Penting</a>
			
				<a href='editor/lokasi/{{$id}}' class="grid_3 simposium_block">
					Lokasi</a>
				<a href='editor/akomodasi/{{$id}}' class="grid_3 simposium_block">
					Akomodasi</a>
				<a href='editor/program/{{$id}}' class="grid_3 simposium_block">
					Program</a>
				<a href='editor/registrasi/{{$id}}' class="grid_3 simposium_block">
					Registrasi</a>
			
				<a href='editor/prosiding/{{$id}}' class="grid_3 simposium_block">
					Prosiding</a>
				<a href='editor/panitia/{{$id}}' class="grid_3 simposium_block">
					Panitia</a>
				<a href='editor/kontak/{{$id}}' class="grid_3 simposium_block">
					Kontak</a>
</div>

		
@stop