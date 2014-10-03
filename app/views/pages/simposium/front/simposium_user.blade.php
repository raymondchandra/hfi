@extends('layouts.simposium')
@section('content')

<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			
			@include('includes.simposium.sidebar')
			<div class="content_hfi">
				<h1 style="">Profile Pengguna</h1>
				<button data-toggle="modal" data-target=".pop_up_edit_profile" class="btn btn-primary" style="float: right;">
					Edit Profile
				</button>
				<span class="clearfix"></span>
				<div class="panel panel-default">
					
					<div class="panel-body container-fluid">
						
						  <div class="form-group row">
							<label class="col-lg-3">Nama</label>
							<span class="col-lg-8">Muhammad Naufal Ashidiq Wangsaatmadja</span>
						  </div>
						  
						  <div class="form-group row">
							<label class="col-lg-3">Institusi</label>
							<span class="col-lg-8">Wangsaatmadja Corp.</span>
						  </div>
						  
						  <div class="form-group row">
							<label class="col-lg-3">Profesi</label>
							<span class="col-lg-8">Leader of The World</span>
						  </div>
						  
						  <div class="form-group row">
							<label class="col-lg-3">Surat Elektronik</label>
							<span class="col-lg-8">muhammad@wangsaatmadja.co.id</span>
						  </div>
						  
						  <div class="form-group row">
							<label class="col-lg-3">Alamat</label>
							<span class="col-lg-8">Jl. Naufal Ashidiq Wangsaatmadja No. 9</span>
						  </div>
						  
						  <p class="bg-success" style="padding: 5px;"><span class="text-success">PERHATIAN!</span> Form dibawah terisi JIKA Anda mempersembahkan paper! </p>

						  <div class="form-group row">
							<label class="col-lg-3">Status</label>
							<span class="col-lg-8">-</span>
						  </div>

						  <div class="form-group row">
							<label class="col-lg-3">Bidang Keahlian</label>
							<span class="col-lg-8">-</span>
						  </div>

						  <div class="form-group row">
							<label class="col-lg-3">Judul Paper</label>
							<span class="col-lg-8">-</span>
						  </div>

						  <div class="form-group row">
							<label class="col-lg-3">Abstrak</label>
							<span class="col-lg-8">-</span>
						  </div>



						 <hr/>
						  <button data-toggle="modal" data-target=".pop_up_upload_full_paper" type="submit" class="btn btn-info">Upload Full Paper</button> 
						  <button data-toggle="modal" data-target=".pop_up_upload_bukti_pembayaran" type="submit" class="btn btn-info">Upload Bukti Pembayaran</button> 
						  <button data-toggle="modal" data-target=".pop_up_minta_bantuan" type="submit" class="btn btn-info">Minta Bantuan</button> 
						
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

@include('includes.modals.pop_up_upload_full_paper')
@include('includes.modals.pop_up_upload_bukti_pembayaran')
@include('includes.modals.pop_up_minta_bantuan')
@include('includes.modals.pop_up_edit_profile')


@stop