<div class="container_12">
	<div class="grid_12">
<script>
	$(document).ready(function(){
		$( ".show_after" ).each(function( index ) {
			
			//alert($(this).text());
			var length = $(this).text().length;
			if (length > 200) {
				$(this).siblings('.show_before').text($('.show_after').text().substr(0,197)); 
				$(this).append("<a href='javascript:void(0)' style='text-decoration:none;' class='hide_description'>[tutup]</a>"); 
				$(this).siblings('.show_before').append("<a href='javascript:void(0)' class='description_button' style='text-decoration:none;'> [selengkapnya]</a>");
			}
			else{
				$(this).siblings('.show_before').text($('.show_after').text());
			}
			
		});
		$( ".loader" ).fadeOut( 200, function(){});
	});
	
	$('body').on('click','.description_button',function(){
		//$('.show_before').css('display','none');
		//$('.show_after').css('display','block');
		$(this).parent().css('display','none');
		$(this).parent().siblings('.show_after').css('display','block');
		
	});
	
	$('body').on('click','.hide_description',function(){
		$(this).parent().siblings('.show_before').css('display','block');
		$(this).parent().css('display','none');
	});
	 
</script>
	<div class='admin_title'>Kegiatan Nasional</div>
		<div style='height: 30px;'></div>
		<div style="width: 100%; display: block; overflow: hidden; margin-bottom: 30px;"><a href="javascript:void(0)" style="text-decoration:none;" id="tambah_kegiatan" class="command_button" data-toggle="modal" data-target=".tambah_kegiatan_pop">Tambah Kegiatan</a></div>
		<div class="kegiatan_container" style="margin-left: 20px;">
			@if($kegiatans == NULL)
				<span>Kegiatan belum tersedia.</span>
			@else
				<ul>
					@foreach($kegiatans as $kegiatan)
						<li>
							<div>
							<img class="poster_kegiatan" src="{{$kegiatan->brosur_kegiatan}}" />
							<div class="info_kegiatan">
								<div class="waktu_kegiatan">{{$kegiatan->waktu_mulai}} - {{$kegiatan->waktu_selesai}}</div>
								<div class="nama_kegiatan">{{$kegiatan->nama_kegiatan}}</div>
								<div class="place_kegiatan">{{$kegiatan->tempat}}</div>
								<div class="box">
									<div class="deskripsi_kegiatan">
										<div class="show_after" style='display:none;margin-bottom: 10px;'>
											{{$kegiatan->deskripsi}}
										</div>
										<div class="show_before">
										
										</div>
									</div>
								</div>
							</div>
							<div class="edit_kegiatan_form">
								   <!-- Large modal 
												<button class="btn btn-primary" data-toggle="modal" data-target=".edit_kegiatan_pop">Large modal</button>-->

								<input type="button" class="edit_kegiatan" value="edit" data-toggle="modal" data-target=".edit_kegiatan_pop"/>
								<input type='hidden' value='{{$kegiatan->id}}' />
								<input type="button" class="hapus_kegiatan" value="hapus" />
							</div>
							</div>
						</li>
						<span class='clear'>&nbsp;</span>
						<span class='clear'>&nbsp;</span>
					@endforeach
				</ul>
			@endif
		</div>
		@if($kegiatans != NULL)
			<?php echo $kegiatans->links(); ?>
		@endif
