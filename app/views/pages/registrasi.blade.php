@extends('layouts.default')
@section('content')	
<div class="grid_12">
<div class="main_content">
	<h1 style="text-align:center;">Registrasi Keanggotaan</h1>
	<p>	
		Silahkan mengisi formulir di bawah ini untuk registrasi anggota.
		Pastikan untuk mengisi minimal semua kolom dengan tanda bintang! 
		Komunikasi selanjutnya dilakukan melalui surat elektronik,
		untuk dianjurkan mengisi kolom alamat surat elektronik. 
		Semua data anggota dijamin kerahasiaannya dan hanya data minimal
		yang dibuka untuk publik.<br>
		Demi keamanan data Anda, tentukan <i>password</i> yang tidak mudah
		ditebak, <i>password</i> bisa ditentukan bebas dan bisa berupa
		kombinasi aneka karakter serta dibedakan antara huruf besar dan
		kecil.
	</p>
	
	<hr>
	
	{{ Form::open(array('url' => '/regis')) }}
	
	<table border="0" class="form_registrasi">		
		<tr>
			<td>Username</td>
			<td>:</td>
			<td>{{ Form::text('username', Input::old('username')) }} <span class="red">*</span></td>			
		</tr>		
		<tr>
			<td><i>Password</i></td>
			<td>:</td>
			<td>{{ Form::password('password',array('id' => 'input_password'), Input::old('password')) }} <span class="red">*</span></td>			
		</tr>
		
		<tr>
			<td><i>Ketik Ulang Password</i></td>
			<td>:</td>
			<td>{{ Form::password('password_again',array('id' => 'password_again'), Input::old('password_again')) }} <span class="red">*</span></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td>{{ Form::text('nama', Input::old('nama')) }} <span class="red">*</span></td>			
		</tr>
		<tr>
			<td>Registrasi</td>			
			<td>:</td>
			<td>
				anggota non-aktif, HFI Cabang 				
				<?php
					// $length = sizeof($arr2);
					// $arrCabang = array();					
					// for($i=0; $i<$length; $i++){
						// $arrCabang[] = $arr2[$i]['nama'];
					// }
				?>
				{{ Form::select('hficabang', $arr2, Input::old('hficabang'), array('style' => 'width:200px;'))}}				
			</td>			
		</tr>
		<tr>
			<td>Tempat, tanggal lahir</td>
			<td>:</td>
			<td style="">
				<div style="width:600px;">
				{{ Form::text('tempatlahir', Input::old('tempatlahir')) }}<span class="red" style="right:340px;">*</span>
				<div class="clear">
				</div>
				{{ Form::text('tanggallahir', Input::old('tanggallahir'),  array('id' => 'tanggallahir', 'style' => 'width:80px;')) }}
				<span class="red" style="right: 284px; top: 35px;">*</span>
				</div>
				</td>			
		</tr>
		<tr>
			<td>Jenis kelamin</td>
			<td>:</td>
			<td>{{ Form::radio('gender','pria') }}pria    {{ Form::radio('gender','wanita') }}wanita <span class="red">*</span></td>			
		</tr>
		<tr>
			<td>Tema penelitian	</td>
			<td>:</td>
			<td>{{ Form::textarea('temapenelitian', Input::old('temapenelitian')) }} <span class="red">*</span></td>			
		</tr>		
		<tr>
			<td>Spesialisasi</td>
			<td>:</td>
			<td>
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
					'lainlain' => 'lain-lain'))
				}} <span class="red">*</span></td>				
		</tr>
		
		<tr>
			<td>Pendidikan</td>
			<td>:</td>
			<td>
				<script>
				var lastIdx = 2;
				function addPendidikan(){
					var newRow = "<select class='selPendidikan'>";
					newRow +="<option value=''>Pilih!</option>";
					newRow +="<option value='SD'>SD</option>";
					newRow +="<option value='SMP'>SMP</option>";
					newRow +="<option value='SMA'>SMA</option>";
					newRow +="<option value='D1'>D1</option>";
					newRow +="<option value='D2'>D2</option>";
					newRow +="<option value='D3'>D3</option>";
					newRow +="<option value='D4'>D4</option>";
					newRow +="<option value='S1'>S1</option>";
					newRow +="<option value='S2'>S2</option>";
					newRow +="<option value='S3'>S3</option>";
					newRow +="<option value='lain'>Lainnya</option>";
					newRow +="</select>";
					newRow +="<input type='text' id='pendidikan'"+lastIdx+" class='texPendidikan' /><br />";
					$('#addPendidikan').append(newRow);
					lastIdx++;
				}
			</script>
			<div>
				<select class='selPendidikan'>
					<option value=''>Pilih!</option>
					<option value='SD'>SD</option>
					<option value='SMP'>SMP</option>
					<option value='SMA'>SMA</option>
					<option value='D1'>D1</option>
					<option value='D2'>D2</option>
					<option value='D3'>D3</option>
					<option value='D4'>D4</option>
					<option value='S1'>S1</option>
					<option value='S2'>S2</option>
					<option value='S3'>S3</option>
					<option value='lain'>Lainnya</option>
				</select>
			<input type="text" id="pendidikan1" class='texPendidikan' /><span class="red">*</span><br />
			<div id="addPendidikan"></div>
		<a href="javascript:void(0)" onClick = "addPendidikan();">tambah pendidikan</a>
	</div>
	<!--{{ Form::textarea('pendidikan', Input::old('pendidikan')) }}--> </td>				
		</tr>
		<tr>
			<td>Profesi</td>
			<td>:</td>
			<td>
				{{ Form::select('profesi',array(
					'' => 'pilih!',
					'mahasiswa' => 'mahasiswa',
					'guru' => 'guru',
					'dosen' => 'dosen',
					'peneliti' => 'peneliti',
					'karyawan' => 'karyawan',
					'lainlain' => 'lain-lain'))
				}} <span class="red">*</span></td>								
		</tr>
		<tr>
			<td>Institusi</td>
			<td>:</td>
			<td>{{ Form::text('institusi', Input::old('institusi')) }} <span class="red">*</span></td>					
		</tr>
		<tr>
			<td>Alamat kontak</td>
			<td>:</td>
			<td>{{ Form::textarea('alamatkontak', Input::old('alamatkontak')) }} <span class="red">*</span></td>			
		</tr>
		<tr>
			<td>Kota - kodepos, negara</td>
			<td>:</td>
			<td style="width: 420px;">
			<div style="width: 600px;">
			{{ Form::text('kota', Input::old('kota'), array('class' => 'form_kota', 'style' => 'width: 170px;')) }} - 
			{{ Form::text('kodepos', Input::old('kodepos'), array('class' => 'form_kota', 'style' => 'width: 170px;')) }} , 
			{{ Form::text('negara', Input::old('negara'), array('class' => 'form_kota', 'style' => 'width: 170px;')) }} <span class="red"style="color:red; right: -134px;">*</span>
			</div></td>
		</tr>		
		<tr>
			<td>Telepon / fax</td>
			<td>:</td>
			<td>{{ Form::text('telepon', Input::old('telepon'), array('style' => 'width:50px')) }}<span class="red">*</span> - 
			{{ Form::text('telepon2', Input::old('telepon2')) }} / 
			{{ Form::text('fax', Input::old('fax')) }}</td>			
		</tr>
		<tr>
			<td>HP</td>
			<td>:</td>
			<td>{{ Form::text('hp', Input::old('hp')) }}</td>			
		</tr>
		<tr>
			<td>Surat elektronik</td>
			<td>:</td>
			<td>{{ Form::text('email', Input::old('email')) }}<span class="red">*</span></td>				
		</tr>
		<tr>
			<td>Situs</td>
			<td>:</td>
			<td>{{ Form::text('situs', Input::old('situs')) }}</td>				
		</tr>
		<tr>
			<td>Keterangan lain</td>
			<td>:</td>
			<td>{{ Form::textarea('keteranganlain', Input::old('keteranganlain')) }}</td>					
		</tr>	
	</table>
	
		
	
	<p>
		<span class="red" style="position: relative; right:0; top: 0;">*</span> ) harus diisi!
	</p>

	<hr>
	<p>
		Dengan melakukan registrasi secara <i>online</i> ini saya
		menyatakan bahwa saya telah membaca dan memahami
		{{HTML::linkRoute('ketentuan','ketentuan dan perjanjian untuk anggota')}}
		<!--<a href="ketentuan" alt="ketentuan dan perjanjian anggota">
		ketentuan dan perjanjian untuk anggota</a>-->
		,serta bersedia menyetujui segala isi dan konsekuensinya :				
	</p>
	<!-- ukuran ktp
	448x684
	226kB-->
	
	<!--
		foto 2x3
		75px x 133px		
	-->	
	
	<style>
		#tanggallahir-error, #tahunlahir-error, #bulanlahir-error {
			position:absolute;
			right:100px;
			margin-top: 10px;
		}
		
		#kota-error, #kodepos-error, #negara-error {
			position: absolute;
			width: 128px;
			right: -268px;
		}
		
		#gender-error {
			position: absolute;
			width: 128px;
			right: -138px;
		}
	</style>
	
	
	<p style="text-align:center;">
		<div style="text-align: center;" class="tempat_radio">
			{{ Form::radio('persetujuan','setuju')}}setuju    {{ Form::radio('persetujuan','tidaksetuju', true) }}tidak setuju
		</div>
	
	</p>
	<script>
		jQuery.validator.setDefaults({
		  debug: true,
		  success: "valid"
		});
		$( "form" ).validate({
			rules: {
				username : {
				  required: true
				},
				nama: {
				  required: true
				},
				password: {
				  required: true,
				  minlength: 8
				},
				password_again: {
				  required: true,
					  equalTo: "#input_password"
					
				},
				tempatlahir: {
				  required: true
				},
				tanggallahir: {
				  required: true,
					number: true
				},
				bulanlahir: {
				  required: true,
					number: true
				},
				tahunlahir: {
				  required: true,
					number: true
				},
				gender: {
				  required: true
				},
				temapenelitian: {
				  required: true
				},
				spesialisasi: {
				  required: true
				},
				pendidikan: {
				  required: true
				},
				profesi: {
				  required: true
				},
				institusi: {
				  required: true
				},
				alamatkontak: {
				  required: true
				},
				kota: {
				  required: true
				},
				kodepos: {
				  required: true
				},
				negara: {
				  required: true
				},
				telepon: {
				  required: true,
					number: true
				},
				email: {
				  required: true,
					email: true
				}
			}, messages: {
				username: {
				  required: "Mohon isi username Anda"
				},
				nama: {
				  required: "Mohon isi nama dengan lengkap"
				},
				password: {
				  required: "Mohon isi password dengan lengkap",
				  minlength: "Panjang password minimal 8 karakter"
				},
				password_again: {
				  required: "Mohon isi form dengan lengkap",
					  equalTo: "Maaf password tidak cocok"
					
				},
				tempatlahir: {
				  required: "Mohon isi tempat lahir dengan lengkap"
				},
				tanggallahir: {
				  required: "Mohon pilih tanggal lahir",
					number: "Mohon pilih tanggal lahir"
				},
				bulanlahir: {
				  required: "Mohon pilih tanggal lahir",
					number: "Mohon pilih tanggal lahir"
				},
				tahunlahir: {
				  required: "Mohon pilih tanggal lahir",
					number: "Mohon pilih tanggal lahir"
				},
				gender: {
				  required: "Pilih Jenis Kelamin"
				},
				temapenelitian: {
				  required: "Mohon isi tempat penelitian"
				},
				spesialisasi: {
				  required: "Mohon pilih spesialisasi"
				},
				pendidikan: {
				  required: "Mohon isi tempat pendidikan"
				},
				profesi: {
				  required: "Mohon pilih profesi"
				},
				institusi: {
				  required: "Mohon masukkan nama institusi"
				},
				alamatkontak: {
				  required: "Mohon tulis alaman Anda"
				},
				kota: {
				  required: "Mohon tulis kota tinggal Anda"
				},
				kodepos: {
				  required: "Mohon tulis kode pos Anda"
				},
				negara: {
				  required: "Mohon tulis negara tinggal Anda"
				},
				telepon: {
				  required: "Mohon masukkan nomer telpon",
					number: "Mohon isi form dengan angka"
				},
				email: {
				  required: "Mohon masukkan email Anda",
					email: "Mohon tulis format dengan benar"
				}
			},
			submitHandler: function(form) {
				    form.submit();
				  }
		});
	</script>
	
