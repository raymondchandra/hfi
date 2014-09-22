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
<div id="datacabang"> 
	<div><span class='detail_cell'>Nama Cabang</span>: {{$cabang->nama}}</div>
	<span class='clear'>&nbsp;</span>
	<div><span class='detail_cell'>Alamat Kantor</span>:  {{$cabang->alamat}}</div>
	<span class='clear'>&nbsp;</span>
	<div><span class='detail_cell'>Telepon</span>: {{$cabang->telp}} </div>
	<span class='clear'>&nbsp;</span>
	<div><span class='detail_cell'>Fax</span>: {{$cabang->fax}}</div>
	<span class='clear'>&nbsp;</span>
	<div><span class='detail_cell'>E-mail</span>:  {{$cabang->email}}</div>

	<div><span class='detail_cell'>URL</span>:<a href='http://{{$cabang->link}}'> {{$cabang->link}}</a></div>
	@if($id!=1)																													
	<div></div><a href='javascript:void(0)' class='go_back_but' style='margin-left:790px;'>Kembali</a></div>
	@endif
	<span class='clear'>&nbsp;</span>	
</div>
<hr style="margin-top: 30px;"/>
<div id="pengurus">
	<h3>Daftar Pengurus Pada Cabang ini</h3>
	<div id='tambah_pengurus_link'><a href='javascript:void(0)' id='tambah_pengurus'  class='command_button'>+ Pengurus Baru</a></div>
	<div id="listPengurus">
		@if($pengurus == NULL)
			<span>Tidak terdapat pengurus yang diunggah dari cabang ini</span>
		@else
			<table border=0 style='width:800px;'>
				<tr>
					<td><h6>Periode</h6></td>
					<td><h6>Tanggal Unggah</h6></td>
					<td>&nbsp;</td>
				</tr>
			@foreach($pengurus as $urus)
				<tr>
					<td style='vertical-align:middle !important; width:350px; overflow:hidden; margin-right:30px;'><a href='javascript:void(0)' class='periode_pengurus' value='{{$urus->file_path}}'>{{$urus->periode}}</a></td>
					<td style='vertical-align:middle !important; width:350px;'>{{$urus->tanggal_upload}}</td>
					<td style='vertical-align:middle !important; width:100px;'><p style='display:none;'>{{$urus->file_path}}</p><input type='button' value='x' class='hapus_pengurus'/><input type='hidden' class='id_pengurus' value='{{$urus->id}}'/></td>
				</tr>
			@endforeach
			</table>
			<?php echo $pengurus->links(); ?>
		@endif
		
	</div>
