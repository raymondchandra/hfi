@extends('layouts.default')
@section('content')
	<div class="grid_12">
		<div class="main_content">
			<div id="carousel" class="carousel" style="width: 400px; float: right; margin-top: 56px;
">

			  <div class="carousel-inner" style="width: 400px;">


				<div class="item active">
				  <img src="assets/img/w1.jpg" alt="Some Alt Text" width="400" />
				  <div class="carousel-caption">
					Some caption
				  </div>
				</div>

				<div class="item">
				  <img src="assets/img/w2.jpg" alt="Some Alt Text" width="400"/>
				  <div class="carousel-caption">
					Some caption
				  </div>
				</div>
				
				<div class="item">
				  <img src="assets/img/w3.jpg" alt="Some Alt Text" width="400"/>
				  <div class="carousel-caption">
					Some caption
				  </div>
				</div>

				<div class="item">
				  <img src="assets/img/w4.jpg" alt="Some Alt Text" width="400"/>
				  <div class="carousel-caption">
					Some caption
				  </div>
				</div>
				
				<div class="item">
				  <img src="assets/img/w5.jpg" alt="Some Alt Text" width="400"/>
				  <div class="carousel-caption">
					Some caption
				  </div>
				</div>
				
			  </div>

			  <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
			  <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>

			</div>
			
			<div class="selamat_datang_container">
				<h2>
					Selamat Datang
				</h2>
				
				<p>
					{{$deskripsi_selamat_datang}}
				</p>
			</div>
			

		
			<div class="tentang_hfi_container">	
				<h2>
					Tentang HFI
				</h2>
				<p>
					{{$tentang_hfi}}
				</p>
			</div>	
			<div class="clear">
			</div>
			<div class="visi_misi_container">	
				
				<div class="visi_container">
					<h2>
						Visi
					</h2>
					{{$visi_hfi}}
				</div>
				<div class="misi_container">
					<h2>
						Visi
					</h2>
					{{$misi_hfi}}
				</div>
				
				
			</div>	
			
			<div class="regulasi_hfi_container">	
				<h2>
					Regulasi HFI
				</h2>
				<div class="pdf_container">
					<div class="versi_pdf_container">
						<ul>
							<li>
								<a href="javascript:void(0);" class="pop_the_pop_up">AD / ART 2001 - sekarang</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="pop_the_pop_up">AD / ART 1990 - 2001</a>
							</li>
						</ul>
					</div>
					<script>
						$('.pop_the_pop_up').click(function() {
							$( ".pop_up_super_c" ).fadeIn( 277, function(){});
							$('html').css('overflow-y', 'hidden');
						});
					</script>
					
				</div>
			</div>	
			
		</div>
	</div>
	
	<!--<div class="pop_up" style="position: fixed; top: 0px; left: 0;">
	asdads
	</div>-->
	
	<div class=" pop_up_super_c" style="display: none;">
		<a class="exit close_56" ></a>
		<div class="pop_up_tbl">
			<div class="pop_up_cell">
				<div class="container_12">
				
				<div class="grid_12" style="background: #fff;">
					<h3 style="padding-top: 5px;padding-left: 20px; margin-bottom: 5px !important; text-align: center;">
						Regulasi AD / ART 2001 - sekarang
					</h3>
					<object data="assets/img/Chapter_4.pdf" type="application/pdf" width="100%" class="pdf_viewer"></object>
				</div>
				</div>
				
			</div>
			
		</div>
	</div>
@stop