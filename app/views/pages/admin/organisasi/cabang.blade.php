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
							var list ="<table class='list_cabang table'><thead><tr><th class='nama_cabang'>Kantor</th>";
							list+="<th class='alamat_cabang'>Alamat Cabang</th>";
							list+="<th class='telepon_cabang'>Telepon</th>";
							list+="<th class='detail_cabang'>Lihat Detail</th>";
							list+="</tr></thead>";
							list+="<tbody><tr><td class='nama_cabang'>-</td>";
							list+="<td class='alamat_cabang'>-</td>";
							list+="<td class='telepon_cabang'>-</td>";
							list+="<td class='detail_cabang'>-</td>";
							list+="</tr></tbody></table>";
							$('.cabang_list').html(list);
						}
						else{
							//atur
							var length = data.length;
							var list ="<table class='list_cabang table'><thead><tr><th class='nama_cabang'>Nama Cabang</th>";
							list+="<th class='alamat_cabang'>Alamat Cabang</th>";
							list+="<th class='telepon_cabang'>Telepon</th>";								
							list+="<th class='detail_cabang'>Lihat Detail</th>";
							list+="</tr></thead>";
							list+="<tbody>";
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
								list+="<td id='h_id' style='display:none;'><input type='hidden' value='"+data[$i]['id']+"'/></td>";
								list+="<td id='h_nama' style='display:none;'><input type='hidden' value='"+data[$i]['nama']+"'/></td>";
								list+="<td id='h_alamat' style='display:none;'><input type='hidden' value='"+data[$i]['alamat']+"'/></td>";
								list+="<td id='h_telp' style='display:none;'><input type='hidden' value='"+data[$i]['telp']+"'/></td>";
								list+="<td id='h_fax' style='display:none;'><input type='hidden' value='"+data[$i]['fax']+"'/></td>";
								list+="<td id='h_email' style='display:none;'><input type='hidden' value='"+data[$i]['email']+"'/></td>";
								list+="<td id='h_link' style='display:none;'><input type='hidden' value='"+data[$i]['link']+"'/></td>";
								
								list+="<td class='detail_cabang'>";
								list+="<a href='javascript:void(0)' class='lihat_detail detail_row btn btn-success'>Lihat Detail</a><input type='hidden' value='"+$i+"' />";
								list+="<input data-toggle='modal' data-target='.pop_up_super_c_edit_cabang' type='button' class='edit_cabang edit_row btn btn-warning' value='Edit' style='margin-left:10px;'/>";
								list+="<input type='button' class='hapus_cabang delete_row btn btn-danger' value='Delete' style='margin-left:10px;'/>";
								list+="</td>";
								list+="</tr>";
							}
							list+="</tbody>";
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
	<!-- <div id='tambah_cabang_link'>-->
	<button data-toggle="modal" data-target=".pop_up_super_c_tambah_cabang" id='tambah_cabang' class="btn btn-success pull-right">+ Kantor Cabang Baru</button>
	<span class="clearfix"></span>
	<!--</div>-->
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
						//$( ".pop_up_super_c_tambah_cabang" ).fadeIn( 277, function(){});
						$nama=$('#new_nama').val("");
						$alamat=$('#new_alamat').val(""); 
						$telepon=$('#new_telepon').val("");
						$fax=$('#new_fax').val("");
						$email=$('#new_email').val("");
						$website=$('#new_website').val("");
						//$('html').css('overflow-y', 'hidden');
					});
					
					
					//newcode				
					var id_edit_cabang;
					$('body').on('click','.edit_cabang',function(){
						//$( ".pop_up_super_c_edit_cabang" ).fadeIn( 277, function(){});
						id_edit_cabang 	= $(this).parent().siblings('#h_id').children().val();	
						//alert(id_edit_cabang);
						$temp_nama 			= $(this).parent().siblings('#h_nama').children().val();							
						$temp_alamat 		= $(this).parent().siblings('#h_alamat').children().val();
						$temp_telepon 		= $(this).parent().siblings('#h_telp').children().val();
						$temp_fax 			= $(this).parent().siblings('#h_fax').children().val();
						$temp_email 		= $(this).parent().siblings('#h_email').children().val();
						$temp_website 		= $(this).parent().siblings('#h_link').children().val();
						// $id=$('#edit_new_id').val($temp_id);
						$nama 			= $('#edit_new_nama').val($temp_nama);
						$alamat 		= $('#edit_new_alamat').val($temp_alamat); 
						$telepon 		= $('#edit_new_telepon').val($temp_telepon);
						$fax 			= $('#edit_new_fax').val($temp_fax);
						$email 			= $('#edit_new_email').val($temp_email);
						$website 		= $('#edit_new_website').val($temp_website);
						//$('html').css('overflow-y', 'hidden');
					});
					//endnewcode
					
					//$('.exit').click(function() {$( ".pop_up_super_c_tambah_cabang" ).fadeOut( 200, function(){});});	
					//$('.exit').click(function() {$( ".pop_up_super_c_edit_cabang" ).fadeOut( 200, function(){});});	
					$('.exit').click(function() {$( ".pop_up_super_c_hapus_cabang" ).fadeOut( 200, function(){});});	
					
					/*$('.pop_up_super_c_tambah_cabang').click(function (e)
					{
						var container = $('.pop_up_cell_tambah_cabang');

						if (container.is(e.target) )// if the target of the click is the container...
						{
							$( ".pop_up_super_c_tambah_cabang" ).fadeOut( 200, function(){});
							$('html').css('overflow-y', 'auto');
						}
					});*/
