@extends('layouts.default')
@section('content')	
<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			<div class="side_panel_hfi">
				<div class="side_panel_hfi_background">
				<ul>
					<li>				
						{{HTML::linkRoute('profile','Profile')}}
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						{{HTML::linkRoute('carianggota','Cari Member')}}
					</li>	
					<span class="white_space">&nbsp;</span>
					<li>
						{{HTML::linkRoute('berkas','e-Berkas')}}
					</li>										
				</ul>
				</div>
			</div>
			
			<div class="content_hfi" id="contentfield">
				<div class="foto_pp_container">
					<img height="200" width="150" src={{array_get($data, 'data')->foto_profile}} alt="foto profile"/>
					<a href="javascript:void(0)" class="edit_pp" id="show_pp_editor">
						<p>Perbaharui Foto</p>
						<span class="cam">
						</span>
					</a>
					<a href="javascript:void(0)" class="edit_profile">Rubah Profile</a>
					<!--<input type="button" value="rubah profile" class="edit_profile"/>-->
					<a href="cetakkartu" target="_blank">Cetak Kartu Anggota</a>
					<a href="ubahpassword">Ubah Password</a>
				</div>
						
				<?php //echo var_dump($data['data']['tanggal_lahir']) ?>
								
				<table border="0" style="width:450px;">					
					<tr>						
						<td class="label_pp">Nama</td>
						<td>:</td>
						<td class="nama_profile">{{array_get($data, 'data')->nama}}</td>			
					</tr>
					<tr>
						<td>Nomor Anggota</td>
						<td>:</td>
						<td class="nomoranggota_profile">{{array_get($data, 'data')->id}}</td>
					</tr>						
					<tr>
						<td>Anggota Cabang</td>
						<td>:</td>
						<td class="anggotacabang_profile">{{array_get($data, 'cabang')}}</td>
					</tr>
					<tr>
						<td>Status Anggota</td>
						<td>:</td>
						<td class="statusanggota_profile">{{array_get($data, 'status_aktif')}} (s/d {{array_get($data, 'batas_aktif')}})</td>
					</tr>						
					<tr>						
						<td>Tanggal Revisi</td> <!--kl diedit harus bisa update sendiri-->
						<td>:</td>
						<td class="tanggalrevisi_profile">{{array_get($data, 'data')->tanggal_revisi}}</td>		
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td class="tempatlahir_profile">{{array_get($data, 'data')->tempat_lahir}}</td>
					</tr>					
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td class="tanggallahir_profile">{{array_get($data, 'data')->tanggal_lahir}}</td>						
					</tr>
					<tr>
						<td>Gender</td>
						<td>:</td>
						<td class="gender_profile"><?php if ($data['data']['gender'] == 1) {echo 'pria';} else {echo 'wanita';}?></td>
					</tr>
					<tr>
						<td>Tema Penelitian</td>
						<td>:</td>
						<td class="temapenelitian_profile">{{array_get($data, 'data')->tema_penelitian}}</td>
					</tr>
					<tr>
						<td>Spesialisasi</td>
						<td>:</td>
						<td class="spesialisasi_profile">{{array_get($data, 'data')->spesialisasi}}</td>
					</tr>
					<tr>
						<td>Profesi</td>
						<td>:</td>
						<td class="profesi_profile">{{array_get($data, 'data')->profesi}}</td>
					</tr>
					<tr>
						<td>Institusi</td>
						<td>:</td>
						<td class="institusi_profile">{{array_get($data, 'data')->institusi}}</td>
					</tr>
					<tr>
						<td>Pendidikan</td>
						<td>:</td>
						<td class="pendidikan_profile">{{array_get($data, 'data')->pendidikan}}</td>
					</tr>					
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td class="alamat_profile">{{array_get($data, 'data')->alamat}}</td>
					</tr>	
					<tr>
						<td>Kota</td>
						<td>:</td>
						<td class="kota_profile">{{array_get($data, 'data')->kota}}</td>
					</tr>
					<tr>
						<td>Kodepos</td>
						<td>:</td>
						<td class="kodepos_profile">{{array_get($data, 'data')->kodepos}}</td>
					</tr>
					<tr>
						<td>Negara</td>
						<td>:</td>
						<td class="negara_profile">{{array_get($data, 'data')->negara}}</td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td>:</td>
						<td class="telepon_profile">{{array_get($data, 'data')->telepon}}</td>
					</tr>
					<tr>
						<td>Fax</td>
						<td>:</td>
						<td class="fax_profile">{{array_get($data, 'data')->fax}}</td>
					</tr>
					<tr>
						<td>HP</td>
						<td>:</td>
						<td class="hp_profile">{{array_get($data, 'data')->hp}}</td>
					</tr>
					<tr>
						<td>Surat Elektronik</td>
						<td>:</td>
						<td class="suratelektronik_profile">{{array_get($data, 'data')->email}}</td>
					</tr>						
					<tr>				
						<td>Situs</td>
						<td>:</td>
						<td class="situs_profile"><a href={{array_get($data, 'siteUrl')}}>{{array_get($data, 'data')->situs}}</td>
					</tr>
					<tr>
						<td>Keterangan Lain</td>
						<td>:</td>
						<td class="keteranganlain_profile">{{array_get($data, 'data')->keterangan}}</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td class="button_edit_profile"></td>
					</tr>										
				</table>
			</div>			
		</div>
	</div>

	<div id="" class="pu_c" style="z-index:99999;position: fixed; display: none; top: 0; left: 0; width: 100%; height: 100%; background:rgba(0,0,0,0.7);">
		<div class="tableed">
			<div class="celled pu_cell" style="">
				<div class="container_12" style="position: relative;">
					<span class="close_56 pu_close" style="right: 185px;">
					</span>
					<div class="grid_6 push_3">
						
						<div class="change_pp_container">
							<div class="saran_34">
								Disarankan Anda mengunggah foto dengan dimensi 
								
								<span style="display: block; margin-left: auto; margin-right: auto; font-size: 24px;">3 X 4</span> 
								
								(Passphoto)
							</div>
							<form>
								{{ Form::file('file',array('style' => 'margin-top: 20px; display: block; margin-left: auto; margin-right: auto;')) }}
								{{ Form::submit('Unggah Gambar', array('style' => 'display: block; margin-left: auto; margin-right: auto; margin-top: 20px;')) }}
							</form>
						</div>
					
					</div>
				</div>
			</div>
		</div>
	</div>	
	
	<script type="text/javascript">
		$(document).ready(function() {
			$("#show_pp_editor").click(function() {
				$(".pu_c").fadeIn( 277, function(){}).css('display','block').css('z-index','999999');
				$("body").css('overflow-x','hidden');
			});											
		});
		
		/*external container area exit trigger*/
		 $('.pu_close').click(function(){
			 $( ".pu_c" ).fadeOut( 200, function(){});
			 $("body").css('overflow-x','visible');
		 });
		 $('.pu_c').click(function (e)
			 {
				 var container = $('.pu_cell');

				 if (container.is(e.target) )// if the target of the click is the container...
				 {
					 $( ".pu_c" ).fadeOut( 200, function(){});
					 $("body").css('overflow-x','visible');
				 }
			 });						
			 Slider = $('#slider').Swipe({   <!--swipe ke detect error-->
				 auto: 3000,  
				 continuous: true  
			 }).data('Swipe');  
		 $('.pu_c').css('display','none');
									
	</script>
			
	<script>
		//editprofile
		$(document).ready(function() {
			$('body').on('click','.edit_profile',function(){			
			//disable a href "rubah profile"
				$(this).hide();
			//function editprofile(){
				$nama_profile = $('.nama_profile').text();															
				$nomoranggota_profile = $('.nomoranggota_profile').text();									
				$anggotacabang_profile = $('.anggotacabang_profile').text();					
				$statusanggota_profile = $('.statusanggota_profile').text();				
				$tanggalrevisi_profile = $('.tanggalrevisi_profile').text();	
					$tempatlahir_profile = $('.tempatlahir_profile').text();
					$tanggallahir_profile = $('.tanggallahir_profile').text();
					$gender_profile = $('.gender_profile').text();										
				$temapenelitian_profile = $('.temapenelitian_profile').text();					
				$spesialisasi_profile = $('.spesialisasi_profile').text();					
				$profesi_profile = $('.profesi_profile').text();					
				$institusi_profile = $('.institusi_profile').text();					
				$pendidikan_profile = $('.pendidikan_profile').text();					
				$alamat_profile = $('.alamat_profile').text();		
					$kota_profile = $('.kota_profile').text();
					$kodepos_profile = $('.kodepos_profile').text();
					$negara_profile = $('.negara_profile').text();
				$telepon_profile = $('.telepon_profile').text();	
					$fax_profile =  $('.fax_profile').text();
				$hp_profile = $('.hp_profile').text();					
				$suratelektronik_profile = $('.suratelektronik_profile').text();					
				$situs_profile = $('.situs_profile').text();					
				$keteranganlain_profile = $('.keteranganlain_profile').text();					
				//change ke input type
				$('.nama_profile').html("<input type='text' id='up_nama_profile' value='"+$nama_profile+"' />");								
				$('.nomoranggota_profile').html("<p id='up_nomoranggota_profile'>"+$nomoranggota_profile+"</p>");
				//before namacabang //$('.anggotacabang_profile').html("<select id='up_anggotacabang_profile'><option value='"+$anggotacabang_profile+"'selected>"+$anggotacabang_profile+"</option><option value='aceh'>Aceh</option><option value='bali'>Bali</option><option value='bandung'>Bandung</option><option value='gorontalo'>Gorontalo</option><option value='jakarta'>Jakarta</option><option value='kalimantantenggara'>Kalimantan Tenggara</option><option value='kalimantanselatan'>Kalimantan Selatan</option><option value='lampung'>Lampung</option><option value='makassar'>Makassar</option><option value='palembang'>Palembang</option><option value='riau'>Riau</option><option value='sulawesiutara'>Sulawesi Utara</option><option value='sumaterautara'>Sumatera Utara</option><option value='sumaterabarat'>Sumatera Barat</option><option value='surabaya'>Surabaya</option><option value='timika'>Timika</option><option value='jawatengahdanyogyakarta'>Jawa Tengah dan Yogyakarta</option><option value='luarnegeri'>luar negeri</option></select>");									
				//before namacabang //$('.anggotacabang_profile').html("<select id='up_anggotacabang_profile'><option value='(kosong)'selected>pilih!</option><option value='aceh'>Aceh</option><option value='bali'>Bali</option><option value='bandung'>Bandung</option><option value='gorontalo'>Gorontalo</option><option value='jakarta'>Jakarta</option><option value='kalimantantenggara'>Kalimantan Tenggara</option><option value='kalimantanselatan'>Kalimantan Selatan</option><option value='lampung'>Lampung</option><option value='makassar'>Makassar</option><option value='palembang'>Palembang</option><option value='riau'>Riau</option><option value='sulawesiutara'>Sulawesi Utara</option><option value='sumaterautara'>Sumatera Utara</option><option value='sumaterabarat'>Sumatera Barat</option><option value='surabaya'>Surabaya</option><option value='timika'>Timika</option><option value='jawatengahdanyogyakarta'>Jawa Tengah dan Yogyakarta</option><option value='luarnegeri'>luar negeri</option></select>");
				$('.anggotacabang_profile').html("<select id='up_anggotacabang_profile'><?php foreach($listcabang as $value => $text){ ?> <option value='<?php echo $value; ?>' <?php if ($data['cabang'] == $value) {echo 'selected';}?> > <?php echo $text; ?></option><?php } ?> </select>");				
				$('.statusanggota_profile').html("<p id='up_statusanggota_profile'>"+$statusanggota_profile+"</p>");			
				$('.tanggalrevisi_profile').html("<p id='up_tanggalrevisi_profile'>"+$tanggalrevisi_profile+"</p>");
					$('.tempatlahir_profile').html("<input type='text' id='up_tempatlahir_profile' value='"+$tempatlahir_profile+"' />");
					<?php //parsing isi tanggal
						$temp_tanggallahir = $data['data']['tanggal_lahir'];
						$temp_tahun = substr($temp_tanggallahir, 0, 3);
						$temp_bulan = substr($temp_tanggallahir, -5, 2);
						$temp_tanggal = substr($temp_tanggallahir, 8, 10);							
						//tanggal
						$tanggal = array(
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
							'31' => '31'
						);
						//bulan
						$bulan = array(
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
							'12' => 'Desember'
						);
						//tahun
						$tahun = array(
							'2014' => '2014',
							'2013' => '2013',
							'2012' => '2012',
							'2011' => '2011',
							'2010' => '2010',
							'2009' => '2009',
							'2008' => '2008',
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
							'1900' => '1900'
						);						
					?>
					$('.tanggallahir_profile').html("<select id='up_tanggallahir_profile' style='width:40px; margin-right:10px;'><?php foreach ($tanggal as $value => $text){?><option value='<?php echo $value; ?>'<?php if($temp_tanggal==$value) {echo 'selected';} ?> ><?php echo $text;?></option> <?php }?></select><select id='up_bulanlahir_profile' style='width:90px; margin-right:10px;'><?php foreach ($bulan as $value => $text){?><option value='<?php echo $value; ?>'<?php if($temp_bulan==$value) {echo 'selected';} ?> ><?php echo $text;?></option> <?php }?></select><select id='up_tahunlahir_profile' style='width:60px;'><?php foreach ($tahun as $value => $text){?><option value='<?php echo $value; ?>'<?php if($temp_tahun==$value) {echo 'selected';} ?> ><?php echo $text;?></option> <?php }?></select>");
					$('.gender_profile').html("<input id='up_genderpria_profile' type='radio' name='gender' value='1' <?php if($data['data']['gender']==1) {echo 'checked';}?>>pria<input id='up_genderwanita_profile' type='radio' name='gender' value='0'<?php if($data['data']['gender']==0) {echo 'checked';}?>>wanita");
				$('.temapenelitian_profile').html("<textarea id='up_temapenelitian_profile' style='width:300px; height:70px;'>"+$temapenelitian_profile+"</textarea>");				
					//list spesialisasi
					<?php $listspesialisasi = array(							
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
							'partikel' => 'partikel',
							'lainlain' => 'lain-lain'
							); ?>										
				//before spesialisasi //$('.spesialisasi_profile').html("<select id='up_spesialisasi_profile'><option value='(kosong)'></option><option value='astro'>astro</option><option value='hayati'>hayati</option><option value='komputasi'>komputasi</option><option value='pendidikan'>pendidikan</option><option value='energi'>energi</option><option value='lingkungan'>lingkungan</option><option value='bumi'>bumi</option><option value='instrumentasi'>instrumentasi</option><option value='material'>material</option><option value='matematika'>matematika</option><option value='medis'>medis</option><option value='nonlinier'>non-linier</option><option value='nuklir'>nuklir</option><option value='parkikel'>partikel</option><option value='lainlain'>lain-lain</option></select>");
				$('.spesialisasi_profile').html("<select id='up_spesialisasi_profile'><?php foreach($listspesialisasi as $value => $text){ ?><option value='<?php echo $value;?>' <?php if($data['data']['spesialisasi'] == $value){echo 'selected';} ?> > <?php echo $text; ?> </option> <?php } ?></select>");
					<?php $listprofesi = array(							
							'mahasiswa' => 'mahasiswa',
							'guru' => 'guru',
							'dosen' => 'dosen',
							'peneliti' => 'peneliti',
							'karyawan' => 'karyawan',
							'lainlain' => 'lain-lain'
							); ?>
				//$('.profesi_profile').html("<select id='up_profesi_profile'><option value='(kosong)'>pilih!</option><option value='mahasiswa'>mahasiswa</option><option value='guru'>guru</option><option value='dosen'>dosen</option><option value='peneliti'>peneliti</option><option value='karyawan'>karyawan</option><option value='lainlain'>lain-lain</option></select>");
				$('.profesi_profile').html("<select id='up_profesi_profile'><?php foreach($listprofesi as $value => $text){ ?><option value='<?php echo $value; ?>' <?php if($data['data']['profesi']==$value) {echo 'selected';}?>> <?php echo $text; ?> </option> <?php } ?> </select>");
				$('.institusi_profile').html("<input id='up_institusi_profile' type='text' value='"+$institusi_profile+"'/>");
				$('.pendidikan_profile').html("<textarea id='up_pendidikan_profile' style='width:300px; height:70px;'>"+$pendidikan_profile+"</textarea>");
				$('.alamat_profile').html("<textarea id='up_alamat_profile' style='width:300px; height:70px;'>"+$alamat_profile+"</textarea>");
					$('.kota_profile').html("<input id='up_kota_profile' type='text' value='"+$kota_profile+"'/>");
					$('.kodepos_profile').html("<input id='up_kodepos_profile' type='text' value='"+$kodepos_profile+"'/>");
					$('.negara_profile').html("<input id='up_negara_profile' type='text' value='"+$negara_profile+"'/>");
				$('.telepon_profile').html("<input id='up_telepon_profile' type='text' value='"+$telepon_profile+"'/>");
					$('.fax_profile').html("<input id='up_fax_profile' type='text' value='"+$fax_profile+"'/>");
				$('.hp_profile').html("<input id='up_hp_profile' type='text' value='"+$hp_profile+"'/>");
				$('.suratelektronik_profile').html("<input id='up_suratelektronik_profile' type='text' value='"+$suratelektronik_profile+"'/>");
				$('.situs_profile').html("<input id='up_situs_profile' type='text' value='"+$situs_profile+"' />");
				$('.keteranganlain_profile').html("<textarea id='up_keteranganlain_profile' style='width:300px; height:70px;'>"+$keteranganlain_profile+"</textarea>");																
				$('.button_edit_profile').html("<input type='button' value='Simpan Perubahan' class='ok_edit_profile' />");						
			});			
			
			//edit_profile (save edit)
			$('body').on('click','.ok_edit_profile',function(){
				//enable a href "rubah profile"
					$('.edit_profile').show();
				$nama_profile = $('#up_nama_profile').val();					
				$nomoranggota_profile = $('#up_nomoranggota_profile').text();					
				$anggotacabang_profile = $('#up_anggotacabang_profile').val();								
				$statusanggota_profile = $('#up_statusanggota_profile').text();						
				$tanggalrevisi_profile = $('#up_tanggalrevisi_profile').text();	
					$tempatlahir_profile = $('#up_tempatlahir_profile').val();					
					$tanggallahir_profile = $('#up_tahunlahir_profile').val()+"-"+$('#up_bulanlahir_profile').val()+"-"+$('#up_tanggallahir_profile').val();
					if($('#up_genderpria_profile').is(':checked')){
						$gender_profile = $('#up_genderpria_profile').val();
						var temp_gender = "pria";
					}else if($('#up_genderwanita_profile').is(':checked')){
						$gender_profile = $('#up_genderwanita_profile').val();
						var temp_gender =  "wanita";
					};							
				$temapenelitian_profile = $('#up_temapenelitian_profile').val();
				$spesialisasi_profile = $('#up_spesialisasi_profile').val();
				$profesi_profile = $('#up_profesi_profile').val();
				$institusi_profile = $('#up_institusi_profile').val();
				$pendidikan_profile = $('#up_pendidikan_profile').val();
				$alamat_profile = $('#up_alamat_profile').val();
					$kota_profile = $('#up_kota_profile').val();
					$kodepos_profile = $('#up_kodepos_profile').val();
					$negara_profile = $('#up_negara_profile').val();
				$telepon_profile = $('#up_telepon_profile').val();
					$fax_profile = $('#up_fax_profile').val();
				$hp_profile = $('#up_hp_profile').val();
				$suratelektronik_profile = $('#up_suratelektronik_profile').val();
				$situs_profile = $('#up_situs_profile').val();
				$keteranganlain_profile = $('#up_keteranganlain_profile').val();				
				//updated preview profile
				$('.nama_profile').html($nama_profile);				
				$('.nomoranggota_profile').html($nomoranggota_profile);					
				$('.anggotacabang_profile').html($anggotacabang_profile);	
				$('.statusanggota_profile').html($statusanggota_profile);
				$('.tanggalrevisi_profile').html($tanggalrevisi_profile);
					$('.tempatlahir_profile').html($tempatlahir_profile);
					$('.tanggallahir_profile').html($tanggallahir_profile);					
					$('.gender_profile').html(temp_gender);					
				$('.temapenelitian_profile').html($temapenelitian_profile);				
				$('.spesialisasi_profile').html($spesialisasi_profile);
				$('.profesi_profile').html($profesi_profile);
				$('.institusi_profile').html($institusi_profile);
				$('.pendidikan_profile').html($pendidikan_profile);
				$('.alamat_profile').html($alamat_profile);
					$('.kota_profile').html($kota_profile);
					$('.kodepos_profile').html($kodepos_profile);
					$('.negara_profile').html($negara_profile);
				$('.telepon_profile').html($telepon_profile);
					$('.fax_profile').html($fax_profile);
				$('.hp_profile').html($hp_profile);
				$('.suratelektronik_profile').html($suratelektronik_profile);
				$('.situs_profile').html($situs_profile);
				$('.keteranganlain_profile').html($keteranganlain_profile);																
				$('.button_edit_profile').html("");	
				//update to database using ajax
					//$data['data']['id']
			});
		});
	</script>
</div>
@stop