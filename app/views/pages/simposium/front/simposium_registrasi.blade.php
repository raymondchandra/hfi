@extends('layouts.simposium')
@section('content')
<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			
			@include('includes.simposium.sidebar')
			
			<div class="content_hfi">
				
				<h2>
					Registrasi
				</h2>
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table table-bordered">					
							<tr>
								<td width="100">
									Peserta
								</td>
								<td width="150">
									Early Bird Rate
								</td>
								<td width="150">
									Normal Rate
								</td>
							</tr>
							<tr class="active">
								<td>
									SFN XXVII
								</td>
								<td>
									
								</td>
								<td>
									
								</td>
							</tr>
							<tr>
								<td>
									Pemakalahan/umum
								</td>
								<td>
									Rp 550.000*
								</td>
								<td>
									Rp 650.000*
								</td>
							</tr>
							<tr>
								<td>
									Pemakalahan/mahasiswa
								</td>
								<td>
									Rp 550.000*
								</td>
								<td>
									Rp 700.000*
								</td>
							</tr>
							<tr>
								<td>
									Prosiding Hard Copy
								</td>
								<td>
									Rp 550.000*
								</td>
								<td>
									Rp 700.000*
								</td>
							</tr>
							
						</table>
						Note:*) Discount Rp 50,000 khusus untuk anggota aktif HFI
					</div>
				</div>
				<hr>
			</hr>
			
			<h2>Syarat dan ketentuan</h2>
			<p>
				• Peserta yang telah melakukan registrasi dan membatalkan, biaya registrasi tidak bisa dibayarkan kembali.<br/>
				• Biaya transfer bank ditanggung peserta<br/>
				• Registrasi mencakup : Seminar Kit, Konsumsi, Sertifikat<br/>
				• Pemakalah yang belum membayar penuh sampai dengan 1 Oktober 2014 tidak akan dijadwalkan dan abstraknya tidak akan dicetak pada buku kumpulan abstrak, kecuali ada pemberitahuan sebelumnya.
			</p>
			
			<hr>
		</hr>	
		
		<h2>Metode pembayaran</h2>
		<p>
			Pembayaran dilakukan dengan mentrasfer melalui bank dengan alamat sebagai berikut :

			• Account Name : HFI CABANG BALI<br/>
			• Account Number : 0328549426<br/>
			• Swift code : BNINIDJARNN<br/>
			• Bank Name : BNI Cabang Renon<br/>
			• Bank Address : Jalan Raya By Pass Ngurah Rai No. 2003, Denpasar,80361, INDONESIA
			<br></br>
			Setelah melakukan pembayaran, harap mengkonfirmasikan bukti pembayaran ke panitian melalui email : hfi_bali@yahoo.com
			
			<hr></hr>
			<p>
				Seluruh proses registrasi harus dilakukan secara online melalui melalui situs ini. Status dari registrasi bisa diakses melalui halaman daftar peserta. Username adalah sama dengan nomor registrasi Anda.
				Pengingat password akan dikirimkan ke surat elektronik yang dipakai saat registrasi. 
			</p>	
			
			
			<h2>Peserta Baru</h2>
			<div class="panel panel-default">
				<div class="panel-body">
					<!--<form role="form" >-->
					{{Session::get('message')}}
					{{ Form::open(array('url' => 'simposium/register','method'=>'post','class'=>'form-horizontal')) }}
						<input type='hidden' value='{{$id}}' name='input_id' />
						<div class="form-group">
							<label class=" control-label col-sm-3">Nama<span class="red">*</span></label>
							{{ Form::text('input_nama',Input::old('input_nama'), array('id' => 'input_nama', 'class' => 'form-control col-sm-5')) }}
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
							'lainlain' => 'lain-lain'), null, array('class' => 'form-control col-sm-5'))
						}}
					</div>
					<div class="form-group">
						<label class=" control-label col-sm-3">Surat Elektronik<span class="red">*</span></label>
						{{ Form::text('input_email', Input::old('input_email'), array('class' => 'form-control col-sm-5')) }}
					</div>
					<div class="form-group">
						<label class=" control-label col-sm-3">Alamat<span class="red">*</span></label>
						{{ Form::textarea('input_alamat', Input::old('input_alamat'), array('class' => 'form-control col-sm-5', 'style'=>'height: 100px;')) }}
					</div>

					<div class="form-group">
						<label class=" control-label col-sm-3">Password<span class="red">*</span></label>
						{{ Form::password('input_password',array('id' => 'input_password', 'class' => 'form-control col-sm-5'), Input::old('input_password')) }} 
					</div>
					<div class="form-group">
						<label class=" control-label col-sm-3">Ketik Ulang Password<span class="red">*</span></label>
						{{ Form::password('input_password_again',array('id' => 'input_password_again', 'class' => 'form-control col-sm-5'), Input::old('input_password_again')) }}
					</div>

					<div class="form-group">
						<label class=" control-label col-sm-3">Mempersembahkan Paper</label>
						<label class="radio-inline">
							{{ Form::radio('is_paper','1', array('style'=>'float: left;')) }} Ya         
						</label>
						<label class="radio-inline">
							{{ Form::radio('is_paper','0', array('style'=>'float: left;')) }} Tidak     
						</label>

					</div>

					<hr/>
					<div id="isPaperOn_form">
						<p class="bg-danger" style="padding: 5px;"><span class="text-danger">PERHATIAN!</span> Lengkapi form dibawah JIKA Anda ingin mempersembahkan paper! </p>

						
						<div class="form-group">
							<label class=" control-label col-sm-3">Status</label>
							<p class="form-control-static col-sm-5">Partisipan</p>
						</div>
						<div class="form-group">
							<label class=" control-label col-sm-3">Bidang Keahlian</label>
							<label class="radio-inline">
								{{ Form::radio('gender','pria', array('style'=>'float: left;')) }}oral         
							</label>
							<label class="radio-inline">
								{{ Form::radio('gender','wanita', array('style'=>'float: left;')) }}poster     
							</label>

							{{ Form::select('spesialisasi',array(
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
						}}
					</div>



					<div class="form-group">
						<label class=" control-label col-sm-3">Judul Paper</label>
						{{ Form::text('input_judul_paper', Input::old('input_judul_paper'), array('class' => 'form-control col-sm-5')) }}
					</div>


					<div class="form-group">
						<label class=" control-label col-sm-3">Abstrak</label>
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
								{{ Form::close() }}
								<!--</form>-->
							</div>
						</div>
						
						
					</div>
				</div>
			</div>
		</div>


		@stop