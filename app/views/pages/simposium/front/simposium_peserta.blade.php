@extends('layouts.simposium')
@section('content')
<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			
			@include('includes.simposium.sidebar')
			<div class="content_hfi">
				
				<h2>
					@if($simpIct == 3) Peserta @else @if($simpIct == 4) Participant @endif @endif
				</h2>
			
					@if($simpIct == 3) Total Registrasi @else @if($simpIct == 4) Registration Total @endif @endif : {{count($pesertas)}}<br/>
				<table class="table table-bordered table-striped" style="font-size: 12px;">					
					<tr>
						<td>
							No.
						</td>
						<td>
							@if($simpIct == 3) Nama @else @if($simpIct == 4) Name @endif @endif 
						</td>
						<td>
							@if($simpIct == 3) Institusi @else @if($simpIct == 4) Institution  @endif @endif 
						</td>
						<td>
							@if($simpIct == 3) Status peserta @else @if($simpIct == 4) Participant Status @endif @endif 
						</td>
						<td>
							@if($simpIct == 3) Abstrak @else @if($simpIct == 4) Abstract @endif @endif 
						</td>
					</tr>
					@for($i = 0; $i < count($pesertas) ; $i++)
					<tr>
						<td>
							{{$i+1}}
						</td>
						<td>
							<span style="display: block">{{$pesertas[$i]->nama}}</span>
							<span>{{$pesertas[$i]->nomor_peserta}}</span>
						</td>
						<td>
							{{$pesertas[$i]->institusi}}
						</td>
						<td>
							@if($pesertas[$i]->is_paper == 0)
								@if($simpIct == 3) Partisipan @else @if($simpIct == 4) Participant @endif @endif 
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