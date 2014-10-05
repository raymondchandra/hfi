@extends('layouts.default')
@section('content')	
<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			<div class="side_panel_hfi">
				<div class="side_panel_hfi_background">
				<ul>
					<li>				
						{{HTML::linkRoute('profile','Profile')}}
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						{{HTML::linkRoute('carianggota','Cari Member')}}
					</li>	
					<span class="white_space">&nbsp;</span>
					<li>
						{{HTML::linkRoute('berkas','e-Berkas')}}
					</li>										
				</ul>
				</div>
			</div>
			
			<!-- css nya pake yang di file admin_berkas.css -->
			<div class="content_hfi" id="contentfield">
				<h3>Berkas</h3>
				
				@if(count($listberkas) == 0)
					Tidak terdapat berkas di dalam database
				@else
					<table class="table_preview" style="margin-bottom:0px; margin-top:30px;" border=0>				
						<tr>
							<!--<td class="nama_berkas">Nama Berkas</td>
							<td class="pengunggah_berkas">Pengunggah Berkas</td>
							<td class="deskripsi_berkas">Deskripsi Berkas</td>
							<td class="download_berkas">&nbsp;</td>-->
							<td class="userview_nama_berkas">Nama Berkas</td>
							<td class="userview_besar_file">Besar File</td>
							<td class="userview_deskripsi_berkas">Deskripsi Berkas</td>
							<td class="userview_download_berkas">&nbsp;</td>
						</tr>
					</table>
					<hr>
					<table class="table_preview" style="margin-top:20px;" border=0>
						@foreach($listberkas as $file)
							<tr>
								<td class="userview_nama_berkas">{{$file->nama_file}}</td>
								<td class="userview_besar_file"> <?php echo intval(filesize($file->path_file)* .0009765625)//echo $arrPengunggah[$i]; //echo $berkas['uploaded_by']?> KB</td>
								<td class="userview_deskripsi_berkas"> <input type="hidden" value="{{$file->deskripsi}}"/><button style="width:120px; margin-top:0px;" class="button_show_deskripsi" type="submit">Lihat Deskripsi</button></td>
								<td> 
									<?php $path = "../".$file->path_file?>						
									<!--<form method="get" action="" value="<?php echo $path?>">-->
										<button value="<?php echo $path?>" class="userview_download_berkas" type="submit" style="width:60px; margin-top:0px; margin-left:40px;">Unduh</button>							
		 						</td>
							</tr>
						@endforeach
					</table>
					<?php echo $listberkas->links();?>
				@endif												
			</div>			
			
		</div>
	</div>
</div>	

<script>						
	$(document).ready(function(){
		$('.button_show_deskripsi').click(function(){
			$(".pop_up_super_c").fadeIn(277, function(){});
			var nama = $(this).parent().prev().prev().text();			
			var deskripsi = $(this).prev().val();
			$('#judul_deskripsi').html(nama);
			$('#isi_deskripsi').html(deskripsi);
			$('html').css('overflow-y', 'hidden');
		});
		
		$('.userview_download_berkas').click(function(){			
			window.open($(this).attr('value'));
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
	});		
</script>
	
<!--pop up lihat deskripsi berkas-->
<div class=" pop_up_super_c" style="display: none;">
	<a class="exit close_56" ></a>
	<div class="pop_up_tbl">
		<div class="pop_up_cell">
			<div class="container_12">			
			<div class="div_detail_berkas" style="background:#fff; ">								
				<h3 id="judul_deskripsi"></h3>
				<div id="div_isi_deskripsi">
					<p id="isi_deskripsi"></p>
				</div>			
			</div>
			</div>			
		</div>		
	</div>
</div>
@stop