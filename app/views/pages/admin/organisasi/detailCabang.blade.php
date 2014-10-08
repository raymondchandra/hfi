<script>
@if($pengurus != NULL)
var thisurl = '{{URL::route('admin.organisasi.detail',$id)}}'+'?page='+'{{$pengurus->getCurrentPage()}}';
@else
var thisurl = '{{URL::route('admin.organisasi.detail',$id)}}';
@endif

$(document).ready(function(){
	$('.pagination a').on('click', function (event) {
		$( ".loader" ).fadeIn( 200, function(){});


		event.preventDefault();
		if ( $(this).attr('href') != '#' ) {

			$("html, body").animate({ scrollTop: 0 }, "fast");
			var next = $(this).attr('href');
			var url = '{{URL::route('admin.organisasi.detail',$id)}}'+'?'+next.split("?")[1];

			$('.cabang_list').load(url);
			$( ".loader" ).fadeOut( 200, function(){});
		}
	});
	$( ".loader" ).fadeOut( 200, function(){});
});
</script>
<div id="organisasi_detail_content">
	<div id="datacabang" class="form-horizontal"> 
		<div class="form-group">
			<label class='control-label col-sm-2'>Nama Cabang</label>
			<p class="form-control-static col-sm-8">{{$cabang->nama}}</p>
		</div>

		<div class="form-group">
			<label class='control-label col-sm-2'>Alamat Kantor</label>
			<p class="form-control-static col-sm-8">{{$cabang->alamat}}</p>
		</div>

		<div class="form-group">
			<label class='control-label col-sm-2'>Telepon</label>
			<p class="form-control-static col-sm-8">{{$cabang->telp}}</p>
		</div>

		<div class="form-group">
			<label class='control-label col-sm-2'>Fax</label>
			<p class="form-control-static col-sm-8">{{$cabang->fax}}</p>
		</div>

		<div class="form-group">
			<label class='control-label col-sm-2'>E-mail</label>
			<p class="form-control-static col-sm-8">{{$cabang->email}}</p>
		</div>

		<div class="form-group">
			<label class='control-label col-sm-2'>URL</label>
			<a href='http://{{$cabang->link}}' class="form-control-static col-sm-8"> {{$cabang->link}}</a>
		</div>
		@if($id!=1)																													
		<div class="form-group">
			<div class='control-label col-sm-2'>
				<a href='javascript:void(0)' class='go_back_but btn btn-primary' style=''>
					<span class="glyphicon glyphicon-chevron-left"></span> Kembali
				</a>
			</div>
		</div>
		@endif
		<span class='clear'>&nbsp;</span>	
	</div>
	<hr style="margin-top: 30px;"/>
	<div id="pengurus">
		<h3>Daftar Pengurus Pada Cabang ini</h3>
		<!--<div id='tambah_pengurus_link'>-->
		<button data-toggle="modal" data-target=".pop_up_super_c_tambah_pengurus" href='javascript:void(0)' id='tambah_pengurus'  class='btn btn-success pull-right'>
			<span class="glyphicon glyphicon-plus"></span> Pengurus Baru
		</button>
		<!--</div>-->
		<span class="clearfix"></span>
		<div id="listPengurus">
			@if($pengurus == NULL)
			<span>Tidak terdapat pengurus yang diunggah dari cabang ini</span>
			@else
			<table class="table">
				<thead>
					<tr>
						<td>Periode</td>
						<td>Tanggal Unggah</td>
						<td>&nbsp;</td>
					</tr>
				</thead>
				<tbody>
					@foreach($pengurus as $urus)
					<tr>
						<td><a data-toggle="modal" data-target=".pop_up_super_c_show_pengurus" href='javascript:void(0)' class='periode_pengurus' value='{{$urus->file_path}}'>{{$urus->periode}}</a></td>
						<td>{{$urus->tanggal_upload}}</td>
						<td>
							<p style='display:none;'>{{$urus->file_path}}</p>
							<input data-toggle="modal" data-target=".pop_up_super_c_hapus_pengurus" type='button' value='Delete' class='hapus_pengurus btn btn-danger'/>
							<input type='hidden' class='id_pengurus' value='{{$urus->id}}'/>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<?php echo $pengurus->links(); ?>
			@endif

		</div>
	</div>	
