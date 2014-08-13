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
					The standard Lorem Ipsum passage, used since the 1500s
					
					"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
					
					Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC

					"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
				</p>
			</div>
			

		
			<div class="tentang_hfi_container">	
				<h2>
					Tentang HFI
				</h2>
				<p>
					The standard Lorem Ipsum passage, used since the 1500s

					"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

					Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
				</p>
			</div>	
			<div class="visi_misi_container">	
				
				<div class="visi_container">
					<h2>
						Visi
					</h2>
					<ul>
						<li>
							satu 
						</li>
						<li>
							dua 
						</li>
						<li>
							tiga 
						</li>
						<li>
							empat
						</li>
						<li>
							lima 
						</li>
						<li>
							enam 
						</li>
						<li>
							tujuh
						</li>
					</ul>
				</div>
				<div class="misi_container">
					<h2>
						Misi
					</h2>
					<ul>
						<li>
							satu 
						</li>
						<li>
							dua 
						</li>
						<li>
							tiga 
						</li>
						<li>
							empat
						</li>
						<li>
							lima 
						</li>
						<li>
							enam 
						</li>
						<li>
							tujuh
						</li>
					</ul>
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