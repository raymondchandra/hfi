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
					alert("@if($simpIct == 3) Berhasil mengubah data @else @if($simpIct == 4) Success editing data @endif @endif ");
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
					alert("@if($simpIct == 3) Berhasil mengubah data @else @if($simpIct == 4) Success editing data @endif @endif ");
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
					alert("@if($simpIct == 3) Berhasil mengubah data @else @if($simpIct == 4) Success editing data @endif @endif ");
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
					alert("@if($simpIct == 3) Berhasil mengubah data @else @if($simpIct == 4) Success editing data @endif @endif ");
				}else{
					alert(response);
				}
				},
				error: function(jqXHR, textStatus, errorThrown){
					alert(errorThrown);
				}
			},'json');
		}else{
			alert("@if($simpIct == 3) Password tidak sama @else @if($simpIct == 4) Password does not match @endif @endif ");
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
			<li><a href="{{ URL::to('event/admin', $id) }}"  >@if($simpIct == 3) Beranda @else @if($simpIct == 4) Dashboard @endif @endif </a></li>			
			<li class="active">@if($simpIct == 3) Umum @else @if($simpIct == 4) General @endif @endif </li>
		</ol>

		<div class="form-horizontal">
			<h3>@if($simpIct == 3) Data Kegiatan @else @if($simpIct == 4) Event Data @endif @endif </h3>
			
				<div class="form-group">
					<label class=" control-label col-sm-3">@if($simpIct == 3) Nama @else @if($simpIct == 4) Name @endif @endif </label>
					<input type="text" id="namaKegiatan" value="{{$kegiatan->nama}}" class="form-control col-sm-5">
				</div>
				<div class="form-group">
					
					<label class=" control-label col-sm-3">@if($simpIct == 3) Tempat @else @if($simpIct == 4) Place @endif @endif </label>
					<input type="text" id="tempat" value="{{$kegiatan->tempat}}" class="form-control col-sm-5">
				</div>
				<div class="form-group">
					
					<label class=" control-label col-sm-3">@if($simpIct == 3) Tanggal Mulai @else @if($simpIct == 4) Start Date @endif @endif </label>
					<input type="text" value="{{$tanggal_mulai}}" id="datepicker1" class="form-control col-sm-5">
				</div>
				<div class="form-group">
					
					<label class=" control-label col-sm-3">@if($simpIct == 3) Tanggal Akhir @else @if($simpIct == 4) End Date @endif @endif </label>
					<input type="text" value="{{$tanggal_selesai}}" id="datepicker2" class="form-control col-sm-5">
				</div>
			<span class="clearfix"></span>
			<button onClick="updateKegiatan()" class="btn btn-primary">@if($simpIct == 3) Ubah @else @if($simpIct == 4) Edit @endif @endif </button>
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
			<h3>@if($simpIct == 3) Registrasi @else @if($simpIct == 4) Registration @endif @endif</h3>
			<div class="form-group">	
				<label class=" control-label col-sm-3">@if($simpIct == 3) Status Pendaftaran @else @if($simpIct == 4) Registration Status @endif @endif </label> 
				<label class="radio-inline">
					<input type="radio" name="regis" id="regisBuka"> @if($simpIct == 3) Buka @else @if($simpIct == 4) Open @endif @endif 
				</label>
				<label class="radio-inline">
					<input type="radio" name="regis" id="regisTutup"> @if($simpIct == 3) Tutup @else @if($simpIct == 4) Close @endif @endif 
				</label>
				<span class="clearfix"></span>
				<button onClick="ubah_status()" class="btn btn-primary">@if($simpIct == 3) Ubah @else @if($simpIct == 4) Edit @endif @endif </button>
			</div>
		</div>
		<hr />
		<div class="form-horizontal">
			<h3>Admin</h3>

			<div class="form-group">
				<label class=" control-label col-sm-3">@if($simpIct == 3) Status Admin @else @if($simpIct == 4) Admin Status @endif @endif </label> 
				<label class="radio-inline">
					<input type="radio" name="statAdmin" id="admAktif"> @if($simpIct == 3) Aktif @else @if($simpIct == 4) Active @endif @endif  
				</label>
				<label class="radio-inline">
					<input type="radio" name="statAdmin" id="admTutup"> @if($simpIct == 3) Nonaktif @else @if($simpIct == 4) Nonactive @endif @endif  
				</label>
			</div>
			<span class="clearfix"></span>
			<button onClick="ubah_status_admin()" class="btn btn-primary">@if($simpIct == 3) Ubah @else @if($simpIct == 4) Edit @endif @endif </button>

			<div class="form-group">
			<label class=" control-label col-sm-3">Username</label>
			<p class="form-control-static col-sm-5">admin</p>
			</div>
<div class="form-group">
				<label class=" control-label col-sm-3">Password</label>
				<input type="password" id="pass" class="form-control col-sm-5"> 
			</div>
			<div class="form-group">
			<label class=" control-label col-sm-3">@if($simpIct == 3) Ketik ulang password @else @if($simpIct == 4) Re-type password @endif @endif </label>
			<input type="password" id="rePass" class="form-control col-sm-5"> 
		</div>
			<span class="clearfix"></span>
			<button onClick="ubah_pass()" class="btn btn-primary">@if($simpIct == 3) Ubah @else @if($simpIct == 4) Edit @endif @endif </button>
		</div>
	</div>
</div>

@stop