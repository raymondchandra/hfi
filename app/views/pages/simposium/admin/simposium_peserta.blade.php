@extends('layouts.simposium_admin')
@section('content')
<script>
var id = '{{$id}}';
$(document).ready(function(){
	$( ".loader" ).fadeOut( 200, function(){});
});



</script>

<div class="container_12">
	<div class="grid_12">
		<h1 class=''>@if($simpIct == 3) Peserta @else @if($simpIct == 4) Participant @endif @endif </h1>
		<style>
			.breadcrumb li {
				padding-left: 0px;
				margin-left: 0px;
			}
		</style>
		<ol class="breadcrumb">
			<li><a href="{{ URL::to('event/admin', $id) }}"  >@if($simpIct == 3) Beranda @else @if($simpIct == 4) Dashboard @endif @endif </a></li>
			<li class="active">@if($simpIct == 3) Peserta @else @if($simpIct == 4) Participant @endif @endif </li>
		</ol>

		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					@if($simpIct == 3) 
	<th>Nama</th>
					<th>Surat Elektronik</th>
					<th>Detail Profil</th>
					<th>Detail Pelunasan</th>
					<th>Abstraksi</th>
					<th>Paper Lengkap</th>
					@else @if($simpIct == 4)  
<th>Name</th>
					<th>Email</th>
					<th>Profile Detail</th>
					<th>Payment Detail</th>
					<th>Abstract</th>
					<th>Full Paper</th>
					@endif @endif 
				</tr>
			</thead>
			<tbody>
				@if($pesertas != NULL)
					@foreach ($pesertas as $peserta)
						<tr>
							<td>{{$peserta->nama}}</td>
							<td>{{$peserta->email}}</td>
							<input type='hidden' class='id_peserta' value='{{$peserta->id}}'>
							<td>
								<button class="btn btn-primary detail_profile" data-toggle="modal" data-target=".pop_up_detail_profile">@if($simpIct == 3) Detail Profil @else @if($simpIct == 4) Profile Detail @endif @endif </button>
							</td>
							<td>						
								<button class="btn btn-success detail_bayar" data-toggle="modal" data-target=".pop_up_detail_pelunasan">
									@if($peserta->status_bayar == 1)
										@if($simpIct == 3) Lunas @else @if($simpIct == 4) Paid @endif @endif 
									@else
										@if($simpIct == 3) Belum Lunas @else @if($simpIct == 4) Unpaid @endif @endif 
									@endif
								</button>
							</td>
							<td>
								@if($peserta->is_paper == 1)
									<button class="btn btn-primary detail_abstraksi" data-toggle="modal" data-target=".pop_up_detail_abstraksi">@if($simpIct == 3) Detail Abstraksi @else @if($simpIct == 4) Abstract Detail  @endif @endif </button>
								@else
									-
								@endif
							</td>
							<td>
								@if($peserta->is_paper == 1 && $peserta->paper != "")
									<button class="btn btn-primary detail_paper" data-toggle="modal" data-target=".pop_up_detail_fullpaper">@if($simpIct == 3) Detail Paper  @else @if($simpIct == 4) Paper Detail @endif @endif </button>
								@else
									-
								@endif
								
							</td>
						</tr>
					@endforeach
				@else
					<tr>
							<td>-</td>
							<td>-</td>
							<td>
								-
							</td>
							<td>						
								-
							</td>
							<td>
								-
							</td>
							<td>
								-
							</td>
						</tr>
				@endif
			</tbody>
		</table>
		
	</div>
</div>