<link rel="stylesheet" type="text/css" href="assets/js/datetimepicker/jquery.datetimepicker.css"/ >
<script src="assets/js/datetimepicker/jquery.datetimepicker.js"></script>
		
	<script>
		jQuery('#tanggallahir').datetimepicker({
			lang:'en',
			i18n:{
				en:{
					months:[
					'January','February','March','April',
					'May','June','July','August',
					'September','October','November','December',
					],
					dayOfWeek:[
					"Sun.", "Mon", "Tue", "Wed", 
					"Thu", "Fri", "Sa.",
					]
					
				}
				},
			timepicker:false,
			format:'d.m.Y',
			yearStart: '1900'
		});
		
	</script>
	<div style="width: 100%; text-align: center;"> <!--class="de_tombol"-->
		{{ Form::submit('daftar') }}
		{{ Form::reset('Clear form') }}
		<script>
			
				// set hidden form field with selected timeslot
				 $('input[name="persetujuan"]').live("click", (function () {
					 var valu = $(this).val();
					 if(valu === 'setuju'){
						 $('.regreg').removeClass('reg_submit_off');
						 $('.regreg').addClass('reg_submit_on');
					 }else{
						 $('.regreg').addClass('reg_submit_off');
						 $('.regreg').removeClass('reg_submit_on');
					 }
					
				 })); 
				
				array('class' => 'regreg reg_submit_off')
			
		</script>
	</div>
	
	{{ Form::token() }} 
	{{ Form::close() }}
	
</div>
</div>
@stop