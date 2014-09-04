<script>
	$(document).ready(function(){
		$( ".loader" ).fadeOut( 200, function(){});
	});
	
	//get all non aktif
	
	//get all akun aktif
</script>

<div class='admin_title'>Daftar Akun</div>
<div class='daftar_akun_container'>
	<div class='daftar_aktifasi_container'>
		<h5>Daftar Akun Belum Aktifasi</h5>
		<table>
				<tr>
					<td class='email'>E-mail akun</td>
					<td class='nama'>Nama</td>
					<td class='aktifasi'>Aktifasi</td>
					<td class='hapus_akun_non'>&nbsp;</td>
				</tr>
				<tr>
					<td class='email'>gredy.prasetya@gmail.com</td>
					<td class='nama'>Muhammad Nauffal Ashidiq Wangsa Admaja</td>
					<td class='aktifasi'><a href='javascript:void(0)' class='aktif_akun'>Aktifkan</a></td>
					<input type='hidden' value='0' />
					<td class='hapus_akun_non'><a href='javascript:void(0)' class='hapus_akun'>Hapus</a></td>
				</tr>
		</table>
	</div>
	<div class='daftar_aktif_container'>
		<h5>Daftar Akun Aktif</h5>
		<table>
				<tr>
					<td class='email'>E-mail akun</td>
					<td class='nama'>Nama</td>
					<td class='batas_aktif'>Batas Aktif</td>
					<td class='lihat_detail'>Lihat Detail</td>
				</tr>
				<tr>
					<td class='email'>gredy.prasetya@gmail.com</td>
					<td class='nama'>Muhammad Nauffal Ashidiq Wangsa Admaja</td>
					<td class='batas_aktif'>12-12-2014</td>
					<td class='lihat_detail'><a href='javascript:void(0)'>Lihat Detail</a><input type='hidden' value='0' /></td>
				</tr>
		</table>
	</div>
</div>

<!--pop-up-->

<!--pop up -->
<div class=" pop_up_super_c" style="display: none;">
	<a class="exit close_56" ></a>
	<div class="pop_up_tbl">
		<div class="pop_up_cell">
			<div class="container_12">			
			<div class="grid_7 detail_cabang" style="background: #fff;">
				<h2>Detail Anggota</h2>
				
			</div>
			</div>			
		</div>		
	</div>
</div>

