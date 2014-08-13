<section class="footer">
		<div class="container_12">
		<!--	<div class="grid_4">
				<img src="assets/img/lipi.png" alt="" width="36" class="logo_lipi"/>
				<span class="abrev_lipi">
					Lembaga Ilmu Pengetahuan Indonesia
				</span>
			</div>-->
			<div class="blue_line">
			</div>
			<div class="grid_4 push_4">
				<span class="abrev_sji">
					Powered by SJI Systems<br/>
					2014
				</span>
			</div>
			<!--<div class="grid_4">
				<span class="abrev_opi">
					OPI - Organisasi Profesi Ilmiah Indonesia
				</span>
			</div>
			-->
		</div>
	</section>

    <!-- Include all compiled plugins (below), or include individual files as needed 
    <script src="assets/js/bootstrap.min.js"></script>-->
	<script type="text/javascript" src="assets/js/carousel.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
		
		
		function updateSize(){
			// Get the dimensions of the viewport
			//var width = $(window).width();
			var height = $(window).height() - (130+106+35);
			//var navHeight = $('#nav_sec').height();
			
			//$('#landing_sec').height(height);
			//$('.landing_spc').height(height - navHeight);
			$('.content_container, .login_content').css('min-height',height);
			$('.login_content').css('height',height);
			$('.pdf_viewer').css('height',$(window).height());
			$('.main_content').css('min-height',height);
			
		};
		$(document).ready(updateSize);
		$(window).resize(updateSize);
		
		$(function() {
		  $('#carousel').carousel();
		});
		
		/*external container area exit trigger*/
		$('.exit').click(function() {$( ".pop_up_super_c" ).fadeOut( 200, function(){});});	
		
		$('.pop_up_super_c').click(function (e)
		{
			var container = $('.pop_up_cell');

			if (container.is(e.target) )// if the target of the click is the container...
			{
				$( ".pop_up_super_c" ).fadeOut( 200, function(){});
				$('html').css('overflow-y', 'auto');
			}
		});
		
		
		
	</script>