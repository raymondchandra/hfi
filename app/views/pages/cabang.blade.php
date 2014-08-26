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
				
				<div class="cabang_list">
					<table class='list_cabang'>
						<tr>
							<td class="nama_cabang">Nama Cabang</td>
							<td class="alamat_cabang">Alamat Cabang</td>
							<td>&nbsp;</td>
						</tr>
						<?php 
							$list="";
							$count = 0;
							foreach ($arr2 as $value){
								$list.="<tr>";
								$list.="<td>".$arr2[0]['nama']."</td>";
								$list.="<td>".$arr2[0]['alamat']."</td>";
								$list.="<td><a href='javascript:void(0)' class='pop_the_pop_up'>Lihat Detail</a>
									<input type='hidden' class='hidden_nama' value='".$arr2[0]['nama']."'/>
									<input type='hidden' class='hidden_alamat' value='".$arr2[0]['alamat']."'/>
									<input type='hidden' class='hidden_telp' value='".$arr2[0]['telp']."'/>
									<input type='hidden' class='hidden_fax' value='".$arr2[0]['fax']."'/>
									<input type='hidden' class='hidden_email' value='".$arr2[0]['email']."'/>
									<input type='hidden' class='hidden_link' value='".$arr2[0]['link']."'/>
								</td>";
								$list.="</tr>";
								$count++;
							}
							echo $list;
						?>
					</table>
					<script>
						$('.pop_the_pop_up').click(function() {
							$( ".pop_up_super_c" ).fadeIn( 277, function(){});
							$('html').css('overflow-y', 'hidden');
							$('#nama_cabang_pop').text($(this).siblings('.hidden_nama').val());
							$('#alamat_cabang_pop').text($(this).siblings('.hidden_alamat').val());
							$('#telepon_cabang_pop').text($(this).siblings('.hidden_telp').val());
							$('#fax_cabang_pop').text($(this).siblings('.hidden_fax').val());
							$('#email_cabang_pop').text($(this).siblings('.hidden_email').val());
							if($(this).siblings('.hidden_link').val()=="-"){
								$('#website_cabang_pop').html($(this).siblings('.hidden_link').val());
							}
							else{
								$('#website_cabang_pop').html("<a href='"+$(this).siblings('.hidden_link').val()+"'>"+$(this).siblings('.hidden_link').val()+"</a>");
							}
							
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
			<div class="grid_5 detail_cabang" style="background: #fff;">
				<h2>Detail Cabang</h2>
				<table class="table_cabang">
					<tr>
						<td>Nama Cabang</td>
						<td><pre>:   </pre></td>
						<td><span id='nama_cabang_pop'>Bandung</span></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:   </td>
						<td><span id='alamat_cabang_pop'>Jl. Merdeka No 123</span></td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td>:   </td>
						<td><span id='telepon_cabang_pop'>022 76451719</span></td>
					</tr>
					<tr>
						<td>Fax</td>
						<td>:   </td>
						<td><span id='fax_cabang_pop'>022 76451719</span></td>
					</tr>
					<tr>
						<td>e-mail</td>
						<td>:   </td>
						<td><span id='email_cabang_pop'><a href='javascript:void(0)'>bandung@hfi.fisika.net</a></span></td>
					</tr>
					<tr>
						<td>Website</td>
						<td>:   </td>
						<td><span id='website_cabang_pop'><a href='javascript:void(0)'>hfi.fisika.net</a></span></td>
					</tr>
				</table>
			</div>
			</div>			
		</div>		
	</div>
</div>

@stop
