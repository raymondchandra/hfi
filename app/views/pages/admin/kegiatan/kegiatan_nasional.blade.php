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
		<div style="width: 100%; display: block; overflow: hidden; margin-bottom: 30px;"><a href="javascript:void(0)" style="text-decoration:none;" id="tambah_kegiatan" class="command_button">Tambah Kegiatan</a></div>
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
								<input type="button" class="edit_kegiatan" value="edit" />
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
	
	$('body').on('click','#tambah_kegiatan',function(){
		$( ".tambah_kegiatan_pop" ).fadeIn( 277, function(){});
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
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		},'json');
	});

	$('body').on('click','.edit_kegiatan',function(){
		$( ".edit_kegiatan_pop" ).fadeIn( 277, function(){});
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

</script>

<link rel="stylesheet" type="text/css" href="assets/js/datetimepicker/jquery.datetimepicker.css"/ >
<script src="assets/js/datetimepicker/jquery.datetimepicker.js"></script>
		
		
<!--pop up -->
<div class=" pop_up_super_c tambah_kegiatan_pop" style="display: none;">
	<a class="exit close_56" ></a>
	<div class="pop_up_tbl">
		<div class="pop_up_cell">
			<div class="container_12">			
				<div class="grid_12 pop_up_container" style="background: #fff; padding: 20px;">
					{{ Form::open(array('url' => '', 'files' => true)) }}
						<div class="grid_5">
							<img src="" width="150" height="180"/>
							{{ Form::file('gambar', Input::old('gambar')) }}
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
							<textarea name="misi_message" id = 'misi_message' class="editor"> 
							
							</textarea>
						</div>

						{{Form::submit('Kirim Pesan', array('style' => 'display:block; margin-left: auto; margin-right: auto;', 'class' => 'button'));}}
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

<div class=" pop_up_super_c edit_kegiatan_pop" style="display: none;">
	<a class="exit close_56" ></a>
	<div class="pop_up_tbl">
		<div class="pop_up_cell">
			<div class="container_12">			
					
				<div class="grid_12 pop_up_container" style="background: #fff; padding: 20px;">
					{{ Form::open(array('url' => '', 'files' => true)) }}
						<div class="grid_5">
							<img src="" width="150" height="180"/>
							{{ Form::file('gambar', Input::old('gambar')) }}
						</div>
						<div class="grid_5">
							<div class="row_label">
								<label>Nama</label>{{ Form::text('nama', Input::old('nama')) }}
							</div>
							<div class="row_label">
								<label>Tempat</label>{{ Form::text('tempat', Input::old('tempat')) }}
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
							<textarea name="edit_kegiatan_nasional_message" id = 'edit_kegiatan_nasional_message' class="editor_edit_kegiatan_nasional_message"> 
							
							</textarea>
						</div>

						{{Form::submit('Kirim Pesan', array('style' => 'display:block; margin-left: auto; margin-right: auto;', 'class' => 'button'));}}
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
					<script>
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
					</script>
				</div>
			
			</div>			
		</div>		
	</div>
</div>
	</div>
</div>