</div>
<script>
var id_hapus_pengurus;
// $('body').one("click",'.hapus_pengurus',function(){
	$('.hapus_pengurus').one("click",function(){
	//$(".pop_up_super_c_hapus_pengurus").fadeIn(277, function(){});
		//var id_pengurus = $(this).next().val();
		$id_pengurus = $(this).next().val();
		
		//ambil id pengurus buat ok_hapus_pengurus
		id_hapus_pengurus = $id_pengurus;
	});			
// $('body').one("click",'.ok_hapus_pengurus',function(){
	$('.ok_hapus_pengurus').one("click",function(){
	//$( ".loader" ).fadeIn( 200, function(){});
		//ajax delete
		$.ajax({
			url: 'admin/organisasi/deletepengurus',
			type: 'DELETE',
			data: {
				'id_pengurus' : id_hapus_pengurus
			},
			success: function(data){
				debugger;
				//$(".pop_up_super_c_hapus_pengurus").fadeOut(200, function(){});	
				if(data=="success"){
					alert("Berhasil menghapus pengurus");
					$('.loader').fadeIn(277, function(){});
					$('.modal-backdrop').removeClass('in');
					setTimeout(function() {
						$('.modal-backdrop').fadeOut( 300, function(){});
					}, 500);

				}else{
					alert("Gagal menghapus pengurus");
					$('.loader').fadeIn(277, function(){});
					$('.modal-backdrop').removeClass('in');
					setTimeout(function() {
						$('.modal-backdrop').remove();
					}, 500);
				}
				$('.cabang_list').load(thisurl);
				//$( ".loader" ).fadeOut( 200, function(){});
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
				$('.modal-backdrop').removeClass('in');
				setTimeout(function() {
					$('.modal-backdrop').remove();
				}, 500);
			}
		});
});	
$('body').on('click','.batal_hapus_pengurus',function(){
	//$(".pop_up_super_c_hapus_pengurus").fadeOut(200, function(){});
});
	// $('body').one('click','.hapus_pengurus',function(){
		// var id_pengurus = $(this).next().val();
		// $( ".loader" ).fadeIn( 200, function(){});
		// ajax delete
		// $.ajax({
			// url: 'admin/organisasi/deletepengurus',
			// type: 'DELETE',
			// data: {
				// 'id_pengurus' : id_pengurus
			// },
			// success: function(data){
				// debugger;
				// if(data=="success"){
					// alert("Berhasil menghapus pengurus");

				// }else{
					// alert("Gagal menghapus pengurus");
				// }
				// $('.cabang_list').load(thisurl);
				// $( ".loader" ).fadeOut( 200, function(){});
			// },
			// error: function(jqXHR, textStatus, errorThrown){
				// alert(errorThrown);
			// }
		// });
	// });								

$('body').on('click','.go_back_but',function(){
	$( ".loader" ).fadeIn( 200, function(){});
	getCabang();
});

$('body').on('click','.periode_pengurus',function(){
	var file_path = $(this).attr('value');
	var title = $(this).text();
	$('#title_pdf_viewer').html(title);
	$('#pdf_viewer').attr("data", file_path);
		//$( ".pop_up_super_c" ).fadeIn( 277, function(){});
		//$( ".pop_up_super_c_show_pengurus" ).fadeIn( 277, function(){});
		//$('html').css('overflow-y', 'hidden');
	});



	//show form tambah pengurus					
	$('body').on('click','#tambah_pengurus',function(){
		//$(".pop_up_super_c_tambah_pengurus").fadeIn( 277, function(){});
		$filePeng = $('#filePeng').val("");
		$periode = $('#periode').val("");
		$('html').css('overflow-y', 'hidden');
	});
	
	//$('.exit').click(function() {$( ".pop_up_super_c" ).fadeOut( 200, function(){});});	
	//$('.exit').click(function() {$( ".pop_up_super_c_show_pengurus" ).fadeOut( 200, function(){});});	
	//$('.exit').click(function() {$( ".pop_up_super_c_tambah_pengurus" ).fadeOut( 200, function(){});});	
	//$('.exit').click(function() {$( ".pop_up_super_c_hapus_pengurus" ).fadeOut( 200, function(){});});

	/*$('.pop_up_super_c_show_pengurus').click(function (e)
	{
		var container = $('.pop_up_cell_show_pengurus');

		if (container.is(e.target) )// if the target of the click is the container...
		{
			$( ".pop_up_super_c_show_pengurus" ).fadeOut( 200, function(){});
			$('html').css('overflow-y', 'auto');
		}
	});*/

	/*$('.pop_up_super_c_tambah_pengurus').click(function (e)
	{
		var container = $('.pop_up_cell_tambah_pengurus');

		if (container.is(e.target) )// if the target of the click is the container...
		{
			$( ".pop_up_super_c_tambah_pengurus" ).fadeOut( 200, function(){});
			$('html').css('overflow-y', 'auto');
		}
	});*/