/*$('.pop_up_super_c_edit_cabang').click(function (e)
{
	var container = $('.pop_up_cell_edit_cabang');

						if (container.is(e.target) )// if the target of the click is the container...
						{
							$( ".pop_up_super_c_edit_cabang" ).fadeOut( 200, function(){});
							$('html').css('overflow-y', 'auto');
						}
					});*/
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
		<!--<div class=" pop_up_super_c_tambah_cabang" style="display: none;">
			<a class="exit close_56_tambah_cabang" ></a>
			<div class="pop_up_tbl_tambah_cabang">
				<div class="pop_up_cell_tambah_cabang">-->

					<div class="modal fade pop_up_super_c_tambah_cabang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title" id="myModalLabel">Tambah Kantor Cabang</h4>
								</div>

								<form class='tambah_cabang_form form-horizontal'>
									<div class="modal-body">
										<div class="form-group">
											<label class=" control-label col-sm-3">Nama Cabang</label>
											<input type='text' name='new_nama' id='new_nama' placeholder="Masukkan Nama Cabang!" class="form-control col-sm-5"/>
										</div>
										<div class="form-group">
											<label class=" control-label col-sm-3">Alamat</label>
											<input type='text' name='new_alamat' id='new_alamat'placeholder="Masukkan Alamat Cabang!" class="form-control col-sm-5"/>
										</div>
										<div class="form-group">
											<label class=" control-label col-sm-3">Telepon</label>
											<input type='text' name='new_telepon' id='new_telepon' placeholder="Masukkan Nomor Telepon Cabang!" class="form-control col-sm-5"/>
										</div>
										<div class="form-group">
											<label class=" control-label col-sm-3">Fax</label>
											<input type='text' name='new_fax' id='new_fax' placeholder="Masukkan Nomor Fax Cabang!" class="form-control col-sm-5"/>
										</div>
										<div class="form-group">
											<label class=" control-label col-sm-3">e-mail</label>
											<input type='text' name='new_email' id='new_email' placeholder="Masukkan E-mail Cabang!" class="form-control col-sm-5"/>
										</div>
										<div class="form-group">
											<label class=" control-label col-sm-3">Website</label>
											<input type='text' id='new_website' placeholder="Masukkan Website Cabang!" class="form-control col-sm-5"/>
										</div>

									</div>

									<div class="modal-footer">
										<input type='submit' value='Tambah' id="tambah_cabang_button" class="btn btn-success"/>
									</div>

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
										$nama = $('#new_nama').val();
										$alamat = $('#new_alamat').val();
										$telepon = $('#new_telepon').val();
										$fax = $('#new_fax').val();
										$email = $('#new_email').val();
										$website = $('#new_website').val();
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
												//$( ".loader" ).fadeIn( 200, function(){});
												//$( ".pop_up_super_c_tambah_cabang" ).fadeOut( 200, function(){});
												getCabang();

												$('.modal-backdrop').removeClass('in');
												setTimeout(function() {
													$('.modal-backdrop').remove();
												}, 500);
											},
											error:function(errorThrown){
												alert(errorThrown);
												$('.modal-backdrop').removeClass('in');
												setTimeout(function() {
													$('.modal-backdrop').remove();
												}, 500);
											}		
										});
									}
								});