<script>
	$file_brosur="";
	$('body').on('click','#tambah_kegiatan',function(){
		$( ".tambah_kegiatan_pop" ).fadeIn( 277, function(){});
		document.getElementById("form_tambah_kegiatan").reset();
		$file_brosur="";
	});
	
	
	$('body').on('click','.hapus_kegiatan',function(){
		$id = $(this).prev().val();
		$.ajax({
			type: 'DELETE',
			url: 'admin/deleteKegiatan',
			data: {
				"id_kegiatan": $id
			},
			success: function(response){
				alert(response);
				$('#admin_kegiatan_nasional').click();
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		},'json');
	});

	$('body').on('click','.edit_kegiatan',function(){
		//$(".loader").fadeIn(100, function(){});
		
		$file_brosur="";
		document.getElementById("form_edit_kegiatan").reset();

	
		$id=$(this).next().val();
		$.ajax({
			type: 'GET',
			url: 'admin/get_kegiatan',
			data: {
				"id_kegiatan": $id
			},
			success: function(response){
				//alert(response.nama_kegiatan);
				$('#preview_edit_brosur').attr('src',response.brosur_kegiatan);
				$('#edit_nama_kegiatan').val(response.nama_kegiatan);
				$('#edit_tempat_kegiatan').val(response.tempat);
				$tanggalwaktumulai = response.waktu_mulai.split(' ');
				$tanggalwaktuselesai = response.waktu_selesai.split(' ');
				$tanggalmulai = $tanggalwaktumulai[0].split('-');
				$waktumulai = $tanggalwaktumulai[1].split(':');
				$tanggalselesai = $tanggalwaktuselesai[0].split('-');
				$waktuselesai = $tanggalwaktuselesai[1].split(':');
				
				$tanggal_mulai = $tanggalmulai[2];
				$bulan_mulai = $tanggalmulai[1];
				$tahun_mulai = $tanggalmulai[0];
				$tanggal_selesai = $tanggalselesai[2];
				$bulan_selesai = $tanggalselesai[1];
				$tahun_selesai = $tanggalselesai[0];
				
				$jam_mulai = $waktumulai[0];
				$menit_mulai = $waktumulai[1];
				$jam_selesai = $waktuselesai[0];
				$menit_selesai = $waktuselesai[1];
				
				$temp_tanggal_mulai = $tanggal_mulai +"."+$bulan_mulai+"."+$tahun_mulai;
				$temp_tanggal_selesai = $tanggal_selesai +"."+$bulan_selesai+"."+$tahun_selesai;
				
				$('#datepicker3').val($temp_tanggal_mulai);
				$('#datepicker4').val($temp_tanggal_selesai);
				$('#timepickerstart3').val($jam_mulai+":"+$menit_mulai);
				$('#timepickerend4').val($jam_selesai+":"+$menit_selesai);
				
				$('.jqte_editor').text(response.deskripsi);
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			},
			complete: function(){
				//$( ".edit_kegiatan_pop" ).fadeIn( 277, function(){});
				//$(".loader").fadeOut(200, function(){});
				jQuery('#datepicker3').datetimepicker({
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
					format:'d.m.Y'
				});
						
				jQuery('#datepicker4').datetimepicker({
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
					format:'d.m.Y'
				});
						
						jQuery('#timepickerstart3').datetimepicker({
						  	datepicker:false,
						  	format:'H:i'
						});
						jQuery('#timepickerend4').datetimepicker({
						  	datepicker:false,
						  	format:'H:i'
						});
			}
		},'json');
	});
	
	$('body').on('click','.edit_button',function(){
		$arrayData = $('#form_tambah_kegiatan').serializeArray();
		var formData = new FormData();
		
		formData.append('id_kegiatan',$(this).next().val());
		formData.append('nama_kegiatan',$arrayData[1]['value']);
		formData.append('tempat',$arrayData[2]['value']);
		formData.append('tanggal_mulai',$arrayData[3]['value']);
		formData.append('tanggal_selesai',$arrayData[4]['value']);
		formData.append('waktu_mulai',$arrayData[5]['value']);
		formData.append('waktu_selesai',$arrayData[6]['value']);
		formData.append('deskripsi',$arrayData[7]['value']);
		formData.append('type',1);
		
		formData.append('brosur',$file_brosur);
		
		$.ajax({
			type: 'PUT',
			url: 'admin/editKegiatan',
			data: formData,
			processData:false,
			contentType: false,
			success: function(response){
				alert(response);
				$('#admin_kegiatan_nasional').click();
			},
				error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
		
		
	});
	
	$('body').on('change','#edit_file_upload',function(){
		var i = 0, len = this.files.length, img, reader, file;
		for ( ; i < len; i++ ) {
			file = this.files[i];
			if (!!file.type.match(/image.*/)) {
				if ( window.FileReader ) {
					reader = new FileReader();
					reader.onloadend = function (e) { 
						//showUploadedItem(e.target.result, file.fileName);
						$('#preview_edit_brosur').attr('src',e.target.result);
					};
					reader.readAsDataURL(file);
				}
				$file_brosur = file;
			}	
		}
	});
	
	
	
	$('.exit').click(function() {
		$( ".pop_up_super_c" ).fadeOut( 200, function(){});
	});	
		
	$('.pop_up_super_c').click(function (e)
	{
		var container = $('.pop_up_cell');

		if (container.is(e.target) )// if the target of the click is the container...
		{
			$( ".pop_up_super_c" ).fadeOut( 200, function(){});
			$('html').css('overflow-y', 'auto');
		}
	});
	$('body').on('click','#ok_tambah_kegiatan',function(){
		
		$arrayData = $('#form_tambah_kegiatan').serializeArray();
		//alert($file_brosur);
		/*alert($arrayData[1]['value']);
		alert($arrayData[2]['value']);
		alert($arrayData[3]['value']);
		alert($arrayData[4]['value']);
		alert($arrayData[5]['value']);
		alert($arrayData[6]['value']);*/
		
		var formData = new FormData();
		
		formData.append('nama_kegiatan',$arrayData[1]['value']);
		formData.append('tempat',$arrayData[2]['value']);
		formData.append('tanggal_mulai',$arrayData[3]['value']);
		formData.append('tanggal_selesai',$arrayData[4]['value']);
		formData.append('waktu_mulai',$arrayData[5]['value']);
		formData.append('waktu_selesai',$arrayData[6]['value']);
		formData.append('deskripsi',$arrayData[7]['value']);
		formData.append('type',1);
		
		formData.append('brosur',$file_brosur);
		
		
		$.ajax({
			type: 'POST',
			url: 'admin/kegiatan',
			data: formData,
			processData:false,
			contentType: false,
			success: function(response){
				alert(response);
				$('#admin_kegiatan_nasional').click();
			},
				error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
		
	});
	
	$('body').on('change','#brosur_kegiatan',function(){
		var i = 0, len = this.files.length, img, reader, file;
	
		//document.getElementById("images").disabled = true;
		for ( ; i < len; i++ ) {
			file = this.files[i];
			if (!!file.type.match(/image.*/)) {
				if ( window.FileReader ) {
					reader = new FileReader();
					reader.onloadend = function (e) { 
						//showUploadedItem(e.target.result, file.fileName);
						$('#preview_brosur').attr('src',e.target.result);
					};
					reader.readAsDataURL(file);
				}
				$file_brosur = file;
			}	
		}
	});	

</script>

<link rel="stylesheet" type="text/css" href="assets/js/datetimepicker/jquery.datetimepicker.css"/ >
<script src="assets/js/datetimepicker/jquery.datetimepicker.js"></script>
		
		
<!--pop up
<div class=" pop_up_super_c tambah_kegiatan_pop" style="display: none;">
	<a class="exit close_56" ></a>
	<div class="pop_up_tbl">
		<div class="pop_up_cell"> -->
<div class="modal fade bs-example-modal-lg tambah_kegiatan_pop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
			<div class="container_12">			
				<div class="grid_12 pop_up_container" style="background: #fff; padding: 20px;">
					{{ Form::open(array('id'=>'form_tambah_kegiatan','url' => '', 'files' => true)) }}
						<div class="grid_5">
							<img src="" id='preview_brosur' width="150" height="180"/>
							{{ Form::file('gambar',array('id'=>'brosur_kegiatan'), Input::old('gambar')) }}
						</div>
						<div class="grid_5">
							<div class="row_label">
								<label>Nama</label>{{ Form::text('nama', Input::old('nama')) }}
							</div>
							<div class="row_label">
								<label>Tempat</label>{{ Form::text('tempat', Input::old('tempat')) }}
							</div>
							<div class="row_label">
								<label>Tanggal</label>{{ Form::text('datepicker1', Input::old('datepicker1'),  array('id' => 'datepicker1', 'style' => 'width:80px;')) }}
								<span>-</span>{{ Form::text('datepicker2', Input::old('datepicker2'),  array('id' => 'datepicker2', 'style' => 'width:80px;')) }}
							</div>
							<div class="row_label">
								<label>Jam</label>{{ Form::text('timepickerstart', Input::old('timepickerstart'),  array('id' => 'timepickerstart', 'style' => 'width:80px;')) }}
								<span>-</span>{{ Form::text('timepickerend', Input::old('timepickerend'),  array('id' => 'timepickerend', 'style' => 'width:80px;')) }}
							</div>
						</div>
							
						<span class="clear"></span>
						<div class="area_jqte">
							<textarea name="misi_message" id = 'misi_message' class="editor"></textarea>
						</div>
						{{Form::button('Kirim Pesan', array('style' => 'display:block; margin-left: auto; margin-right: auto;','id'=>'ok_tambah_kegiatan', 'class' => 'button'));}}
					{{ Form::close() }}
					<style>
						.row_label {
							display: block;
							margin-bottom: 10px;
						}

						.row_label > label {
							display: inline-block;
							width: 100px;
						}

						.area_jqte > .jqte {
							position: relative;
							padding-top: 33px;
						}
						.area_jqte .jqte_toolbar  {
							position: absolute;
							top: 0px;
							width: 100%;
						}
					</style>
					<script>
						$('.editor').jqte();
					</script>
					<script>
						jQuery('#datepicker1').datetimepicker({
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
						 	format:'d.m.Y'
						});
						
						jQuery('#datepicker2').datetimepicker({
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
						 	format:'d.m.Y'
						});
						
						jQuery('#timepickerstart').datetimepicker({
						  	datepicker:false,
						  	format:'H:i'
						});
						jQuery('#timepickerend').datetimepicker({
						  	datepicker:false,
						  	format:'H:i'
						});
					</script>
				</div>
			</div>			
		</div>		
	</div>
</div>














<!-- <div class=" pop_up_super_c edit_kegiatan_pop" style="display: none;">
	<a class="exit close_56" ></a>
	<div class="pop_up_tbl">
		<div class="pop_up_cell"> -->
		
<div class="modal fade bs-example-modal-lg edit_kegiatan_pop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
			<div class="container_12">			
					
				<div class="grid_12 pop_up_container" style="background: #fff; padding: 20px;">
					{{ Form::open(array('url' => '','id'=>'form_edit_kegiatan', 'files' => true)) }}
						<div class="grid_5">
							<img src="" id='preview_edit_brosur' width="150" height="180"/>
							{{ Form::file('gambar',array('id'=>'edit_file_upload'), Input::old('gambar')) }}
						</div>
						<div class="grid_5">
							<div class="row_label">
								<label>Nama</label>{{ Form::text('nama', Input::old('nama'),array('id'=>'edit_nama_kegiatan', 'onclick'=>'this.focus();this.select()', 'autofocus')) }}
								
							</div>
							<div class="row_label">
								<label>Tempat</label>{{ Form::text('tempat', Input::old('tempat'),array('id'=>'edit_tempat_kegiatan')) }}
							</div>
							<div class="row_label">
								<label>Tanggal</label>{{ Form::text('datepicker3', Input::old('datepicker3'),  array('id' => 'datepicker3', 'style' => 'width:80px;')) }}
								<span>-</span>{{ Form::text('datepicker4', Input::old('datepicker4'),  array('id' => 'datepicker4', 'style' => 'width:80px;')) }}
							</div>
							<div class="row_label">
								<label>Jam</label>{{ Form::text('timepickerstart3', Input::old('timepickerstart3'),  array('id' => 'timepickerstart3', 'style' => 'width:80px;')) }}
								<span>-</span>{{ Form::text('timepickerend4', Input::old('timepickerend4'),  array('id' => 'timepickerend4', 'style' => 'width:80px;')) }}
							</div>
						</div>
							
						<span class="clear"></span>
						<div class="area_jqte">
						
							<textarea name="edit_kegiatan_nasional_message" id = 'edit_kegiatan_nasional_message' class="editor_edit_kegiatan_nasional_message"></textarea>
							
						</div>

						{{Form::button('Kirim Pesan', array('style' => 'display:block; margin-left: auto; margin-right: auto;', 'class' => 'edit_button'));}}
						<input type='hidden' class='id_edit' />
					{{ Form::close() }}
					<style>
						.row_label {
							display: block;
							margin-bottom: 10px;
						}

						.row_label > label {
							display: inline-block;
							width: 100px;
						}

						.area_jqte > .jqte {
							position: relative;
							padding-top: 33px;
						}
						.area_jqte .jqte_toolbar  {
							position: absolute;
							top: 0px;
							width: 100%;
						}
					</style>
					<script>
						$('.editor_edit_kegiatan_nasional_message').jqte();
					</script>
				</div>
			
			</div>			
		</div>		
	</div>
</div>
	</div>
</div>