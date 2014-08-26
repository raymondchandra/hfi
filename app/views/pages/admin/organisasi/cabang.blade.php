<script>
	var arrIDCabang = "";
	$(document).ready(function() {
		$.ajax({
			url: 'admin/organisasi/daftarcabang',
			type: 'GET',
			success: function(data){
				if(data==""){
					alert("Kosong");
				}
				else{
					//atur
					var length = data.length;
					var list ="";
					arrIDCabang = [];
					for($i = 0; $i<length;$i++){
						arrIDCabang[$i] = data[$i]['id'];
						list+="<tr>";
						list+="<td class='nama_cabang'>"+data[$i]['nama']+"</td>";
						list+="<td class='alamat_cabang'>"+data[$i]['alamat']+"</td>";
						list+="<td class='telepon_cabang'>"+data[$i]['telp']+"</td>";
						list+="<td class='fax_cabang'>"+data[$i]['fax']+"</td>";
						list+="<td class='email_cabang'>"+data[$i]['email']+"</td>";
						if(data[$i]['link']=="-"){
							list+="<td class='website_cabang'>"+data[$i]['link']+"</td>";
						}else{
							list+="<td class='website_cabang'><a href='"+data[$i]['link']+"'>"+data[$i]['link']+"</a></td>";
						}
						
						list+="<td><input type='button' value='v' class='edit_info_cabang' /><input type='hidden' class='id_cabang' value='"+$i+"'></td>";
						list+="<td><input type='button' value='x' class='hapus_cabang' /><input type='hidden' class='id_cabang' value='"+$i+"'></td>";
						list+="</tr>";
					}
					$('#daftar_semua_cabang').html(list);
				}
			},
			error:function(errorThrown){
				alert(errorThrown);
			}		
		});
	});
</script>

<div class='admin_title'>Cabang</div>

