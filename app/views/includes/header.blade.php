    <section class="header">
		<div class="site_id">
			<div class="container_12">
				<div class="grid_8 ">
					{{ HTML::image('assets/img/hfi.png', $alt="logo HFI", array('class' => 'logo_hfi_header', 'height' => 110)) }}
					<h1 class="header_title">
						Himpunan Fisika Indonesia
					</h1>
					<span class="id_hfi">
						{{$arr['alamat_hfi']}}
					</span>
					<span class="id_hfi">
						Telp: {{$arr['telp']}} Fax: {{$arr['fax_hfi']}} Email: {{$arr['email_hfi']}}
					</span>
				</div>
				<div class="grid_4 ">
					@if(Auth::check())

					<div class="top_right_iden">
							

						{{ HTML::linkRoute('logout', 'Keluar', array(), array('class' => 'daftar_dan_login', 'style' => 'float: right;')) }}<span> | </span>
						@if(Auth::user()->role == 0)
							<span style="float: right; margin-right: 10px; display: block;">
							Hi {{ HTML::linkRoute('profile', UserController::getHeaderName(Auth::user()->id), array(), array('class' => 'daftar_dan_login', 'style' => 'float: right;')) }}
							</span>
						@else
							<span style="float: right; margin-right: 10px; display: block;">
							{{ HTML::linkRoute('adminPanel', 'Admin Panel', array(), array('class' => 'daftar_dan_login', 'style' => 'float: right;')) }}
							</span>
						@endif
					</div>
					@else
					<div class="top_right_iden">
						{{ HTML::linkRoute('login', 'Login', array(), array('class' => 'daftar_dan_login', 'style' => 'float: right;')) }}
						<span> | </span>
						{{ HTML::linkRoute('registrasi', 'Daftar', array(), array('class' => 'daftar_dan_login', 'style' => 'float: right;')) }}
					</div>
					@endif
				</div>
			</div>
		</div>
		
		<nav class="site_nav">
			<div class="container_12">
				<div class="grid_12">
					<ul class="top_nav_hfi">
						<li>
							{{HTML::linkRoute('home','Home')}}
							 <ul>
								<li><a href="#">Selamat Datang</a></li>
								<li><a href="#">Tentang HFI</a></li>
								<li><a href="#">Visi</a></li>
								<li><a href="#">Misi</a></li>
								<li><a href="#">Regulasi HFI</a></li>
							</ul>
						</li>
						<li>
							{{HTML::linkRoute('organisasi','Organisasi')}}
							 <ul>
								<li><a href="#">Pengurus</a></li>
								<li><a href="#">Cabang</a></li>
								
							</ul>
						</li>
						<li>
							{{HTML::linkRoute('kegiatan','Kegiatan')}}
						</li>
						<li>
							{{HTML::linkRoute('publikasi','Publikasi',array(1))}}
							<ul>
								<li><a href="#">Publikasi Jurnal dan Non-Jurnal</a></li>
								<li><a href="#">Publikasi Ilmiah Populer</a></li>
								
							</ul>
						</li>
						<li>
							{{HTML::linkRoute('anggota','Anggota')}}
							<ul>
								<li><a href="#">Beranda</a></li>
								<li><a href="#">Ketentuan dan Perjanjian</a></li>
								
							</ul>
						</li>
						<li>
							{{HTML::linkRoute('kontak','Kontak')}}
						</li>
						<li>
							<a href="#">
								Lain-lain
							</a>
							<!--<ul>
								<li><a href="#">Jika ada 0</a></li>
								<li><a href="#">Jika ada 1</a></li>
								<li><a href="#">Jika ada 2</a></li>
								<li><a href="#">Jika ada 3</a></li>
								<li><a href="#">Jika ada 4</a></li>
								<li><a href="#">Jika ada 5</a></li>
								
							</ul>-->
							
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
		
    </section>