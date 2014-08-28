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
	
	{{ Form::open(array('url' => 'regis')) }}
	<form>
	<table border="0" class="form_registrasi">		
		<tr>
			<td>Username</td>
			<td>:</td>
			<td>{{ Form::text('username', Input::old('username')) }} <span class="red">*</span></td>
			<td></td>
		</tr>		
		<tr>
			<td><i>Password</i></td>
			<td>:</td>
			<td>{{ Form::password('password',array('id' => 'input_password'), Input::old('password')) }} <span class="red">*</span></td>
			<td></td>
		</tr>	
		<tr>
			<td><i>Ketik Ulang Password</i></td>
			<td>:</td>
			<td>{{ Form::password('password_again',array('id' => 'password_again'), Input::old('password_again')) }} <span class="red">*</span></td>
			<td></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td>{{ Form::text('nama', Input::old('nama')) }} <span class="red">*</span></td>
			<td></td>			
		</tr>
		<tr>
			<td>Registrasi</td>			
			<td>: </td>
			<td>
				anggota non-aktif, HFI Cabang 				
				<?php
					$length = sizeof($arr2);
					$arrCabang = array();					
					for($i=0; $i<$length; $i++){
						$arrCabang[] = $arr2[$i]['nama'];
					}
				?>
				{{ Form::select('hficabang', $arrCabang, Input::old('hficabang'))}}									
				<!--{{ Form::select('hficabang', array(
					'0' => 'pilih!',
					'aceh' => 'Aceh',
					'bali' => 'Bali',
					'bandung' => 'Bandung',
					'gorontalo' => 'Gorontalo',
					'jakarta' => 'Jakarta',
					'kalimantantenggara' => 'Kalimantan Tenggara',
					'kalimantanselatan' => 'Kalimantan Selatan',
					'lampung' => 'Lampung',
					'makassar' => 'Makassar',
					'palembang' => 'Palembang',
					'riau' => 'Riau',
					'sulawesiutara' => 'Sulawesi Utara',
					'sumaterautara' => 'Sumatera Utara',
					'sumaterabarat' => 'Sumatera Barat',
					'surabaya' => 'Surabaya',
					'timika' => 'Timika',
					'jawatengahdanyogyakarta' => 'Jawa Tengah dan Yogyakarta',
					'luarnegeri' => 'luar negeri')) 
				}}-->
			</td>
			<td></td><!--ga pake span-->		
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
			<td><span id="tempattanggallahir" style="color:red"></span></td>
		</tr>
		<tr>
			<td>Jenis kelamin</td>
			<td>:</td>
			<td>{{ Form::radio('gender','pria') }}pria    {{ Form::radio('gender','wanita') }}wanita <span class="red">*</span></td>
			<td><span id="val_jeniskelamin" style="color:red"></span></td>		
		</tr>
		<tr>
			<td>Tema penelitian	</td>
			<td>:</td>
			<td>{{ Form::textarea('temapenelitian', Input::old('temapenelitian')) }} <span class="red">*</span></td>
			<td><span id="val_temapenelitian" style="color:red"></span></td>			
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
			<td><span id="val_spesialisasi" style="color:red"></span></td>			
		</tr>
		<tr>
			<td>Pendidikan</td>
			<td>:</td>
			<td>{{ Form::textarea('pendidikan', Input::old('pendidikan')) }} <span class="red">*</span></td>
			<td><span id="val_pendidikan" style="color:red"></span></td>		
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
			<td><span id="val_profesi" style="color:red"></span></td>			
		</tr>
		<tr>
			<td>Institusi</td>
			<td>:</td>
			<td>{{ Form::text('institusi', Input::old('institusi')) }} <span class="red">*</span></td>
			<td><span id="val_institusi" style="color:red"></span></td>			
		</tr>
		<tr>
			<td>Alamat kontak</td>
			<td>:</td>
			<td>{{ Form::textarea('alamatkontak', Input::old('alamatkontak')) }} <span class="red">*</span></td>
			<td><span id="val_alamatkontak" style="color:red"></span></td>			
		</tr>
		<tr>
			<td>Kota - kodepos, negara</td>
			<td>:</td>
			<td style="width: 420px;">
			<div style="width: 600px;">
			{{ Form::text('kota', Input::old('kota'), array('class' => 'form_kota', 'style' => 'width: 170px;')) }} - 
			{{ Form::text('kodepos', Input::old('kodepos'), array('class' => 'form_kota', 'style' => 'width: 170px;')) }} , 
			{{ Form::text('negara', Input::old('negara'), array('class' => 'form_kota', 'style' => 'width: 170px;')) }} <span class="red"style="color:red; right: -134px;">*</span></td>
			</div>
			<td>
			<span id="val_kotakodeposnegara" style="color:red;"></span></td>
		</tr>		
		<tr>
			<td>Telepon / fax</td>
			<td>:</td>
			<td>{{ Form::text('telepon', Input::old('telepon'), array('style' => 'width:50px')) }}<span class="red">*</span> - 
			{{ Form::text('telepon2', Input::old('telepon2')) }} / 
			{{ Form::text('fax', Input::old('fax')) }}</td>
			<td><span id="val_teleponfax" style="color:red"></span></td>
		</tr>
		<tr>
			<td>HP</td>
			<td>:</td>
			<td>{{ Form::text('hp', Input::old('hp')) }}</td>
			<td></td><!--ga pake span-->		
		</tr>
		<tr>
			<td>Surat elektronik</td>
			<td>:</td>
			<td>{{ Form::text('email', Input::old('email')) }}<span class="red">*</span></td>
			<td></td><!--ga pake span-->		
		</tr>
		<tr>
			<td>Situs</td>
			<td>:</td>
			<td>{{ Form::text('situs', Input::old('situs')) }}</td>
			<td></td><!--ga pake span-->		
		</tr>
		<tr>
			<td>Keterangan lain</td>
			<td>:</td>
			<td>{{ Form::textarea('keteranganlain', Input::old('keteranganlain')) }}</td>
			<td></td><!--ga pake span-->		
		</tr>		
	</table>
	
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
			
		  }
		});
	</script>
	
	
	<!-- PAKE FORM HTML BIASA-->
	<!--<h1 style="text-align:center;">Anggota</h1>
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
	<p>
		Dengan melakukan registrasi secara <i>online</i> ini saya
		menyatakan bahwa saya telah membaca dan memahami
		<a href="" alt="ketentuan dan perjanjian anggota">
		ketentuan dan perjanjian untuk anggota</a>
		,serta bersedia menyetujui segala isi dan konsekuensinya :				
	</p>
	<p style="text-align:center;">
		<input id="setuju" type="radio" name="" value="setuju">setuju
		<input id="tidaksetuju" type="radio" name="" value="tidaksetuju">tidak setuju
	</p>
	<hr>
	<form id="formregistrasi" name="formregistrasi" action="" method="post" onsubmit="return validateFormRegistrasiAnggota()">
		<table border="0">
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input id="nama" type="text" name="nama" size="50"> *</td>
				<td><span id="val_nama" style="color:red"></span></td>
			</tr>
			<tr>
				<td><i>Password</i></td>
				<td>:</td>
				<td><input id="password" type="password" name="password" size="30"> *</td>
				<td><span id="val_password" style="color:red"></span></td>
			</tr>
			<tr>
				<td>Registrasi</td>
				<td>:</td>
				<td>anggota non-aktif, HFI Cabang 
					<select id="hficabang" name="hficabang">
						<option value="0" selected>pilih!</option>
						<option value="aceh">Aceh</option>
						<option value="bali">Bali</option>
						<option value="bandung">Bandung</option>
						<option value="gorontalo">Gorontalo</option>
						<option value="jakarta">Jakarta</option>
						<option value="kalimantantenggara">Kalimantan Tenggara</option>
						<option value="kalimantanselatan">Kalimantan Selatan</option>
						<option value="lampung">Lampung</option>
						<option value="makassar">Makassar</option>
						<option value="palembang">Palembang</option>
						<option value="riau">Riau</option>
						<option value="sulawesiutara">Sulawesi Utara</option>
						<option value="sumaterautara">Sumatera Utara</option>
						<option value="sumaterabarat">Sumatera Barat</option>
						<option value="surabaya">Surabaya</option>
						<option value="timika">Timika</option>
						<option value="jawatengahdanyogyakarta">Jawa Tengah dan Yogyakarta</option>
						<option value="luarnegeri">luar negeri</option>
					</select>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>Tempat, tanggal lahir</td>
				<td>:</td>
				<td><input id="tempatlahir" type="text" name="tempatlahir">, 
					<select id="tanggallahir" name="tanggallahir">
						<option value="0">pilih!</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>
					<select id="bulanlahir" name="bulanlahir">
						<option value="0">pilih!</option>
						<option value="januari">Januari</option>
						<option value="februari">Februari</option>
						<option value="maret">Maret</option>
						<option value="april">April</option>
						<option value="mei">Mei</option>
						<option value="juni">Juni</option>
						<option value="juli">Juli</option>
						<option value="agustus">Agustus</option>
						<option value="september">September</option>
						<option value="oktober">Oktober</option>
						<option value="november">November</option>
						<option value="desember">Desember</option>
					</select>
					<select id="tahunlahir" name="tahunlahir">
						<option value="0">pilih!</option>
						<option value="2007">2007</option>
						<option value="2006">2006</option>
						<option value="2005">2005</option>
						<option value="2004">2004</option>
						<option value="2003">2003</option>
						<option value="2002">2002</option>
						<option value="2001">2001</option>
						<option value="2000">2000</option>
						<option value="1999">1999</option>
						<option value="1998">1998</option>
						<option value="1997">1997</option>
						<option value="1996">1996</option>
						<option value="1995">1995</option>
						<option value="1994">1994</option>
						<option value="1993">1993</option>
						<option value="1992">1992</option>
						<option value="1991">1991</option>
						<option value="1990">1990</option>
						<option value="1989">1989</option>
						<option value="1988">1988</option>
						<option value="1987">1987</option>
						<option value="1986">1986</option>
						<option value="1985">1985</option>
						<option value="1984">1984</option>
						<option value="1983">1983</option>
						<option value="1982">1982</option>
						<option value="1981">1981</option>
						<option value="1980">1980</option>
						<option value="1979">1979</option>
						<option value="1978">1978</option>
						<option value="1977">1977</option>
						<option value="1976">1976</option>
						<option value="1975">1975</option>
						<option value="1974">1974</option>
						<option value="1973">1973</option>
						<option value="1972">1972</option>
						<option value="1971">1971</option>
						<option value="1970">1970</option>
						<option value="1969">1969</option>
						<option value="1968">1968</option>
						<option value="1967">1967</option>
						<option value="1966">1966</option>
						<option value="1965">1965</option>
						<option value="1964">1964</option>
						<option value="1963">1963</option>
						<option value="1962">1962</option>
						<option value="1961">1961</option>
						<option value="1960">1960</option>
						<option value="1959">1959</option>
						<option value="1958">1958</option>
						<option value="1957">1957</option>
						<option value="1956">1956</option>
						<option value="1955">1955</option>
						<option value="1954">1954</option>
						<option value="1953">1953</option>
						<option value="1952">1952</option>
						<option value="1951">1951</option>
						<option value="1950">1950</option>
						<option value="1949">1949</option>
						<option value="1948">1948</option>
						<option value="1947">1947</option>
						<option value="1946">1946</option>
						<option value="1945">1945</option>
						<option value="1944">1944</option>
						<option value="1943">1943</option>
						<option value="1942">1942</option>
						<option value="1941">1941</option>
						<option value="1940">1940</option>
						<option value="1939">1939</option>
						<option value="1938">1938</option>
						<option value="1937">1937</option>
						<option value="1936">1936</option>
						<option value="1935">1935</option>
						<option value="1934">1934</option>
						<option value="1933">1933</option>
						<option value="1932">1932</option>
						<option value="1931">1931</option>
						<option value="1930">1930</option>
						<option value="1929">1929</option>
						<option value="1928">1928</option>
						<option value="1927">1927</option>
						<option value="1926">1926</option>
						<option value="1925">1925</option>
						<option value="1924">1924</option>
						<option value="1923">1923</option>
						<option value="1922">1922</option>
						<option value="1921">1921</option>
						<option value="1920">1920</option>
						<option value="1919">1919</option>
						<option value="1918">1918</option>
						<option value="1917">1917</option>
						<option value="1916">1916</option>
						<option value="1915">1915</option>
						<option value="1914">1914</option>
						<option value="1913">1913</option>
						<option value="1912">1912</option>
						<option value="1911">1911</option>
						<option value="1910">1910</option>
						<option value="1909">1909</option>
						<option value="1908">1908</option>
						<option value="1907">1907</option>
						<option value="1906">1906</option>
						<option value="1905">1905</option>
						<option value="1904">1904</option>
						<option value="1903">1903</option>
						<option value="1902">1902</option>
						<option value="1901">1901</option>
						<option value="1900">1900</option>
					   </select>
				*</td>
				<td><span id="tempattanggallahir" style="color:red"></span></td>
			</tr>
			<tr>
				<td>Jenis kelamin</td>
				<td>:</td>
				<td><input id="jeniskelaminpria" type="radio" name="jeniskelaminpria" value="pria">pria
				<input id="jeniskelaminwanita" type="radio" name="jeniskelaminwanita" value="wanita">wanita *</td>
				<td><span id="val_jeniskelamin" style="color:red"></span></td>
			</tr>
			<tr>
				<td>Tema penelitian	</td>
				<td>:</td>
				<td><textarea id="temapenelitian" name="temapenelitian" rows="4" cols="50"></textarea> *</td>
				<td><span id="val_temapenelitian" style="color:red"></span></td>
			</tr>
			<tr>
				<td>Spesialisasi</td>
				<td>:</td>
				<td>
					<select id="spesialisasi" name="spesialisasi">
						<option value="0">pilih!</option>
						<option value="astro">astro</option>
						<option value="hayati">hayati</option>
						<option value="komputasi">komputasi</option>
						<option value="pendidikan">pendidikan</option>
						<option value="energi">energi</option>
						<option value="lingkungan">lingkungan</option>
						<option value="bumi">bumi</option>
						<option value="instrumentasi">instrumentasi</option>
						<option value="material">material</option>
						<option value="matematika">matematika</option>
						<option value="medis">medis</option>
						<option value="nonlinier">non-linier</option>
						<option value="nuklir">nuklir</option>
						<option value="parkikel">partikel</option>
						<option value="lainlain">lain-lain</option>
					</select> *
				</td>
				<td><span id="val_spesialisasi" style="color:red"></span></td>
			</tr>
			<tr>
				<td>Pendidikan</td>
				<td>:</td>
				<td><textarea id="pendidikan" name="pendidikan" rows="4" cols="50"></textarea> *</td>
				<td><span id="val_pendidikan" style="color:red"></span></td>
			</tr>
			<tr>
				<td>Profesi</td>
				<td>:</td>
				<td>
					<select id="profesi" name="profesi"> 
						<option value="0">pilih!</option>
						<option value="mahasiswa">mahasiswa</option>
						<option value="guru">guru</option>
						<option value="dosen">dosen</option>
						<option value="peneliti">peneliti</option>
						<option value="karyawan">karyawan</option>
						<option value="lainlain">lain-lain</option>
					</select> *
				</td>
				<td><span id="val_profesi" style="color:red"></span></td>
			</tr>
			<tr>
				<td>Institusi</td>
				<td>:</td>
				<td><input id="institusi" type="text" name="institusi" size="50"> *</td>
				<td><span id="val_institusi" style="color:red"></span></td>
			</tr>
			<tr>
				<td>Alamat kontak</td>
				<td>:</td>
				<td><textarea id="alamatkontak" name="alamatkontak" rows="4" cols="50"></textarea> *</td>
				<td><span id="val_alamatkontak" style="color:red"></span></td>
			</tr>
			<tr>
				<td>Kota - kodepos, negara</td>
				<td>:</td>
				<td><input id="kota" type="text" name="kota"> - 
				<input id="kodepos" type="number" name="kodepos" size="15">, 
				<input id="negara" type="text" name="negara" size="17"> *</td>
				<td><span id="val_kotakodeposnegara" style="color:red"></span></td>
			</tr>
			<tr>
				<td>Telepon / fax</td>
				<td>:</td>
				<td><input id="telepon" type="number" name="telepon" size="7"> - 
				<input id="telepon2" type="number" name="telepon2" size="15"> / 
				<input id="fax" type="" name="text" size="15"></td>
				<td><span id="val_teleponfax" style="color:red"></span></td>
			</tr>
			<tr>
				<td>HP</td>
				<td>:</td>
				<td><input id="hp" type="number" name="hp" size="30"></td>
				<td></td>
			</tr>
			<tr>
				<td>Surat elektronik</td>
				<td>:</td>
				<td><input id="suratelektronik" type="email" name="suratelektronik" size="40"></td>
				<td></td>
			</tr>
			<tr>
				<td>Situs</td>
				<td>:</td>
				<td><input id="situs" type="text" name="situs" size="40"></td>
				<td></td>
			</tr>
			<tr>
				<td>Keterangan lain</td>
				<td>:</td>
				<td><textarea id="keteranganlain" name="keteranganlain" rows="4" cols="50"></textarea></td>
				<td></td>
			</tr>
		</table>
		<input type="submit" value="simpan"><button>batal</button>
	</form>
	-->
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
	
	<!-- Form::open(array('action' => array('Controller@method', $user->id)))-->
	<!-- -->
	<!--{{ Form::open(array('url' => 'foo/bar')) }}-->	<!-- default post-->	
	<p style="text-align:center;">
		<div style="text-align: center;" class="tempat_radio">
			{{ Form::radio('persetujuan','setuju')}}setuju    {{ Form::radio('persetujuan','tidaksetuju', true) }}tidak setuju
		</div>
	
	</p>
		<div style="width: 100%; text-align: center;" class="de_tombol">
			{{ Form::submit('Register', array('class' => 'regreg reg_submit_off')) }}
			{{ Form::button('Batal') }}
			{{ Form::token() . Form::close() }}
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
					
				
			</script>
		</div>

	</form>

	</div>
	</div>
@stop