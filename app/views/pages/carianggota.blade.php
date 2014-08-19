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
				{{ Form::open(array('url' => 'foo/bar')) }}	<!-- default post-->	
				<table border="0">
					<tr>
						<td><b>Kata kunci</td>			
						<td>:</td>
						<td>
							{{ Form::text('katakunci', Input::old('katakunci')) }}
						</td>
					</tr>	
					<tr>
						<td></td>
						<td></td>
						<td>(misal : nama, tema penelitian, pendidikan, institusi, dll)</td>
					</tr>	
					<tr>
						<td><b>Status</b></td>
						<td>:</td>
						<td>
							{{ Form::checkbox('anggotaaktif','anggotaaktif') }}anggota aktif,				
							Cabang 
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
						<td><b>Jenis kelamin</b></td>
						<td>:</td>
						<td>{{ Form::radio('pria','pria') }}pria    {{ Form::radio('wanita','wanita') }}wanita</td>			
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
				{{ Form::submit('Cari') }} atau 
				{{ Form::button('Batal') }}
				{{ Form::token() . Form::close() }}
			</div>
		</div>
	</div>
</div>		

@stop