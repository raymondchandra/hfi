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
			<li><a href="{{ URL::to('event/admin', $id) }}"  >@if($simpIct == 3) Beranda @else @if($simpIct == 4) Dashboard @endif @endif </a></li><!-- onClick='history.back();' -->
			<li class="active">@if($simpIct == 3) Konten @else @if($simpIct == 4) Content @endif @endif </li>
		</ol>
	</div>
</div>

<div class="container_12" style="padding-bottom: 20px;">
			@if($simpIct == 3)  
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
			@else @if($simpIct == 4)  

				<a href='header/{{$id}}' class="grid_3 simposium_block">
					Header</a>
				<a href='editor/halaman depan/{{$id}}' class="grid_3 simposium_block">
					Front Page</a>
				<a href='editor/tanggal penting/{{$id}}' class="grid_3 simposium_block">
					Important Dates</a>
			
				<a href='editor/lokasi/{{$id}}' class="grid_3 simposium_block">
					Location</a>
				<a href='editor/akomodasi/{{$id}}' class="grid_3 simposium_block">
					Accomodation</a>
				<a href='editor/program/{{$id}}' class="grid_3 simposium_block">
					Program</a>
				<a href='editor/registrasi/{{$id}}' class="grid_3 simposium_block">
					Registration</a>
			
				<a href='editor/prosiding/{{$id}}' class="grid_3 simposium_block">
					Proceeding</a>
				<a href='editor/panitia/{{$id}}' class="grid_3 simposium_block">
					Organizer</a>
				<a href='editor/kontak/{{$id}}' class="grid_3 simposium_block">
					Contact</a>
			@endif @endif 
</div>

		
@stop