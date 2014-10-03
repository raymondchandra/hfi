@extends('layouts.simposium')
@section('content')

<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			
			@include('includes.simposium.sidebar')
			<div class="content_hfi">
				<h1 style="">Profile Pengguna</h1>
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
						  <button  data-toggle="modal" data-target=".pop_up_upload_full_paper" type="submit" class="btn btn-info">Upload Full Paper</button> 
						  <a type="submit" class="btn btn-info">Upload Bukti Pembayaran</a> 
						  <a type="submit" class="btn btn-info">Minta Bantuan</a> 
						
					</div>

				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal Pop Up Tambah Sponsor -->
<div class="modal fade pop_up_upload_full_paper" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Upload Full Paper</h4>
      		</div>

			<div class="modal-body" style="">
				<div id="uploadttg" style="margin-left: 20px !important;">
					
						<img id="gambar_tanda_tangan" src="" alt="tandatangan" width="200" style="min-height:200px; display: block; height: 200px;"/>
						{{ Form::file('fileTandaTangan', array('name'=>'fileTandaTangan','id'=>'fileTandaTangan', 'accept' => "image/*")) }}
					
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="form-group konten_pesan">
					{{ Form::submit('Unggah Tanda Tangan', array('id'=>'ok_edit_tanda_tangan_button', 'style' => '', 'class'=>'btn btn-success')) }}
				</div>
			</div>
				
		</div>
	</div>
</div>



@stop