</div>	
</div>
<script>
	var id_hapus_pengurus;
	$('body').on('click','.hapus_pengurus',function(){
		$(".pop_up_super_c_hapus_pengurus").fadeIn(277, function(){});
		//var id_pengurus = $(this).next().val();
		$id_pengurus = $(this).next().val();
		
		//ambil id pengurus buat ok_hapus_pengurus
		id_hapus_pengurus = $id_pengurus;
	});			
	$('body').on('click','.ok_hapus_pengurus',function(){
		$( ".loader" ).fadeIn( 200, function(){});
		//ajax delete
		$.ajax({
			url: 'admin/organisasi/deletepengurus',
			type: 'DELETE',
			data: {
				'id_pengurus' : id_hapus_pengurus
			},
			success: function(data){
				debugger;
				$(".pop_up_super_c_hapus_pengurus").fadeOut(200, function(){});	
				if(data=="success"){
					alert("Berhasil menghapus pengurus");
				
				}else{
					alert("Gagal menghapus pengurus");
				}
				$('.cabang_list').load(thisurl);
				$( ".loader" ).fadeOut( 200, function(){});
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
	});	
	$('body').on('click','.batal_hapus_pengurus',function(){
		$(".pop_up_super_c_hapus_pengurus").fadeOut(200, function(){});
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
		$( ".pop_up_super_c_show_pengurus" ).fadeIn( 277, function(){});
		$('html').css('overflow-y', 'hidden');
	});
	
	
	
	//show form tambah pengurus					
	$('body').on('click','#tambah_pengurus',function(){
		$(".pop_up_super_c_tambah_pengurus").fadeIn( 277, function(){});
		$filePeng = $('#filePeng').val("");
		$periode = $('#periode').val("");
		$('html').css('overflow-y', 'hidden');
	});
	
	//$('.exit').click(function() {$( ".pop_up_super_c" ).fadeOut( 200, function(){});});	
	$('.exit').click(function() {$( ".pop_up_super_c_show_pengurus" ).fadeOut( 200, function(){});});	
	$('.exit').click(function() {$( ".pop_up_super_c_tambah_pengurus" ).fadeOut( 200, function(){});});	
	$('.exit').click(function() {$( ".pop_up_super_c_hapus_pengurus" ).fadeOut( 200, function(){});});

	$('.pop_up_super_c_show_pengurus').click(function (e)
	{
		var container = $('.pop_up_cell_show_pengurus');

		if (container.is(e.target) )// if the target of the click is the container...
		{
			$( ".pop_up_super_c_show_pengurus" ).fadeOut( 200, function(){});
			$('html').css('overflow-y', 'auto');
		}
	});
	
	$('.pop_up_super_c_tambah_pengurus').click(function (e)
	{
		var container = $('.pop_up_cell_tambah_pengurus');

		if (container.is(e.target) )// if the target of the click is the container...
		{
			$( ".pop_up_super_c_tambah_pengurus" ).fadeOut( 200, function(){});
			$('html').css('overflow-y', 'auto');
		}
	});
	$('.pop_up_super_c_hapus_pengurus').click(function (e)
	{
		var container = $('.pop_up_cell_hapus_pengurus');
		if (container.is(e.target) )// if the target of the click is the container...
		{
			$( ".pop_up_super_c_hapus_pengurus" ).fadeOut( 200, function(){});
			$('html').css('overflow-y', 'auto');
		}
	});
</script>	
				
<!--pop up tambah pengurus -->
<div class=" pop_up_super_c_tambah_pengurus" style="display: none;">
	<a class="exit close_56_tambah_pengurus" ></a>
	<div class="pop_up_tbl_tambah_pengurus">
		<div class="pop_up_cell_tambah_pengurus">
			<div class="container_12">			
			<div class="grid_9 detail_pengurus" style="background: #fff; margin-left:160px;">
				<h2 style="margin-left: 20px; margin-top: 20px;">Detail Pengurus</h2>
				<form class='tambah_pengurus_form'>
					<!-- /postPengurus-->
					<ul>
						<li>{{ Form::file('filePeng', array('name'=>'filePeng','id'=>'filePeng')) }}</li>
						<span class="clear" style="height: 20px; display: block;"></span>
						<li>Periode : {{ Form::text('periode', Input::old('periode'), array('style' => 'width: 200px;', 'id'=>'periode')) }}</li>
						<span class="clear" style="height: 20px; display: block;"></span>
						<li>{{ Form::submit('Unggah') }}</li>
					</ul>	
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
										$( ".pop_up_super_c_tambah_pengurus" ).fadeOut( 200, function(){
											$(".loader").fadeIn(200, function(){			
												$(".cabang_list").load(thisurl);
												alert("Berhasil menambah pengurus");
											});
										});											
									},
									error:function(errorThrown){
										$(".pop_up_super_c_tambah_pengurus").fadeOut(200, function(){
											$(".loader").fadeOut(200, function(){
												alert("Gagal menambah pengurus");
												alert(errorThrown);
											});
										});												
									}	
								});
							}
						});	
					</script>
				</form>						
			</div>
			</div>			
		</div>		
	</div>
</div>

<!--pop up show pengurus-->
<div class=" pop_up_super_c_show_pengurus" style="display: none;">
	<a class="exit close_56_show_pengurus" ></a>
	<div class="pop_up_tbl_show_pengurus">
		<div class="pop_up_cell_show_pengurus">
			<div class="container_12">				
			<div class="grid_12" style="background: #fff;">
				<h3 style="padding-top: 5px;padding-left: 20px; margin-bottom: 5px !important; text-align: center;" id="title_pdf_viewer"></h3>					
				<!--<object data="assets/img/Chapter_4.pdf" type="application/pdf" width="100%" class="pdf_viewer"></object>-->
				<object style="height:590px !important;" data="" type="application/pdf" width="100%" id="pdf_viewer"></object>
			</div>
			</div>
			
		</div>
		
	</div>
</div>

<!-- pop up hapus pengurus -->
<div class=" pop_up_super_c_hapus_pengurus" style="display: none;">
	<a class="exit close_56_hapus_pengurus" ></a>
	<div class="pop_up_tbl_hapus_pengurus">
		<div class="pop_up_cell_hapus_pengurus">
			<div class="container_12">			
				<div class="div_hapus_pengurus" style="background: #fff; width:600px !important; padding-top:40px;">
					<h2 style="text-align:center;">Anda yakin ingin menghapus pengurus ini?</h2>							
					<table border="0" style="margin-left:auto; margin-right:auto;">
						<tr>
							<td><button class="ok_hapus_pengurus">Ya</button></td>
							<td>&nbsp;</td>
							<td><button class="batal_hapus_pengurus">Tidak</button></td>
						</tr>
					</table>
				</div>
			</div>			
		</div>		
	</div>
</div>
