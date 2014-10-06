@extends('layouts.simposium_admin')
@section('content')
<script>
var id = '{{$id}}';
var simpIct = '{{$simpIct}}';

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
			@if($simpIct == 3)
				<li class="active">Beranda</li>
			@else 
			@if($simpIct == 4)
				<li class="active">Dashboard</li>
			@endif
			@endif
		</ol>
	</div>
</div>


<div class="container_12" style="padding-bottom: 20px;">
	@if($simpIct == 3)
	<a href="general/{{$id}}" class="grid_3 simposium_block">
		Umum
	</a>
	<a href="konten/{{$id}}" class="grid_3 simposium_block">
		Konten
	</a>
	<a href="harga/{{$id}}" class="grid_3 simposium_block">
		Harga
	</a>
	<a href="peserta/{{$id}}" class="grid_3 simposium_block">
		Peserta
	</a>
	<a href="pesan/{{$id}}" class="grid_3 simposium_block">
		Pesan
	</a>
	<a href="berkas/{{$id}}" class="grid_3 simposium_block">
		Berkas
	</a>
	<a href="template/{{$id}}" class="grid_3 simposium_block">
		Template
	</a>	
	@else 
	@if($simpIct == 4)
	<a href="general/{{$id}}" class="grid_3 simposium_block">
		General
	</a>
	<a href="konten/{{$id}}" class="grid_3 simposium_block">
		Content
	</a>
	<a href="harga/{{$id}}" class="grid_3 simposium_block">
		Price
	</a>
	<a href="peserta/{{$id}}" class="grid_3 simposium_block">
		Participant
	</a>
	<a href="pesan/{{$id}}" class="grid_3 simposium_block">
		Message
	</a>
	<a href="berkas/{{$id}}" class="grid_3 simposium_block">
		File
	</a>
	<a href="template/{{$id}}" class="grid_3 simposium_block">
		Template
	</a>	
	@endif
	@endif

</div>


@stop
