@extends('layouts.default')
@section('content')	
<script>
	var arrIDCabang = "";
	function getCabang(){
		$.ajax({
			url: 'organisasi/daftarcabang',
			type: 'GET',
			success: function(data){
				if(data==""){
					//alert("Kosong");
					var list ="<h3>Cabang</h3>";
					list+="<table class='list_cabang table'><thead><tr><td class='nama_cabang'>Kantor</td>";
					list+="<td class='alamat_cabang'>Alamat Cabang</td>";
					//list+="<td class='telepon_cabang'>Telepon</td>";
					list+="<td class='detail_cabang'>Lihat Detail</td>";
					list+="</tr></thead>";
					list+="<tbody><tr><td class='nama_cabang'>-</td>";
					list+="<td class='alamat_cabang'>-</td>";
					//list+="<td class='telepon_cabang'>-</td>";
					list+="<td class='detail_cabang'>-</td>";
					list+="</tr></tbody></table>";
					$('.cabang_list').html(list);
				}
				else{
					//atur
					var length = data.length;
					var list ="<h3>Cabang</h3>";
					list+="<table class='list_cabang table'><thead><tr><td class='nama_cabang'>Nama Cabang</td>";
					list+="<td class='alamat_cabang'>Alamat Cabang</td>";
					//list+="<td class='telepon_cabang'>Telepon</td>";
					list+="<td class='detail_cabang'>Lihat Detail</td>";
					list+="</tr></thead>";
					list+="<tbody>";
					arrIDCabang = [];
					for($i = 0; $i<length;$i++){
						arrIDCabang[$i] = data[$i]['id'];
						list+="<tr>";
						list+="<td class='nama_cabang'>"+data[$i]['nama']+"</td>";
						list+="<td class='alamat_cabang'>"+data[$i]['alamat']+"</td>";
						//list+="<td class='telepon_cabang'>"+data[$i]['telp']+"</td>";
						/*list+="<td class='fax_cabang'>"+data[$i]['fax']+"</td>";
						list+="<td class='email_cabang'>"+data[$i]['email']+"</td>";
						if(data[$i]['link']=="-"){
							list+="<td class='website_cabang'>"+data[$i]['link']+"</td>";
						}else{
							list+="<td class='website_cabang'><a href='"+data[$i]['link']+"'>"+data[$i]['link']+"</a></td>";
						}*/
						list+="<td class='detail_cabang'><a href='javascript:void(0)' class='lihat_detail detail_row'>Lihat Detail</a><input type='hidden' value='"+$i+"' /></td>";
						list+="</tr>";
					}
					list+="</tbody>";
					list+="</table>";
					$('.cabang_list').html(list);
					$( ".loader" ).fadeOut( 200, function(){});
				}
			},
			error:function(errorThrown){
				//alert(errorThrown);
			}		
		});
	}
	$(document).ready(function() {
		getCabang();
	});
</script>
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
				<div class="cabang_list" style="margin-left:0px;">					
					<script>
						var inputpengurus_idcabang;					
						$('body').on('click','.lihat_detail',function(){
							$id = $(this).next().val();
								//input pengurus
								inputpengurus_idcabang = $id;				
							$( ".loader" ).fadeIn( 200, function(){});
							$(".content_hfi").load('{{URL::to('/')}}'+'/organisasi/detail/'+arrIDCabang[inputpengurus_idcabang]);
						});									
						
						$('body').on('click','.go_back_but',function(){
							$( ".loader" ).fadeIn( 200, function(){});
							getCabang();
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
						
						$('body').on('click','.exit',function(){
							$( ".pop_up_super_c_show_pengurus" ).fadeOut( 200, function(){});
						});
						//$('.exit').click(function() {$( ".pop_up_super_c_show_pengurus" ).fadeOut( 200, function(){});});					
					
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
				</div>
			</div>
		</div>
		
	</div>

</div>

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
@stop
