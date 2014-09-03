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
			
				{{ Form::select('tanggallahir', array(
					'pilih' => 'pilih tanggal!',
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
					'7' => '7',
					'8' => '8',
					'9' => '9',
					'10' => '10',
					'11' => '11',
					'12' => '12',
					'13' => '13',
					'14' => '14',
					'15' => '15',
					'16' => '16',
					'17' => '17',
					'18' => '18',
					'19' => '19',
					'20' => '20',
					'21' => '21',
					'22' => '22',
					'23' => '23',
					'24' => '24',
					'25' => '25',
					'26' => '26',
					'27' => '27',
					'28' => '28',
					'29' => '29',
					'30' => '30',
					'31' => '31'),'',
						array('style' => 'width:100px; float: left; margin-top:10px;'
					))
				}}
				{{ Form::select('bulanlahir',array(
					'pilih' => 'pilih bulan!',
					'1' => 'Januari',
					'2' => 'Februari',
					'3' => 'Maret',
					'4' => 'April',
					'5' => 'Mei',
					'6' => 'Juni',
					'7' => 'Juli',
					'8' => 'Agustus',
					'9' => 'September',
					'10' => 'Oktober',
					'11' => 'November',
					'12' => 'Desember'),'',
						array('style' => 'width:100px; margin-left: 5px; float: left; margin-top:10px;'
					))
				}}
				{{ Form::select('tahunlahir', array(
					'pilih' => 'pilih tahun!',
					'2007' => '2007',
					'2006' => '2006',
					'2005' => '2005',
					'2004' => '2004',
					'2003' => '2003',
					'2002' => '2002',
					'2001' => '2001',
					'2000' => '2000',
					'1999' => '1999',
					'1998' => '1998',
					'1997' => '1997',
					'1996' => '1996',
					'1995' => '1995',
					'1994' => '1994',
					'1993' => '1993',
					'1992' => '1992',
					'1991' => '1991',
					'1990' => '1990',
					'1989' => '1989',
					'1988' => '1988',
					'1987' => '1987',
					'1986' => '1986',
					'1985' => '1985',
					'1984' => '1984',
					'1983' => '1983',
					'1982' => '1982',
					'1981' => '1981',
					'1980' => '1980',
					'1979' => '1979',
					'1978' => '1978',
					'1977' => '1977',
					'1976' => '1976',
					'1975' => '1975',
					'1974' => '1974',
					'1973' => '1973',
					'1972' => '1972',
					'1971' => '1971',
					'1970' => '1970',
					'1969' => '1969',
					'1968' => '1968',
					'1967' => '1967',
					'1966' => '1966',
					'1965' => '1965',
					'1964' => '1964',
					'1963' => '1963',
					'1962' => '1962',
					'1961' => '1961',
					'1960' => '1960',
					'1959' => '1959',
					'1958' => '1958',
					'1957' => '1957',
					'1956' => '1956',
					'1955' => '1955',
					'1954' => '1954',
					'1953' => '1953',
					'1952' => '1952',
					'1951' => '1951',
					'1950' => '1950',
					'1949' => '1949',
					'1948' => '1948',
					'1947' => '1947',
					'1946' => '1946',
					'1945' => '1945',
					'1944' => '1944',
					'1943' => '1943',
					'1942' => '1942',
					'1941' => '1941',
					'1940' => '1940',
					'1939' => '1939',
					'1938' => '1938',
					'1937' => '1937',
					'1936' => '1936',
					'1935' => '1935',
					'1934' => '1934',
					'1933' => '1933',
					'1932' => '1932',
					'1931' => '1931',
					'1930' => '1930',
					'1929' => '1929',
					'1928' => '1928',
					'1927' => '1927',
					'1926' => '1926',
					'1925' => '1925',
					'1924' => '1924',
					'1923' => '1923',
					'1922' => '1922',
					'1921' => '1921',
					'1920' => '1920',
					'1919' => '1919',
					'1918' => '1918',
					'1917' => '1917',
					'1916' => '1916',
					'1915' => '1915',
					'1914' => '1914',
					'1913' => '1913',
					'1912' => '1912',
					'1911' => '1911',
					'1910' => '1910',
					'1909' => '1909',
					'1908' => '1908',
					'1907' => '1907',
					'1906' => '1906',
					'1905' => '1905',
					'1904' => '1904',
					'1903' => '1903',
					'1902' => '1902',
					'1901' => '1901',
					'1900' => '1900'),'',
						array('style' => 'width:100px; margin-left: 5px; float: left; margin-top:10px;'
					))
				}} <span class="red" style="right: 284px; top: 35px;">*</span>
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
			<td>{{ Form::textarea('pendidikan', Input::old('pendidikan')) }} <span class="red">*</span></td>				
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