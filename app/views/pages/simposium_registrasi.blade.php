@extends('layouts.simposium')
@section('content')
<div style="width: 100%; background: #ededed;">
<div class="container_12" >	
	<div class="grid_12">
		<img src="{{ asset('assets/img/simposium_header.jpg') }}" width="940" alt="simpsium hfi"/>

	</div>
</div>
</div>

<div class="container_12">
	<div class="grid_12 s_sponsor_area">
		<img src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>
		<img src="{{ asset('assets/img/sponsor.jpg') }}" width="64" alt="simpsium hfi"/>

	</div>
</div>
<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			<div class="side_panel_hfi">
				<div class="side_panel_hfi_background">
				<ul>
					<li>
						<a href="javascript:void(0)">Pertemuan Lalu</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">Tanggal Penting</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">
							Lokasi
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">
							Akomodasi
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">
							Program
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">
							Registrasi
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">
							Peserta
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">
							Prosiding
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">
							Panitia
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="">
							Kontak
						</a>
					</li>
				
				</ul>
				</div>
			</div>
			
			<div class="content_hfi">
				
				<h2>
					Registrasi
				</h2>
				<div class="panel panel-default">
					<div class="panel-body">
				<table class="table table-bordered table-striped">					
					<tr>
						<td width="100">
							Peserta
						</td>
						<td width="150">
							Early Bird Rate
						</td>
						<td width="150">
							Normal Rate
						</td>
					</tr>
					<tr>
						<td>
							SFN XXVII
						</td>
						<td>
							
						</td>
						<td>
							
						</td>
					</tr>
					<tr>
						<td>
							Pemakalahan/umum
						</td>
						<td>
							Rp 550.000*
						</td>
						<td>
							Rp 650.000*
						</td>
					</tr>
					<tr>
						<td>
							Pemakalahan/mahasiswa
						</td>
						<td>
							Rp 550.000*
						</td>
						<td>
							Rp 700.000*
						</td>
					</tr>
					<tr>
						<td>
							Prosiding Hard Copy
						</td>
						<td>
							Rp 550.000*
						</td>
						<td>
							Rp 700.000*
						</td>
					</tr>
					
				</table>
				Note:*) Discount Rp 50,000 khusus untuk anggota aktif HFI
				</div>
				</div>
				<hr>
				</hr>
				
				<h2>Syarat dan ketentuan</h2>
					<p>
					• Peserta yang telah melakukan registrasi dan membatalkan, biaya registrasi tidak bisa dibayarkan kembali.<br/>
					• Biaya transfer bank ditanggung peserta<br/>
					• Registrasi mencakup : Seminar Kit, Konsumsi, Sertifikat<br/>
					• Pemakalah yang belum membayar penuh sampai dengan 1 Oktober 2014 tidak akan dijadwalkan dan abstraknya tidak akan dicetak pada buku kumpulan abstrak, kecuali ada pemberitahuan sebelumnya.
					</p>
				
				<hr>
				</hr>	
				
				<h2>Metode pembayaran</h2>
					<p>
				Pembayaran dilakukan dengan mentrasfer melalui bank dengan alamat sebagai berikut :

					• Account Name : HFI CABANG BALI<br/>
					• Account Number : 0328549426<br/>
					• Swift code : BNINIDJARNN<br/>
					• Bank Name : BNI Cabang Renon<br/>
					• Bank Address : Jalan Raya By Pass Ngurah Rai No. 2003, Denpasar,80361, INDONESIA
				<br></br>
				Setelah melakukan pembayaran, harap mengkonfirmasikan bukti pembayaran ke panitian melalui email : hfi_bali@yahoo.com
				
				<hr></hr>
				<p>
				Seluruh proses registrasi harus dilakukan secara online melalui melalui situs ini. Status dari registrasi bisa diakses melalui halaman daftar peserta. Username adalah sama dengan nomor registrasi Anda.
				Pengingat password akan dikirimkan ke surat elektronik yang dipakai saat registrasi. 
				</p>	
				
				<h2>Peserta Teregister</h2>
				<div class="panel panel-default">
					<div class="panel-body">
						<form role="form">
						  <div class="form-group">
							<label for="exampleInputEmail1">Username</label>
							<input type="email" class="form-control" id="" placeholder="Enter email" style="padding-left: 0px; padding-right: 0px; text-indent: 6px;">
						  </div>
						  <div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="" placeholder="Password" style="padding-left: 0px; padding-right: 0px; text-indent: 6px;">
						  </div>
						 
						  <button type="submit" class="btn btn-success">Kirim</button> 
						  <button type="submit" class="btn btn-danger">Batal</button> 
						</form>
					</div>
				</div>
				
								<hr></hr>

				<h2>Peserta Baru</h2>
				<div class="panel panel-default">
					<div class="panel-body">
						<form role="form">
						  <div class="form-group">
							<label for="exampleInputEmail1">Name</label>
							<input type="email" class="form-control" id="" placeholder="Enter email" style="padding-left: 0px; padding-right: 0px; text-indent: 6px;">
						  </div>
						  
						  <div class="form-group">
							<label for="exampleInputPassword1">Institution</label>
							<input type="password" class="form-control" id="" placeholder="Password" style="padding-left: 0px; padding-right: 0px; text-indent: 6px;">
						  </div>
						  
						  <div class="form-group">
							<label for="exampleInputPassword1">Occupation</label>
								<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
								  <li role="presentation" class="dropdown-header">Dropdown header</li>
								  ...
								  <li role="presentation" class="divider"></li>
								  <li role="presentation" class="dropdown-header">Dropdown header</li>
								  ...
								</ul>						 
							</div>
						 
						  <button type="submit" class="btn btn-success">Kirim</button> 
						  <button type="submit" class="btn btn-danger">Batal</button> 
						</form>
					</div>
				</div>
				
				
								<hr></hr>

				<h2>Pengingat Password</h2>
				<div class="panel panel-default">
					<div class="panel-body">
						<form role="form">
						  <div class="form-group">
							<label for="exampleInputEmail1">Username</label>
							<input type="email" class="form-control" id="" placeholder="Enter email" style="padding-left: 0px; padding-right: 0px; text-indent: 6px;">
						  </div>
						 
						  <button type="submit" class="btn btn-success">Kirim</button> 
						</form>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
</div>


@stop