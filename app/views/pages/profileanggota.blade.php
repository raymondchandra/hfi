@extends('layouts.default')
@section('content')	
<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			<div class="side_panel_hfi">
				<div class="side_panel_hfi_background">
				<ul>
					<li>				
						<a href="profile">Profile</a> 				
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="carianggota">Cari Member</a>
					</li>	
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="#">e-Berkas</a>
					</li>										
				</ul>
				</div>
			</div>
			
			<div class="content_hfi" id="contentfield">
				<div class="foto_pp_container">
					<img height="200" width="150" src={{head($data)->foto_profile}} alt="foto profile"/>
					<a href="#">Rubah Profil</a>
					<a href="#">Cetak Kartu Anggota</a>
				</div>
				
				<table border="0">
					<tr>
						<td class="label_pp">Nama</td>
						<td>:</td>
						<td>{{head($data)->nama}}</td>			
					</tr>
					<tr>
						<td>Nomor Anggota</td>
						<td>:</td>
						<td>{{head($data)->id}}</td>
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
							<td>{{array_get($data, 'status_aktif')}} (s/d {{array_get($data, 'batas_aktif')}})</td>
						</tr>
						<!-- end tambahan dari design gredy, yg blom ada di profile-->
					<tr>
						<td>Tanggal Revisi</td>
						<td>:</td>
						<td>{{head($data)->tanggal_revisi}}</td>		
					</tr>												
					<tr>
						<td>Tema Penelitian</td>
						<td>:</td>
						<td>{{head($data)->tema_penelitian}}</td>
					</tr>
					<tr>
						<td>Spesialisasi</td>
						<td>:</td>
						<td>{{head($data)->spesialisasi}}</td>
					</tr>
					<tr>
						<td>Profesi</td>
						<td>:</td>
						<td>{{head($data)->profesi}}</td>
					</tr>
					<tr>
						<td>Institusi</td>
						<td>:</td>
						<td>{{head($data)->institusi}}</td>
					</tr>
					<tr>
						<td>Pendidikan</td>
						<td>:</td>
						<td>{{head($data)->pendidikan}}</td>
					</tr>
						<!-- tambahan dari design gredy, yg blom ada di profile-->
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>{{head($data)->alamat}}</td>
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
							<td>{{head($data)->telepon}}</td>
						</tr>
						<tr>
							<td>HP</td>
							<td>:</td>
							<td>{{head($data)->hp}}</td>
						</tr>
						<tr>
							<td>Surat Elektronik</td>
							<td>:</td>
							<td>{{head($data)->email}}</td>
						</tr>
						<!-- end tambahan dari design gredy, yg blom ada di profile-->
					<tr>				
						<td>Situs</td>
						<td>:</td>
						<td><a href={{array_get($data, 'siteUrl')}}>{{head($data)->situs}}</td>
					</tr>
					<tr>
						<td>Keterangan Lain</td>
						<td>:</td>
						<td>{{head($data)->keterangan}}</td>
					</tr>
				</table>
			</div>			
		</div>
	</div>
</div>		

@stop