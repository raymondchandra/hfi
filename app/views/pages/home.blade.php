@extends('layouts.default')
@section('content')
	<div class="grid_12">
		<div class="main_content">
			<div id="carousel" class="carousel" style="width: 400px; float: right; margin-top: 56px;
">

			  <div class="carousel-inner" style="width: 400px;">
				@if($slideshow == "Failed")
					
				@else
				<ul>
					<?php
						$view="
							<div class='item active'>
							  <img src='".$slideshow[0]['file_path']."' alt='ome Alt Text' width='400' height='300' />
							  <div class='carousel-caption'>
								".$slideshow[0]['kapsion']."
							  </div>
							</div>
						";
						$length= count($slideshow);
						
						for($i=1;$i<$length;$i++){
							$view.="
								<div class='item'>
								  <img src='".$slideshow[$i]['file_path']."' alt='ome Alt Text' width='400' height='300'/>
								  <div class='carousel-caption'>
									".$slideshow[$i]['kapsion']."
								  </div>
								</div>
							";
						}
						echo $view;
					?>
				</ul>
				@endif
				
			  </div>

			  <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
			  <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>

			</div>
			
			<div class="selamat_datang_container" id="selamat_datang">
				<h2>
					Selamat Datang
				</h2>
				
				<p>
					{{$deskripsi_selamat_datang}}
				</p>
			</div>
			

		
			<div class="tentang_hfi_container" id="tentang_hfi">	
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
				
				<div class="visi_container" id="visi_hfi">
					<h2>
						Visi
					</h2>
					{{$visi_hfi}}
				</div>
				<div class="clear"></div>
				<div class="misi_container" style="margin-bottom: 40px !important;" id="misi_hfi">
					<h2>
						Misi
					</h2>
					{{$misi_hfi}}
				</div>
				
				
			</div>	
			
			<div class="clear"></div>
			
			<div class="regulasi_hfi_container" id="regulasi_hfi">
				
				<h2>
					Regulasi HFI
				</h2>
				<div class="pdf_container">
					<?php											
						// $length = sizeof($regulasi_hfi);														
						$arrRegulasi = array();					
						// for($i=0; $i<$length; $i++){
							// $arrRegulasi[] = $regulasi_hfi[$i];
						// }
						foreach($regulasi_hfi as $value){
							$arrRegulasi[] = $value;
						}
					?>
					<div class="versi_pdf_container">
						<?php foreach($arrRegulasi as $regulasi){ //for($r=0; $r<$length; $r++){ ?>
							<ol style="margin-bottom:5px;">								
								<li>
									<a href='javascript:void(0)' class='pop_the_pop_up' value="
									<?php echo $regulasi['file_path'] //echo $arrRegulasi[$r]['file_path']?>">
									<?php echo $regulasi['versi'] //echo $arrRegulasi[$r]['versi']?></a>
								</li>								
							</ol>				
						<?php } ?>
						<!--<ul>
							<li>
								<a href="javascript:void(0);" class="pop_the_pop_up">AD / ART 2001 - sekarang</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="pop_the_pop_up">AD / ART 1990 - 2001</a>
							</li>
						</ul>-->
					</div>
					<script>
						$('.pop_the_pop_up').click(function() {
							var title = ($(this).text());
							$('.title_pdf_viewer').html(title);
							var file_path = $(this).attr('value');			
							$('.pdf_viewer').attr("data", file_path);
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
					<h3 style="padding-top: 5px;padding-left: 20px; margin-bottom: 5px !important; text-align: center;" class="title_pdf_viewer"></h3>					
					<!--<object data="assets/img/Chapter_4.pdf" type="application/pdf" width="100%" class="pdf_viewer"></object>-->
					<object style="height:590px !important;" data="" type="application/pdf" width="100%" class="pdf_viewer"></object>
				</div>
				</div>
				
			</div>
			
		</div>
	</div>
@stop