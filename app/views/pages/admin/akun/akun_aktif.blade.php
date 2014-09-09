<script>
	$(document).ready(function(){
		$( ".loader" ).fadeOut( 200, function(){});
	});
</script>
<div class='admin_title'>Akun Aktif</div>
<div class='search_box'>
		<input type='text' placeholder='Cari Username' />
</div>
<div class='list_akun_container'>
	<table>
		<div class='akun_legend'>
			<tr>
				<td class='nama_cabang'>Username</td>
				<td class='nama_cabang'>Cabang</td>
				<td class='detail_cabang'>Batas Aktif</td>
				<td class='detail_cabang' style='width: 150px !important;'>Perpanjang Masa Aktif</td>
				<td class='detail_cabang'>Reset Password</td>
			</tr>
		</div>
		<div class='akun_content'>
			<tr>
				<td class='nama_cabang'>Username</td>
				<td class='nama_cabang'>Cabang</td>
				<td class='detail_cabang'>Batas Aktif</td>
				<td class='detail_cabang' style='width: 150px !important;'><a href='javascript:void(0)' class='perpanjang_aktif'>Perpanjang Masa Aktif</a></td>
				<input type='hidden' value='' />
				<td class='detail_cabang'><a href='javascript:void(0)' class='reset_password'>Reset Password</a></td>
			</tr>
			<tr>
				<td class='nama_cabang'>Username</td>
				<td class='nama_cabang'>Cabang</td>
				<td class='detail_cabang'>Batas Aktif</td>
				<td class='detail_cabang' style='width: 150px !important;'><a href='javascript:void(0)' class='perpanjang_aktif'>Perpanjang Masa Aktif</a></td>
				<input type='hidden' value='' />
				<td class='detail_cabang'><a href='javascript:void(0)' class='reset_password'>Reset Password</a></td>
			</tr>
		</div>
	</table>
</div>
