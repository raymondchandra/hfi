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
			<li><a href="{{ URL::to('event/admin', $id) }}"  >@if($simpIct == 3) Beranda  @else @if($simpIct == 4) Dashboard @endif @endif </a></li><!-- onClick='history.back();' -->
			<li class="active">@if($simpIct == 3) Template Surat Elektronik @else @if($simpIct == 4) Template Email @endif @endif </li>
		</ol>

		<h3>@if($simpIct == 3) Template Surat Elektronik @else @if($simpIct == 4) Template Email @endif @endif</h3>
	</div>
</div>

<div class="container_12" style="padding-bottom: 20px;">
	<a href='Registrasi/{{$id}}' class="grid_3 simposium_block">
		@if($simpIct == 3) Registrasi @else @if($simpIct == 4) Registration @endif @endif 
	</a>
	<a href='Penerimaan Abstrak/{{$id}}' class="grid_3 simposium_block">
		@if($simpIct == 3) Penerimaan Abstrak @else @if($simpIct == 4) Abstract Acceptance @endif @endif 
	</a>
	<a href='Surat Undangan/{{$id}}' class="grid_3 simposium_block">
		@if($simpIct == 3) Surat Undangan @else @if($simpIct == 4) Invitation Letter @endif @endif 
	</a>
	<a href='Penerimaan Paper Lengkap/{{$id}}' class="grid_3 simposium_block">
		@if($simpIct == 3) Penerimaan Paper Lengkap @else @if($simpIct == 4) Full Paper Acceptance @endif @endif 
	</a>

</div>



@stop