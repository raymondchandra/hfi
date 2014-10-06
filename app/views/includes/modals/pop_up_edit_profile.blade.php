
<!-- Modal Pop Up Edit Profile -->
<div class="modal fade pop_up_edit_profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">@if($simpIct == 3) Tutup @else @if($simpIct == 4) Close @endif @endif</span></button>
        		<h4 class="modal-title" id="myModalLabel">@if($simpIct == 3) Ubah Profil @else @if($simpIct == 4) Edit Profile @endif @endif</h4>
      		</div>
			<!--<form role="form" class="form-horizontal">-->
			{{ Form::open(array('url' => 'event/editProfil','method'=>'put','class'=>'form-horizontal')) }}
			<input type='hidden' value='{{$id}}' name='id_kegiatan' />
			<input type='hidden' value='' id='id_peserta_edit' name='id_peserta' />
			<div class="modal-body" style="">
				
			 	<div class="form-group">
					<label class=" control-label col-sm-3">@if($simpIct == 3) Nama @else @if($simpIct == 4) Name @endif @endif<span class="red">*</span></label>
					{{ Form::text('input_nama',Input::old('input_nama'), array('id' => 'input_nama', 'class' => 'form-control col-sm-5 input_nama')) }}
			  	</div>
			  	<div class="form-group">
					<label class=" control-label col-sm-3">@if($simpIct == 3) Institusi @else @if($simpIct == 4) Institution @endif @endif<span class="red">*</span></label>
					{{ Form::text('input_institusi',Input::old('input_institusi'), array('id' => 'input_institusi', 'class' => 'form-control col-sm-5')) }}
			  	</div>
			  	<div class="form-group">
				<label class=" control-label col-sm-3">@if($simpIct == 3) Profesi @else @if($simpIct == 4) Occupation @endif @endif<span class="red">*</span></label>
				@if($simpIct == 3) 
	{{ Form::select('input_profesi',array(
								'' => 'pilih!',
								'mahasiswa' => 'mahasiswa',
								'guru' => 'guru',
								'dosen' => 'dosen',
								'peneliti' => 'peneliti',
								'karyawan' => 'karyawan',
								'lainlain' => 'lain-lain'), null, array('class' => 'form-control col-sm-5'))}}
@else @if($simpIct == 4)  
{{ Form::select('input_profesi',array(
								'' => 'choose!',
								'student' => 'student',
								'teacher' => 'teacher',
								'lecturer' => 'lecturer',
								'researcher' => 'researcher',
								'employee' => 'employee',
								'other' => 'other'), null, array('class' => 'form-control col-sm-5'))}}
@endif @endif 
				</div>
			  	<div class="form-group">
					<label class=" control-label col-sm-3">@if($simpIct == 3) Surat Elektronik @else @if($simpIct == 4) Email @endif @endif<span class="red">*</span></label>
					{{ Form::text('input_email', Input::old('input_email'), array('class' => 'form-control col-sm-5 input_email')) }}
				</div>
				<div class="form-group">
					<label class=" control-label col-sm-3">@if($simpIct == 3) Alamat @else @if($simpIct == 4) Address @endif @endif<span class="red">*</span></label>
					{{ Form::textarea('input_alamat', Input::old('input_alamat'), array('class' => 'form-control col-sm-5 input_alamat', 'style'=>'height: 100px;')) }}
				</div>

				<div class="form-group">
					<label class=" control-label col-sm-3">Password</label>
					{{ Form::password('input_password',array('id' => 'input_password', 'class' => 'form-control col-sm-5'), Input::old('input_password')) }} 
				</div>
				<div class="form-group">
					<label class=" control-label col-sm-3">@if($simpIct == 3) Ketik Ulang Password @else @if($simpIct == 4) Retype Password @endif @endif</label>
					{{ Form::password('input_password_again',array('id' => 'input_password_again', 'class' => 'form-control col-sm-5'), Input::old('input_password_again')) }}
				</div>

				<hr/>
				@if($peserta[0]->is_paper == 1)
											@if($simpIct == 3) 
	<p class="bg-danger" style="padding: 5px;"><span class="text-danger">PERHATIAN!</span> Lengkapi form dibawah JIKA Anda ingin mempersembahkan paper! </p>
@else @if($simpIct == 4)  
<p class="bg-danger" style="padding: 5px;"><span class="text-danger">ATTENTION!</span> Complete the items below ONLY if you wish to present a paper ! </p>
@endif @endif 
				
					<div class="form-group">
						<label class=" control-label col-sm-3">Status</label>
						<p class="form-control-static col-sm-5">Partisipan</p>
					</div>
					<div class="form-group">
						<label class=" control-label col-sm-3">Presentasi</label>
						<label class="radio-inline">
						{{ Form::radio('gender',1, array('style'=>'float: left;')) }}oral         
						</label>
						<label class="radio-inline">
						{{ Form::radio('gender',0, array('style'=>'float: left;')) }}poster     
						</label>

						<!--{{ Form::select('spesialisasi',array(
							'' => 'pilih!',
							'astro' => 'astro',
							'hayati' => 'hayati',
							'komputasi' => 'komputasi',
							'pendidikan' => 'pendidikan',
							'energi' => 'energi',
							'lingkungan' => 'lingkungan',
							'bumi' => 'bumi',
							'instrumentasi' => 'instrumentasi',
							'material' => 'material',
							'matematika' => 'matematika',
							'medis' => 'medis',
							'nonlinier' => 'non-linier',
							'nuklir' => 'nuklir',
							'parkikel' => 'partikel',
							'lainlain' => 'lain-lain'), NULL, array('class'=>'form-control col-sm-3', 'style'=>'margin-right:10px;'))
						}}-->
					</div>



				  	<div class="form-group">
						<label class=" control-label col-sm-3">@if($simpIct == 3) Judul Paper @else @if($simpIct == 4) Paper Title @endif @endif</label>
						{{ Form::text('input_judul_paper', Input::old('input_judul_paper'), array('class' => 'form-control col-sm-5 judul_paper')) }}
					</div>


					<div class="form-group">
						<label class=" control-label col-sm-3">@if($simpIct == 3) Abstrak @else @if($simpIct == 4) Abstract @endif @endif</label>
						{{ Form::textarea('input_abstrak', Input::old('input_abstrak'), array('class' => 'form-control col-sm-5 abstrak_paper', 'style'=>'height: 100px;')) }}
					</div>	
				<p>
					<span class="red" style="position: relative; right:0; top: 0;">*</span> ) harus diisi!
				</p>
				@endif
			</div>
			<div class="modal-footer">
					<input type="submit" class="btn btn-success" value='@if($simpIct == 3) Kirim @else @if($simpIct == 4) Send @endif @endif' /> 
					<button type="reset" class="btn btn-primary">Reset</button> 
				
			</div>
			{{ Form::close() }}
			<!--</form>	-->
		</div>
	</div>
</div>