</script>

</div>		
</div>
</div>

<!--pop up edit cabang -->
<!--<div class=" pop_up_super_c_edit_cabang" style="display: none;">
	<a class="exit close_56_edit_cabang" ></a>
	<div class="pop_up_tbl_edit_cabang">
		<div class="pop_up_cell_edit_cabang">-->

			<div class="modal fade pop_up_super_c_edit_cabang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Kantor Cabang</h4>
						</div>
						<form class='edit_cabang_form form-horizontal'>
							<div class="modal-body">


								<div class="form-group">
									<label class=" control-label col-sm-3">Nama Cabang</label>
									<input type='text' name='edit_new_nama' id='edit_new_nama' class="form-control col-sm-5"/>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Alamat</label>
									<input type='text' name='edit_new_alamat' id='edit_new_alamat' class="form-control col-sm-5"/>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Telepon</label>

									<input type='text' name='edit_new_telepon' id='edit_new_telepon' class="form-control col-sm-5"/>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Fax</label>
									<input type='text' name='edit_new_fax' id='edit_new_fax' class="form-control col-sm-5"/>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">E-mail</label>
									<input type='text' name='edit_new_email' id='edit_new_email' class="form-control col-sm-5"/>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Website</label>
									<input type='text' id='edit_new_website' class="form-control col-sm-5"/>
								</div>				
							</div>


							<div class="modal-footer">
								<input type='submit' value='Edit' id="edit_cabang_button" class="btn btn-success"/>
							</div>			a
						</form>
						<script>								
						$( ".edit_cabang_form" ).validate({
							rules: {
								edit_new_nama : {
									ired: true
								},
								edit_new_alamat:{
									required:true
								},
								edit_new_telepon:{
									required:true
								}										
							}, messages: {
								edit_new_nama: {
									uired: "Mohon isi Nama Cabang"
								},
								edit_new_alamat: {
									required: "Mohon isi Nama Cabang"
								},
								edit_new_telepon: {
									required: "Mohon isi Nama Cabang"
								}										
							},
							submitHandler: function(form) {										
								$nama = $('#edit_new_nama').val();
								$alamat = $('#edit_new_alamat').val();
								$telepon = $('#edit_new_telepon').val();
								$fax = $('#edit_new_fax').val();
								$email = $('#edit_new_email').val();
								$website = $('#edit_new_website').val();
								$.ajax({
									url: 'admin/organisasi/editcabang',
									type: 'PUT',
									data: {
										'id_cabang':$id_edit_cabang,
										'nama_cabang':$nama,
										'telp_cabang':$telepon,
										'fax_cabang':$fax,
										'email_cabang':$email,
										'link_cabang':$website,
										'alamat_cabang':$alamat
									},
									success: function(data){
										alert(data);
									//$( ".loader" ).fadeIn( 200, function(){});
									//$( ".pop_up_super_c_edit_cabang" ).fadeOut( 200, function(){});
									getCabang();

									$('.modal-backdrop').removeClass('in');
									setTimeout(function() {
										$('.modal-backdrop').remove();
									}, 500);
								},
								error:function(errorThrown){
									alert(errorThrown);

									$('.modal-backdrop').removeClass('in');
									setTimeout(function() {
										$('.modal-backdrop').remove();
									}, 500);
								}		
							});
							}
						});
</script>

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