<div class="cabang_list_container">
	<div id='tambah_cabang_link'><a href='javascript:void(0)' id='tambah_cabang'>Tambah Kantor Cabang Baru</a></div>
	<div class="cabang_list">
		<table class='list_cabang'>
			<tr>
				<td class="nama_cabang">Nama Cabang</td>
				<td class="alamat_cabang">Alamat Cabang</td>
				<td class="telepon_cabang">Telepon</td>
				<td class="fax_cabang">Fax</td>
				<td class="email_cabang">E-mail</td>
				<td class="website_cabang">Website</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</table>
		<table class='list_cabang' id='daftar_semua_cabang'>
			<tr>
				<td class="nama_cabang">Nama Cabang</td>
				<td class="alamat_cabang">Alamat Cabang</td>
				<td class="telepon_cabang">081294056255</td>
				<td class="fax_cabang">Fax</td>
				<td class="email_cabang">E-mail</td>
				<td class="website_cabang">hfi.fisika.net</td>
				<td><input type="button" value="v" class="edit_info_cabang" /></td>
			</tr>
			<tr>
				<td class="nama_cabang">Nama Cabang</td>
				<td class="alamat_cabang">Alamat Cabang</td>
				<td class="telepon_cabang">Telepon</td>
				<td class="fax_cabang">Fax</td>
				<td class="email_cabang">E-mail</td>
				<td class="website_cabang">Website</td>
				<td><input type="button" value="v" class="edit_info_cabang" /></td>
			</tr>
		</table>
		<script>
			$('body').on('click','.edit_info_cabang',function(){
				$nama_cabang=$(this).parent().siblings('.nama_cabang').text();
				$alamat_cabang = $(this).parent().siblings('.alamat_cabang').text();
				$telepon_cabang = $(this).parent().siblings('.telepon_cabang').text();
				$fax_cabang = $(this).parent().siblings('.fax_cabang').text();
				$email_cabang = $(this).parent().siblings('.email_cabang').text();
				$website_cabang = $(this).parent().siblings('.website_cabang').text();
				$id_cabang = $(this).next().val();
				$string="<td class='nama_cabang'><input type='text' id='up_nama_cabang' value='"+$nama_cabang+"' /></td>";
				$string+="<td class='alamat_cabang'><input type='text' id='up_alamat_cabang' value='"+$alamat_cabang+"' /></td>";
				$string+="<td class='telepon_cabang'><input type='text' id='up_telepon_cabang' value="+$telepon_cabang+" /></td>";
				$string+="<td class='fax_cabang'><input type='text' id='up_fax_cabang' value="+$fax_cabang+" /></td>";
				$string+="<td class='email_cabang'><input type='text' id='up_email_cabang' value="+$email_cabang+" /></td>";
				$string+="<td class='website_cabang'><input type='text' id='up_website_cabang' value="+$website_cabang+" /></td>";
				$string+="<td><input type='button' value='Ok' class='ok_edit' /><input type='hidden' value='"+$id_cabang+"' /></td>";
				$(this).parent().parent().html($string);
			});
			
			$('body').on('click','.ok_edit',function(){
				$id = $(this).next().val();
				$nama_cabang=$(this).parent().siblings('.nama_cabang').children('#up_nama_cabang').val();
				$alamat_cabang = $(this).parent().siblings('.alamat_cabang').children('#up_alamat_cabang').val();
				$telepon_cabang = $(this).parent().siblings('.telepon_cabang').children('#up_telepon_cabang').val();
				$fax_cabang = $(this).parent().siblings('.fax_cabang').children('#up_fax_cabang').val();
				$email_cabang = $(this).parent().siblings('.email_cabang').children('#up_email_cabang').val();
				$website_cabang = $(this).parent().siblings('.website_cabang').children('#up_website_cabang').val();
				//ajax update
				//alert(arrIDCabang[$id]);
				$.ajax({
					url: 'admin/organisasi/editcabang',
					type: 'PUT',
					data: {
						'id_cabang' : arrIDCabang[$id],
						'nama_cabang':$nama_cabang,
						'telp_cabang':$telepon_cabang,
						'fax_cabang':$fax_cabang,
						'email_cabang':$email_cabang,
						'link_cabang':$website_cabang,
						'alamat_cabang':$alamat_cabang
					},
					success: function(data){
						alert(data);
						$string = "<td class='nama_cabang'>"+$nama_cabang+"</td>"
						$string += "<td class='alamat_cabang'>"+$alamat_cabang+"</td>"
						$string += "<td class='telepon_cabang'>"+$telepon_cabang+"</td>"
						$string += "<td class='fax_cabang'>"+$fax_cabang+"</td>"
						$string += "<td class='email_cabang'>"+$email_cabang+"</td>"
						$string += "<td class='website_cabang'>"+$website_cabang+"</td>"
						$string += "<td><input type='button' value='v' class='edit_info_cabang' /></td>"
						$(this).parent().parent().html($string);
					},
					error:function(jqXHR, textStatus, errorThrown){
						alert(errorThrown);
					}		
				});
			});
			$('body').on('click','.hapus_cabang',function(){
				/*$id = $(this).next().val();
				//ajax delete
				$.ajax({
					url: 'admin/organisasi/editcabang',
					type: 'DELETE',
					data: {
						'id_cabang' : $id
					},
					success: function(data){
						alert(data);
					},
					error:function(jqXHR, textStatus, errorThrown){
						alert(errorThrown);
					}		
				});*/
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
						alert('Success');
					},
					error:function(errorThrown){
						alert(errorThrown);
					}		
				});
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
			<div class="grid_5 detail_cabang" style="background: #fff;">
				<h2>Detail Cabang</h2>
				<table class="table_cabang">
					<tr>
						<td>Nama Cabang</td>
						<td><pre>:   </pre></td>
						<td><input type='text' id='new_nama' placeholder="Masukkan Nama Cabang!" /></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td><pre>:   </pre></td>
						<td><input type='text' id='new_alamat'placeholder="Masukkan Alamat Cabang!" /></td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td>:   </td>
						<td><input type='text' id='new_telepon' placeholder="Masukkan Nomor Telepon Cabang!" /></td>
					</tr>
					<tr>
						<td>Fax</td>
						<td>:   </td>
						<td><input type='text' id='new_fax' placeholder="Masukkan Nomor Fax Cabang!"/></td>
					</tr>
					<tr>
						<td>e-mail</td>
						<td>:   </td>
						<td><input type='text' id='new_email' placeholder="Masukkan E-mail Cabang!"/></td>
					</tr>
					<tr>
						<td>Website</td>
						<td>:   </td>
						<td><input type='text' id='new_website' placeholder="Masukkan Website Cabang!"/></td>
					</tr>
					<tr>
						<td><input type='button' value='Tambah' id="tambah_cabang_button"/></td>
					</tr>
					
				</table>
			</div>
			</div>			
		</div>		
	</div>
</div>
