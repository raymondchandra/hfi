@extends('layouts.simposium')
@section('content')

<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			
			@include('includes.simposium.sidebar')
			{{Session::get('message')}}
			<div class="content_hfi">
				<h1 style="">Profile Pengguna</h1>
				<button data-toggle="modal" data-target=".pop_up_edit_profile" class="btn btn-primary edit_profil" style="float: right;">
					Edit Profile
				</button><input type='hidden' class='id_prt' value='{{$peserta[0]->id}}' />
				<span class="clearfix"></span>
				<div class="panel panel-default">
					
					<div class="panel-body container-fluid">
						  <div class="form-group row">
							<label class="col-lg-3">Nama</label>
							<span class="col-lg-8">{{$peserta[0]->nama}}</span>
						  </div>
						  
						  <div class="form-group row">
							<label class="col-lg-3">Institusi</label>
							<span class="col-lg-8">{{$peserta[0]->institusi}}</span>
						  </div>
						  
						  <div class="form-group row">
							<label class="col-lg-3">Profesi</label>
							<span class="col-lg-8">{{$peserta[0]->pekerjaan}}</span>
						  </div>
						  
						  <div class="form-group row">
							<label class="col-lg-3">Surat Elektronik</label>
							<span class="col-lg-8">{{$peserta[0]->email}}</span>
						  </div>
						  
						  <div class="form-group row">
							<label class="col-lg-3">Alamat</label>
							<span class="col-lg-8">{{$peserta[0]->alamat}}</span>
						  </div>
						  @if($peserta[0]->is_paper== 1)
						  <p class="bg-success" style="padding: 5px;"><span class="text-success">PERHATIAN!</span> Form dibawah terisi JIKA Anda mempersembahkan paper! </p>

						  <div class="form-group row">
							<label class="col-lg-3">Status</label>
							<span class="col-lg-8">
								{{$peserta[0]->status}}
							</span>
						  </div>

						  <div class="form-group row">
							<label class="col-lg-3">Bidang Keahlian</label>
							<span class="col-lg-8">{{$peserta[0]->spesialisasi}}</span>
						  </div>

						  <div class="form-group row">
							<label class="col-lg-3">Judul Paper</label>
							<span class="col-lg-8">{{$peserta[0]->paper}}</span>
						  </div>

						  <div class="form-group row">
							<label class="col-lg-3">Abstrak</label>
							<span class="col-lg-8">{{$peserta[0]->abstract}}</span>
						  </div>


						@endif
						 <hr/>
						@if($peserta[0]->is_paper == 1)
						  <button data-toggle="modal" data-target=".pop_up_upload_full_paper" type="submit" class="btn btn-info upload_paper">Upload Full Paper</button> 
						@endif
						  <button data-toggle="modal" data-target=".pop_up_upload_bukti_pembayaran" type="submit" class="btn btn-info upload_bayar">Upload Bukti Pembayaran</button> 
						  <button data-toggle="modal" data-target=".pop_up_minta_bantuan" type="submit" class="btn btn-info" id="bantuanButt">Minta Bantuan</button> 
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
		$.get("{{url('simposium/admin/satu_peserta/')}}/"+$id_profil,function(response){
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