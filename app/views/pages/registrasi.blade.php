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
	
	{{ Form::open(array('url' => '/regis', 'class'=>'form-horizontal', 'role'=>'form' )) }}
	
	<!-- <table border="0" class="form_registrasi"> -->
		<style>
			
		</style>
		<div class="form-group">
			<label class=" control-label col-sm-3">Username<span class="red">*</span></label>
			{{ Form::text('username',Input::old('username'), array('id' => 'input_username', 'class' => 'form-control col-sm-5')) }}
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
		</div>	
		<div class="form-group">
			<label class=" control-label col-sm-3">Password<span class="red">*</span></label>
			{{ Form::password('password',array('id' => 'input_password', 'class' => 'form-control col-sm-5'), Input::old('password')) }} 
		</div>
		<div class="form-group">
			<label class=" control-label col-sm-3">Ketik Ulang Password<span class="red">*</span></label>
			{{ Form::password('password_again',array('id' => 'password_again', 'class' => 'form-control col-sm-5'), Input::old('password_again')) }}
		</div>
		<div class="form-group">
			<label class=" control-label col-sm-3">Nama<span class="red">*</span></label>
			{{ Form::text('nama', Input::old('nama'),array('class' => 'form-control col-sm-5')) }}
		</div>
		<div class="form-group">
			<label class=" control-label col-sm-3">Registrasi Cabang</label>
			{{ Form::select('hficabang', $arr2, Input::old('hficabang'), array('class' => 'form-control col-sm-5'))}}	
		</div>
		<div class="form-group">
			<label class=" control-label col-sm-3">Tempat Lahir<span class="red">*</span></label>
			{{ Form::text('tempatlahir', Input::old('tempatlahir'),array('class' => 'form-control col-sm-5')) }}
		</div>
		<div class="form-group">
			<label class=" control-label col-sm-3">Tanggal Lahir<span class="red">*</span></label>
			{{ Form::text('tanggallahir', Input::old('tanggallahir'),  array('id' => 'tanggallahir', 'class' => 'form-control col-sm-2')) }}
		</div>
		<div class="form-group">
			<label class=" control-label col-sm-3">Jenis kelamin<span class="red">*</span></label>
			<label class="radio-inline">
			{{ Form::radio('gender','pria') }}pria    
			</label>
			<label class="radio-inline">
			{{ Form::radio('gender','wanita') }}wanita
			</label>
		</div>
		<div class="form-group">
			<label class=" control-label col-sm-3">Tema Penelitian<span class="red">*</span></label>
			{{ Form::textarea('temapenelitian', Input::old('temapenelitian'), array('class'=>'form-control col-sm-5')) }}
		</div>
		<div class="form-group">
			<label class=" control-label col-sm-3">Spesialisasi<span class="red">*</span></label>
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
					'lainlain' => 'lain-lain'), NULL, array('class'=>'form-control col-sm-5'))
				}}
		</div>
		
		<div class="form-group">
			<label class=" control-label col-sm-3">Pendidikan<span class="red">*</span></label>
			<script>
				var lastIdx = 2;
				function addPendidikan(){
					if(lastIdx <=5)
					{
						var newRow = "<div class='clearfix'></div>";
						newRow += "<div id='divPendidikan"+lastIdx+"' style='margin-top: 5px;' '><select class='selPendidikan form-control col-sm-1 col-sm-push-3' name='selPendidikan"+lastIdx+"'>";
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
						newRow +="<input type='text' id='pendidikan"+lastIdx+"' name='pendidikan"+lastIdx+"' class='texPendidikan form-control col-sm-3 col-sm-push-3' />";
						newRow +="<span value='' id='delPendidikan"+lastIdx+"' onClick='delPendidikan()' style='padding: 0px; width: 34px; line-height: 34px; margin-left:10px;' class='glyphicon glyphicon-remove form-control col-sm-push-3 btn btn-danger'></span><br /></div>";
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
				<select class='selPendidikan form-control col-sm-1' name='selPendidikan1'>
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
				<input type="text" id="pendidikan1" name="pendidikan1" class='texPendidikan form-control col-sm-3' style=""/>
				
				<a href="javascript:void(0)" onClick = "addPendidikan();" id="refPendidikan" class="glyphicon glyphicon-plus btn btn-primary" style="padding: 0px;width: 34px; line-height: 34px; margin-left:10px;"></a>
			
			<div id="addPendidikan"></div>
		</div>		
		
		
		<div class="form-group">
			<label class=" control-label col-sm-3">Profesi<span class="red">*</span></label>
			{{ Form::select('profesi',array(
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
			<label class=" control-label col-sm-3">Institusi<span class="red">*</span></label>
			{{ Form::text('institusi', Input::old('institusi'), array('class' => 'form-control col-sm-5')) }} 
		</div>
		
		<div class="form-group">
			<label class=" control-label col-sm-3">Alamat Kontak<span class="red">*</span></label>
			{{ Form::textarea('alamatkontak', Input::old('alamatkontak'), array('class' => 'form-control col-sm-5')) }}
		</div>
		<div class="form-group">
			<label class=" control-label col-sm-3">Kota<span class="red">*</span></label>
			{{ Form::text('kota', Input::old('kota'), array('class' => 'form_kota form-control col-sm-5')) }} 
		</div>
		<div class="form-group">
			<label class=" control-label col-sm-3">Kodepos<span class="red">*</span></label>
			{{ Form::text('kodepos', Input::old('kodepos'), array('class' => 'form_kota form-control col-sm-5')) }} 
		</div>
		<div class="form-group">
			<label class=" control-label col-sm-3">Negara<span class="red">*</span></label>
			{{ Form::text('negara', Input::old('negara'), array('class' => 'form_kota form-control col-sm-5')) }}
		</div>
		
		<div class="form-group">
			<label class=" control-label col-sm-3">Telepon<span class="red">*</span></label>
			{{ Form::text('telepon2', Input::old('telepon2'), array('class'=>'form_kota form-control col-sm-5')) }}
		</div>
		<div class="form-group">
			<label class=" control-label col-sm-3">Fax</label>
			{{ Form::text('fax', Input::old('fax'), array('class'=>'form_kota form-control col-sm-5')) }}
		</div>
		<div class="form-group">
			<label class=" control-label col-sm-3">HP</label>
			{{ Form::text('hp', Input::old('hp'), array('class' => 'form_kota form-control col-sm-5')) }}
		</div>
		
		
		<div class="form-group">
			<label class=" control-label col-sm-3">Surat Elektronik<span class="red">*</span></label>
			{{ Form::text('email', Input::old('email'), array('class' => 'form-control col-sm-5')) }}
		</div>
		
		<div class="form-group">
			<label class=" control-label col-sm-3">Situs</label>
			{{ Form::text('situs', Input::old('situs'), array('class' => 'form-control col-sm-5')) }}
		</div>
		
		
		<div class="form-group">
			<label class=" control-label col-sm-3">Keterangan Lain<span class="red">*</span></label>
			{{ Form::textarea('keteranganlain', Input::old('keteranganlain'), array('class'=>'form-control col-sm-5')) }}
		</div>
		
	<!-- </table> -->
	
		
	
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
		{{ Form::submit('Daftar', ['class' => 'regreg']) }}
		{{ Form::reset('Hapus Form') }}
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
	/*	#tempatlahir-error, #telepon2-error {
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
		}*/
	</style>
	
</div>
</div>




@stop