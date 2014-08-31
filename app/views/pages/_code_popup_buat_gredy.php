<script>
	
	$('body').on('click','#sesuatu',function(){
		$( ".pop_up_super_c" ).fadeIn( 277, function(){});
	});
	
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
		
		
<!--pop up -->
<div class=" pop_up_super_c" id="sesuatu" style="display: none;">
	<a class="exit close_56" ></a>
	<div class="pop_up_tbl">
		<div class="pop_up_cell">
			<div class="container_12">			
			<div class="grid_12 pop_up_container" style="background: #fff;">
				Dynamic Warning
			</div>
			</div>			
		</div>		
	</div>
</div>