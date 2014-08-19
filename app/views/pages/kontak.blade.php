@extends('layouts.default')
@section('content')
<div class="grid_12">
	<div class="main_content">
		<div id='contact_header_container'>
			<div id='contact_header'>Hubungi Kami Di HFI</div>
			<div id='contact_content'>Kami akan senang untuk menerima pesan dari anda! Mohon gunakan formulir di bawah ini atau menggunakan metode kontak lainnya. Kami akan membalas pesan anda sesegera mungkin.</div>
		</div>
		<div id='contact_information_container'>
			<div id='contact_information_header'>Informasi Kontak HFI</div>
			<div id='contact_information_content'>
				<div id='contact_information_content_header'><b>Himpunan Fisika Indonesia</b></div>
				<div id='contact_information'>
					Kompleks Batan Indah Blok L No. 48<br />
					Serpong Tangerang Banten, 15314<br/><br/>
					<table>
						<tr>
							<td class='table_head'>Telp</td>
							<td>: </td>
							<td>+62 21-7561609</td>
						</tr>
						<tr>
							<td class='table_head'>Fax</td>
							<td>: </td>
							<td>+62 21-7561609</td>
						</tr>
						<tr>
							<td class='table_head'>e-mail</td>
							<td>: </td>
							<td><a href='javascript:void(0)'>info@hfi.fisika.net</a></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
 
			<?php 
					use Gregwar\Captcha\CaptchaBuilder;

					$builder = new CaptchaBuilder;
					$builder->build();
					$_SESSION['phrase'] = $builder->getPhrase();
			?>

		<div id='contact_form_container'>
			<div id='contact_form_header'>Formulir Pengiriman Pesan</div>
			<div id='contact_form_content'>
			{{ Form::open(array('url' => 'try')) }}
				<table>
					<tr>
						<td class='table_head'>Nama*</td>
						<td>{{ Form::text('nama', Input::old('nama')) }}</td>
					</tr>
					<tr>
						<td class='table_head'>e-mail*</td>
						<td>{{ Form::text('email', Input::old('email')) }}</td>
					</tr>
					<tr>
						<td class='table_head'>Profesi</td>
						<td>{{ Form::select('profesi',array(
							'' => 'pilih!',
							'mahasiswa' => 'mahasiswa',
							'guru' => 'guru',
							'dosen' => 'dosen',
							'peneliti' => 'peneliti',
							'karyawan' => 'karyawan',
							'lainlain' => 'lain-lain'))
						}}</td>
					</tr>
					<tr>
						<td class='table_head'>Institusi</td>
						<td>{{ Form::text('institusi', Input::old('institusi')) }}</td>
					</tr>
					<tr>
						<td class='table_head'>Subjek Pesan</td>
						<td>{{ Form::text('subjek', Input::old('subjek')) }}</td>
					</tr>
					<tr>
						<td class='table_head'>Isi Pesan*</td>
					</tr>
					
					<tr>
						<td>&nbsp;</td>
						<td style="display:block; margin-left:-80px;"><div style='width:200px;;display:block;'>{{ Form::textarea('isi_pesan', Input::old('isi_pesan')) }}</div></td>
					</tr>
					<tr>
						<td class='table_head'>Captcha</td>
					</tr>
					<tr style='height: 50px;'>
						<td>&nbsp;</td>
						<td style="display:block; margin-left:-80px;"><div style='width:200px;;display:block;'><img src="<?php echo $builder->inline(); ?>" /></div></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td style="display:block; margin-left:-80px;"><div style='width:200px;;display:block;'>{{Form::text('captcha',Input::old('captcha'))}}</div></td>
					</tr>
				</table>
				<div id='contact_note'>* = harus diisi</div>
				{{Form::submit('Kirim Pesan');}}
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop