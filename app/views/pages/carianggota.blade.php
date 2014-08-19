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
				
				<h1> Cari Member</h1>
				{{ Form::open(array('url' => 'foo/bar')) }}	<!-- default post-->	
						
					<table border="0">
						<tr>
							<td>
							{{ Form::text('katakunci', Input::old('katakunci'), array('style' => 'width:300px')) }}
							</td>
							<td>
							{{ HTML::image('assets/img/lupicon.png') }}
							</td>
					</table>
											
				<h4>Pencarian Lengkap</h4>
				<table border="0">					
					<tr>
						<td>Status</td>
						<td>:</td>
						<td>{{ Form::checkbox('anggotaaktif','anggotaaktif') }} Anggota Aktif</td>
					</tr>						
					<tr>
						<td>Cabang</td>
						<td>:</td>
						<td>
							{{ Form::select('cabang', array(
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
							}}				
						</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>{{ Form::radio('jeniskelamin','pria') }}pria    {{ Form::radio('jeniskelamin','wanita') }}wanita</td>			
					</tr>	
					<tr>
						<td>Spesialisasi</td>
						<td>:</td>
						<td>
							{{ Form::select('spesialisasi',array(
								'0' => 'pilih!',
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
							}}</td>			
					</tr>		
					<tr>
						<td>Profesi</td>
						<td>:</td>
						<td>
							{{ Form::select('profesi',array(
								'0' => 'pilih!',
								'mahasiswa' => 'mahasiswa',
								'guru' => 'guru',
								'dosen' => 'dosen',
								'peneliti' => 'peneliti',
								'karyawan' => 'karyawan',
								'lainlain' => 'lain-lain'))
							}}</td>						
					</tr>		
				</table>				
				{{ Form::token() . Form::close() }}
			</div>
		</div>
	</div>
</div>		

@stop