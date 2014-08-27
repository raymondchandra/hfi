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
					<a href="#">Cetak Kartu Anggota</a>
				</div>
				
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
						<td>Telepon</td>
						<td>:</td>
						<td class="telepon_profile">{{array_get($data, 'data')->telepon}}</td>
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
		// $('.pu_close').click(function(){
			// $( ".pu_c" ).fadeOut( 200, function(){});
			// $("body").css('overflow-x','visible');
		// });
		// $('.pu_c').click(function (e)
			// {
				// var container = $('.pu_cell');

				// if (container.is(e.target) )// if the target of the click is the container...
				// {
					// $( ".pu_c" ).fadeOut( 200, function(){});
					// $("body").css('overflow-x','visible');
				// }
			// });						
			// Slider = $('#slider').Swipe({   <!--swipe ke detect error-->
				// auto: 3000,  
				// continuous: true  
			// }).data('Swipe');  
		// $('.pu_c').css('display','none');
									
	</script>
			
	<script>
		//editprofile
		$(document).ready(function() {
			$('body').on('click','.edit_profile',function(){
			//function editprofile(){
				$nama_profile = $('.nama_profile').text();															
				$nomoranggota_profile = $('.nomoranggota_profile').text();									
				$anggotacabang_profile = $('.anggotacabang_profile').text();					
				$statusanggota_profile = $('.statusanggota_profile').text();				
				$tanggalrevisi_profile = $('.tanggalrevisi_profile').text();					
				$temapenelitian_profile = $('.temapenelitian_profile').text();					
				$spesialisasi_profile = $('.spesialisasi_profile').text();					
				$profesi_profile = $('.profesi_profile').text();					
				$institusi_profile = $('.institusi_profile').text();					
				$pendidikan_profile = $('.pendidikan_profile').text();					
				$alamat_profile = $('.alamat_profile').text();								
				$telepon_profile = $('.telepon_profile').text();					
				$hp_profile = $('.hp_profile').text();					
				$suratelektronik_profile = $('.suratelektronik_profile').text();					
				$situs_profile = $('.situs_profile').text();					
				$keteranganlain_profile = $('.keteranganlain_profile').text();					
				//change ke input type
				$('.nama_profile').html("<input type='text' id='up_nama_profile' value='"+$nama_profile+"' />");								
				$('.nomoranggota_profile').html("<p id='up_nomoranggota_profile'>"+$nomoranggota_profile+"</p>");
				$('.anggotacabang_profile').html("<select id='up_anggotacabang_profile'><option value='0' selected>pilih!</option><option value='aceh'>Aceh</option><option value='bali'>Bali</option><option value='bandung'>Bandung</option><option value='gorontalo'>Gorontalo</option><option value='jakarta'>Jakarta</option><option value='kalimantantenggara'>Kalimantan Tenggara</option><option value='kalimantanselatan'>Kalimantan Selatan</option><option value='lampung'>Lampung</option><option value='makassar'>Makassar</option><option value='palembang'>Palembang</option><option value='riau'>Riau</option><option value='sulawesiutara'>Sulawesi Utara</option><option value='sumaterautara'>Sumatera Utara</option><option value='sumaterabarat'>Sumatera Barat</option><option value='surabaya'>Surabaya</option><option value='timika'>Timika</option><option value='jawatengahdanyogyakarta'>Jawa Tengah dan Yogyakarta</option><option value='luarnegeri'>luar negeri</option></select>");									
				$('.statusanggota_profile').html("<p id='up_statusanggota_profile'>"+$statusanggota_profile+"</p>");			
				$('.tanggalrevisi_profile').html("<p id='up_tanggalrevisi_profile'>"+$tanggalrevisi_profile+"</p>");
				$('.temapenelitian_profile').html("<textarea id='up_temapenelitian_profile' style='width:300px; height:70px;'>"+$temapenelitian_profile+"</textarea>");				
				$('.spesialisasi_profile').html("<select id='up_spesialisasi_profile'><option value='0'>pilih!</option><option value='astro'>astro</option><option value='hayati'>hayati</option><option value='komputasi'>komputasi</option><option value='pendidikan'>pendidikan</option><option value='energi'>energi</option><option value='lingkungan'>lingkungan</option><option value='bumi'>bumi</option><option value='instrumentasi'>instrumentasi</option><option value='material'>material</option><option value='matematika'>matematika</option><option value='medis'>medis</option><option value='nonlinier'>non-linier</option><option value='nuklir'>nuklir</option><option value='parkikel'>partikel</option><option value='lainlain'>lain-lain</option></select>");
				$('.profesi_profile').html("<select id='up_profesi_profile'><option value='0'>pilih!</option><option value='mahasiswa'>mahasiswa</option><option value='guru'>guru</option><option value='dosen'>dosen</option><option value='peneliti'>peneliti</option><option value='karyawan'>karyawan</option><option value='lainlain'>lain-lain</option></select>");
				$('.institusi_profile').html("<input id='up_institusi_profile' type='text' value='"+$institusi_profile+"'/>");
				$('.pendidikan_profile').html("<textarea id='up_pendidikan_profile' style='width:300px; height:70px;'>"+$pendidikan_profile+"</textarea>");
				$('.alamat_profile').html("<textarea id='up_alamat_profile' style='width:300px; height:70px;'>"+$alamat_profile+"</textarea>");
				$('.telepon_profile').html("<input id='up_telepon_profile' type='text' value='"+$telepon_profile+"'/>");
				$('.hp_profile').html("<input id='up_hp_profile' type='text' value='"+$hp_profile+"'/>");
				$('.suratelektronik_profile').html("<input id='up_suratelektronik_profile' type='text' value='"+$suratelektronik_profile+"'/>");
				$('.situs_profile').html("<input id='up_situs_profile' type='text' value='"+$situs_profile+"' />");
				$('.keteranganlain_profile').html("<textarea id='up_keteranganlain_profile' style='width:300px; height:70px;'>"+$keteranganlain_profile+"</textarea>");																
				$('.button_edit_profile').html("<input type='button' value='Simpan Perubahan' class='ok_edit_profile' />");						
			});			
			//edit_profile (save edit)
			$('body').on('click','.ok_edit_profile',function(){
				$nama_profile = $('#up_nama_profile').val();					
				$nomoranggota_profile = $('#up_nomoranggota_profile').text();					
				$anggotacabang_profile = $('#up_anggotacabang_profile').val();						
				$statusanggota_profile = $('#up_statusanggota_profile').text();						
				$tanggalrevisi_profile = $('#up_tanggalrevisi_profile').text();
				$temapenelitian_profile = $('#up_temapenelitian_profile').val();
				$spesialisasi_profile = $('#up_spesialisasi_profile').val();
				$profesi_profile = $('#up_profesi_profile').val();
				$institusi_profile = $('#up_institusi_profile').val();
				$pendidikan_profile = $('#up_pendidikan_profile').val();
				$alamat_profile = $('#up_alamat_profile').val();
				$telepon_profile = $('#up_telepon_profile').val();
				$hp_profile = $('#up_hp_profile').val();
				$suratelektronik_profile = $('#up_suratelektronik_profile').val();
				$situs_profile = $('#up_situs_profile').val();
				$keteranganlain_profile = $('#up_keteranganlain_profile').val();				
				//updated
				$('.nama_profile').html($nama_profile);				
				$('.nomoranggota_profile').html($nomoranggota_profile);					
				$('.anggotacabang_profile').html($anggotacabang_profile);	
				$('.statusanggota_profile').html($statusanggota_profile);
				$('.tanggalrevisi_profile').html($tanggalrevisi_profile);
				$('.temapenelitian_profile').html($temapenelitian_profile);				
				$('.spesialisasi_profile').html($spesialisasi_profile);
				$('.profesi_profile').html($profesi_profile);
				$('.institusi_profile').html($institusi_profile);
				$('.pendidikan_profile').html($pendidikan_profile);
				$('.alamat_profile').html($alamat_profile);
				$('.telepon_profile').html($telepon_profile);
				$('.hp_profile').html($hp_profile);
				$('.suratelektronik_profile').html($suratelektronik_profile);
				$('.situs_profile').html($situs_profile);
				$('.keteranganlain_profile').html($keteranganlain_profile);																
				$('.button_edit_profile').html("");			
			});
		});
	</script>
</div>
@stop