@extends('layouts.simposium_admin')
@section('content')
<script>
	var id = '{{$id}}';
	
	function edit_early(){
		$.ajax({
			type: 'PUT',
			url: '{{URL::route('admin.kegiatan2.ubahEarly',array($id))}}',
			data: {
				tanggal_mulai : $("#datepicker1").val(),
				tanggal_selesai : $("#datepicker2").val(),
			},
			success: function(response){
				if(response == 'success'){
					alert("Berhasil merubah data");
				}else{
					alert(response);
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		},'json');
	}
</script>
<link rel="stylesheet" type="text/css" href="{{asset('assets/js/datetimepicker/jquery.datetimepicker.css')}}"/ >
<script src="{{asset('assets/js/datetimepicker/jquery.datetimepicker.js')}}"></script>
<div class="container_12">
	<div class="grid_12">
		<div class='admin_title'>Harga</div>
		<a href='javascript:void(0)' onClick='history.back();' >Back</a>
		<div>
			<h3>Early Bird</h3>
			<table>
				<tr>
					<td>Tanggal mulai</td>
					<td>:</td>
					<td><input type="text" value="{{$tanggal_mulai}}" id="datepicker1"> </td>
				</tr>
				<tr>
					<td>Tanggal selesai</td>
					<td>:</td>
					<td><input type="text" value="{{$tanggal_selesai}}" id="datepicker2"> </td>
				</tr>
			</table>
			<button onClick="edit_early()">Ubah</button>
		</div>
		<script>
			jQuery('#datepicker1').datetimepicker({
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
						 	format:'d-m-Y'
						});
						
						jQuery('#datepicker2').datetimepicker({
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
						 	format:'d-m-Y'
						});
		</script>
		<hr />
		<div>
			<h3>Harga</h3>
			<table>
				<tr>
					<th>Kategori</th>
					<th>Harga Early Bird</th>
					<th>Harga Normal</th>
				</tr>
				
				<tr>
					<td>taik</td>
					<td>1000</td>
					<td>2000</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop