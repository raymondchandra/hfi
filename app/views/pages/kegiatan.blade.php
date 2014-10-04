@extends('layouts.default')
@section('content')
<script>
	$(document).ready(function(){
	
		$( ".show_after" ).each(function( index ) {
			//alert($(this).text());
			var length = $(this).text().length;
			if (length > 200) {
				$(this).siblings('.show_before').text($(this).text().substr(0,197)); 
				$(this).append("<a href='javascript:void(0)' style='text-decoration:none;' class='hide_description'>[tutup]</a>"); 
				$(this).siblings('.show_before').append("<a href='javascript:void(0)' class='description_button' style='text-decoration:none;'> [selengkapnya]</a>");
			}
			else{
				$(this).siblings('.show_before').text($(this).text());
			}
		});
		
	});
	
	$('body').on('click','.description_button',function(){
		//$('.show_before').css('display','none');
		//$('.show_after').css('display','block');
		$(this).parent().css('display','none');
		$(this).parent().siblings('.show_after').css('display','block');
		
	});
	
	$('body').on('click','.hide_description',function(){
		$(this).parent().siblings('.show_before').css('display','block');
		$(this).parent().css('display','none');
	});
	 
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
						<a href="{{ URL::route('publikasi',array(4)) }}">
							Simposium
						</a>
					</li>
					<li>
						<a href="{{ URL::route('publikasi',array(4)) }}">
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
						<div>
						{{ HTML::image($kegiatan->brosur_kegiatan,'Image',array('class'=>'poster_kegiatan')) }}
						
						<div class="info_kegiatan">
							<div class="waktu_kegiatan">{{$kegiatan->waktu_mulai}} - {{$kegiatan->waktu_selesai}}</div>
							<div class="nama_kegiatan">{{$kegiatan->nama_kegiatan}}</div>
							<div class="place_kegiatan">{{$kegiatan->tempat}}</div>
							<div class="box">
								<div class="deskripsi_kegiatan">
									<div class="show_after" style='display:none;margin-bottom: 10px;'>
										{{$kegiatan->deskripsi}}
									</div>
									<div class="show_before">
									
									</div>
								</div>
							</div>
						</div>
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