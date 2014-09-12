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
				<h1> Cari Member</h1>
				{{ Form::open(array('url' => 'foo/bar')) }}	<!-- default post-->							
				<table border="0">
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td>{{ Form::text('nama', Input::old('nama')) }}</td>
					</tr>
					<tr>
						<td>Penelitian</td>
						<td>:</td>
						<td>{{ Form::text('penelitian', Input::old('penelitian')) }}</td>
					</tr>
					<tr>
						<td>Pendidikan</td>
						<td>:</td>
						<td>
							{{ Form::select('gelar', array(
								'SD' => 'SD',
								'SMP' => 'SMP',
								'SMA' => 'SMA',
								'D1' => 'D1',
								'D2' => 'D2',
								'D3' => 'D3',
								'D4' => 'D4',
								'S1' => 'S1',
								'S2' => 'S2',
								'S3' => 'S3',
								'lainnya' => 'Lainnya'
								), Input::old('gelar'), array('style' => 'width:50px;')) 
							}}
							{{ Form::text('lulusan', Input::old('lulusan'), array('placeholder' => 'nama institusi pendidikan')) }}
						</td>
					</tr>
					<tr>
						<td>Institusi</td>
						<td>:</td>
						<td>{{ Form::text('institusi', Input::old('institusi')) }}</td>							
					</tr>
					<tr>
						<td>Surat Elektronik</td>
						<td>:</td>
						<td>{{ Form::text('suratelektronik', Input::old('suratelektronik')) }}</td>
					</tr>																								
					<tr>
						<td>Status</td>
						<td>:</td>						
						<td>{{ Form::checkbox('anggotaaktif', 'yes') }} Anggota Aktif</td>
					</tr>						
					<tr>
						<td>Cabang</td>
						<td>:</td>
						<td>
							{{ Form::select('cabang', $listcabang, Input::old('cabang'), array('style' => 'width:200px;')) }}							
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
					<tr>
						<td>{{ Form::submit('Cari') }}</td>
						<td>&nbsp;</td>
						<td>{{ Form::reset('Batal') }}</td>
					</tr>
				</table>				
				{{ Form::token() . Form::close() }}
				
				
				
			</div>
		</div>
	</div>
</div>		

@stop