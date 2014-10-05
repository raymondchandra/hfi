@extends('layouts.default')
@section('content')
<script>
</script>
<div class="container_12">

	<div class="grid_12">
		<div class="main_content">
			<div class="side_panel_hfi">
				<div class="side_panel_hfi_background">
				<ul>
					<li>
						<a href="{{ URL::route('kegiatan',array(1)) }}">Kegiatan Nasional</a>

					</li>
					<li>
						<a href="{{ URL::route('kegiatan',array(2)) }}">Kegiatan Internasional</a>
					</li>
					<li>
						<a href="{{ URL::route('simposium') }}">
							Simposium
						</a>
					</li>
					<li>
						<a href="{{ URL::route('ictap') }}">
							Ictap
						</a>
					</li>
				</ul>
				</div>
			</div>
			
			<div class="content_hfi">
				<h2>Kegiatan</h2>
				<div class="kegiatan_container">
		@if($kegiatans == NULL)
			<span>Kegiatan belum tersedia.</span>
		@else
			<ul>
				@foreach($kegiatans as $kegiatan)
					<li>
						
						<div class="info_kegiatan">
							<div class="nama_kegiatan"><a href="{{URL::route('ictap.index',array($kegiatan->id))}}" >{{$kegiatan->nama}}</a></div>
							<div class="waktu_kegiatan">{{$kegiatan->waktu_mulai}} - {{$kegiatan->waktu_selesai}}</div>
							<div class="place_kegiatan">{{$kegiatan->tempat}}</div>
						</div>
					</li>
					<span class='clear'>&nbsp;</span>
					<span class='clear'>&nbsp;</span>
				@endforeach
			</ul>
		@endif
	</div>
	@if($kegiatans != NULL)
		<?php echo $kegiatans->links(); ?>
	@endif
			</div>
		</div>
	</div>
</div>

@stop