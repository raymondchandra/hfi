    <section class="header">
		<div class="site_id">
			<div class="container_12">
				<div class="grid_10 ">
					<img src="assets/img/hfi.png" alt="logo HFI" class="logo_hfi_header" height="110"/>
					<h1 class="header_title">
						Himpunan Fisika Indonesia
					</h1>
					<span class="id_hfi">
						Komplek Batan Indah Blok L No 48 Serpong Tanggerang Banten 15314 Indonesia
					</span>
					<span class="id_hfi">
						Telp/Fax: +62-21-7561609 Email: info@hfi.fisika.net
					</span>
				</div>
				<div class="grid_2 ">
					{{ HTML::linkRoute('registrasi', 'Daftar', array(), array('class' => 'daftar_dan_login')) }}
					<span> | </span>
					{{ HTML::linkRoute('login', 'Login', array(), array('class' => 'daftar_dan_login')) }}
					
				</div>
			</div>
		</div>
		
		<div class="site_nav">
			<div class="container_12">
				<div class="grid_12">
					<ul>
						<li>
							{{HTML::linkRoute('home','Home')}}
						</li>
						<li>
							{{HTML::linkRoute('organisasi','Organisasi')}}
						</li>
						<li>
							{{HTML::linkRoute('kegiatan','Kegiatan')}}
						</li>
						<li>
							{{HTML::linkRoute('publikasi','Publikasi')}}
						</li>
						<li>
							{{HTML::linkRoute('anggota','Anggota')}}
						</li>
						<li>
							{{HTML::linkRoute('kontak','Kontak')}}
						</li>
						
					</ul>
				</div>
			</div>
		</div>
    </section>