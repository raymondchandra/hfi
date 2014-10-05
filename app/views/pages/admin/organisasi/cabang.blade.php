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
								/*
								list+="<td class='fax_cabang' style='display:none'>"+data[$i]['fax']+"</td>";
								list+="<td class='email_cabang' style='display:none'>"+data[$i]['email']+"</td>";
								if(data[$i]['link']=="-"){
									list+="<td class='website_cabang' style='display:none'>"+data[$i]['link']+"</td>";
								}else{
									list+="<td class='website_cabang' style='display:none'><a href='"+data[$i]['link']+"'>"+data[$i]['link']+"</a></td>";
								}
								*/
								
								//value for edit form
								list+="<td style='display:none;'><input type='hidden' value='"+data[$i]['id']+"'/></td>";
								list+="<td style='display:none;'><input type='hidden' value='"+data[$i]['nama']+"'/></td>";
								list+="<td style='display:none;'><input type='hidden' value='"+data[$i]['alamat']+"'/></td>";
								list+="<td style='display:none;'><input type='hidden' value='"+data[$i]['telp']+"'/></td>";
								list+="<td style='display:none;'><input type='hidden' value='"+data[$i]['fax']+"'/></td>";
								list+="<td style='display:none;'><input type='hidden' value='"+data[$i]['email']+"'/></td>";
								list+="<td style='display:none;'><input type='hidden' value='"+data[$i]['link']+"'/></td>";
								
								list+="<td class='detail_cabang'><a href='javascript:void(0)' class='lihat_detail detail_row'>Lihat Detail</a><input type='hidden' value='"+$i+"' /><abbr title='Edit Cabang!'><input type='button' class='edit_cabang edit_row' value='V' /></abbr><abbr title='Hapus Cabang!'><input type='button' class='hapus_cabang delete_row' value='X' /></abbr></td>";
								list+="</tr>";
							}
							list+="</table>";
							$('.cabang_list').html(list);
						}
						$( ".loader" ).fadeOut( 200, function(){});
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
			<div class="cabang_list" style="margin-left: 20px !important; ">
				<table class='list_cabang'>
				</table>
				<script>
					//newcode
					var id_delete_cabang;
					$('body').on('click','.hapus_cabang',function(){
						$( ".pop_up_super_c_hapus_cabang" ).fadeIn( 277, function(){});						
						// $( ".loader" ).fadeIn( 200, function(){});						
						id_delete_cabang = $(this).parent().parent().prev().prev().prev().prev().prev().prev().prev().children().val();
						// alert(id_delete_cabang);
						// alert("masuk ke fungsi");
						//ajax delete
						// $.ajax({
							// url: 'admin/organisasi/deletecabang',
							// type: 'DELETE',
							// data: {
								// 'id_cabang' : arrIDCabang[$id]
							// },
							// success: function(data){
								// alert("berhasil menghapus");
								// getCabang();
								// $( ".loader" ).fadeOut( 200, function(){});
							// },
							// error:function(jqXHR, textStatus, errorThrown){
								// alert(errorThrown);
							// }		
						// });
						
					});	
					$('body').on('click','.ok_hapus_cabang',function(){
						$.ajax({
							url: 'admin/organisasi/deletecabang',
							type: 'DELETE',
							data: {
								'id_cabang' : id_delete_cabang
							},
							success: function(data){
								alert("berhasil menghapus");
								$( ".pop_up_super_c_hapus_cabang" ).fadeOut( 277, function(){});	
								getCabang();								
								//$( ".loader" ).fadeOut( 200, function(){});
							},
							error:function(jqXHR, textStatus, errorThrown){
								alert(errorThrown);
							}		
						});
					});
					$('body').on('click','.batal_hapus_cabang',function(){
						$( ".pop_up_super_c_hapus_cabang" ).fadeOut( 277, function(){});
					});
					// ok_hapus_cabang
					// batal_hapus_cabang
					//endnewcode
									
					$('body').on('click','.lihat_detail',function(){
						var id = $(this).next().val();
						//input pengurus
						var inputpengurus_idcabang = arrIDCabang[id];				
						$( ".loader" ).fadeIn( 200, function(){});
						var url = '{{URL::to('/')}}';
						$('.cabang_list').load(url+'/admin/organisasi/detail/'+inputpengurus_idcabang);
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
					
					
					//newcode				
					var id_edit_cabang;
					$('body').on('click','.edit_cabang',function(){
						$( ".pop_up_super_c_edit_cabang" ).fadeIn( 277, function(){});
							id_edit_cabang = $(this).parent().parent().prev().prev().prev().prev().prev().prev().prev().children().val();							
							// alert(id_edit_cabang);
							$temp_nama = $(this).parent().parent().prev().prev().prev().prev().prev().prev().children().val();							
							$temp_alamat = $(this).parent().parent().prev().prev().prev().prev().prev().children().val();
							$temp_telepon = $(this).parent().parent().prev().prev().prev().prev().children().val();
							$temp_fax = $(this).parent().parent().prev().prev().prev().children().val();
							$temp_email = $(this).parent().parent().prev().prev().children().val();
							$temp_website = $(this).parent().parent().prev().children().val();
						// $id=$('#edit_new_id').val($temp_id);
						$nama=$('#edit_new_nama').val($temp_nama);
						$alamat=$('#edit_new_alamat').val($temp_alamat); 
						$telepon=$('#edit_new_telepon').val($temp_telepon);
						$fax=$('#edit_new_fax').val($temp_fax);
						$email=$('#edit_new_email').val($temp_email);
						$website=$('#edit_new_website').val($temp_website);
						$('html').css('overflow-y', 'hidden');
					});
					//endnewcode
					
					$('.exit').click(function() {$( ".pop_up_super_c_tambah_cabang" ).fadeOut( 200, function(){});});	
					$('.exit').click(function() {$( ".pop_up_super_c_edit_cabang" ).fadeOut( 200, function(){});});	
					$('.exit').click(function() {$( ".pop_up_super_c_hapus_cabang" ).fadeOut( 200, function(){});});	
					
					$('.pop_up_super_c_tambah_cabang').click(function (e)
					{
						var container = $('.pop_up_cell_tambah_cabang');

						if (container.is(e.target) )// if the target of the click is the container...
						{
							$( ".pop_up_super_c_tambah_cabang" ).fadeOut( 200, function(){});
							$('html').css('overflow-y', 'auto');
						}
					});
					$('.pop_up_super_c_edit_cabang').click(function (e)
					{
						var container = $('.pop_up_cell_edit_cabang');

						if (container.is(e.target) )// if the target of the click is the container...
						{
							$( ".pop_up_super_c_edit_cabang" ).fadeOut( 200, function(){});
							$('html').css('overflow-y', 'auto');
						}
					});
					$('.pop_up_super_c_hapus_cabang').click(function (e)
					{
						var container = $('.pop_up_cell_hapus_cabang');

						if (container.is(e.target) )// if the target of the click is the container...
						{
							$( ".pop_up_super_c_hapus_cabang" ).fadeOut( 200, function(){});
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
												alert(data);
												$( ".loader" ).fadeIn( 200, function(){});
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
		
		<!--pop up edit cabang -->
		<div class=" pop_up_super_c_edit_cabang" style="display: none;">
			<a class="exit close_56_edit_cabang" ></a>
			<div class="pop_up_tbl_edit_cabang">
				<div class="pop_up_cell_edit_cabang">
					<div class="container_12">			
					<div class="grid_7 detail_cabang" style="background: #fff;">
						<h2>Edit Cabang</h2>
						<form class='edit_cabang_form'>
							<table class="table_edit_cabang">
								<tr>
									<td>Nama Cabang</td>
									<td><pre>:   </pre></td>
									<td><input type='text' name='edit_new_nama' id='edit_new_nama' /></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td><pre>:   </pre></td>
									<td><input type='text' name='edit_new_alamat' id='edit_new_alamat' /></td>
								</tr>
								<tr>
									<td>Telepon</td>
									<td>:   </td>
									<td><input type='text' name='edit_new_telepon' id='edit_new_telepon' /></td>
								</tr>
								<tr>
									<td>Fax</td>
									<td>:   </td>
									<td><input type='text' name='edit_new_fax' id='edit_new_fax' /></td>
								</tr>
								<tr>
									<td>e-mail</td>
									<td>:   </td>
									<td><input type='text' name='edit_new_email' id='edit_new_email' /></td>
								</tr>
								<tr>
									<td>Website</td>
									<td>:   </td>
									<td><input type='text' id='edit_new_website' /></td>
								</tr>
								<tr>
									<td><input type='submit' value='Edit' id="edit_cabang_button"/></td>
								</tr>
								
							</table>
						</form>
						<script>								
								$( ".edit_cabang_form" ).validate({
									rules: {
										edit_new_nama : {
										  required: true
										},
										edit_new_alamat:{
											required:true
										},
										edit_new_telepon:{
											required:true
										}										
									}, messages: {
										edit_new_nama: {
										  required: "Mohon isi Nama Cabang"
										},
										edit_new_alamat: {
										  required: "Mohon isi Nama Cabang"
										},
										edit_new_telepon: {
										  required: "Mohon isi Nama Cabang"
										}										
									},
									submitHandler: function(form) {										
										$nama=$('#edit_new_nama').val();
										$alamat=$('#edit_new_alamat').val();
										$telepon=$('#edit_new_telepon').val();
										$fax=$('#edit_new_fax').val();
										$email=$('#edit_new_email').val();
										$website=$('#edit_new_website').val();
										$.ajax({
											url: 'admin/organisasi/editcabang',
											type: 'PUT',
											data: {
												'id_cabang':id_edit_cabang,
												'nama_cabang':$nama,
												'telp_cabang':$telepon,
												'fax_cabang':$fax,
												'email_cabang':$email,
												'link_cabang':$website,
												'alamat_cabang':$alamat
											},
											success: function(data){
												alert(data);
												$( ".loader" ).fadeIn( 200, function(){});
												$( ".pop_up_super_c_edit_cabang" ).fadeOut( 200, function(){});
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
		
		<!-- pop up hapus cabang -->
		<div class=" pop_up_super_c_hapus_cabang" style="display: none;">
			<a class="exit close_56_hapus_cabang" ></a>
			<div class="pop_up_tbl_hapus_cabang">
				<div class="pop_up_cell_hapus_cabang">
					<div class="container_12">			
						<div class="div_hapus_cabang" style="background: #fff; width:600px !important; padding-top:40px;">
							<h2 style="text-align:center;">Anda yakin ingin menghapus cabang ini?</h2>							
							<table border="0" style="margin-left:auto; margin-right:auto;">
								<tr>
									<td><button class="ok_hapus_cabang">Ya</button></td>
									<td>&nbsp;</td>
									<td><button class="batal_hapus_cabang">Tidak</button></td>
								</tr>
							</table>
						</div>
					</div>			
				</div>		
			</div>
		</div>
		
	</div>
</div>

