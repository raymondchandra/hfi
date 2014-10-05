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
			
					Total Registrasi: {{count($pesertas)}}<br/>
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
					@for($i = 0; $i < count($pesertas) ; $i++)
					<tr>
						<td>
							{{$i+1}}
						</td>
						<td>
							<span style="display: block">{{$pesertas[$i]->nama}}</span>
							<span>1408519438</span>
						</td>
						<td>
							{{$pesertas[$i]->institusi}}
						</td>
						<td>
							@if($pesertas[$i]->is_paper == 0)
								Partisipan
							@else
								{{$pesertas[$i]->paper}}
							@endif
						</td>
						<td>
							<!--<span style="display: block; font-size: 11px;">• surat undangan</span>-->
							@if($pesertas[$i]->is_paper == 0)
								-
							@else
								<span style="display: block; font-size: 12px;">Abstrak</span>
							@endif
							
							<!--<span style="display: block; font-size: 11px;">• kwitansi</span>-->
						</td>
					</tr>
					@endfor
					<hr>
					</hr>
				</table>
				
				
			</div>
		</div>
	</div>
</div>


@stop