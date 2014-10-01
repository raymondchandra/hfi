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
			<td>{{ Form::text('username',Input::old('username'), array('id' => 'input_username', 'class' => 'wl_it')) }} <span id="username-error"></span><span class="red">*</span></td>	
			<script>
				var usernameOK = 'false';
				var ajaxACK = true;
				$("#input_username").keyup(function(){

					if($("#input_username").val() == ""){
						$("#username-error").text("");
						usernameOK = 'false';
						ajaxACK = true;
					}else{
						var url = '{{ URL::route('registrasi.checkExist') }}';
						
						var input = {
							username : $("#input_username").val()
						}
						ajaxACK = false;
						$.post(url,input, function( data ) {
							if(ajaxACK == false){
								if(data == 'ok')
								{
									$("#username-error").text("Anda dapat menggunakan username ini").css('background-color', '#88DB12');
									usernameOK = 'true';
								}else{
									$("#username-error").text("Username ini sudah terpakai").css('background-color', '#ea6153');;
									usernameOK = 'false';
								}
								
							}
							ajaxACK = true;
							
						});

					}
				});
				$(document).ready(function(){
					if($("#input_username").val() == ""){
						$("#username-error").text("");
					}else{
						var url = '{{ URL::route('registrasi.checkExist') }}';
					
						var input = {
							username : $("#input_username").val()
						}
						$.post(url,input, function( data ) {
						 	if(data == 'ok')
							{
								$("#username-error").text("Anda dapat menggunakan username ini");
							}else{
								$("#username-error").text("Username ini sudah terpakai");
							}
						});
					}
					

				});
			</script>		
		</tr>		
		<tr>
			<td><i>Password</i></td>
			<td>:</td>
			<td>{{ Form::password('password',array('id' => 'input_password', 'class' => 'wl_it'), Input::old('password')) }} <span class="red">*</span></td>			
		</tr>
		
		<tr>
			<td>Ketik Ulang <i>Password</i></td>
			<td>:</td>
			<td>{{ Form::password('password_again',array('id' => 'password_again', 'class' => 'wl_it'), Input::old('password_again')) }} <span class="red">*</span></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td>{{ Form::text('nama', Input::old('nama'),array('class' => 'wl_it')) }} <span class="red">*</span></td>			
		</tr>
		<tr>
			<td>Registrasi Cabang</td>			
			<td>:</td>
			<td>
				<!-- anggota non-aktif, HFI Cabang 	-->
				{{ Form::select('hficabang', $arr2, Input::old('hficabang'), array('style' => 'width:200px;', 'class' => 'wl_dd'))}}				
			</td>			
		</tr>
		<tr>
			<td>Tempat, tanggal lahir</td>
			<td>:</td>
			<td style="">
				<div style="width:600px;">
				{{ Form::text('tempatlahir', Input::old('tempatlahir'),array('class' => 'wl_tl')) }}<span class="red" style="right: 369px;">*</span>
			
				{{ Form::text('tanggallahir', Input::old('tanggallahir'),  array('id' => 'tanggallahir', 'style' => 'width:80px;', 'class' => 'wl_ttl')) }}
				<span class="red" style="right: 241px;">*</span>
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
					'lainlain' => 'lain-lain'), NULL, array('class'=>'wl_dd'))
				}} <span class="red">*</span></td>				
		</tr>
		
		<tr>
			<td>Pendidikan</td>
			<td>:</td>
			<td>
		<script>
				var lastIdx = 2;
				function addPendidikan(){
					if(lastIdx <=5)
					{
						var newRow = "<div id='divPendidikan"+lastIdx+"' style='margin-top: 5px;' '><select class='selPendidikan ws_dd' name='selPendidikan"+lastIdx+"'>";
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
						newRow +="<input type='text' id='pendidikan"+lastIdx+"' name='pendidikan"+lastIdx+"' class='texPendidikan' style='margin-left: 20px;'/>";
						newRow +="<input type='button' value='X' id='delPendidikan"+lastIdx+"' onClick='delPendidikan()' style='padding: 0px;'/><br /></div>";
						$('#delPendidikan'+(lastIdx-1)).hide();
						$('#addPendidikan').append(newRow);
						if(lastIdx==5){
							$('#refPendidikan').hide();
						}
						lastIdx++;
						
					}
					
				}
				function delPendidikan()
				{
					$('#divPendidikan'+(lastIdx-1)).remove();
					lastIdx--;
					$('#delPendidikan'+(lastIdx-1)).show();
					if(lastIdx==5){
						$('#refPendidikan').show();
					}
				}
			</script>
			<div>
				<select class='selPendidikan ws_dd' name='selPendidikan1' style="float: left;">
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
			<input type="text" id="pendidikan1" name="pendidikan1" class='texPendidikan' style="margin-left: 16px;"/><span class="red">*</span><br />
			<div id="addPendidikan"></div>
		<a href="javascript:void(0)" onClick = "addPendidikan();" id="refPendidikan">tambah pendidikan</a>
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
					'lainlain' => 'lain-lain'), null, array('class' => 'wl_dd'))
				}} <span class="red">*</span></td>								
		</tr>
		<tr>
			<td>Institusi</td>
			<td>:</td>
			<td>{{ Form::text('institusi', Input::old('institusi'), array('class' => 'wl_it')) }} <span class="red">*</span></td>					
		</tr>
		<tr>
			<td>Alamat kontak</td>
			<td>:</td>
			<td>{{ Form::textarea('alamatkontak', Input::old('alamatkontak')) }} <span class="red">*</span></td>			
		</tr>
		<tr>
			<td>Kota - kodepos</td>
			<td>:</td>
			<td style="">
				{{ Form::text('kota', Input::old('kota'), array('class' => 'form_kota', 'style' => 'width: 236px;')) }} 
				{{ Form::text('kodepos', Input::old('kodepos'), array('class' => 'form_kota', 'style' => 'width: 100px;')) }} 
				
			</td>
		</tr>
		<tr>
			<td>Negara</td>
			<td>:</td>
			<td style="">
				{{ Form::text('negara', Input::old('negara'), array('class' => 'form_kota wl_it')) }} <span class="red"style="color:red;">*</span>
				
			</td>
		</tr>		
		<tr>
			<td>Telepon / fax</td>
			<td>:</td>
			<td>{{-- Form::text('telepon', Input::old('telepon'), array('style' => 'width:50px')) --}}<span class="red">*</span>
			{{ Form::text('telepon2', Input::old('telepon2'), array('style' => 'width: 170px; float: left;')) }} <span style="float: left;">/</span> 
			{{ Form::text('fax', Input::old('fax'), array('style' => 'width: 164px; float: left;')) }}</td>			
		</tr>
		<tr>
			<td>HP</td>
			<td>:</td>
			<td>{{ Form::text('hp', Input::old('hp'), array('class' => 'wl_it')) }}</td>			
		</tr>
		<tr>
			<td>Surat elektronik</td>
			<td>:</td>
			<td>{{ Form::text('email', Input::old('email'), array('class' => 'wl_it')) }}<span class="red">*</span></td>				
		</tr>
		<tr>
			<td>Situs</td>
			<td>:</td>
			<td>{{ Form::text('situs', Input::old('situs'), array('class' => 'wl_it')) }}</td>				
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
			/*margin-top: 10px;*/
		}
		
		#pendidikan1-error {
		background: #ea6153;
		color: #fff;
		border-radius: 5px;
		float: right;
		}
		
		#kota-error, #kodepos-error, #negara-error {
			position: absolute;
			width: 128px;
			right: -200px;
		}
		
		#gender-error {
			position: absolute;
			width: 128px;
			right: -138px;
		}
	</style>
	
	
	<p style="text-align:center;">
		<div style="text-align: center;" class="tempat_radio">
			{{ Form::radio('persetujuan','setuju')}}setuju    
			{{ Form::radio('persetujuan','tidaksetuju', true) }}tidak setuju
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
				  required: true
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
				pendidikan1: {
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
				telepon2: {
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
				  required: "Mohon pilih tanggal lahir"
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
				pendidikan1: {
				  required: "Mohon isi tempat pendidikan"
				},
				profesi: {
				  required: "Mohon pilih profesi"
				},
				institusi: {
				  required: "Mohon masukkan nama institusi"
				},
				alamatkontak: {
				  required: "Mohon tulis alamat Anda"
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
				telepon2: {
				  required: "Mohon masukkan nomer telpon",
					number: "Mohon isi form dengan angka"
				},
				email: {
				  required: "Mohon masukkan email Anda",
					email: "Mohon tulis format dengan benar"
				}
			},
			submitHandler: function(form) {
				if (usernameOK == 'true') {
					form.submit();
				}else{
					alert("Masukkan username dengan tepat");
				}
				    
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
		{{ Form::submit('daftar', ['class' => 'regreg']) }}
		{{ Form::reset('Clear form') }}
		<script>
				$('.regreg').addClass('reg_submit_off');
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
				
				//array('class' => 'regreg reg_submit_off')
			
		</script>
	</div>
	
	{{ Form::token() }} 
	{{ Form::close() }}
	
	<style>
		#tempatlahir-error, #telepon2-error {
			float: right;
		}
		
		#username-error {
			background-color: #ea6153;
			float: right;
			line-height: 28px;
			border-radius: 5px;
		}
		
		#kodepos-error, #kota-error, #negara-error{
			width: auto !important;
		}
	</style>
	
</div>
</div>
@stop