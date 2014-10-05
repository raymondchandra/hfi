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
							var list ="<table class='list_cabang table'><tr><td class='nama_cabang'>Kantor</td>";
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
							var list ="<table class='list_cabang table'><tr><td class='nama_cabang'>Nama Cabang</td>";
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
								list+="<td class='detail_cabang'><a href='javascript:void(0)' class='lihat_detail btn btn-success'>Lihat Detail</a><input type='hidden' value='"+$i+"' /><input type='button' class='hapus_cabang btn btn-danger' value='Delete' /></td>";
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
	<!--<div id='tambah_cabang_link'>-->
		<button data-toggle="modal" data-target=".pop_up_super_c_tambah_cabang" href='javascript:void(0)' id='tambah_cabang'  class="btn btn-success pull-right">+ Kantor Cabang Baru</button>
	<!--</div>-->
	<span class="clearfix"></span>
	<div class="cabang_list" style="margin-left: 20px !important; ">
		<table class='list_cabang table'>
		</table>
		<script>
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

		//$('.exit').click(function() {$( ".pop_up_super_c_tambah_cabang" ).fadeOut( 200, function(){});});	

		/*$('.pop_up_super_c_tambah_cabang').click(function (e)
		{
			var container = $('.pop_up_cell_tambah_cabang');

						if (container.is(e.target) )// if the target of the click is the container...
						{
							$( ".pop_up_super_c_tambah_cabang" ).fadeOut( 200, function(){});
							$('html').css('overflow-y', 'auto');
						}
					});*/

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
							<h4>Formulir Detail Cabang</h4>
						</div>

						<form class='tambah_cabang_form form-horizontal'>

							<div class="modal-body">


								<div class="form-group">
									<label class="control-label col-sm-3">Nama Cabang</label>
									<input type='text' name='new_nama' id='new_nama' placeholder="Masukkan Nama Cabang!" class="form-control col-sm-5" />
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Alamat</label>
									<input type='text' name='new_alamat' id='new_alamat'placeholder="Masukkan Alamat Cabang!" class="form-control col-sm-5"  />
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Telepon</label>
									<input type='text' name='new_telepon' id='new_telepon' placeholder="Masukkan Nomor Telepon Cabang!" class="form-control col-sm-5"/>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Fax</label>
									<input type='text' name='new_fax' id='new_fax' placeholder="Masukkan Nomor Fax Cabang!" class="form-control col-sm-5"/>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">E-mail</label>
									<input type='text' name='new_email' id='new_email' placeholder="Masukkan E-mail Cabang!" class="form-control col-sm-5"/>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Website</label>
									<input type='text' id='new_website' placeholder="Masukkan Website Cabang!" class="form-control col-sm-5"/>
								</div>


							</div>	

							<div class="modal-footer">
								<input type='submit' value='submit' id="tambah_cabang_button" class="btn btn-success"/>
								
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
										getCabang();
										setTimeout(function() {
												//  	$('body').removeClass('modal-open');
												  //	$('body').removeClass('modal-open');
												}, 500);
									},
									error:function(errorThrown){
										alert(errorThrown);
									}		
								});
							}
						});

$('body').on('click','#tambah_cabang_button',function(){
				//$('.pop_up_super_c_tambah_cabang').remove();
			});	
</script>	
</div>		
</div>
</div>
</div>
</div>

