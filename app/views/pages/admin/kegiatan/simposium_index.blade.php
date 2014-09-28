<script>
	var id = '{{$id}}';
	var type = '{{$type}}';
	$(document).ready(function(){
		$( ".loader" ).fadeOut( 200, function(){});
	});

	function back(){
		$( ".loader" ).fadeIn( 200, function(){});
		$('.admin_control_panel').load('admin/kegiatan2/'+type);
	}

	$("#general_button").click(function(){
		$( ".loader" ).fadeIn( 200, function(){});
		$('.admin_control_panel').load('admin/kegiatan2/general/'+id);
	});

	$("#konten_button").click(function(){
		$( ".loader" ).fadeIn( 200, function(){});
		$('.admin_control_panel').load('admin/kegiatan2/konten/'+id);
	});

	$("#harga_button").click(function(){
		$( ".loader" ).fadeIn( 200, function(){});
		$('.admin_control_panel').load('admin/kegiatan2/harga/'+id);
	});

	$("#peserta_button").click(function(){
		$( ".loader" ).fadeIn( 200, function(){});
		$('.admin_control_panel').load('admin/kegiatan2/peserta/'+id);
	});

	$("#pesan_button").click(function(){
		$( ".loader" ).fadeIn( 200, function(){});
		$('.admin_control_panel').load('admin/kegiatan2/pesan/'+id);
	});

	$("#sponsor_button").click(function(){
		$( ".loader" ).fadeIn( 200, function(){});
		$('.admin_control_panel').load('admin/kegiatan2/sponsor/'+id);
	});
</script>

<div class="container_12">
	<div class="grid_12">
		<div class='admin_title'>{{$nama_kegiatan}}</div>
		<a href='javascript:void(0)' onClick='back()' >Back</a>

		<div>
			<div>
				<div><a href='javascript:void(0)' id='general_button'>General</a></div>
				<div><a href='javascript:void(0)' id='konten_button'>Konten</a></div>
				<div><a href='javascript:void(0)' id='harga_button'>Harga</a></div>
			</div>

			<div >
				<div><a href='javascript:void(0)' id='peserta_button'>Peserta</a></div>
				<div><a href='javascript:void(0)' id='pesan_button'>Pesan</a></div>
				<div><a href='javascript:void(0)' id='sponsor_button'>Sponsor</a></div>
			</div>
		</div>
	</div>
</div>