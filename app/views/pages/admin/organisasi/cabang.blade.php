<script>
	var arrIDCabang = "";
	function getCabang(){
		$.ajax({
			url: 'admin/organisasi/daftarcabang',
			type: 'GET',
			success: function(data){
				if(data==""){
					//alert("Kosong");
					var list ="<tr><td class='nama_cabang'>Kantor</td>";
					list+="<td class='alamat_cabang'>Alamat Cabang</td>";
					list+="<td class='telepon_cabang'>Telepon</td>";
					list+="<td class='detail_cabang'>Lihat Detail</td>";
					list+="</tr>";
					list+="<tr><td class='nama_cabang'>-</td>";
					list+="<td class='alamat_cabang'>-</td>";
					list+="<td class='telepon_cabang'>-</td>";
					list+="<td class='detail_cabang'>-</td>";
					list+="</tr>";
					$('.list_cabang').html(list);
				}
				else{
					//atur
					var length = data.length;
					var list ="<tr><td class='nama_cabang'>Nama Cabang</td>";
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
						list+="<td class='detail_cabang'><a href='#'>Lihat Detail</a></td>";
						list+="</tr>";
					}
					$('.list_cabang').html(list);
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
	<div id='tambah_cabang_link'><a href='javascript:void(0)' id='tambah_cabang'>Tambah Kantor Cabang Baru</a></div>
	<div class="cabang_list">
		<table class='list_cabang'>
		</table>
		<script>
			
			$('body').on('click','.hapus_cabang',function(){
				$id = $(this).next().val();
				//ajax delete
				$.ajax({
					url: 'admin/organisasi/deletecabang',
					type: 'DELETE',
					data: {
						'id_cabang' : arrIDCabang[$id]
					},
					success: function(data){
						getCabang();
					},
					error:function(jqXHR, textStatus, errorThrown){
						alert(errorThrown);
					}		
				});
			});
			
			$('#tambah_cabang').click(function(){
				$( ".pop_up_super_c" ).fadeIn( 277, function(){});
				$nama=$('#new_nama').val("");
				$alamat=$('#new_alamat').val(""); 
				$telepon=$('#new_telepon').val("");
				$fax=$('#new_fax').val("");
				$email=$('#new_email').val("");
				$website=$('#new_website').val("");
				$('html').css('overflow-y', 'hidden');
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
			
			$('body').on('click','#tambah_cabang_button',function(){
				
			});
		</script>				
	</div>		
</div> 
<!--pop up -->
<div class=" pop_up_super_c" style="display: none;">
	<a class="exit close_56" ></a>
	<div class="pop_up_tbl">
		<div class="pop_up_cell">
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
										$( ".pop_up_super_c" ).fadeOut( 200, function(){});
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