@include('includes.modals.pop_up_detail_profile')
@include('includes.modals.pop_up_detail_pelunasan')
@include('includes.modals.pop_up_detail_abstraksi')
@include('includes.modals.pop_up_detail_fullpaper')
<script>
	$('body').on('click','.detail_profile',function(){
		$('.nama_peserta').text('-');
		$('.institusi_peserta').text('-');
		$('.email_peserta').text('-');
		$('.profesi_peserta').text('-');
		$('.alamat_peserta').text('-');
		//$('.status_peserta').text('-');
		$('.keahlian_peserta').text('-');
		$( ".loader" ).fadeIn( 200, function(){});
		$id_profil = $(this).parent().siblings('.id_peserta').val();
		$.get("{{url('event/admin/satu_peserta/')}}/"+$id_profil+"/"+{{$id}},function(response){
			$('.nama_peserta').text(response.nama);
			$('.institusi_peserta').text(response.institusi);
			$('.email_peserta').text(response.email);
			$('.profesi_peserta').text(response.pekerjaan);
			$('.alamat_peserta').text(response.alamat);
			//$('.status_peserta').text(response.status);
			if(response.is_paper ==1){
				$('.keahlian_peserta').text(response.alamat);
			}
			else{
				$('.keahlian_peserta').text('-');
			}
			$( ".loader" ).fadeOut( 200, function(){});
		});
	});
	
	$('body').on('click','.detail_bayar',function(){
		$('.jenis_bayar').text('-');
		$('.bukti_bayar_image').attr('src','');
		$('.id_peserta_biaya').val(-1);
	
		$( ".loader" ).fadeIn( 200, function(){});
		
		
		$id_profil = $(this).parent().siblings('.id_peserta').val();
		$.get("{{url('event/admin/satu_peserta/')}}/"+$id_profil+"/"+{{$id}},function(response){
			if(response.is_paper == 1){
				$('.jenis_bayar').text(response.status+' | With Paper');
			}
			else{
				$('.jenis_bayar').text(response.status);
			}
			$('.bukti_bayar_image').attr('src','../../../'+response.bukti_bayar);
			
			var $radios = $('input:radio[name=is_paper]');
			$radios.filter('[value='+response.status_bayar+']').prop('checked', true);		
			
			if(response.status_bayar == 1){
				$('.lunas_belum').css('display','none');
			}
			else{
				$('.lunas_belum').css('display','block');
			}
			
			$('.id_peserta_biaya').val($id_profil);
			$( ".loader" ).fadeOut( 200, function(){});
		});
	});
	
	$('body').on('click','.detail_abstraksi',function(){
		$('.judul_paper').text('-');
		$('.abstrak_paper').text('-');
		$('.id_peserta_abstract').val('-');
		$( ".loader" ).fadeIn( 200, function(){});
		$id_profil = $(this).parent().siblings('.id_peserta').val();
		$.get("{{url('event/admin/satu_peserta/')}}/"+$id_profil+"/"+{{$id}},function(response){
			$('.judul_paper').text(response.paper);
			$('.abstrak_paper').text(response.abstract);
			$('.id_peserta_abstract').val($id_profil);
			var $radios = $('input:radio[name=is_abstrak]');
			$radios.filter('[value='+response.abstract_read+']').prop('checked', true);	
			$( ".loader" ).fadeOut( 200, function(){});
		});
	})
	
	$('body').on('click','.detail_paper',function(){
		$('.judul_paper').text("-");
		$('.file_paper').attr('data',"");
		$('.id_peserta_paper').val(-1);
		$( ".loader" ).fadeIn( 200, function(){});
		$id_profil = $(this).parent().siblings('.id_peserta').val();
		$.get("{{url('event/admin/satu_peserta/')}}/"+$id_profil+"/"+{{$id}},function(response){
			$('.judul_paper').text(response.paper);
			if(response.path_paper == ""){
			
			}
			else{
				$('.file_paper').attr('data',"../../../"+response.path_paper );
			}
			
			$('.id_peserta_paper').val($id_profil);
			var $radios = $('input:radio[name=is_paper2]');
			$radios.filter('[value='+response.abstract_read+']').prop('checked', true);	
			$( ".loader" ).fadeOut( 200, function(){});
		});
	});
</script>
@stop