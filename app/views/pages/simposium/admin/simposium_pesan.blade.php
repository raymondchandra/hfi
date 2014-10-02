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
					<th></th>
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



<!-- Modal Pop Up -->
<div class="modal fade pop_up_pesan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Nama Pengirim | Subjek Pengirim</h4>
      </div>
      <div class="modal-body">
      	<p>
      		Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. 
      	</p>
      </div>
      <div class="modal-footer">
		<div class="form-group">
			<label class=" control-label col-sm-2">Balas pesan</label>
			{{ Form::textarea('keteranganlain', Input::old('keteranganlain'), array('class'=>'form-control col-sm-8', 'style'=>'height: 100px;')) }}
		</div>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Kirim</button>

      </div>
    </div>
  </div>
</div>


@stop