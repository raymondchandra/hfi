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
				@if($pesertas != NULL)
					@foreach ($pesertas as $peserta)
						<tr>
							<td>{{$peserta->nama}}</td>
							<td>{{$peserta->email}}</td>
							<input type='hidden' class='id_peserta' value='{{$peserta->id}}'>
							<td>
								<button class="btn btn-primary detail_profile" data-toggle="modal" data-target=".pop_up_detail_profile">Detail Profile</button>
							</td>
							<td>						
								<button class="btn btn-success detail_bayar" data-toggle="modal" data-target=".pop_up_detail_pelunasan">
									@if($peserta->status_bayar == 1)
										Lunas
									@else
										Belum lunas
									@endif
								</button>
							</td>
							<td>
								@if($peserta->is_paper == 1)
									<button class="btn btn-primary detail_abstraksi" data-toggle="modal" data-target=".pop_up_detail_abstraksi">Detail Abstraksi</button>
								@else
									-
								@endif
							</td>
							<td>
								@if($peserta->is_paper == 1 && $peserta->paper != "")
									<button class="btn btn-primary detail_paper" data-toggle="modal" data-target=".pop_up_detail_fullpaper">Detail Paper</button>
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
		$( ".loader" ).fadeIn( 200, function(){});
		$id_profil = $(this).parent().siblings('.id_peserta').val();
		$.get("{{url('simposium/admin/satu_peserta/')}}/"+$id_profil,function(response){
			$('.nama_peserta').text(response.nama);
			$('.institusi_peserta').text(response.institusi);
			$('.email_peserta').text(response.email);
			$('.profesi_peserta').text(response.pekerjaan);
			$('.alamat_peserta').text(response.alamat);
			$('.status_peserta').text(response.status);
			if(response.is_paper ==1){
				$('.keahlian_peserta').text(response.alamat);
				$('.paper_peserta').text(response.paper);
				$('.abstrak_peserta').text(response.abstract);
			}
			else{
				$('.keahlian_peserta').text('-');
				$('.paper_peserta').text('-');
				$('.abstrak_peserta').text('-');
			}
			$( ".loader" ).fadeOut( 200, function(){});
		});
	});
	
	$('body').on('click','.detail_bayar',function(){
		$( ".loader" ).fadeIn( 200, function(){});
		$id_profil = $(this).parent().siblings('.id_peserta').val();
		$.get("{{url('simposium/admin/satu_peserta/')}}/"+$id_profil,function(response){
			if(response.is_paper == 1){
				$('.jenis_bayar').text(response.status+' | With Paper');
			}
			else{
				$('.jenis_bayar').text(response.status);
			}
			$('.biaya_bayar').text();
			
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
		$( ".loader" ).fadeIn( 200, function(){});
		$id_profil = $(this).parent().siblings('.id_peserta').val();
		$.get("{{url('simposium/admin/satu_peserta/')}}/"+$id_profil,function(response){
			$('.judul_paper').text(response.paper);
			$('.abstrak_paper').text(response.abstract);
			$( ".loader" ).fadeOut( 200, function(){});
		});
	})
	
	$('body').on('click','.detail_paper',function(){
		$( ".loader" ).fadeIn( 200, function(){});
		$id_profil = $(this).parent().siblings('.id_peserta').val();
		$.get("{{url('simposium/admin/satu_peserta/')}}/"+$id_profil,function(response){
			$('.judul_paper').text(response.paper);
			$('.file_paper').attr('data',"../../../"+response.path_paper);
			$( ".loader" ).fadeOut( 200, function(){});
		});
	});
</script>
@stop