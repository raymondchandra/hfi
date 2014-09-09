<div class="container_12">
	<div class="grid_12">
		<script>
			var arrIDCabang = "";
			function getCabang(){
				$.ajax({
					url: 'admin/organisasi/daftarcabang',
					type: 'GET',
					success: function(data){
						if(data==""){
							//alert("Kosong");
							var list ="<table class='list_cabang'><tr><td class='nama_cabang'>Kantor</td>";
							list+="<td class='alamat_cabang'>Alamat Cabang</td>";
							list+="<td class='telepon_cabang'>Telepon</td>";
							list+="<td class='detail_cabang'>Lihat Detail</td>";
							list+="</tr>";
							list+="<tr><td class='nama_cabang'>-</td>";
							list+="<td class='alamat_cabang'>-</td>";
							list+="<td class='telepon_cabang'>-</td>";
							list+="<td class='detail_cabang'>-</td>";
							list+="</tr></table>";
							$('.cabang_list').html(list);
						}
						else{
							//atur
							var length = data.length;
							var list ="<table class='list_cabang'><tr><td class='nama_cabang'>Nama Cabang</td>";
							list+="<td class='alamat_cabang'>Alamat Cabang</td>";
							list+="<td class='telepon_cabang'>Telepon</td>";
							list+="<td class='detail_cabang'>Lihat Detail</td>";
							list+="</tr>";
							arrIDCabang = [];
							for($i = 0; $i<length;$i++){
								arrIDCabang[$i] = data[$i]['id'];
								list+="<tr>";
								list+="<td class='nama_cabang'>"+data[$i]['nama']+"</td>";
								list+="<td class='alamat_cabang'>"+data[$i]['alamat']+"</td>";
								list+="<td class='telepon_cabang'>"+data[$i]['telp']+"</td>";
								/*list+="<td class='fax_cabang'>"+data[$i]['fax']+"</td>";
								list+="<td class='email_cabang'>"+data[$i]['email']+"</td>";
								if(data[$i]['link']=="-"){
									list+="<td class='website_cabang'>"+data[$i]['link']+"</td>";
								}else{
									list+="<td class='website_cabang'><a href='"+data[$i]['link']+"'>"+data[$i]['link']+"</a></td>";
								}*/
								list+="<td class='detail_cabang'><a href='javascript:void(0)' class='lihat_detail detail_row'>Lihat Detail</a><input type='hidden' value='"+$i+"' /><abbr title='Hapus Cabang!'><input type='button' class='hapus_cabang delete_row' value='X' /></abbr></td>";
								list+="</tr>";
							}
							list+="</table>";
							$('.cabang_list').html(list);
							$( ".loader" ).fadeOut( 200, function(){});
						}
					},
					error:function(errorThrown){
						alert(errorThrown);
					}		
				});
			}
			$(document).ready(function() {
				getCabang();
			});
		</script>

		<div class='admin_title'>Cabang</div>

		<div class="cabang_list_container">
			<div id='tambah_cabang_link'><a href='javascript:void(0)' id='tambah_cabang'  class="command_button">+ Kantor Cabang Baru</a></div>
			<div class="cabang_list">
				<table class='list_cabang'>
				</table>
				<script>
					$('body').on('click','.hapus_pengurus',function(){
						$id = $(this).next().val();
						//alert($id);
						//ajax delete
						$.ajax({
							url: 'admin/organisasi/deletepengurus',
							type: 'DELETE',
							data: {
								'id_pengurus' : arrIDPengurus[$id]
							},
							success: function(data){	
								//refresh page ke getcabang
								alert("berhasil menghapus pengurus");
								getCabang();
								$( ".loader" ).fadeOut( 200, function(){});
							},
							error: function(jqXHR, textStatus, errorThrown){
								alert(errorThrown);
							}
						});
					});		
					
					$('body').on('click','.hapus_cabang',function(){
						$( ".loader" ).fadeIn( 200, function(){});
						$id = $(this).prev().val();
						//ajax delete
						$.ajax({
							url: 'admin/organisasi/deletecabang',
							type: 'DELETE',
							data: {
								'id_cabang' : arrIDCabang[$id]
							},
							success: function(data){
								alert("berhasil menghapus");
								getCabang();
								$( ".loader" ).fadeOut( 200, function(){});
							},
							error:function(jqXHR, textStatus, errorThrown){
								alert(errorThrown);
							}		
						});
					});
					
					var inputpengurus_idcabang;					
					$('body').on('click','.lihat_detail',function(){
						$id = $(this).next().val();
							//input pengurus
							inputpengurus_idcabang = arrIDCabang[$id];				
						$( ".loader" ).fadeIn( 200, function(){});
						$.ajax({
							url: 'admin/organisasi/satucabang',
							type: 'GET',
							data: {
								'id_cabang' : arrIDCabang[$id]
							},
							success: function(data){	
								var view="<div><span class='detail_cell'>Nama Cabang</span>: "+data[0]['nama']+"</div>";
								view+="<span class='clear'>&nbsp;</span>";
								view+="<div><span class='detail_cell'>Alamat Kantor</span>: "+data[0]['alamat']+"</div>";
								view+="<span class='clear'>&nbsp;</span>";
								view+="<div><span class='detail_cell'>Telepon</span>: "+data[0]['telp']+"</div>";
								view+="<span class='clear'>&nbsp;</span>";
								view+="<div><span class='detail_cell'>Fax</span>: "+data[0]['fax']+"</div>";
								view+="<span class='clear'>&nbsp;</span>";
								view+="<div><span class='detail_cell'>E-mail</span>: "+data[0]['email']+"</div>";
								if(data[0]['link']=="-"){
									view+="<div>-</div>";
								}else{
									view+="<div><span class='detail_cell'>URL</span>:<a href='http://"+data[0]['link']+"'>"+data[0]['link']+"</a></div>";
								}
								//view+="<div><hr></hr></div>"								
								// view+="<div><a href='javascript:void(0)' class='go_back_but'>Kembali</a></div>"																															
								view+="<div><a href='javascript:void(0)' class='go_back_but' style='margin-left:790px;'>Kembali</a></div>"
								view+="<span class='clear'>&nbsp;</span>";	
																	
								//tambah ajax buat ngambil seluruh pengurus pada id_cabang tertentu
									$.ajax({
										url: 'admin/organisasi/daftarpengurus',
										type: 'GET',
										data: {
											'id_cabang' : arrIDCabang[$id]
										},
										success: function(data){													
											//view pengurus
											if(data==""){
												view+="<div><hr></hr></div>";
												view+="Tidak terdapat pengurus yang diunggah dari cabang ini";
											}
											else
											{
												view+="<div><hr></hr></div>";
												view+="<h3>Daftar Pengurus Pada Cabang ini</h3>";
												view+="<div id='tambah_pengurus_link'><a href='javascript:void(0)' id='tambah_pengurus'  class='command_button'>+ Pengurus Baru</a></div>";
												//atur
												var length = data.length;
												arrIDPengurus = [];
												arrFILEPATHPengurus = [];												
												view+="<table border=0 style='width:800px;'>";
													view+="<tr>";
														view+="<td><h6>Periode</h6></td>";
														view+="<td><h6>Tanggal Unggah</h6></td>";
														view+="<td>&nbsp;</td>";														
													view+="</tr>";													
													for($i=0; $i<length; $i++){
														arrIDPengurus[$i] = data[$i]['id'];
														arrFILEPATHPengurus[$i] = data[$i]['file_path'];														
														view+="<tr>";
															view+="<td style='vertical-align:middle !important; width:350px; overflow:hidden; margin-right:30px;'><a href='javascript:void(0)' class='periode_pengurus' value='"+data[$i]['file_path']+"'>"+data[$i]['periode']+"</a></td>";
															view+="<td style='vertical-align:middle !important; width:350px;'>"+data[$i]['tanggal_upload']+"</td>"
															view+="<td style='vertical-align:middle !important; width:100px;'><p style='display:none;'>"+data[$i]['file_path']+"</p><input type='button' value='x' class='hapus_pengurus'/><input type='hidden' class='id_pengurus' value='"+$i+"'/></td>";
														view+="</tr>";
													}
												view+="</table>";												
											}
											//end view pengurus																						
											$('.cabang_list').html(view);
											$( ".loader" ).fadeOut( 200, function(){});
										},
										error:function(jqXHR, textStatus, errorThrown){
											alert(errorThrown);
										}
									});									
								//end tambah ajax buat ngambil seluruh pengurus pada id_cabang tertentu																
							},
							error:function(jqXHR, textStatus, errorThrown){
								alert(errorThrown);
							}		
						});
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
					
					$('#tambah_cabang').click(function(){
						//$( ".pop_up_super_c" ).fadeIn( 277, function(){});
						$( ".pop_up_super_c_tambah_cabang" ).fadeIn( 277, function(){});
						$nama=$('#new_nama').val("");
						$alamat=$('#new_alamat').val(""); 
						$telepon=$('#new_telepon').val("");
						$fax=$('#new_fax').val("");
						$email=$('#new_email').val("");
						$website=$('#new_website').val("");
						$('html').css('overflow-y', 'hidden');
					});
					
					//show form tambah pengurus					
					$('body').on('click','#tambah_pengurus',function(){
						$(".pop_up_super_c_tambah_pengurus").fadeIn( 277, function(){});
						$filePeng = $('#filePeng').val("");
						$periode = $('#periode').val("");
						$('html').css('overflow-y', 'hidden');
					});
					
					//$('.exit').click(function() {$( ".pop_up_super_c" ).fadeOut( 200, function(){});});	
					$('.exit').click(function() {$( ".pop_up_super_c_show_pengurus" ).fadeOut( 200, function(){});});	
					$('.exit').click(function() {$( ".pop_up_super_c_tambah_cabang" ).fadeOut( 200, function(){});});	
					$('.exit').click(function() {$( ".pop_up_super_c_tambah_pengurus" ).fadeOut( 200, function(){});});	
				
					$('.pop_up_super_c_show_pengurus').click(function (e)
					{
						var container = $('.pop_up_cell_show_pengurus');

						if (container.is(e.target) )// if the target of the click is the container...
						{
							$( ".pop_up_super_c_show_pengurus" ).fadeOut( 200, function(){});
							$('html').css('overflow-y', 'auto');
						}
					});
					$('.pop_up_super_c_tambah_cabang').click(function (e)
					{
						var container = $('.pop_up_cell_tambah_cabang');

						if (container.is(e.target) )// if the target of the click is the container...
						{
							$( ".pop_up_super_c_tambah_cabang" ).fadeOut( 200, function(){});
							$('html').css('overflow-y', 'auto');
						}
					});
					$('.pop_up_super_c_tambah_pengurus').click(function (e)
					{
						var container = $('.pop_up_cell_tambah_pengurus');

						if (container.is(e.target) )// if the target of the click is the container...
						{
							$( ".pop_up_super_c_tambah_pengurus" ).fadeOut( 200, function(){});
							$('html').css('overflow-y', 'auto');
						}
					});
					
					$('body').on('click','#tambah_cabang_button',function(){
						
					});
				</script>				
			</div>		
		</div> 
		<!--pop up tambah cabang -->
		<div class=" pop_up_super_c_tambah_cabang" style="display: none;">
			<a class="exit close_56_tambah_cabang" ></a>
			<div class="pop_up_tbl_tambah_cabang">
				<div class="pop_up_cell_tambah_cabang">
					<div class="container_12">			
					<div class="grid_7 detail_cabang" style="background: #fff;">
						<h2>Detail Cabang</h2>
						<form class='tambah_cabang_form'>
						<table class="table_cabang">
							<tr>
								<td>Nama Cabang</td>
								<td><pre>:   </pre></td>
								<td><input type='text' name='new_nama' id='new_nama' placeholder="Masukkan Nama Cabang!" /></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><pre>:   </pre></td>
								<td><input type='text' name='new_alamat' id='new_alamat'placeholder="Masukkan Alamat Cabang!" /></td>
							</tr>
							<tr>
								<td>Telepon</td>
								<td>:   </td>
								<td><input type='text' name='new_telepon' id='new_telepon' placeholder="Masukkan Nomor Telepon Cabang!" /></td>
							</tr>
							<tr>
								<td>Fax</td>
								<td>:   </td>
								<td><input type='text' name='new_fax' id='new_fax' placeholder="Masukkan Nomor Fax Cabang!"/></td>
							</tr>
							<tr>
								<td>e-mail</td>
								<td>:   </td>
								<td><input type='text' name='new_email' id='new_email' placeholder="Masukkan E-mail Cabang!"/></td>
							</tr>
							<tr>
								<td>Website</td>
								<td>:   </td>
								<td><input type='text' id='new_website' placeholder="Masukkan Website Cabang!"/></td>
							</tr>
							<tr>
								<td><input type='submit' value='Tambah' id="tambah_cabang_button"/></td>
							</tr>
							
						</table>
						</form>
						<script>
							jQuery.validator.setDefaults({
								  debug: true,
								  success: "valid"
								});
								$( ".tambah_cabang_form" ).validate({
									rules: {
										new_nama : {
										  required: true
										},
										new_alamat:{
											required:true
										},
										new_telepon:{
											required:true
										}
										
									}, messages: {
										new_nama: {
										  required: "Mohon isi Nama Cabang"
										},
										new_alamat: {
										  required: "Mohon isi Nama Cabang"
										},
										new_telepon: {
										  required: "Mohon isi Nama Cabang"
										}
										
									},
									submitHandler: function(form) {
										$nama=$('#new_nama').val();
										$alamat=$('#new_alamat').val();
										$telepon=$('#new_telepon').val();
										$fax=$('#new_fax').val();
										$email=$('#new_email').val();
										$website=$('#new_website').val();
										$.ajax({
											url: 'admin/organisasi/tambahcabang',
											type: 'POST',
											data: {
												'nama_cabang':$nama,
												'telp_cabang':$telepon,
												'fax_cabang':$fax,
												'email_cabang':$email,
												'link_cabang':$website,
												'alamat_cabang':$alamat
											},
											success: function(data){
												$( ".pop_up_super_c_tambah_cabang" ).fadeOut( 200, function(){});
												getCabang();
											},
											error:function(errorThrown){
												alert(errorThrown);
											}		
										});
									}
								});
							</script>
					</div>
					</div>			
				</div>		
			</div>
		</div>
		<!--pop up tambah pengurus -->
		<div class=" pop_up_super_c_tambah_pengurus" style="display: none;">
			<a class="exit close_56_tambah_pengurus" ></a>
			<div class="pop_up_tbl_tambah_pengurus">
				<div class="pop_up_cell_tambah_pengurus">
					<div class="container_12">			
					<div class="grid_9 detail_pengurus" style="background: #fff; margin-left:160px;">
						<h2>Detail Pengurus</h2>
						<form class='tambah_pengurus_form'>
							<!-- /postPengurus-->
							<ul>
								<li>{{ Form::file('filePeng', array('name'=>'filePeng','id'=>'filePeng')) }}</li>
								<li>Periode : {{ Form::text('periode', Input::old('periode'), array('style' => 'width: 200px;', 'id'=>'periode')) }}</li>
								<li>{{ Form::submit('Unggah') }}</li>
							</ul>	
							<script>
								$(".tambah_pengurus_form").validate({
									rules: {
										filePeng : {
											required: true
										},
										periode : {
											required: true
										}
									},									
									message: {
										filePeng : {
											required: "Mohon file diisi"
										},
										periode : {
											required: "Mohon periode diisi"
										}
									},
									submitHandler:function(form){
										$filePeng = $('#filePeng').val();
										$periode = $('#periode').val();
										var data, xhr;
										data = new FormData();										
										data.append('filePeng', $('#filePeng')[0].files[0]);
										data.append('periode', $('#periode').val());
										data.append('id_cabang', inputpengurus_idcabang);
										$.ajax({
											url: 'postPengurus',
											type: 'POST',
											data: data,
											processData: false,
											contentType: false,
											success: function(as){
												$( ".pop_up_super_c_tambah_pengurus" ).fadeOut( 200, function(){
													getCabang();
													alert("Berhasil Menambah Pengurus");
												});											
											},
											error:function(errorThrown){
												alert(errorThrown);
											}	
										});
									}
								});								
							
								// function upload(){
									// var data, xhr;
									// data = new FormData();
									// 'id_pengurus' : arrIDPengurus[$id]
									// data.append('filePeng', $('#filePeng')[0].files[0]);
									// data.append('periode', $('#periode').val());
									// data.append('id_cabang', inputpengurus_idcabang);
									// $.ajax({
										// url: 'postPengurus',
										// type: 'POST',
										// data: data,
										// processData: false,
										// contentType: false,
										// success: function(as){
											// $( ".pop_up_super_c_tambah_pengurus" ).fadeOut( 200, function(){
												// getCabang();
												// alert("Berhasil Menambah Pengurus");
											// });											
										// },
										// error:function(errorThrown){
											// alert(errorThrown);
										// }	
									// });
								// }
							</script>
						</form>						
					</div>
					</div>			
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
