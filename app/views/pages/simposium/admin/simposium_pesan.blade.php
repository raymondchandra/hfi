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
		<h1 class=''>@if($simpIct == 3) Pesan @else @if($simpIct == 4) Message @endif @endif </h1>
		<style>
			.breadcrumb li {
				padding-left: 0px;
				margin-left: 0px;
			}
		</style>
		<ol class="breadcrumb">
			<li><a href="{{ URL::to('event/admin', $id) }}"  >@if($simpIct == 3) Beranda  @else @if($simpIct == 4) Dashboard @endif @endif</a></li>
			<li class="active">@if($simpIct == 3) Pesan @else @if($simpIct == 4) Message @endif @endif </li>
		</ol>

	</div>
</div>
<div class="container_12">
	<div class="grid_12">
		<table class="table table-bordered">
			@if(count($pesan)==0)
				<tr>
					<td> @if($simpIct == 3) Tidak ada pesan masuk @else @if($simpIct == 4) There is no incoming message @endif @endif  </td>
				</tr>
			@else
				<thead>
					<tr>
						@if($simpIct == 3) 
	<th width="80">Terbaca</th>
						<th>Dari</th>
						<th>Subjek</th>
@else @if($simpIct == 4)  
<th width="80">Read</th>
						<th>From</th>
						<th>Subject</th>
@endif @endif 
						
						<th style="width: 100px;"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($pesan as $msg)
						<tr>
							@if($msg->read == 0)
								<td align="center" style="text-align: center;" class="row{{$msg->id}}"></td>
							@else
								<td align="center" style="text-align: center;" class="row{{$msg->id}}"><span class="glyphicon glyphicon-ok pesan_read "></span></td>
							@endif
							<td>{{$msg->nama}}</td>
							<td>{{$msg->subject}}</td>
							<td><button class="btn btn-primary readPesan" data-toggle="modal" data-target=".pop_up_pesan">@if($simpIct == 3) Lihat Pesan @else @if($simpIct == 4) See Message @endif @endif </button><input type="hidden" value="{{$msg->id}}"></input></td>
						</tr>
					@endforeach				
				</tbody>
			@endif
			
			
		</table>
	</div>
</div>

@include('includes.modals.pop_up_pesan');

<script>
	$('body').on('click','.readPesan',function(){
		//$(".loader").fadeIn(100, function(){});
		
		$file_brosur="";
		//document.getElementById("form_edit_kegiatan").reset();

	
		$id=$(this).next().val();

		$('.row'+$id).html('<span class="glyphicon glyphicon-ok pesan_read row'+$id'+"></span>');
		$('#datang_konten').html("<img src='{{ asset('assets/img/728.gif')}}'/>");
		$('#kirim_konten').html("<img src='{{ asset('assets/img/728.gif')}}'/>");
		$('#datang_lampiran').html("");
		$.ajax({
			type: 'GET',
			url: '{{URL::route('admin.kegiatan2.get_pesan')}}',
			data: {
				"id_pesan": $id
			},
			success: function(response){	
				$('#datang_konten').html(response.message);
				@if($simpIct == 3) 
	$('#datang_header').html("Pesan Datang - " + response.created_at);
				$('#myModalLabel').html("Dari : " + response.nama + " | Subjek : " + response.subject);
@else @if($simpIct == 4)  
$('#datang_header').html("Incoming Message - " + response.created_at);
				$('#myModalLabel').html("From : " + response.nama + " | Subject : " + response.subject);
@endif @endif 
				
				$('#id_kegiatan_hidden').val(response.id);
				if(response.attachment == "" || response.attachment == "-")
				{
					@if($simpIct == 3) 
	$('#datang_lampiran').html("lampiran : -");
@else @if($simpIct == 4)  
$('#datang_lampiran').html("attachment : -");
@endif @endif 
					
				}
				else
				{
					@if($simpIct == 3) 
$('#datang_lampiran').html("lampiran : " + "<a target='_blank' href='{{asset('assets/file_upload/pesan_attachment/" + response.id + "/" + response.attachment + "')}}'>" + response.attachment);
				
@else @if($simpIct == 4)  
$('#datang_lampiran').html("attachment : " + "<a target='_blank' href='{{asset('assets/file_upload/pesan_attachment/" + response.id + "/" + response.attachment + "')}}'>" + response.attachment);
			
@endif @endif 
	}
				$.ajax({
					type: 'GET',
					url: '{{URL::route('admin.kegiatan2.get_reply')}}',
					data: {	
						"id_pesan": $id
					},
					success: function(response){
						$('#kirim_konten').html("");
						$.each( response, function( i, resp ) {
							@if($simpIct == 3) 
	$isi = "<h4>Pesan Kirim - ";
							$isi = $isi + resp.created_at + "</h4></p>";
							$isi = $isi + resp.message + "</p><p>lampiran : ";
@else @if($simpIct == 4)  
$isi = "<h4>Sent Message - ";
							$isi = $isi + resp.created_at + "</h4></p>";
							$isi = $isi + resp.message + "</p><p>attachment : ";
@endif @endif 
							
							if(resp.attachment == "" || resp.attachment == "-")
							{
								$isi = $isi + " -</p>";
							}
							else
							{
								$isi = $isi + "<a target='_blank' href='{{asset('assets/file_upload/reply_attachment/" + resp.id + "/" + resp.attachment + "')}}'>" + resp.attachment + "</a></p>";
							}
							$('#kirim_konten').append($isi);
						});
						//$('#myModalLabel').html("Dari : " + response.nama + " | Subjek : " + response.subject);
					},
					error: function(jqXHR, textStatus, errorThrown){
						alert(errorThrown);
					},
					complete: function(){
						//$( ".edit_kegiatan_pop" ).fadeIn( 277, function(){});
						//$(".loader").fadeOut(200, function(){});
						
					}
				},'json')
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			},
			complete: function(){
				//$( ".edit_kegiatan_pop" ).fadeIn( 277, function(){});
				//$(".loader").fadeOut(200, function(){});
				
			}
		},'json');
	});

</script>

@stop