@extends('layouts.simposium')
@section('content')
<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			
			@include('includes.simposium.sidebar')
			
			<div class="content_hfi">
				
				<h2>
					@if($simpIct == 3) Registrasi @else @if($simpIct == 4) Registration @endif @endif 
				</h2>
				<div class="panel-body">
					<table class="table table-bordered">					
						<tr>
							<td width="100">
								@if($simpIct == 3) Kategori @else @if($simpIct == 4) Category @endif @endif 
							</td>
							<td width="150">
								@if($simpIct == 3) Harga Early Bird @else @if($simpIct == 4) Early Bird Rate @endif @endif <br />
								{{$early_start}} - {{$early_finish}}
							</td>
							<td width="150">
								@if($simpIct == 3) Harga Normal @else @if($simpIct == 4) Normal Rate @endif @endif <br />
								@if($simpIct == 3) Setelah @else @if($simpIct == 4) After @endif @endif  {{$early_finish}}
							</td>
						</tr>
						@if($harga!=null)
						@foreach($harga as $harg)
						@if($harg->isHeader == 1)
						<tr class="hargaTabel header info">
							@else
							<tr class="hargaTabel nonHeader" >
								@endif
								<td>
									<span class="showAll lblKategori">{{$harg->kategori}}</span>
								</td>
								<td>
									<span class="showAll lblEarly">{{$harg->harga_early}}</span>
								</td>
								<td>
									<span class="showAll lblNormal">{{$harg->harga_normal}}</span>
								</td>
							</tr>
							@endforeach
							@endif
						</table>
					</div>

					<p>
						{{$text}}
					</p>


					<h2>@if($simpIct == 3) Peserta Baru @else @if($simpIct == 4) New Participant @endif @endif </h2>
					<div class="panel panel-default">
						<div class="panel-body">
							<!--<form role="form" >-->
							{{Session::get('message')}}
							{{ Form::open(array('url' => 'event/register','method'=>'post','id'=>'register_simposium','class'=>'form-horizontal')) }}
							<input type='hidden' value='{{$id}}' name='input_id' />
							<div class="form-group">
								<label class=" control-label col-sm-3">Username<span class="red">*</span></label>
								{{ Form::text('input_user',Input::old('input_user'), array('id' => 'input_user', 'class' => 'form-control col-sm-5')) }}
							</div>
							<div class="form-group">
								<label class=" control-label col-sm-3">@if($simpIct == 3) Nama @else @if($simpIct == 4) Name @endif @endif <span class="red">*</span></label>
								{{ Form::text('input_nama',Input::old('input_nama'), array('id' => 'input_nama', 'class' => 'form-control col-sm-5')) }}
							</div>
							<div class="form-group">
								<label class=" control-label col-sm-3">@if($simpIct == 3) Institusi @else @if($simpIct == 4) Institution @endif @endif <span class="red">*</span></label>
								{{ Form::text('input_institusi',Input::old('input_institusi'), array('id' => 'input_institusi', 'class' => 'form-control col-sm-5')) }}
							</div>
							<div class="form-group">
								<label class=" control-label col-sm-3">@if($simpIct == 3) Profesi @else @if($simpIct == 4) Occupation @endif @endif <span class="red">*</span></label>
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
							<label class=" control-label col-sm-3">@if($simpIct == 3) Surat Elektronik @else @if($simpIct == 4) Email @endif @endif <span class="red">*</span></label>
							{{ Form::text('input_email', Input::old('input_email'), array('class' => 'form-control col-sm-5')) }}
						</div>
						<div class="form-group">
							<label class=" control-label col-sm-3">@if($simpIct == 3) Alamat @else @if($simpIct == 4) Address @endif @endif <span class="red">*</span></label>
							{{ Form::textarea('input_alamat', Input::old('input_alamat'), array('class' => 'form-control col-sm-5', 'style'=>'height: 100px;')) }}
						</div>

						<div class="form-group">
							<label class=" control-label col-sm-3">Password<span class="red">*</span></label>
							{{ Form::password('input_password',array('id' => 'input_password', 'class' => 'form-control col-sm-5'), Input::old('input_password')) }} 
						</div>
						<div class="form-group">
							<label class=" control-label col-sm-3">@if($simpIct == 3) Ketik Ulang Password @else @if($simpIct == 4) Retype Password @endif @endif <span class="red">*</span></label>
							{{ Form::password('input_password_again',array('id' => 'input_password_again', 'class' => 'form-control col-sm-5'), Input::old('input_password_again')) }}
						</div>

						<div class="form-group">
							<label class=" control-label col-sm-3">@if($simpIct == 3) Mempersembahkan Paper @else @if($simpIct == 4) Present Paper @endif @endif </label>
							<label class="radio-inline">
								{{ Form::radio('is_paper','1', array('style'=>'float: left;')) }} @if($simpIct == 3) Ya @else @if($simpIct == 4) Yes @endif @endif          
							</label>
							<label class="radio-inline">
								{{ Form::radio('is_paper','0', array('style'=>'float: left;')) }} @if($simpIct == 3) Tidak @else @if($simpIct == 4) No @endif @endif      
							</label>

						</div>

						<hr/>
						<div id="isPaperOn_form">
							@if($simpIct == 3) 
	<p class="bg-danger" style="padding: 5px;"><span class="text-danger">PERHATIAN!</span> Lengkapi form dibawah JIKA Anda ingin mempersembahkan paper! </p>
