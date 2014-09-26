@extends('layouts.default')
@section('content')
	<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			<div class="side_panel_hfi">
				<div class="side_panel_hfi_background">
				<ul>
					<li>				
						<a href="organisasi">Pengurus</a> 				
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="cabang">Cabang</a>
					</li>										
				</ul>
				</div>
			</div>
			
			<div class="content_hfi" id="contentfield">
				
				<h2>Pengurus</h2>
				
				<div class="pdf_container">
					<?php											
						//$length = sizeof($pengs);												
						$arrPengurus = array();											
						// for($i=0; $i<$length; $i++){
							// $arrPengurus[] = $pengs[$i];
						// }	
						if($pengs!=null){
							foreach($pengs as $value){
								$arrPengurus[] = $value;							
							}
						}				
					?>
					@if(count($arrPengurus)==0)
						<div>Tidak terdapat pengurus yang diunggah</div>
					@else
					<div class="versi_pdf_container">
						
						<?php foreach($arrPengurus as $pengurus) { //for($r=0; $r<$length; $r++){ ?>						
						<ul style="margin-bottom:5px;">
							<li>
								<a href="javascript:void(0);" class="pop_the_pop_up" value="
								<?php echo $pengurus->file_path //echo $arrPengurus[$r]['file_path']?>">
								<?php echo $pengurus->periode//echo $arrPengurus[$r]['periode']?></a>
							</li>							
						</ul>
						<?php } ?>
						
					</div>
					@endif
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

</div>

<!-- popup pdf -->
<div class=" pop_up_super_c" style="display: none;">
	<a class="exit close_56" ></a>
	<div class="pop_up_tbl">
		<div class="pop_up_cell">
			<div class="container_12">			
			<div class="grid_12" style="background: #fff;">
				<h3 style="padding-top: 5px;padding-left: 20px; margin-bottom: 5px !important; text-align: center;" class="title_pdf_viewer"></h3>
				<object style="height:590px !important;" data="" type="application/pdf" width="100%" class="pdf_viewer"></object>
			</div>
			</div>			
		</div>		
	</div>
</div>

@stop