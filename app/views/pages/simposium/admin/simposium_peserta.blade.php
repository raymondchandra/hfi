<script>
	var id = '{{$id}}';
	$(document).ready(function(){
		$( ".loader" ).fadeOut( 200, function(){});
	});

	function back(){
		$( ".loader" ).fadeIn( 200, function(){});
		$('.admin_control_panel').load('admin/kegiatan2detail/'+id);
	}

</script>

<div class="container_12">
	<div class="grid_12">
		<div class='admin_title'>Peserta</div>
		<a href='javascript:void(0)' onClick='back()' >Back</a>

		
	</div>
</div>