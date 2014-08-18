@extends('layouts.default')
@section('content')	

	<div class="grid_12">
		<div class="main_content">
			<div class="side_panel_hfi">
				<div class="side_panel_hfi_background">
				<ul>
					<li>				
						<a href="anggota">Profile</a> 				
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="ketentuan">Cari Member</a>
					</li>	
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="ketentuan">e-Berkas</a>
					</li>										
				</ul>
				</div>
			</div>
			
			<div class="foto_pp_container">
				<img height="200" width="150" src="assets/img/no_photo.jpg"/>
				<a href="#">Rubah Profil</a>
				<a href="#">Cetak Kartu Anggota</a>
			</div>
			
			<table border="0">
				<tr>
					<td class="label_pp">Nama</td>
					<td>:</td>
					<td>Member 123</td>			
				</tr>
				<tr>
					<td>Nomor anggota</td>
					<td>:</td>
					<td>123456543</td>
				</tr>
				<tr>
					<td>Tanggal revisi</td>
					<td>:</td>
					<td>(tanggal revisi)</td>		
				</tr>
				<tr>
					<td>Status registrasi</td>
					<td>:</td>
					<td>(status registras)</td>
				</tr>
				<tr>
					<td>Tema penelitian</td>
					<td>:</td>
					<td>(tema penelitian)</td>
				</tr>
				<tr>
					<td>Spesialisasi</td>
					<td>:</td>
					<td>(spesialisasi)</td>
				</tr>
				<tr>
					<td>Profesi</td>
					<td>:</td>
					<td>(profesi)</td>
				</tr>
				<tr>
					<td>Institusi</td>
					<td>:</td>
					<td>(institusi)</td>
				</tr>
				<tr>
					<td>Pendidikan</td>
					<td>:</td>
					<td>(pendidikan)</td>
				</tr>
				<tr>
					<td>Kontak</td>
					<td>:</td>
					<td>(link email profile ini)</td>
				</tr>
				<tr>
					<td>Situs</td>
					<td>:</td>
					<td>(link ke situs pribadi)</td>
				</tr>
				<tr>
					<td>Keterangan lain</td>
					<td>:</td>
					<td>(keterangan lain)</td>
				</tr>
			</table>
			
		</div>
	</div>
			

@stop