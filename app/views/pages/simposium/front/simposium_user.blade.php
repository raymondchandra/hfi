@extends('layouts.simposium')
@section('content')

<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			
			@include('includes.simposium.sidebar')
			{{Session::get('message')}}
			<div class="content_hfi">
				<h1 style="">@if($simpIct == 3) Profil Pengguna @else @if($simpIct == 4) User Profile @endif @endif </h1>
				<button data-toggle="modal" data-target=".pop_up_edit_profile" class="btn btn-primary edit_profil" style="float: right;">
					@if($simpIct == 3) Ubah Profil @else @if($simpIct == 4) Edit Profile @endif @endif 
				</button><input type='hidden' class='id_prt' value='{{$peserta[0]->id}}' />
				<span class="clearfix"></span>
				<div class="panel panel-default">
					
					<div class="panel-body container-fluid">
						  <div class="form-group row">
							<label class="col-lg-3">@if($simpIct == 3) Nama @else @if($simpIct == 4) Name @endif @endif </label>
							<span class="col-lg-8">{{$peserta[0]->nama}}</span>
						  </div>
						  
						  <div class="form-group row">
							<label class="col-lg-3">@if($simpIct == 3) Institusi @else @if($simpIct == 4) Institution @endif @endif</label>
							<span class="col-lg-8">{{$peserta[0]->institusi}}</span>
						  </div>
						  
						  <div class="form-group row">
							<label class="col-lg-3">@if($simpIct == 3) Profesi @else @if($simpIct == 4) Occupation @endif @endif</label>
							<span class="col-lg-8">{{$peserta[0]->pekerjaan}}</span>
						  </div>
						  
						  <div class="form-group row">
							<label class="col-lg-3">@if($simpIct == 3) Surat Elektronik @else @if($simpIct == 4) Email @endif @endif</label>
							<span class="col-lg-8">{{$peserta[0]->email}}</span>
						  </div>
						  
						  <div class="form-group row">
							<label class="col-lg-3">@if($simpIct == 3) Alamat @else @if($simpIct == 4) Address @endif @endif </label>
							<span class="col-lg-8">{{$peserta[0]->alamat}}</span>
						  </div>
						  @if($peserta[0]->is_paper== 1)

						  <div class="form-group row">
							<label class="col-lg-3">Status</label>
							<span class="col-lg-8">
								{{$peserta[0]->status}}
							</span>
						  </div>

						 <!-- <div class="form-group row">
							<label class="col-lg-3">Bidang Keahlian</label>
							<span class="col-lg-8"></span>
						  </div>-->

						  <div class="form-group row">
							<label class="col-lg-3">@if($simpIct == 3) Judul Paper @else @if($simpIct == 4) Paper Title @endif @endif</label>
							<span class="col-lg-8">{{$peserta[0]->paper}}</span>
						  </div>

						  <div class="form-group row">
							<label class="col-lg-3">@if($simpIct == 3) Abstrak @else @if($simpIct == 4) Abstract @endif @endif</label>
							<span class="col-lg-8">{{$peserta[0]->abstract}}</span>
						  </div>


						@endif
						 <hr/>
						@if($peserta[0]->is_paper == 1)
						  <button data-toggle="modal" data-target=".pop_up_upload_full_paper" type="submit" class="btn btn-info upload_paper">@if($simpIct == 3) Unggah Paper Lengkap @else @if($simpIct == 4) Upload Full Paper @endif @endif </button> 
						@endif
						  <button data-toggle="modal" data-target=".pop_up_upload_bukti_pembayaran" type="submit" class="btn btn-info upload_bayar">@if($simpIct == 3) Unggah Bukti Pembayaran  @else @if($simpIct == 4) Upload Proof of Payment @endif @endif </button> 
						  <button data-toggle="modal" data-target=".pop_up_minta_bantuan" type="submit" class="btn btn-info" id="bantuanButt">@if($simpIct == 3) Minta Bantuan @else @if($simpIct == 4) Get Help @endif @endif </button> 
					</div>
					
					<script>
						$('#bantuanButt').click(function(){
							$('#id_keg').val('{{$id}}');
							$('#id_pes').val('{{$peserta[0]->id}}');
						});
					</script>

				</div>
			</div>
		</div>
	</div>
</div>

@include('includes.modals.pop_up_upload_full_paper')
@include('includes.modals.pop_up_upload_bukti_pembayaran')
@include('includes.modals.pop_up_minta_bantuan')
@include('includes.modals.pop_up_edit_profile')

<script>
	$('body').on('click','.upload_paper',function(){
		$('.id_kegiatan').val({{$id}});
		$('.id_peserta').val($('.id_prt').val());
	})
	
	$('body').on('click','.upload_bayar',function(){
		$('.id_kegiatan').val({{$id}});
		$('.id_peserta').val($('.id_prt').val());
	})
	
	$('body').on('click','.edit_profil',function(){
		$id_profil = $(this).next().val();
		$.get("{{url('event/admin/satu_peserta/')}}/"+$id_profil+"/"+{{$id}},function(response){
			$('#id_peserta_edit').val($id_profil);
			$('.input_nama').val(response.nama);
			$('#input_institusi').val(response.institusi);
			$('.input_profesi').val(response.pekerjaan);
			$('.input_email').val(response.email);
			$('.input_alamat').val(response.alamat);
			
			var $radios = $('input:radio[name=gender]');
			$radios.filter('[value='+response.presentasi+']').prop('checked', true);		
			
			$('.judul_paper').val(response.paper);
			$('.abstrak_paper').val(response.abstract);
			
		});
	})
</script>
@stop