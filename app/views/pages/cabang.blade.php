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
				
				<h2>Cabang</h2>
				
				<div class="pdf_container">
					<div class="versi_pdf_container">
						<ul>
							<li>
								<a href="javascript:void(0);" class="pop_the_pop_up">contoh cabang</a>
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

</div>

<!-- popup pdf -->
<div class=" pop_up_super_c" style="display: none;">
	<a class="exit close_56" ></a>
	<div class="pop_up_tbl">
		<div class="pop_up_cell">
			<div class="container_12">			
			<div class="grid_12" style="background: #fff;">
				<h3 style="padding-top: 5px;padding-left: 20px; margin-bottom: 5px !important; text-align: center;">
					contoh cabang
				</h3>
				<object data="assets/img/contohpengurus.pdf" type="application/pdf" width="100%" class="pdf_viewer"></object>
			</div>
			</div>			
		</div>		
	</div>
</div>

@stop
