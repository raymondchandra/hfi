@extends('layouts.simposium_admin')
@section('content')
<script>
	var id = '{{$id}}';
	$(document).ready(function(){
		if('{{$kegiatan->openRegistration}}' == 0){
			$('#regisTutup').attr('checked', 'checked');
		}else{
			$('#regisBuka').attr('checked', 'checked');
		}

		if('{{$kegiatan->admin_aktif}}' == 0){
			$('#admTutup').attr('checked', 'checked');
		}else{
			$('#admAktif').attr('checked', 'checked');
		}
	});
	function updateKegiatan(){
		$.ajax({
			type: 'PUT',
			url: '{{URL::route('admin.kegiatan2.updateKegiatan',array($id))}}',
			data: {
				nama : $("#namaKegiatan").val(),
				tempat : $("#tempat").val(),
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
	
	function ubah_status(){
		
		var input;
		if($("#regisBuka").is(':checked')){
			input = {status : 1};
		}else if($("#regisTutup").is(':checked')){
			input = {status : 0};
		}
		$.ajax({
			type: 'PUT',
			url: '{{URL::route('admin.kegiatan2.ubahStatus',array($id))}}',
			data: input,
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
	function ubah_status_admin(){
		var input;
		if($("#admAktif").is(':checked')){
			input = {status : 1};
		}else if($("#admTutup").is(':checked')){
			input = {status : 0};
		}

		$.ajax({
			type: 'PUT',
			url: '{{URL::route('admin.kegiatan2.ubahStatAdmin',array($id))}}',
			data: input,
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

	function ubah_pass(){
		if($("#pass").val() == $("#rePass").val()){
			
			$.ajax({
				type: 'PUT',
				url: '{{URL::route('admin.kegiatan2.ubahPass',array($id))}}',
				data: {
					pass : $("#pass").val()
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
		}else{
			alert("Password tidak sama.");
		}
	}

</script>
<link rel="stylesheet" type="text/css" href="{{asset('assets/js/datetimepicker/jquery.datetimepicker.css')}}"/ >
<script src="{{asset('assets/js/datetimepicker/jquery.datetimepicker.js')}}"></script>
<div class="container_12">
	<div class="grid_12">
		<div class='admin_title'>{{$kegiatan->nama}}</div>
		<div>Umum</div>
		<a href='javascript:void(0)' onClick='history.back();' >Back</a>

		<div>
			<h3>Data Kegiatan</h3>
			<table>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" id="namaKegiatan" value="{{$kegiatan->nama}}"></td>
				</tr>
				<tr>
					<td>Tempat</td>
					<td>:</td>
					<td><input type="text" id="tempat" value="{{$kegiatan->tempat}}"></td>
				</tr>
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
			<button onClick="updateKegiatan()">Ubah</button>
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
			<h3>Registrasi</h3>
			<span>Status pendaftaran : </span> <input type="radio" name="regis" id="regisBuka"> Buka <input type="radio" name="regis" id="regisTutup"> Tutup 
			<br /><button onClick="ubah_status()">Ubah</button>
		</div>
		<hr />
		<div>
			<h3>Admin</h3>

			<span>Status admin : </span> <input type="radio" name="statAdmin" id="admAktif"> Aktif <input type="radio" name="statAdmin" id="admTutup"> Nonaktif 
			<br /><button onClick="ubah_status_admin()">Ubah</button>

			<table>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td>admin</td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><input type="password" id="pass"> </td>
				</tr>
				<tr>
					<td>Re type password</td>
					<td>:</td>
					<td><input type="password" id="rePass"> </td>
				</tr>
			</table>
			<button onClick="ubah_pass()">Ubah</button>
		</div>
	</div>
</div>

@stop