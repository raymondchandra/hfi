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
			</tr>
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
				$string="<td class='nama_cabang'><input type='text' id='up_nama_cabang' value='"+$nama_cabang+"' /></td>";
				$string+="<td class='alamat_cabang'><input type='text' id='up_alamat_cabang' value='"+$alamat_cabang+"' /></td>";
				$string+="<td class='telepon_cabang'><input type='text' id='up_telepon_cabang' value="+$telepon_cabang+" /></td>";
				$string+="<td class='fax_cabang'><input type='text' id='up_fax_cabang' value="+$fax_cabang+" /></td>";
				$string+="<td class='email_cabang'><input type='text' id='up_email_cabang' value="+$email_cabang+" /></td>";
				$string+="<td class='website_cabang'><input type='text' id='up_website_cabang' value="+$website_cabang+" /></td>";
				$string+="<td><input type='button' value='Ok' class='ok_edit' /></td>";
				$(this).parent().parent().html($string);
			});
			
			$('body').on('click','.ok_edit',function(){
				$nama_cabang=$(this).parent().siblings('.nama_cabang').children('#up_nama_cabang').val();
				$alamat_cabang = $(this).parent().siblings('.alamat_cabang').children('#up_alamat_cabang').val();
				$telepon_cabang = $(this).parent().siblings('.telepon_cabang').children('#up_telepon_cabang').val();
				$fax_cabang = $(this).parent().siblings('.fax_cabang').children('#up_fax_cabang').val();
				$email_cabang = $(this).parent().siblings('.email_cabang').children('#up_email_cabang').val();
				$website_cabang = $(this).parent().siblings('.website_cabang').children('#up_website_cabang').val();
				//ajax update
				
				$string = "<td class='nama_cabang'>"+$nama_cabang+"</td>"
				$string += "<td class='alamat_cabang'>"+$alamat_cabang+"</td>"
				$string += "<td class='telepon_cabang'>"+$telepon_cabang+"</td>"
				$string += "<td class='fax_cabang'>"+$fax_cabang+"</td>"
				$string += "<td class='email_cabang'>"+$email_cabang+"</td>"
				$string += "<td class='website_cabang'>"+$website_cabang+"</td>"
				$string += "<td><input type='button' value='v' class='edit_info_cabang' /></td>"
				$(this).parent().parent().html($string);
			});
			
			$('#tambah_cabang').click(function() {
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
				alert($nama);
				alert($alamat);
				alert($telepon);
				alert($fax);
				alert($email);
				alert($website);
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
