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
						<td>Nomor Anggota</td>
						<td>:</td>
						<td>123456543</td>
					</tr>
						<!-- tambahan dari design gredy, yg blom ada di profile-->
						<tr>
							<td>Anggota Cabang</td>
							<td>:</td>
							<td>Bandung</td>
						</tr>
						<tr>
							<td>Status Anggota</td>
							<td>:</td>
							<td>Anggota aktif (s/d 12/12/12)</td>
						</tr>
						<!-- end tambahan dari design gredy, yg blom ada di profile-->
					<tr>
						<td>Tanggal Revisi</td>
						<td>:</td>
						<td>(tanggal revisi)</td>		
					</tr>												
					<tr>
						<td>Status Registrasi</td>
						<td>:</td>
						<td>(status registrasi)</td>
					</tr>
					<tr>
						<td>Tema Penelitian</td>
						<td>:</td>
						<td>(tema penelitian)asdasdasdasdasdasdasdasd</td>
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
						<!-- tambahan dari design gredy, yg blom ada di profile-->
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>jl. lorem ipsum no. 1, 40273, bandung, indonesia</td>
						</tr>
						<!-- end tambahan dari design gredy, yg blom ada di profile-->
					<tr>
						<td>Kontak</td>
						<td>:</td>
						<td>(link email profile ini)</td>
					</tr>
						<!-- tambahan dari design gredy, yg blom ada di profile-->
						<tr>
							<td>Telepon</td>
							<td>:</td>
							<td>2345678</td>
						</tr>
						<tr>
							<td>HP</td>
							<td>:</td>
							<td>123456789</td>
						</tr>
						<tr>
							<td>Surat Elektronik</td>
							<td>:</td>
							<td>hfi@hfi.com</td>
						</tr>
						<!-- end tambahan dari design gredy, yg blom ada di profile-->
					<tr>				
						<td>Situs</td>
						<td>:</td>
						<td>(link ke situs pribadi)</td>
					</tr>
					<tr>
						<td>Keterangan Lain</td>
						<td>:</td>
						<td>(keterangan lain)</td>
					</tr>
				</table>
			</div>			
		</div>
	</div>
</div>		

@stop