/*$('.pop_up_super_c_hapus_pengurus').click(function (e)
{
	var container = $('.pop_up_cell_hapus_pengurus');
		if (container.is(e.target) )// if the target of the click is the container...
		{
			$( ".pop_up_super_c_hapus_pengurus" ).fadeOut( 200, function(){});
			$('html').css('overflow-y', 'auto');
		}
	});*/
</script>	

<!--pop up tambah pengurus -->
<div class="modal fade pop_up_super_c_tambah_pengurus" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4>Unggah Detail Pengurus</h4>
			</div>
			<form class='tambah_pengurus_form form-horizontal'>
				<!-- /postPengurus-->
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label col-sm-3">Unggah</label>
						{{ Form::file('filePeng', array('name'=>'filePeng','id'=>'filePeng', 'class' => 'col-sm-3',)) }}
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3">Periode</label>
						{{ Form::text('periode', Input::old('periode'), array('class' => 'form-control col-sm-3', 'id'=>'periode', 'OnClick'=>'this.focus();')) }}
					</div>
				</div>
				<div class="modal-footer">
					<li>{{ Form::submit('Unggah', array('class' => 'btn btn-success')) }}</li>
				</div>
				<script>
				$(".tambah_pengurus_form").validate({
					rules: {
						filePeng : {
							required: true
						},
						periode : {
							required: true
						}
					},									
					messages: {
						filePeng : {
							required: "Mohon file diisi"
						},
						periode : {
							required: "Mohon periode diisi"
						}
					},
					submitHandler:function(form){
								// $filePeng = $('#filePeng').val();
								// $periode = $('#periode').val();
								var data, xhr;
								data = new FormData();										
								data.append('filePeng', $('#filePeng')[0].files[0]);
								data.append('periode', $('#periode').val());
								data.append('id_cabang', '{{$id}}');
								$.ajax({
									url: 'admin/postPengurus',
									type: 'POST',
									data: data,
									processData: false,
									contentType: false,
									success: function(as){
										//$( ".pop_up_super_c_tambah_pengurus" ).fadeOut( 200, function(){
											//$(".loader").fadeIn(200, function(){			
												$(".cabang_list").load(thisurl);
												alert("Berhasil menambah pengurus");
												$('.modal-backdrop').removeClass('in');
												setTimeout(function() {
													$('.modal-backdrop').fadeOut( 300, function(){});
												}, 500);
												
											//});
										//});											
							},
							error:function(errorThrown){
										//$(".pop_up_super_c_tambah_pengurus").fadeOut(200, function(){
											//$(".loader").fadeOut(200, function(){
												alert("Gagal menambah pengurus");
												alert(errorThrown);
												$('.modal-backdrop').removeClass('in');
												setTimeout(function() {
													$('.modal-backdrop').remove();
												}, 500);
											//});
										//});												
}	
});
}
});	
</script>
</form>						

</div>		
</div>
</div>

<!--pop up show pengurus-->
<div class="modal fade pop_up_super_c_show_pengurus" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4>Detail Pengurus</h4>
			</div>
			<div class="modal-body">
				<h3 style="padding-top: 5px;padding-left: 20px; margin-bottom: 5px !important; text-align: center;" id="title_pdf_viewer"></h3>					

				<!--<object data="assets/img/Chapter_4.pdf" type="application/pdf" width="100%" class="pdf_viewer"></object>-->
				<object style="height:590px !important;" data="" type="application/pdf" width="100%" id="pdf_viewer"></object>

			</div>
		</div>
	</div>
</div>

<!-- pop up hapus pengurus -->
<div class="modal fade pop_up_super_c_hapus_pengurus" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				Perhatian!
			</div>
			<div class="modal-body">
				<h4 style="text-align: center;">Anda yakin ingin menghapus pengurus ini?</h4>				
				<div class="form-horizontal">
					<div class="form-group">
						<button class="ok_hapus_pengurus btn btn-primary form-control col-sm-2 col-sm-push-3">Ya</button>
						<button data-dismiss="modal" class="batal_hapus_pengurus btn btn-primary  form-control col-sm-2  col-sm-push-5">Tidak</button>
					</div>
				</div>
			</div>
		</div>		
	</div>
</div>
