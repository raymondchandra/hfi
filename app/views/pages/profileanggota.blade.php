@extends('layouts.default')
@section('content')	

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
					<a href="#">Rubah Profil</a>
					<a href="#">Cetak Kartu Anggota</a>
				</div>
				
				<table border="0">
					<tr>
						<td class="label_pp">Nama</td>
						<td>:</td>
						<td>{{array_get($data, 'data')->nama}}</td>			
					</tr>
					<tr>
						<td>Nomor Anggota</td>
						<td>:</td>
						<td>{{array_get($data, 'data')->id}}</td>
					</tr>
						<!-- tambahan dari design gredy, yg blom ada di profile-->
						<tr>
							<td>Anggota Cabang</td>
							<td>:</td>
							<td>{{array_get($data, 'cabang')}}</td>
						</tr>
						<tr>
							<td>Status Anggota</td>
							<td>:</td>
							<td>{{array_get($data, 'status_aktif')}} (s/d {{array_get($data, 'data')->batas_aktif}})</td>
						</tr>
						<!-- end tambahan dari design gredy, yg blom ada di profile-->
					<tr>
						<td>Tanggal Revisi</td>
						<td>:</td>
						<td>{{array_get($data, 'data')->revisi}}</td>		
					</tr>												
					<tr>
						<td>Tema Penelitian</td>
						<td>:</td>
						<td>{{array_get($data, 'data')->penelitian}}</td>
					</tr>
					<tr>
						<td>Spesialisasi</td>
						<td>:</td>
						<td>{{array_get($data, 'data')->spesialisasi}}</td>
					</tr>
					<tr>
						<td>Profesi</td>
						<td>:</td>
						<td>{{array_get($data, 'data')->profesi}}</td>
					</tr>
					<tr>
						<td>Institusi</td>
						<td>:</td>
						<td>{{array_get($data, 'data')->institusi}}</td>
					</tr>
					<tr>
						<td>Pendidikan</td>
						<td>:</td>
						<td>{{array_get($data, 'data')->pendidikan}}</td>
					</tr>
						<!-- tambahan dari design gredy, yg blom ada di profile-->
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>{{array_get($data, 'data')->alamat}}</td>
						</tr>
						<!-- end tambahan dari design gredy, yg blom ada di profile-->
					<tr>
						<td>Kontak</td>
						<td>:</td>
						<td></td>
					</tr>
						<!-- tambahan dari design gredy, yg blom ada di profile-->
						<tr>
							<td>Telepon</td>
							<td>:</td>
							<td>{{array_get($data, 'data')->telepon}}</td>
						</tr>
						<tr>
							<td>HP</td>
							<td>:</td>
							<td>{{array_get($data, 'data')->hp}}</td>
						</tr>
						<tr>
							<td>Surat Elektronik</td>
							<td>:</td>
							<td>{{array_get($data, 'data')->email}}</td>
						</tr>
						<!-- end tambahan dari design gredy, yg blom ada di profile-->
					<tr>				
						<td>Situs</td>
						<td>:</td>
						<td><a href={{array_get($data, 'siteUrl')}}>{{array_get($data, 'data')->situs}}</td>
					</tr>
					<tr>
						<td>Keterangan Lain</td>
						<td>:</td>
						<td>{{array_get($data, 'data')->keterangan}}</td>
					</tr>
				</table>
			</div>			
		</div>
	</div>

	<div id="" class="pu_c" style="z-index:99999;position: fixed; display: none; top: 0; left: 0; width: 100%; height: 100%; background:rgba(0,0,0,0.7);">
		<div class="tableed">
			<div class="celled pu_cell" style="">
				<div class="container_12">
					<div class="grid_12">
					
						<div class="change_pp_container">
							Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
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
			Slider = $('#slider').Swipe({  
				auto: 3000,  
				continuous: true  
			}).data('Swipe');  
		$('.pu_c').css('display','none');
	</script>
@stop