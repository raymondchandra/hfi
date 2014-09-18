<h2>
	Regulasi HFI
</h2>
<div class="pdf_container">
	<ol style="margin-bottom:5px;">	
    <?php foreach ($regulasi_hfi as $regul): ?>
        <li>
			<a href='javascript:void(0)' class='pop_the_pop_up' value="
			<?php echo $regul->file_path ?>">
			<?php echo $regul->versi ?></a>
		</li>
    <?php endforeach; ?>
	</ol>
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
	$(document).ready(function(){
		$('.pagination a').on('click', function (event) {
			$( ".loader" ).fadeIn( 200, function(){});
			event.preventDefault();
		    if ( $(this).attr('href') != '#' ) {
				
		        //$("html, body").animate({ scrollTop: 0 }, "fast");
				var next = $(this).attr('href');
				var url = '{{URL::route('regulasi.home')}}'+'?'+next.split("?")[1];
				$('#regulasi_hfi').load(url);
				$( ".loader" ).fadeOut( 200, function(){});
		    }
		});
	});										
</script>

<?php echo $regulasi_hfi->links(); ?>