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
			<li class="active">Template Surat Elektronik</li>
		</ol>

		<h3>Template Surat Elektronik</h3>
	</div>
</div>

<div class="container_12" style="padding-bottom: 20px;">
	<a href='Registrasi/{{$id}}' class="grid_3 simposium_block">
		Registrasi
	</a>
	<a href='Penerimaan Abstrak/{{$id}}' class="grid_3 simposium_block">
		Penerimaan Abstrak
	</a>
	<a href='Surat Undangan/{{$id}}' class="grid_3 simposium_block">
		Surat Undangan
	</a>
	<a href='Penerimaan Paper Lengkap/{{$id}}' class="grid_3 simposium_block">
		Penerimaan Paper Lengkap
	</a>

</div>



@stop