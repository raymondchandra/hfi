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
						</tr>
						<tr>
							<td>Jakarta Utara</td>
							<td>Jl. Merdeka No. 1</td>
							<td><a href='javascript:void(0)' class="pop_the_pop_up">Lihat Detail</a><input type='hidden' value=0;></td>
						</tr>
					</table>
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
