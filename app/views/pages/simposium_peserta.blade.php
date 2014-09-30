@extends('layouts.simposium')
@section('content')
<div style="width: 100%; background: #ededed;">
<div class="container_12" >	
	<div class="grid_12">
		<img src="{{ asset('assets/img/simposium_header.jpg') }}" width="940" alt="simpsium hfi"/>

	</div>
</div>
</div>

<div class="container_12">
	<div class="grid_12 s_sponsor_area">
		<img src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>

	</div>
</div>
<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			<div class="side_panel_hfi">
				<div class="side_panel_hfi_background">
				<ul>
					<li>
						<a href="javascript:void(0)">Pertemuan Lalu</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">Tanggal Penting</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">
							Lokasi
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">
							Akomodasi
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">
							Program
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">
							Registrasi
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">
							Peserta
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">
							Prosiding
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">
							Panitia
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">
							Kontak
						</a>
					</li>
				
				</ul>
				</div>
			</div>
			
			<div class="content_hfi">
				
				<h2>
					Peserta
				</h2>
			
					Total Registrasi: 20<br/>
				<table class="table table-bordered table-striped" style="font-size: 12px;">					
					<tr>
						<td>
							No.
						</td>
						<td>
							Nama
						</td>
						<td>
							Institusi
						</td>
						<td>
							Status Registrasi
						</td>
						<td>
							Catatan
						</td>
					</tr>
					<?php
						for($i = 1; $i < 21; $i++){
					?>
					<tr>
						<td>
							<?php echo($i); ?>
						</td>
						<td>
							<span style="display: block">Abdul Halim</span>
							<span>1408519438</span>
						</td>
						<td>
							Universitas Negeri Makassar
						</td>
						<td>
							PERANCANGAN DAN PEMBUATAN PROTOTIPE CHAMBER UJI KELEMBABAN UDARA SENSOR SERAT OPTIK
					
						</td>
						<td>
							<span style="display: block; font-size: 11px;">• surat undangan</span>
							<span style="display: block; font-size: 11px;">• abstrak</span>
							<span style="display: block; font-size: 11px;">• kwitansi</span>
						</td>
					</tr>
					<?php
						}
					?>
					<hr>
					</hr>
				</table>
				
				
			</div>
		</div>
	</div>
</div>


@stop