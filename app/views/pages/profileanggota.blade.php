@extends('layouts.default')
@section('content')	
<div class="container_12" id="divProfil">
	<div class="grid_12">
		<div class="main_content">
			<div class="side_panel_hfi">
				<div class="side_panel_hfi_background">
				<ul>
					<li>				
						{{HTML::linkRoute('profile','Profile')}}
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						{{HTML::linkRoute('carianggota','Cari Member')}}
					</li>	
					<span class="white_space">&nbsp;</span>
					<li>
						{{HTML::linkRoute('berkas','e-Berkas')}}
					</li>										
				</ul>
				</div>
			</div>
			<div class="content_hfi" id="contentfield">
				<div class="foto_pp_container">
					<img height="200" width="150" src="{{array_get($data, 'data')->foto_profile}}" alt="foto profile"/>
					<a href="javascript:void(0)" class="edit_pp front" id="show_pp_editor">
						<p>Perbaharui Foto</p>
						<span class="cam">
						</span>
					</a>
					<a href="javascript:void(0)" class="edit_profile front" onclick="editProfile()">Ubah Profile</a>
					<a href="user/cetakkartu" target="_blank">Cetak Kartu Anggota</a>
					<a href="ubahpassword">Ubah Password</a>
				</div>
				<style>
					.back{
						display:none;
					}
					
				</style>
				<script>									
					function editProfile(){
						$(".front").hide();
						$(".back").show();
						for(var i = 1;i<=5;i++){
							var gelar = $("#pendG"+i).text();
							var lokasi = $("#pendL"+i).text();
							
							if(gelar!=""){
								if(i!=1){
									addPendidikan();
								}
								$("#selPendidikan"+i).val(gelar);
								$("#pendidikan"+i).val(lokasi);
							}
						}
						
					}
					
					function okEditProfile(){
						var temp_gender = "";
						if($('#up_genderpria_profile').is(':checked')){
							$gender_profile = $('#up_genderpria_profile').val();
							temp_gender = 1;
						}else if($('#up_genderwanita_profile').is(':checked')){
							$gender_profile = $('#up_genderwanita_profile').val();
							temp_gender =  0;
						};			
						var input = {
							nama : $('#up_nama_profile').val(),					
							cabang: $('#up_anggotacabang_profile').val(),
							tempatlahir : $('#up_tempatlahir_profile').val(),
							tanggallahir : $('#tanggallahir').val(),
							gender : temp_gender,
							temapenelitian : $('#up_temapenelitian_profile').html(),
							spesialisasi : $('#up_spesialisasi_profile').val(),
							profesi : $('#up_profesi_profile').val(),
							institusi : $('#up_institusi_profile').val(),
							alamat : $('#up_alamat_profile').html(),
							kota : $('#up_kota_profile').val(),
							kodepos : $('#up_kodepos_profile').val(),
							negara : $('#up_negara_profile').val() ,
							telepon : $('#up_telepon_profile').val(),
							fax : $('#up_fax_profile').val(),
							hp : $('#up_hp_profile').val(),
							email : $('#up_suratelektronik_profile').val(),
							situs : $('#up_situs_profile').val(),
							keterangan : $('#up_keteranganlain_profile').html(),
							selPendidikan1 : $("#selPendidikan1").val(),
							selPendidikan2 : $("#selPendidikan2").val(),
							selPendidikan3 : $("#selPendidikan3").val(),
							selPendidikan4 : $("#selPendidikan4").val(),
							selPendidikan5 : $("#selPendidikan5").val(),
							pendidikan1 : $("#pendidikan1").val(),
							pendidikan2 : $("#pendidikan2").val(),
							pendidikan3 : $("#pendidikan3").val(),
							pendidikan4 : $("#pendidikan4").val(),
							pendidikan5 : $("#pendidikan5").val()
						}
						
						var url = '{{ URL::route('editProfile')}}';
						$.ajax({
					        type: 'PUT',
					        url: url,
					        data: input,
					        success: function (data){
								if(data=="success"){
									location.reload();
								}else{
									alert(data);
								}
					        }
					    });
						
					}
					
					function batalEditProfile()
					{
						location.reload();
					}
				</script>	
				<table border="0" style="width:450px;">					
					<tr>						
						<td class="label_pp">Nama</td>
						<td>:</td>
						<td ><span class="front">{{array_get($data, 'data')->nama}}</span>
						<span class="back"><input type='text' id='up_nama_profile' value="{{array_get($data, 'data')->nama}}" /></span></td>		
					</tr>
					<tr>
						<td>Nomor Anggota</td>
						<td>:</td>
						<td ><span >{{array_get($data, 'data')->id}}</span></td>
					</tr>						
					<tr>
						<td>Anggota Cabang</td>
						<td>:</td>
						<td><span class="front">{{array_get($data, 'cabang')}}</span>
						<span class="back"><select id='up_anggotacabang_profile'>
							<?php foreach($listcabang as $value => $text){ ?> <option value='<?php echo $value; ?>' <?php if ($data['cabang'] == $value) {echo 'selected';}?> > <?php echo $text; ?></option><?php } ?> 
						</select></span></td>
					</tr>
					<tr>
						<td>Status Anggota</td>
						<td>:</td>
						<td><span >{{array_get($data, 'status_aktif')}} (s/d {{array_get($data, 'batas_aktif')}})</span></td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td ><span class="front">{{array_get($data, 'data')->tempat_lahir}}</span>
						<span class="back"><input type='text' id='up_tempatlahir_profile' value="{{array_get($data, 'data')->tempat_lahir}}" /></span></td>
					</tr>					
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td ><span class="front">{{array_get($data, 'data')->tanggal_lahir}}</span>
						<span class="back"><input id='tanggallahir' name='tanggallahir' type='text' value="{{array_get($data, 'data')->tanggal_lahir}}" /></span></td>					
					</tr>
					<link rel="stylesheet" type="text/css" href="assets/js/datetimepicker/jquery.datetimepicker.css"/ >
					<script src="assets/js/datetimepicker/jquery.datetimepicker.js"></script>
					<script>
						jQuery('#tanggallahir').datetimepicker({
							lang:'en',
							i18n:{
								en:{
									months:[
									'January','February','March','April',
									'May','June','July','August',
									'September','October','November','December',
									],
									dayOfWeek:[
									"Sun.", "Mon", "Tue", "Wed", 
									"Thu", "Fri", "Sa.",
									]
									
								}
								},
							timepicker:false,
							format:'d-m-Y',
							yearStart: '1900'
						});
						
					</script>
					<tr>
						<td>Gender</td>
						<td>:</td>
						<td ><span class="front"><?php if ($data['data']['gender'] == 1) {echo 'pria';} else {echo 'wanita';} ?></span>
						<span class="back"><input id='up_genderpria_profile' type='radio' name='gender' value='1' <?php if($data['data']['gender']==1) {echo 'checked';}?>>pria<input id='up_genderwanita_profile' type='radio' name='gender' value='0'<?php if($data['data']['gender']==0) {echo 'checked';}?>>wanita</span></td>
						
						
					</tr>
					<tr>
						<td>Tema Penelitian</td>
						<td>:</td>
						<td ><span class="front">{{array_get($data, 'data')->tema_penelitian}}</span>
						<span class="back"><textarea id='up_temapenelitian_profile' style='width:300px; height:70px;'>{{array_get($data, 'data')->tema_penelitian}}</textarea></span></td>
					</tr>
					<?php $listspesialisasi = array(							
						'astro' => 'astro',
						'hayati' => 'hayati',
						'komputasi' => 'komputasi',
						'pendidikan' => 'pendidikan',
						'energi' => 'energi',
						'lingkungan' => 'lingkungan',
						'bumi' => 'bumi',
						'instrumentasi' => 'instrumentasi',
						'material' => 'material',
						'matematika' => 'matematika',
						'medis' => 'medis',
						'nonlinier' => 'non-linier',
						'nuklir' => 'nuklir',
						'partikel' => 'partikel',
						'lainlain' => 'lain-lain'
						); ?>										
				
					<tr>
						<td>Spesialisasi</td>
						<td>:</td>
						<td ><span class="front">{{array_get($data, 'data')->spesialisasi}}</span>
						<span class="back">
							<select id='up_spesialisasi_profile'><?php foreach($listspesialisasi as $value => $text){ ?><option value='<?php echo $value;?>' <?php if($data['data']['spesialisasi'] == $value){echo 'selected';} ?> > <?php echo $text; ?> </option> <?php } ?></select>
						</span></td>
					</tr>
					<?php $listprofesi = array(							
							'mahasiswa' => 'mahasiswa',
							'guru' => 'guru',
							'dosen' => 'dosen',
							'peneliti' => 'peneliti',
							'karyawan' => 'karyawan',
							'lainlain' => 'lain-lain'
							); ?>
					<tr>
						<td>Profesi</td>
						<td>:</td>
						<td ><span class="front">{{array_get($data, 'data')->profesi}}</span>
						<span class="back"><select id='up_profesi_profile'><?php foreach($listprofesi as $value => $text){ ?><option value='<?php echo $value; ?>' <?php if($data['data']['profesi']==$value) {echo 'selected';}?>> <?php echo $text; ?> </option> <?php } ?> </select></span></td>
					</tr>
					<tr>
						<td>Institusi</td>
						<td>:</td>
						<td ><span class="front">{{array_get($data, 'data')->institusi}}</span>
						<span class="back"><input id='up_institusi_profile' type='text' value="{{array_get($data, 'data')->institusi}}"/></span></td>
					</tr>
					<tr>
						<td>Pendidikan</td>
						<td>:</td>
						<td ><div class="front">
							<?php 
								$pend = 1; 
							?>
							@foreach ($pendidikans as $pendidikan)
								<span id="pendG{{$pend}}">{{$pendidikan->gelar}}</span> - <span id="pendL{{$pend}}">{{$pendidikan->lokasi}}</span><br />
								<?php $pend++ ?>
							@endforeach
							
						</div>
						<script>
							var lastIdx = 2;
							function addPendidikan(){
								if(lastIdx <=5)
								{
									var newRow = "<div id='divPendidikan"+lastIdx+"' style='margin-top: 5px;' '><select class='selPendidikan'  style='width:50px;' id='selPendidikan"+lastIdx+"'>";
									newRow +="<option value='SD'>SD</option>";
									newRow +="<option value='SMP'>SMP</option>";
									newRow +="<option value='SMA'>SMA</option>";
									newRow +="<option value='D1'>D1</option>";
									newRow +="<option value='D2'>D2</option>";
									newRow +="<option value='D3'>D3</option>";
									newRow +="<option value='D4'>D4</option>";
									newRow +="<option value='S1'>S1</option>";
									newRow +="<option value='S2'>S2</option>";
									newRow +="<option value='S3'>S3</option>";
									newRow +="<option value='lain'>Lainnya</option>";
									newRow +="</select>";
									newRow +="<input type='text' id='pendidikan"+lastIdx+"' name='pendidikan"+lastIdx+"' class='texPendidikan' style='margin-left: 16px; width: 230px;'/>";
									newRow +="<input type='button' value='X' id='delPendidikan"+lastIdx+"' onClick='delPendidikan()' style='padding: 0px;'/><br /></div>";
									$('#delPendidikan'+(lastIdx-1)).hide();
									$('#addPendidikan').append(newRow);
									if(lastIdx==5){
										$('#refPendidikan').hide();
									}
									lastIdx++;
									
								}
								
							}
							function delPendidikan()
							{
								$('#divPendidikan'+(lastIdx-1)).remove();
								lastIdx--;
								if(lastIdx==5){
									$('#refPendidikan').show();
								}
								$('#delPendidikan'+(lastIdx-1)).show();
								
							}
						</script>
					<div class="back">
							
								<select class='selPendidikan' id='selPendidikan1' style='width:50px;'>
									<option value='SD'>SD</option>
									<option value='SMP'>SMP</option>
									<option value='SMA'>SMA</option>
									<option value='D1'>D1</option>
									<option value='D2'>D2</option>
									<option value='D3'>D3</option>
									<option value='D4'>D4</option>
									<option value='S1'>S1</option>
									<option value='S2'>S2</option>
									<option value='S3'>S3</option>
									<option value='lain'>Lainnya</option>
								</select>
							<input type="text" id="pendidikan1" name="pendidikan1" class='texPendidikan' style='margin-left: 16px; width: 230px;'/><br />
							<div id="addPendidikan"></div>
						<a href="javascript:void(0)" onClick = "addPendidikan();" id="refPendidikan">tambah pendidikan</a>
					</div>
						</td>
					</tr>					
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td ><span class="front">{{array_get($data, 'data')->alamat}}</span>
						<span class="back"><textarea id='up_alamat_profile' style='width:300px; height:70px;'>{{array_get($data, 'data')->alamat}}</textarea></span></td>
					</tr>	
					<tr>
						<td>Kota</td>
						<td>:</td>
						<td ><span class="front">{{array_get($data, 'data')->kota}}</span>
						<span class="back"><input id='up_kota_profile' type='text' value="{{array_get($data, 'data')->kota}}" /></span></td>
					</tr>
					<tr>
						<td>Kodepos</td>
						<td>:</td>
						<td ><span class="front">{{array_get($data, 'data')->kodepos}}</span>
						<span class="back"><input id='up_kodepos_profile' type='text' value="{{array_get($data, 'data')->kodepos}}" /></span></td>
					</tr>
					<tr>
						<td>Negara</td>
						<td>:</td>
						<td ><span class="front">{{array_get($data, 'data')->negara}}</span>
						<span class="back"><input id='up_negara_profile' type='text' value="{{array_get($data, 'data')->negara}}" /></span></td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td>:</td>
						<td ><span class="front">{{array_get($data, 'data')->telepon}}</span>
						<span class="back"><input id='up_telepon_profile' type='text' value="{{array_get($data, 'data')->telepon}}" /></span></td>
					</tr>
					<tr>
						<td>Fax</td>
						<td>:</td>
						<td ><span class="front">{{array_get($data, 'data')->fax}}</span>
						<span class="back"><input id='up_fax_profile' type='text' value="{{array_get($data, 'data')->fax}}" /></span></td>
					</tr>
					<tr>
						<td>HP</td>
						<td>:</td>
						<td ><span class="front">{{array_get($data, 'data')->hp}}</span>
						<span class="back"><input id='up_hp_profile' type='text' value="{{array_get($data, 'data')->hp}}" /></span></td>
					</tr>
					<tr>
						<td>Surat Elektronik</td>
						<td>:</td>
						<td ><span class="front">{{array_get($data, 'data')->email}}</span>
						<span class="back"><input id='up_suratelektronik_profile' type='text' value="{{array_get($data, 'data')->email}}" /></span></td>
					</tr>						
					<tr>				
						<td>Situs</td>
						<td>:</td>
						<td ><span class="front"><a href="{{array_get($data, 'siteUrl')}}">{{array_get($data, 'data')->situs}}</a></span>
						<span class="back"><input id='up_situs_profile' type='text' value="{{array_get($data, 'data')->situs}}" /></span></td>
					</tr>
					<tr>
						<td>Keterangan Lain</td>
						<td>:</td>
						<td ><span class="front">{{array_get($data, 'data')->keterangan}}</span>
						<span class="back"><textarea id='up_keteranganlain_profile' style='width:300px; height:70px;'>{{array_get($data, 'data')->keterangan}}</textarea></span></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><span class="back"><input type='button' value='Simpan Perubahan' id='ok_edit_profile' onclick="okEditProfile()" /></span>
						<span class="back"></span></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><span class="back"><input type='button' value='Batal' id='batal_edit_profile' onclick="batalEditProfile()" /></span>
						<span class="back"></span></td>
					</tr>										
				</table>
			</div>			
		</div>
		
		<div id="" class="pu_c" style="z-index:99999;position: fixed; display: none; top: 0; left: 0; width: 100%; height: 100%; background:rgba(0,0,0,0.7);">
		<div class="tableed">
			<div class="celled pu_cell" style="">
				<div class="container_12" style="position: relative;">
					<span class="close_56 pu_close" style="right: 185px;">
					</span>
					<div class="grid_6 push_3">
						
						<div class="change_pp_container">
							<div class="saran_34">
								Disarankan Anda mengunggah foto dengan dimensi 
								
								<span style="display: block; margin-left: auto; margin-right: auto; font-size: 24px;">3 X 4</span> 
								
								(Passphoto)
							</div>
							<form class="edit_foto_profile">
								{{ Form::file('fileFoto',array('id'=>'fileFoto', 'class'=>'upload_photo', 'accept'=>"image/*", 'style' => 'margin-top: 20px; display: block; margin-left: auto; margin-right: auto;')) }}
								{{ Form::submit('Unggah Gambar', array('id'=>'ok_edit_foto_button', 'style' => 'display: block; margin-left: auto; margin-right: auto; margin-top: 20px;')) }}
							</form>
							<script>
								$('body').on('change','.upload_photo',function(){
									var i = 0, len = this.files.length, img, reader, file;
									
										//document.getElementById("images").disabled = true;
									for ( ; i < len; i++ ) {
										file = this.files[i];
										if (!!file.type.match(/image.*/)) {
											if ( window.FileReader ) {
												reader = new FileReader();
												reader.onloadend = function (e) { 
													showUploadedItem(e.target.result, file.fileName);
												};
												reader.readAsDataURL(file);
											}
											imageUpload = file;
										}	
									}
								});
								
								function showUploadedItem (source) {																									
									var image = "<img src='"+source+"' width=150 height=200 />"										
									$('.saran_34').html(image);
								} 
								
								jQuery.validator.setDefaults({
								  debug: true,
								  success: "valid"
								});
								$(".edit_foto_profile").validate({
									rules : {
										fileFoto : {
											required : true
										}
									}, 
									messages : {
										fileFoto : {
											required : "Mohon diisi foto"
										}
									},
									submitHandler:function(form){
										var input, xhr;
										input = new FormData();
										input.append('fileFoto', $('#fileFoto')[0].files[0]);
										var urlEditFotoProfile = '{{ URL::route('editFotoProfile') }}';
										$.ajax({
											url: urlEditFotoProfile,	
											type: 'POST',
											data: input,
											processData: false,
											contentType: false,
											success: function(as){
													location.reload();													
													alert(as);
												// if(as=="success"){
													// alert(as);
													// location.reload();													
												// }else{
													// alert("failed");
												// }												
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
	</div>	
	
	<script type="text/javascript">
		$(document).ready(function() {
			var sourcePreviewImage;
		
			$("#show_pp_editor").click(function() {
				$(".pu_c").fadeIn( 277, function(){}).css('display','block').css('z-index','999999');
				$("body").css('overflow-x','hidden');
					
				sourcePreviewImage = $(this).prev().attr("src");					
				$('.saran_34').html("<img src='"+sourcePreviewImage+"' width=150 height=200 />");
			});											
		});
		
		/*external container area exit trigger*/
		 $('.pu_close').click(function(){
			 $( ".pu_c" ).fadeOut( 200, function(){});
			 $("body").css('overflow-x','visible');
		 });
		 $('.pu_c').click(function (e)
			 {
				 var container = $('.pu_cell');

				 if (container.is(e.target) )// if the target of the click is the container...
				 {
					 $( ".pu_c" ).fadeOut( 200, function(){});
					 $("body").css('overflow-x','visible');
				 }
			 });						
			 Slider = $('#slider').Swipe({   <!--swipe ke detect error-->
				 auto: 3000,  
				 continuous: true  
			 }).data('Swipe');  
		 $('.pu_c').css('display','none');
									
	</script>
	</div>
</div>
@stop