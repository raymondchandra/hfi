@extends('layouts.default')
@section('content')
<script>
	$(document).ready(function(){
	
		$( ".show_after" ).each(function( index ) {
			//alert($(this).text());
			var length = $(this).text().length;
			if (length > 200) {
				$(this).siblings('.show_before').text($('.show_after').text().substr(0,197)); 
				$(this).append("<a href='javascript:void(0)' style='text-decoration:none;' class='hide_description'>[tutup]</a>"); 
				$(this).siblings('.show_before').append("<a href='javascript:void(0)' class='description_button' style='text-decoration:none;'> [selengkapnya]</a>");
			}
			else{
				$(this).siblings('.show_before').text($('.show_after').text());
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
<div class="grid_12">
	<div class="main_content">
	<h2>Kegiatan</h2>
	<div class="kegiatan_container">
		@if($kegiatans == NULL)
			<span>Kegiatan belum tersedia.</span>
		@else
			<ul>
				@foreach($kegiatans as $kegiatan)
					<li>
						<div>
						<img class="poster_kegiatan" src="{{$kegiatan->brosur_kegiatan}}" />
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
	
	
	<!--
		<div class="kegiatan_container">
			<ul>
				<li>
					<div>
					<img class="poster_kegiatan" src="#" />
					<div class="info_kegiatan">
						<div class="waktu_kegiatan">10.00 - 12.00</div>
						<div class="nama_kegiatan">Parahyangan Catholic University International Conference "Inteligence Systems and Informatics"</div>
						<div class="place_kegiatan">Place1</div>
						<div class="box">
							<div class="deskripsi_kegiatan">
								<div class="show_after" style='display:none;margin-bottom: 10px;'>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
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
				<li>
					<div>
					<img class="poster_kegiatan" src="#" />
					<div class="info_kegiatan">
						<div class="waktu_kegiatan">10.00 - 12.00</div>
						<div class="nama_kegiatan">Parahyangan Catholic University International Conference "Inteligence Systems and Informatics"</div>
						<div class="place_kegiatan">Place1</div>
						<div class="box">
							<div class="deskripsi_kegiatan">
								<div class="show_after" style='display:none; margin-bottom: 10px;'>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
								</div>
								<div class="show_before">
								
								</div>
							</div>
						</div>
					</div>
					</div>
				</li>
			</ul>
		</div>-->
	</div>
</div>

@stop