@else @if($simpIct == 4)  
<p class="bg-danger" style="padding: 5px;"><span class="text-danger">ATTENTION!</span> Complete the items below ONLY if you wish to present a paper ! </p>
@endif @endif 


							<div class="form-group">
								<label class=" control-label col-sm-3">Status</label>
								<p class="form-control-static col-sm-5">@if($simpIct == 3) Partisipan @else @if($simpIct == 4) Participant @endif @endif </p>
							</div>
							<div class="form-group">
								<label class=" control-label col-sm-3">Bidang Keahlian</label>
								<label class="radio-inline">
									{{ Form::radio('gender','pria', array('style'=>'float: left;')) }} Oral         
								</label>
								<label class="radio-inline">
									{{ Form::radio('gender','wanita', array('style'=>'float: left;')) }} Poster     
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
								'lainlain' => 'lain-lain'), NULL, array('class'=>'form-control col-sm-3', 'style'=>'margin-right:10px;'))-->
							}}
						</div>



						<div class="form-group">
							<label class=" control-label col-sm-3">@if($simpIct == 3) Judul Paper @else @if($simpIct == 4) Paper Title @endif @endif </label>
							{{ Form::text('input_judul_paper', Input::old('input_judul_paper'), array('class' => 'form-control col-sm-5')) }}
						</div>


						<div class="form-group">
							<label class=" control-label col-sm-3">@if($simpIct == 3) Abstrak @else @if($simpIct == 4) Abstract @endif @endif </label>
							{{ Form::textarea('input_abstrak', Input::old('input_abstrak'), array('class' => 'form-control col-sm-5', 'style'=>'height: 100px;')) }}
						</div>		
					</div>	
							<script>
								$('#isPaperOn_form').addClass('reg_submit_off');
									// set hidden form field with selected timeslot
									$('input[name="is_paper"]').live("click", (function () {
										var valu = $(this).val();
										if(valu === '1'){
											$('#isPaperOn_form').removeClass('reg_submit_off');
											$('#isPaperOn_form').addClass('reg_submit_on');
										}else{
											$('#isPaperOn_form').addClass('reg_submit_off');
											$('#isPaperOn_form').removeClass('reg_submit_on');
										}
										
									})); 
									
									//array('class' => 'regreg reg_submit_off')
									
									</script>
									<p>
										<span class="red" style="position: relative; right:0; top: 0;">*</span> ) harus diisi!
									</p>

									<button type="submit" class="btn btn-success">Kirim</button> 
									<button type="reset" class="btn btn-primary">Reset</button> 

									<script>
									jQuery.validator.setDefaults({
										debug: true,
										success: "valid"
									});
									$( "#register_simposium" ).validate({
										rules: {
											input_user : {
												required: true
											},
											input_nama: {
												required: true
											},
											input_institusi: {
												required: true
											},
											input_profesi: {
												required: true
											},
											input_email: {
												required: true
											},
											input_alamat: {
												required: true
											},
											input_password: {
												required: true,
												minlength: 8
											},
											input_password_again: {
												required: true,
												equalTo: "#input_password"

											}
										}, messages: {
											@if($simpIct == 3) 
	input_user: {
												required: "Mohon isi username Anda"
											},
											input_nama: {
												required: "Mohon isi nama dengan lengkap"
											},
											input_institusi: {
												required: "Mohon isi institusi Anda"
											},
											input_profesi: {
												required: "Mohon pilih profesi Anda"
											},
											input_email: {
												required: "Mohon isi alamat email Anda"
											},
											input_alamat: {
												required: "Mohon isi alamat Anda"
											},
											input_password: {
												required: "Mohon ketik password Anda",
												minlength: "Password minimal 8 karakter"
											},
											input_password_again: {
												required: "Mohon ketik ulang password",
												equalTo: "Maaf password tidak cocok"
											}
@else @if($simpIct == 4)  
input_user: {
												required: "Please fill your username"
											},
											input_nama: {
												required: "Please fill your name completely"
											},
											input_institusi: {
												required: "Please fill your Institution"
											},
											input_profesi: {
												required: "Please fill your occupation"
											},
											input_email: {
												required: "Please fill your email"
											},
											input_alamat: {
												required: "Please fill your address"
											},
											input_password: {
												required: "Please type your password",
												minlength: "Please fill your password at least 8 character"
											},
											input_password_again: {
												required: "Please type your password again",
												equalTo: "Sorry your password doesn't match"
											}
@endif @endif 
											
										},
										submitHandler: function(form) {
												form.submit();

										}
									});
							</script>
						{{ Form::close() }}
<!--</form>-->
					</div>
				</div>


			</div>
		</div>
	</div>
</div>


@stop