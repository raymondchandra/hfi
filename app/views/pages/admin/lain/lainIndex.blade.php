<script>
$(document).ready(function(){
	$( ".loader" ).fadeOut( 200, function(){});
});
</script>	

<div class="container_12">
	<div class="grid_12">

		<div class='admin_title'>Lain-lain</div>
		<div id="Laincontent">

			<div id='div_tambah_lain'><a href='javascript:void(0)' id='tambah_lain'  class='command_button f_menu_lain_popuper'>+ Menu Lain</a></div>
			<div id="listLain">
				@if($lains == NULL)
					<span>Tidak terdapat menu lain-lain yang diunggah</span>
				@else
					<table border=0 style='width:800px;'>
						<tr>
							<td><h6>Periode</h6></td>
							<td><h6>Tanggal Unggah</h6></td>
							<td>&nbsp;</td>
						</tr>
					@foreach($lains as $lain)
						<tr>
							<td style='vertical-align:middle !important; width:350px; overflow:hidden; margin-right:30px;'><a href='javascript:void(0)' class='periode_pengurus' value='{{$urus->file_path}}'>{{$lain->title}}</a></td>
							<td style='vertical-align:middle !important; width:350px;'>{{$lain->tanggal_upload}}</td>
							<td style='vertical-align:middle !important; width:100px;'><p style='display:none;'>{{$lain->file_path}}</p><input type='button' value='x' class='hapus_pengurus'/><input type='hidden' class='id_pengurus' value='{{$urus->id}}'/></td>
						</tr>
					@endforeach
					</table>
					<?php echo $lains->links(); ?>
				@endif
				
			</div>
		</div>
	</div>
	
	
	
	
	<!--pop up start-->
	<div class=" pop_up_super_c menu_lain_pop" style="display: none;">
		<a class="exit close_56" ></a>
		<div class="pop_up_tbl">
			<div class="pop_up_cell">
				<div class="container_12">			
					<div class="grid_12 pop_up_container" style="background: #fff; padding: 20px;">
						Isi dengan sesuatu
					</div>
				</div>			
			</div>		
		</div>
	</div>
	<script>
		$('body').on('click','.f_menu_lain_popuper',function(){
			$( ".menu_lain_pop" ).fadeIn( 277, function(){});
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
	<!--pop up end-->
	
</div>
