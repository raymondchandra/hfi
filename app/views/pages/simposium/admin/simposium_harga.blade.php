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
		<div class='admin_title'>Harga</div>
		<a href='javascript:void(0)' onClick='back()' >Back</a>
		<div>
			<h3>Early Bird</h3>
			<table>
				<tr>
					<td>Tanggal mulai</td>
					<td>:</td>
					<td><input type="text" value="date picker"> </td>
				</tr>
				<tr>
					<td>Tanggal selesai</td>
					<td>:</td>
					<td><input type="text" value="date picker"> </td>
				</tr>
			</table>
			<button>Ubah</button>
		</div>
		<hr />
		<div>
			<h3>Harga</h3>
			<table>
				<tr>
					<th>Kategori</th>
					<th>Harga Early Bird</th>
					<th>Harga Normal</th>
				</tr>
				
				<tr>
					<td>taik</td>
					<td>1000</td>
					<td>2000</td>
				</tr>
			</table>
		</div>
	</div>
</div>