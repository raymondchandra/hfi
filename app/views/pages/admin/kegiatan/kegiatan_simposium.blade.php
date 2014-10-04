<script>
var popupId = -1;
var type = '{{$type}}';
$(document).ready(function(){
	$( ".loader" ).fadeOut( 200, function(){});
});

function hapus(id){
	popupId = id;
	$(".pop_up_super_c_hapus_regulasi").fadeIn(277, function(){});
}

$("#ok_tambah_kegiatan").click(function(){
	$arrayData = $('#form_tambah_kegiatan').serializeArray();
	var url = '{{URL::route('admin.kegiatan2.addKegiatan')}}';
	debugger;
	var data = {
		'nama_kegiatan' : $arrayData[1]['value'],
		'tempat' : $arrayData[2]['value'],
		'tanggal_mulai' : $arrayData[3]['value'],
		'tanggal_selesai' : $arrayData[4]['value'],
		'type' : type
	};
	$.post(url,data,function(data){
		if(data == "success"){
			alert('Berhasil menambah kegiatan.');
			$( ".loader" ).fadeIn( 200, function(){});
			$('.admin_control_panel').load('admin/kegiatan2/'+type);
		}else{
			alert(data);
		}

	});

});

</script>
<script>
var ajaxOnce = true;													
$('body').on('click','.ok_hapus_regulasi',function(){
	if (ajaxOnce) {
		ajaxOnce = false;
		$.ajax({
			type: 'DELETE',
			url: 'admin/kegiatan2/'+popupId,
			success: function(response){
				$(".pop_up_super_c_hapus_regulasi").fadeOut(200, function(){});
				if(response == "success"){

					alert("Sukses menghapus data.");
					$( ".loader" ).fadeIn( 200, function(){});
					$('.admin_control_panel').load('admin/kegiatan2/'+type);
				}
				else{
					alert(response);
				}
				ajaxOnce = true;
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		},'json');
	};

});							
$('body').on('click','.batal_hapus_regulasi',function(){
	$(".pop_up_super_c_hapus_regulasi").fadeOut(200, function(){});
});

$('exit').click(function() {$(".pop_up_super_c_hapus_regulasi").fadeOut(200, function(){});});

$('.pop_up_super_c_hapus_regulasi').click(function (e)
{
	var container = $('.pop_up_cell_hapus_regulasi');
		if (container.is(e.target) )// if the target of the click is the container...
		{
			$( ".pop_up_super_c_hapus_regulasi" ).fadeOut( 200, function(){});
			$('html').css('overflow-y', 'auto');
		}
	});
</script>	
<link rel="stylesheet" type="text/css" href="assets/js/datetimepicker/jquery.datetimepicker.css"/ >
<script src="assets/js/datetimepicker/jquery.datetimepicker.js"></script>
<div class="container_12">
	<div class="grid_12">

		<div class='admin_title'>Kegiatan Simposium</div>
		<div id="kegiatanContent">

			<div id='div_tambah_lain'><a data-toggle="modal" data-target=".menu_lain_pop" href='javascript:void(0)' id='tambah_lain' class='command_button f_menu_lain_popuper'>+ Kegiatan</a></div>
			<div id="listKegiatan">
				<table class="tabel_list_regulasi table table-hover" style="">
					@if($kegiatans == NULL)
					<tr>
						<td>Tidak terdapat kegiatan simposiums</td>
						<td></td>
					</tr>
					@else
					@foreach($kegiatans as $kegiatan)
					<tr style='padding-top:5px; padding-bottom: 5px;'>
						<td><a href='simposium/admin/{{$kegiatan->id}}' target="_blank" class='kegiatan_simposium' style='line-height: 36px; margin-right: 10px;' >{{$kegiatan->nama}}</a></td>
						<td><input type='button' value='hapus' class='hapus_regulasi btn btn-danger' onClick='hapus({{$kegiatan->id}})'/></td>
					</tr>
					@endforeach
					@endif
				</table>
				@if($kegiatans != NULL)
				<?php echo $kegiatans->links(); ?>
				@endif
			</div>
		</div>




		<!--pop up start-->
		<div class="modal fade menu_lain_pop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4> Tambah Kegiatan Simposium </h4>
					</div>
					{{ Form::open(array('id'=>'form_tambah_kegiatan','url' => '', 'files' => true, 'class'=>'form-horizontal', 'role'=>'form')) }}

					<div class="modal-body">	
						<div class="form-group">
							<label class="control-label col-sm-3">Nama</label>
							{{ Form::text('nama', Input::old('nama'), array('id' => 'input_nama', 'class' => 'form-control col-sm-5')) }}
						</div>

						<div class="form-group">
							<label class="control-label col-sm-3">Tempat</label>
							{{ Form::text('tempat', Input::old('tempat'), array('id' => 'input_nama', 'class' => 'form-control col-sm-5')) }}
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Tanggal</label>
							{{ Form::text('datepicker1', Input::old('datepicker1'),  array('class' => 'form-control col-sm-2', 'id'=>'datepicker1')) }}
							<label class="control-label col-sm-1" style="text-align: center;">-</label>
							{{ Form::text('datepicker2', Input::old('datepicker2'),  array('class' => 'form-control col-sm-2', 'id'=>'datepicker2')) }}
						</div>



					</div>
					<div class="modal-footer">
						{{Form::button('Tambah Kegiatan', array('data-dismiss'=>'modal','style' => 'display:block; margin-left: auto; margin-right: auto;','id'=>'ok_tambah_kegiatan', 'class' => 'button'));}}
					</div>



					{{ Form::close() }}

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
						format:'d-m-Y'
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
						format:'d-m-Y'
					});


					</script>	
				</div>		
			</div>
		</div>


		<!-- pop up hapus regulasi -->
		<div class=" pop_up_super_c_hapus_regulasi" style="display: none;">
			<a class="exit close_56_hapus_regulasi" ></a>
			<div class="pop_up_tbl_hapus_regulasi">
				<div class="pop_up_cell_hapus_regulasi">
					<div class="container_12">			
						<div class="div_hapus_regulasi" style="background: #fff; width:600px !important; padding-top:40px;">
							<h2 style="text-align:center;">Anda yakin ingin menghapus berkas ini?</h2>							
							<table border="0" style="margin-left:auto; margin-right:auto;">
								<tr>
									<td><button class="ok_hapus_regulasi">Ya</button></td>
									<td>&nbsp;</td>
									<td><button class="batal_hapus_regulasi">Tidak</button></td>
								</tr>
							</table>
						</div>
					</div>			
				</div>		
			</div>
		</div>

		<script>
		$('body').on('click','.f_menu_lain_popuper',function(){
			//$( ".menu_lain_pop" ).fadeIn( 277, function(){});
			//$("#lainTitle").val("");
			//$('.jqte_editor').html("");
			//$('#submit_change').val('Tambah');
			popupId = -1;
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
		<!--pop up end-->

	</div>
</div>
