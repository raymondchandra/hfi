<script>
	@if($pengurus != NULL)
		var thisurl = '{{URL::route('admin.organisasi.detail',$id)}}'+'?page='+'{{$pengurus->getCurrentPage()}}';
	@else
		var thisurl = '{{URL::route('admin.organisasi.detail',$id)}}';
	@endif
	
	$(document).ready(function(){
		$('.pagination a').on('click', function (event) {
			$( ".loader" ).fadeIn( 200, function(){});
			
			
			event.preventDefault();
		    if ( $(this).attr('href') != '#' ) {
				
		        $("html, body").animate({ scrollTop: 0 }, "fast");
				var next = $(this).attr('href');
				var url = '{{URL::route('admin.organisasi.detail',$id)}}'+'?'+next.split("?")[1];
				
				$('.cabang_list').load(url);
				$( ".loader" ).fadeOut( 200, function(){});
		    }
		});
		$( ".loader" ).fadeOut( 200, function(){});
	});
</script>
<div id="organisasi_detail_content">
<div id="datacabang"> 
	<div><span class='detail_cell'>Nama Cabang</span>: {{$cabang->nama}}</div>
	<span class='clear'>&nbsp;</span>
	<div><span class='detail_cell'>Alamat Kantor</span>:  {{$cabang->alamat}}</div>
	<span class='clear'>&nbsp;</span>
	<div><span class='detail_cell'>Telepon</span>: {{$cabang->telp}} </div>
	<span class='clear'>&nbsp;</span>
	<div><span class='detail_cell'>Fax</span>: {{$cabang->fax}}</div>
	<span class='clear'>&nbsp;</span>
	<div><span class='detail_cell'>E-mail</span>:  {{$cabang->email}}</div>

	<div><span class='detail_cell'>URL</span>:<a href='http://{{$cabang->link}}'> {{$cabang->link}}</a></div>
	<div></div><a href='javascript:void(0)' class='go_back_but' style='margin-left:490px;'>Kembali</a></div>
	<span class='clear'>&nbsp;</span>	
</div>
<hr style="margin-top: 30px;"/>
<div id="pengurus">
	<h4>Daftar Pengurus Pada Cabang ini</h4>
	<div id="listPengurus">
		@if($pengurus == NULL)
			<span>Tidak terdapat pengurus yang diunggah dari cabang ini</span>
		@else
			<table border=0 style='width:800px;'>
			@foreach($pengurus as $urus)
				<tr>
					<td style='vertical-align:middle !important; width:350px; overflow:hidden; margin-right:30px;'><a href='javascript:void(0)' class='periode_pengurus' value='{{$urus->file_path}}'>{{$urus->periode}}</a></td>
				</tr>
			@endforeach
			</table>
			<?php echo $pengurus->links(); ?>
		@endif
		
	</div>
</div>	
</div>
<script>					
	
	$('body').on('click','.go_back_but',function(){
		$( ".loader" ).fadeIn( 200, function(){});
		location.reload();
	});
	
	$('body').on('click','.periode_pengurus',function(){
		var file_path = $(this).attr('value');
		var title = $(this).text();
		$('#title_pdf_viewer').html(title);
		$('#pdf_viewer').attr("data", file_path);
		//$( ".pop_up_super_c" ).fadeIn( 277, function(){});
		$( ".pop_up_super_c_show_pengurus" ).fadeIn( 277, function(){});
		$('html').css('overflow-y', 'hidden');
	});
	
	
	
	//$('.exit').click(function() {$( ".pop_up_super_c" ).fadeOut( 200, function(){});});	
	$('.exit').click(function() {$( ".pop_up_super_c_show_pengurus" ).fadeOut( 200, function(){});});	

	$('.pop_up_super_c_show_pengurus').click(function (e)
	{
		var container = $('.pop_up_cell_show_pengurus');

		if (container.is(e.target) )// if the target of the click is the container...
		{
			$( ".pop_up_super_c_show_pengurus" ).fadeOut( 200, function(){});
			$('html').css('overflow-y', 'auto');
		}
	});
	
</script>	
				

<!--pop up show pengurus-->
<div class=" pop_up_super_c_show_pengurus" style="display: none;">
	<a class="exit close_56_show_pengurus" ></a>
	<div class="pop_up_tbl_show_pengurus">
		<div class="pop_up_cell_show_pengurus">
			<div class="container_12">				
			<div class="grid_12" style="background: #fff;">
				<h3 style="padding-top: 5px;padding-left: 20px; margin-bottom: 5px !important; text-align: center;" id="title_pdf_viewer"></h3>					
				<!--<object data="assets/img/Chapter_4.pdf" type="application/pdf" width="100%" class="pdf_viewer"></object>-->
				<object style="height:590px !important;" data="" type="application/pdf" width="100%" id="pdf_viewer"></object>
			</div>
			</div>
			
		</div>
		
	</div>
</div>

