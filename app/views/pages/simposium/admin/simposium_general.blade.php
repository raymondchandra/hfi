<script>
	var id = '{{$id}}';
</script>

<div class="container_12">
	<div class="grid_12">
		<div class='admin_title'>{{$nama_kegiatan}}</div>
		<div>Umum</div>
		<a href='javascript:void(0)' onClick='history.back();' >Back</a>

		<div>
			<h3>Data Kegiatan</h3>
			<table>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>Tempat</td>
					<td>:</td>
					<td><input type="text"></td>
				</tr>
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
			<h3>Registrasi</h3>
			<span>Status pendaftaran : Buka</span> <button>Ubah</button>
		</div>
		<hr />
		<div>
			<h3>Admin</h3>
			<table>
				<tr>
					<td>Status admin</td>
					<td>:</td>
					<td>Aktif <button>Ubah</button> </td>
				</tr>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td>admin</td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><input type="password"> </td>
				</tr>
				<tr>
					<td>Re type password</td>
					<td>:</td>
					<td><input type="password"> </td>
				</tr>
			</table>
			<button>Ubah</button>
		</div>
	</div>
</div>