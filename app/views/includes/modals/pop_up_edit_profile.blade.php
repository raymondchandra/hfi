
<!-- Modal Pop Up Edit Profile -->
<div class="modal fade pop_up_edit_profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
      		</div>
			<!--<form role="form" class="form-horizontal">-->
			{{ Form::open(array('url' => '/simposium/editProfil','method'=>'put','class'=>'form-horizontal')) }}
			<input type='hidden' value='{{$id}}' name='id_kegiatan' />
			<input type='hidden' value='' id='id_peserta_edit' name='id_peserta' />
			<div class="modal-body" style="">
				
			 	<div class="form-group">
					<label class=" control-label col-sm-3">Nama<span class="red">*</span></label>
					{{ Form::text('input_nama',Input::old('input_nama'), array('id' => 'input_nama', 'class' => 'form-control col-sm-5 input_nama')) }}
			  	</div>
			  	<div class="form-group">
					<label class=" control-label col-sm-3">Institusi<span class="red">*</span></label>
					{{ Form::text('input_institusi',Input::old('input_institusi'), array('id' => 'input_institusi', 'class' => 'form-control col-sm-5')) }}
			  	</div>
			  	<div class="form-group">
				<label class=" control-label col-sm-3">Profesi<span class="red">*</span></label>
				{{ Form::select('input_profesi',array(
						'' => 'pilih!',
						'mahasiswa' => 'mahasiswa',
						'guru' => 'guru',
						'dosen' => 'dosen',
						'peneliti' => 'peneliti',
						'karyawan' => 'karyawan',
						'lainlain' => 'lain-lain'), null, array('class' => 'form-control col-sm-5 input_profesi'))
					}}
				</div>
			  	<div class="form-group">
					<label class=" control-label col-sm-3">Surat Elektronik<span class="red">*</span></label>
					{{ Form::text('input_email', Input::old('input_email'), array('class' => 'form-control col-sm-5 input_email')) }}
				</div>
				<div class="form-group">
					<label class=" control-label col-sm-3">Alamat<span class="red">*</span></label>
					{{ Form::textarea('input_alamat', Input::old('input_alamat'), array('class' => 'form-control col-sm-5 input_alamat', 'style'=>'height: 100px;')) }}
				</div>

				<div class="form-group">
					<label class=" control-label col-sm-3">Password</label>
					{{ Form::password('input_password',array('id' => 'input_password', 'class' => 'form-control col-sm-5'), Input::old('input_password')) }} 
				</div>
				<div class="form-group">
					<label class=" control-label col-sm-3">Ketik Ulang Password</label>
					{{ Form::password('input_password_again',array('id' => 'input_password_again', 'class' => 'form-control col-sm-5'), Input::old('input_password_again')) }}
				</div>

				<hr/>
				@if($peserta[0]->is_paper == 1)
				<p class="bg-danger" style="padding: 5px;"><span class="text-danger">PERHATIAN!</span> Lengkapi form dibawah JIKA Anda ingin mempersembahkan paper! </p>

				
					<div class="form-group">
						<label class=" control-label col-sm-3">Status</label>
						<p class="form-control-static col-sm-5">Partisipan</p>
					</div>
					<div class="form-group">
						<label class=" control-label col-sm-3">Bidang Keahlian</label>
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
						<label class=" control-label col-sm-3">Judul Paper</label>
						{{ Form::text('input_judul_paper', Input::old('input_judul_paper'), array('class' => 'form-control col-sm-5 judul_paper')) }}
					</div>


					<div class="form-group">
						<label class=" control-label col-sm-3">Abstrak</label>
						{{ Form::textarea('input_abstrak', Input::old('input_abstrak'), array('class' => 'form-control col-sm-5 abstrak_paper', 'style'=>'height: 100px;')) }}
					</div>	
				<p>
					<span class="red" style="position: relative; right:0; top: 0;">*</span> ) harus diisi!
				</p>
				@endif
			</div>
			<div class="modal-footer">
					<input type="submit" class="btn btn-success" value='Kirim' /> 
					<button type="reset" class="btn btn-primary">Reset</button> 
				
			</div>
			{{ Form::close() }}
			<!--</form>	-->
		</div>
	</div>
</div>
