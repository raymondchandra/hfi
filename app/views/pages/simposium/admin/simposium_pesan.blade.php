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
		<div class='admin_title'>Pesan</div>
		<a href='javascript:void(0)' onClick='back()' >Back</a>

	</div>
</div>
<div class="container_12">
	<div class="grid_12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th width="80">Terbaca</th>
					<th>Dari</th>
					<th>Subjek</th>
					<th>Lihat</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td>Si A</td>
					<td>Subjeknya terserah Si A</td>
					<td><buttom class="btn btn-primary" data-toggle="modal" data-target=".pop_up_pesan">Lihat Pesan</button></td>
				</tr>
				<tr>
					<td><span class="glyphicon glyphicon-ok pesan_read"></span></td>
					<td>Si A</td>
					<td>Subjeknya terserah Si A</td>
					<td><buttom class="btn btn-primary" data-toggle="modal" data-target=".pop_up_pesan">Lihat Pesan</button></td>
				</tr>
				<tr>
					<td></td>
					<td>Si A</td>
					<td>Subjeknya terserah Si A</td>
					<td><buttom class="btn btn-primary" data-toggle="modal" data-target=".pop_up_pesan">Lihat Pesan</button></td>
				</tr>
				<tr>
					<td></td>
					<td>Si A</td>
					<td>Subjeknya terserah Si A</td>
					<td><buttom class="btn btn-primary" data-toggle="modal" data-target=".pop_up_pesan">Lihat Pesan</button></td>
				</tr>
				<tr>
					<td><span class="glyphicon glyphicon-ok pesan_read"></span></td>
					<td>Si A</td>
					<td>Subjeknya terserah Si A</td>
					<td><buttom class="btn btn-primary" data-toggle="modal" data-target=".pop_up_pesan">Lihat Pesan</button></td>
				</tr>
				<tr>
					<td><span class="glyphicon glyphicon-ok pesan_read"></span></td>
					<td>Si A</td>
					<td>Subjeknya terserah Si A</td>
					<td><buttom class="btn btn-primary" data-toggle="modal" data-target=".pop_up_pesan">Lihat Pesan</button></td>
				</tr>
				<tr>
					<td></td>
					<td>Si A</td>
					<td>Subjeknya terserah Si A</td>
					<td><buttom class="btn btn-primary" data-toggle="modal" data-target=".pop_up_pesan">Lihat Pesan</button></td>
				</tr>
				<tr>
					<td></td>
					<td>Si A</td>
					<td>Subjeknya terserah Si A</td>
					<td><buttom class="btn btn-primary" data-toggle="modal" data-target=".pop_up_pesan">Lihat Pesan</button></td>
				</tr>
				<tr>
					<td><span class="glyphicon glyphicon-ok pesan_read"></span></td>
					<td>Si A</td>
					<td>Subjeknya terserah Si A</td>
					<td><buttom class="btn btn-primary" data-toggle="modal" data-target=".pop_up_pesan">Lihat Pesan</button></td>
				</tr>
				<tr>
					<td></td>
					<td>Si A</td>
					<td>Subjeknya terserah Si A</td>
					<td><buttom class="btn btn-primary" data-toggle="modal" data-target=".pop_up_pesan">Lihat Pesan</button></td>
				</tr>
				<tr>
					<td></td>
					<td>Si A</td>
					<td>Subjeknya terserah Si A</td>
					<td><buttom class="btn btn-primary" data-toggle="modal" data-target=".pop_up_pesan">Lihat Pesan</button></td>
				</tr>
				<tr>
					<td></td>
					<td>Si A</td>
					<td>Subjeknya terserah Si A</td>
					<td><buttom class="btn btn-primary" data-toggle="modal" data-target=".pop_up_pesan">Lihat Pesan</button></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

@include('includes.modals.pop_up_pesan');


@stop