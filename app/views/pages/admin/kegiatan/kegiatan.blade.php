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
	<div class='admin_title'>Kegiatan</div>
		<div style='height: 30px;'></div>
		<div style="margin-left:890px;"><a href="javascript:void(0)" style="text-decoration:none;" id="tambah_kegiatan">Tambah Kegiatan</a></div>
		<div class="kegiatan_container" style="margin-left: 20px;">
			<ul>
				<li>
					<div>
					<img class="poster_kegiatan" src="#" />
					<div class="info_kegiatan">
						<div class="waktu_kegiatan">10.00 - 12.00</div>
						<div class="nama_kegiatan">Parahyangan Catholic University International Conference "Inteligence Systems and Informatics"</div>
						<div class="place_kegiatan">Place1</div>
						<div class="box">
							<div class="deskripsi_kegiatan">
								<div class="show_after" style='display:none;margin-bottom: 10px;'>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
								</div>
								<div class="show_before">
								
								</div>
							</div>
						</div>
					</div>
					<div class="edit_kegiatan_form">
						<input type="button" class="edit_kegiatan" value="edit" />
						<input type='hidden' value='0' />
						<input type="button" class="hapus_kegiatan" value="hapus" />
					</div>
					</div>
				</li>
				<span class='clear'>&nbsp;</span>
				<span class='clear'>&nbsp;</span>
				<li>
					<div>
					<img class="poster_kegiatan" src="#" />
					<div class="info_kegiatan">
						<div class="waktu_kegiatan">10.00 - 12.00</div>
						<div class="nama_kegiatan">Parahyangan Catholic University International Conference "Inteligence Systems and Informatics"</div>
						<div class="place_kegiatan">Place1</div>
						<div class="box">
							<div class="deskripsi_kegiatan">
								<div class="show_after" style='display:none; margin-bottom: 10px;'>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
								</div>
								<div class="show_before">
								
								</div>
							</div>
						</div>
					</div>
					</div>
				</li>
			</ul>
		</div>
		
<script>
	
	$('body').on('click','#tambah_kegiatan',function(){
		$( ".tambah_kegiatan_pop" ).fadeIn( 277, function(){});
	});
	
	$('body').on('click','.hapus_kegiatan',function(){
		alert($(this).prev().val());
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

						{{Form::submit('Kirim Pesan', array('style' => 'display:block; margin-left: auto; margin-right: auto;'));}}
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
			<div class="grid_12 pop_up_container" style="background: #fff;">
				ABC
			</div>
			</div>			
		</div>		
	</div>
</div>
