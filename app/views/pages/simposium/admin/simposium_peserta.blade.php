@extends('layouts.simposium_admin')
@section('content')
<script>
var id = '{{$id}}';
$(document).ready(function(){
	$( ".loader" ).fadeOut( 200, function(){});
});

function back(){
	$( ".loader" ).fadeIn( 200, function(){});
	$('.admin_control_panel').load('admin/kegiatan2detail/'+id);
}

</script>

<div class="container_12">
	<div class="grid_12">
		<h1 class=''>Peserta</h1>
		<style>
			.breadcrumb li {
				padding-left: 0px;
				margin-left: 0px;
			}
		</style>
		<ol class="breadcrumb">
			<li><a href="{{ URL::to('simposium/admin', $id) }}"  >Dashboard</a></li>
			<li class="active">Peserta</li>
		</ol>

		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Surat Elektronik</th>
					<th>Detail Profile</th>
					<th>Detail Pelunasan</th>
					<th>Abstraksi</th>
					<th>Full Paper</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Tu John</td>
					<td>jhon@tu.com</td>
					<td>
						<button class="btn btn-primary" data-toggle="modal" data-target=".pop_up_detail_profile">Detail Profile</button>
					</td>
					<td>						
						<button class="btn btn-success" data-toggle="modal" data-target=".pop_up_detail_pelunasan">Lunas</button>
					</td>
					<td>
						<button class="btn btn-primary" data-toggle="modal" data-target=".pop_up_detail_abstraksi">Detail Abstraksi</button>
					</td>
					<td>
						<button class="btn btn-primary" data-toggle="modal" data-target=".pop_up_detail_fullpaper">Detail Paper</button>
					</td>
				</tr>
				<tr>
					<td>Tu John</td>
					<td>jhon@tu.com</td>
					<td>
						<button class="btn btn-primary" data-toggle="modal" data-target=".pop_up_detail_profile">Detail Profile</button>
					</td>
					<td>						
						<button class="btn btn-danger" data-toggle="modal" data-target=".pop_up_detail_pelunasan">Belum Lunas</button>
					</td>
					<td>
						<button class="btn btn-primary" data-toggle="modal" data-target=".pop_up_detail_abstraksi">Detail Abstraksi</button>
					</td>
					<td>
						<button class="btn btn-primary" data-toggle="modal" data-target=".pop_up_detail_fullpaper">Detail Paper</button>
					</td>
				</tr>
			</tbody>
		</table>
		
	</div>
</div>

@include('includes.modals.pop_up_detail_profile')
@include('includes.modals.pop_up_detail_pelunasan')
@include('includes.modals.pop_up_detail_abstraksi')
@include('includes.modals.pop_up_detail_fullpaper')

@stop