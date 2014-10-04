@extends('layouts.simposium_admin')
@section('content')
<script>
	var id = '{{$id}}';
</script>

<div class="container_12">
	<div class="grid_12">
		<div class='admin_title'>{{$nama_kegiatan}}</div>
		<div>Template Surat Elektronik</div>
		<a href='javascript:void(0)' onClick='history.back();' >Back</a>
	</div>
</div>

<div class="container_12" style="padding-bottom: 20px;">

				<a href='Registrasi/{{$id}}' class="grid_3 simposium_block">
					Registrasi</a>
				<a href='Penerimaan Abstrak/{{$id}}' class="grid_3 simposium_block">
					Penerimaan Abstrak</a>
				<a href='Surat Undangan/{{$id}}' class="grid_3 simposium_block">
					Surat Undangan</a>
				<a href='Penerimaan Paper Lengkap/{{$id}}' class="grid_3 simposium_block">
					Penerimaan Paper Lengkap</a>
			
</div>

		
@stop