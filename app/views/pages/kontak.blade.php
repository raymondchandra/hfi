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
					<div style='width: 250px;'>
					{{$arr['alamat_hfi']}}<span class="clear">
					</div>
					</span>
					<br/><br/>
					<table>
						<tr>
							<td class='table_head'>Telp</td>
							<td>:  </td>
							<td>{{$arr['telp']}}</td>
						</tr>
						<tr>
							<td class='table_head'>Fax</td>
							<td>:  </td>
							<td>{{$arr['fax_hfi']}}</td>
						</tr>
						<tr>
							<td class='table_head'>e-mail</td>
							<td>:  </td>
							<td><a href='javascript:void(0)'>{{$arr['email_hfi']}}</a></td>
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
				<table>
					<tr>
						<td class='table_head'>Nama*</td>
						<td style="position: relative;">{{ Form::text('nama', Input::old('nama'),array('id'=>'inputNama')) }}</td>
					</tr>
					<tr>
						<td class='table_head'>e-mail*</td>
						<td style="position: relative;">{{ Form::text('email', Input::old('email'),array('id'=>'inputEmail')) }}</td>
					</tr>
					<tr>
						<td class='table_head'>Profesi</td>
						<td>{{ Form::select('profesi',array(
							'mahasiswa' => 'mahasiswa',
							'guru' => 'guru',
							'dosen' => 'dosen',
							'peneliti' => 'peneliti',
							'karyawan' => 'karyawan',
							'lainlain' => 'lain-lain'),Input::old('inputProfesi'),array('id'=>'inputProfesi'))
						}}</td>
					</tr>
					<tr>
						<td class='table_head'>Institusi</td>
						<td>{{ Form::text('institusi', Input::old('institusi'),array('id'=>'inputInstitusi')) }}</td>
					</tr>
					<tr>
						<td class='table_head'>Subjek Pesan</td>
						<td>{{ Form::text('subjek', Input::old('subjek'),array('id'=>'inputSubjek')) }}</td>
					</tr>
					<tr>
						<td class='table_head'>Isi Pesan*</td>
					</tr>
					
					<tr>
						<td>&nbsp;</td>
						<td style="display:block; margin-left:-80px;"><div style='width:200px;;display:block;'>{{ Form::textarea('isi_pesan', Input::old('isi_pesan'),array('id'=>'inputPesan')) }}</div></td>
					</tr>
					<tr>
						<td class='table_head'>Captcha</td>
					</tr>
					<tr style='height: 50px;'>
						<td>&nbsp;</td>
						<td style="display:block; margin-left:-80px;"><div style='width:200px;;display:block;'><img src="<?php echo $builder->inline(); ?>" class='captcha_image' /></div></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td style="display:block; margin-left:-80px;"><div style='width:200px;;display:block;'>{{Form::text('captcha',Input::old('captcha'),array('id'=>'inputCaptcha'))}}</div></td>
					</tr>
				</table>
				<div id='contact_note'>* : harus diisi</div>
				<style>
					#nama-error {
						position: absolute;
						right:0px;
					}
					#email-error {
						position: absolute;
						right:0px;
					}
				</style>
				<script>
						jQuery.validator.setDefaults({
						  debug: true,
						  success: "valid"
						});
						$( "form" ).validate({
						  rules: {
							nama : {
							  required: true
							},
							email: {
							  required: true,
								email: true
							},
							isi_pesan: {
							  required: true,
								email: true
							}
							
						  }, messages: {
							nama: {
							  required: "Mohon isi nama dengan lengkap"
							},
							email: {
							  required: "Mohon masukkan email Anda",
								email: "Mohon tulis format dengan benar"
							},
							isi_pesan: {
							  required: "Mohon masukkan email Anda",
							}
							
						  }
						});
					</script>

				{{Form::button('Kirim Pesan',array('id'=>'inputButton'))}}
			</div>
			<script>
				$('#inputButton').click(function(){
					$nama = $('#usrnm').val();
					$email = $('#eml').val();
					var data = new FormData();
					data.append('nama', $('#inputNama').val());
					data.append('email', $('#inputEmail').val());
					data.append('profesi', $('#inputProfesi').val());
					data.append('institusi', $('#inputInstitusi').val());
					data.append('subjek_pesan', $('#inputSubjek').val());
					data.append('isi_pesan', $('#inputPesan').val());
					data.append('captcha', $('#inputCaptcha').val());
					$.ajax({
						type: 'POST',
						url: '{{URL::route('post_kontak')}}',
						data: data,
						processData : false,
						contentType : false,
						success: function(response){
							alert(response);
								//clear form pesan
								$('#inputNama').val("");
								$('#inputEmail').val("");
								$('#inputProfesi').val("");
								$('#inputInstitusi').val("");
								$('#inputSubjek').val("");
								$('#inputPesan').val("");
								$('#inputCaptcha').val("");
							
						},
						error: function(jqXHR, textStatus, errorThrown){
							alert(errorThrown);
						}
					},'json');

				});
			</script>
		</div>
	</div>
</div>
@stop