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
	
	$('body').on('click','.edit_kegiatan',function(){
		//$(".loader").fadeIn(100, function(){});
		
		$file_brosur="";
		document.getElementById("form_edit_kegiatan").reset();

	
		$id=$(this).next().val();
		$.ajax({
			type: 'GET',
			url: 'admin/get_kegiatan',
			data: {
				"id_kegiatan": $id
			},
			success: function(response){
				//alert(response.nama_kegiatan);
				$('.id_edit').val($id);
				$('#preview_edit_brosur').attr('src',response.brosur_kegiatan);
				$('#edit_nama_kegiatan').val(response.nama_kegiatan);
				$('#edit_tempat_kegiatan').val(response.tempat);
				$tanggalwaktumulai = response.waktu_mulai.split(' ');
				$tanggalwaktuselesai = response.waktu_selesai.split(' ');
				$tanggalmulai = $tanggalwaktumulai[0].split('-');
				$waktumulai = $tanggalwaktumulai[1].split(':');
				$tanggalselesai = $tanggalwaktuselesai[0].split('-');
				$waktuselesai = $tanggalwaktuselesai[1].split(':');
				
				$tanggal_mulai = $tanggalmulai[2];
				$bulan_mulai = $tanggalmulai[1];
				$tahun_mulai = $tanggalmulai[0];
				$tanggal_selesai = $tanggalselesai[2];
				$bulan_selesai = $tanggalselesai[1];
				$tahun_selesai = $tanggalselesai[0];
				
				$jam_mulai = $waktumulai[0];
				$menit_mulai = $waktumulai[1];
				$jam_selesai = $waktuselesai[0];
				$menit_selesai = $waktuselesai[1];
				
				$temp_tanggal_mulai = $tanggal_mulai +"."+$bulan_mulai+"."+$tahun_mulai;
				$temp_tanggal_selesai = $tanggal_selesai +"."+$bulan_selesai+"."+$tahun_selesai;
				
				$('#datepicker3').val($temp_tanggal_mulai);
				$('#datepicker4').val($temp_tanggal_selesai);
				$('#timepickerstart3').val($jam_mulai+":"+$menit_mulai);
				$('#timepickerend4').val($jam_selesai+":"+$menit_selesai);
				
				$('.jqte_editor').text(response.deskripsi);
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			},
			complete: function(){
				//$( ".edit_kegiatan_pop" ).fadeIn( 277, function(){});
				//$(".loader").fadeOut(200, function(){});
				jQuery('#datepicker3').datetimepicker({
					lang:'en',
					i18n:{
						en:{
							months:[
								'January','February','March','April',
								'May','June','July','August',
								'September','October','November','December',
							],
							dayOfWeek:[
								"Sun.", "Mon", "Tue", "Wed", 
								"Thu", "Fri", "Sa.",
							]
						}
					},
					timepicker:false,
					format:'d.m.Y'
				});
						
				jQuery('#datepicker4').datetimepicker({
					lang:'en',
					i18n:{
						en:{
						   	months:[
								'January','February','March','April',
								'May','June','July','August',
								'September','October','November','December',
						   	],
						   	dayOfWeek:[
								"Sun.", "Mon", "Tue", "Wed", 
								"Thu", "Fri", "Sa.",
						   	]
						}
					},

					timepicker:false,
					format:'d.m.Y'
				});
						
						jQuery('#timepickerstart3').datetimepicker({
						  	datepicker:false,
						  	format:'H:i'
						});
						jQuery('#timepickerend4').datetimepicker({
						  	datepicker:false,
						  	format:'H:i'
						});
			}
		},'json');
	});

</script>

<div class="container_12">
	<div class="grid_12">
		<h1 class=''>Pesan</h1>
		<style>
			.breadcrumb li {
				padding-left: 0px;
				margin-left: 0px;
			}
		</style>
		<ol class="breadcrumb">
			<li><a href="{{ URL::to('simposium/admin', $id) }}"  >Dashboard</a></li>
			<li class="active">Pesan</li>
		</ol>

	</div>
</div>
<div class="container_12">
	<div class="grid_12">
		<table class="table table-bordered">
			@if(count($pesan)==0)
				<tr>
					<td> Tidak ada pesan masuk </td>
				</tr>
			@else
				<thead>
					<tr>
						<th width="80">Terbaca</th>
						<th>Dari</th>
						<th>Subjek</th>
						<th>Lihat</th>
					</tr>
				</thead>
				<tbody>
					@foreach($pesan as $msg)
						<tr>
							@if($msg->read == 0)
								<td></td>
							@else
								<td align="center"><span class="glyphicon glyphicon-ok pesan_read"></span></td>
							@endif
							<td>{{$msg->nama}}</td>
							<td>{{$msg->subject}}</td>
							<td><button class="btn btn-primary readPesan" data-toggle="modal" data-target=".pop_up_pesan">Lihat Pesan</button><input type="hidden" value={{$msg->id}}></input></td>
						</tr>
					@endforeach				
				</tbody>
			@endif
			
			
		</table>
	</div>
</div>

@include('includes.modals.pop_up_pesan');


@stop