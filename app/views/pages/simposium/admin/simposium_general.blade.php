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
		<h1 class=''>{{$kegiatan->nama}}</h1>
		<style>
			.breadcrumb li {
				padding-left: 0px;
				margin-left: 0px;
			}
		</style>
		<ol class="breadcrumb">
			<li><a onClick='history.back();' >Dashboard</a></li>
			<li class="active">Umum</li>
		</ol>

		<div class="form-horizontal">
			<h3>Data Kegiatan</h3>
			
				<div class="form-group">
					<label class=" control-label col-sm-3">Nama</label>
					<input type="text" id="namaKegiatan" value="{{$kegiatan->nama}}" class="form-control col-sm-5">
				</div>
				<div class="form-group">
					
					<label class=" control-label col-sm-3">Tempat</label>
					<input type="text" id="tempat" value="{{$kegiatan->tempat}}" class="form-control col-sm-5">
				</div>
				<div class="form-group">
					
					<label class=" control-label col-sm-3">Tanggal Mulai</label>
					<input type="text" value="{{$tanggal_mulai}}" id="datepicker1" class="form-control col-sm-5">
				</div>
				<div class="form-group">
					
					<label class=" control-label col-sm-3">Tanggal Akhir</label>
					<input type="text" value="{{$tanggal_selesai}}" id="datepicker2" class="form-control col-sm-5">
				</div>
			<span class="clearfix"></span>
			<button onClick="updateKegiatan()" class="btn btn-primary">Ubah</button>
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
		<div class="form-horizontal">
			<h3>Registrasi</h3>
			<div class="form-group">	
				<label class=" control-label col-sm-3">Status Pendaftaran</label> 
				<label class="radio-inline">
					<input type="radio" name="regis" id="regisBuka"> Buka 
				</label>
				<label class="radio-inline">
					<input type="radio" name="regis" id="regisTutup"> Tutup 
				</label>
				<span class="clearfix"></span>
				<button onClick="ubah_status()" class="btn btn-primary">Ubah</button>
			</div>
		</div>
		<hr />
		<div class="form-horizontal">
			<h3>Admin</h3>

			<div class="form-group">
				<label class=" control-label col-sm-3">Status Admin</label> 
				<label class="radio-inline">
					<input type="radio" name="statAdmin" id="admAktif"> Aktif 
				</label>
				<label class="radio-inline">
					<input type="radio" name="statAdmin" id="admTutup"> Nonaktif 
				</label>
			</div>
			<span class="clearfix"></span>
			<button onClick="ubah_status_admin()" class="btn btn-primary">Ubah</button>

			<div class="form-group">
			<label class=" control-label col-sm-3">Username</label>
			<p class="form-control-static col-sm-5">admin</p>
			</div>
<div class="form-group">
				<label class=" control-label col-sm-3">Password</label>
				<input type="password" id="pass" class="form-control col-sm-5"> 
			</div>
			<div class="form-group">
			<label class=" control-label col-sm-3">Re type password</label>
			<input type="password" id="rePass" class="form-control col-sm-5"> 
		</div>
			<span class="clearfix"></span>
			<button onClick="ubah_pass()" class="btn btn-primary">Ubah</button>
		</div>
	</div>
</div>

@stop