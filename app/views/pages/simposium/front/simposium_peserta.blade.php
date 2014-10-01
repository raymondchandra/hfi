@extends('layouts.simposium')
@section('content')
<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			
			@include('includes.simposium.sidebar')
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