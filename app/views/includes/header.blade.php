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
								<li><a href="{{ URL::route('home',array()) }}">Selamat Datang</a></li>
								<li><a href="{{ URL::route('home',array()) }}#tentang_hfi">Tentang HFI</a></li>
								<li><a href="{{ URL::route('home',array()) }}#visi_hfi">Visi</a></li>
								<li><a href="{{ URL::route('home',array()) }}#misi_hfi">Misi</a></li>
								<li><a href="{{ URL::route('home',array()) }}#regulasi_hfi">Regulasi HFI</a></li>
							</ul>
						</li>
						<li>
							{{HTML::linkRoute('organisasi','Organisasi')}}
							 <ul>
								<li><a href="{{ URL::route('organisasi',array()) }}">Pengurus</a></li>
								<li><a href="{{ URL::route('cabang',array()) }}">Cabang</a></li>
								
							</ul>
						</li>
						<li>
							{{HTML::linkRoute('kegiatan','Kegiatan',array(1))}}
							<ul>
								<li><a href="{{ URL::route('kegiatan',array(1)) }}">Kegiatan Nasional</a></li>
								<li><a href="{{ URL::route('kegiatan',array(2)) }}">Kegiatan Internasional</a></li>
								<li><a href="{{ URL::route('simposium')}}">Simposium</a></li>
								<li><a href="{{ URL::route('ictap')}}">ICTAP</a></li>
							</ul>
						</li>
						<li>
							{{HTML::linkRoute('publikasi','Publikasi',array(1))}}
							<ul>
								<li><a href="{{ URL::route('publikasi',array(1)) }}">Publikasi Jurnal dan Non-Jurnal</a></li>
								<li><a href="{{ URL::route('publikasi',array(4)) }}">Publikasi Ilmiah Populer</a></li>
								
							</ul>
						</li>
						<li>
							{{HTML::linkRoute('anggota','Anggota')}}
							<ul>
								<li><a href="{{ URL::route('anggota',array()) }}">Beranda</a></li>
								<li><a href="{{ URL::route('ketentuan',array()) }}">Ketentuan dan Perjanjian</a></li>
								
							</ul>
						</li>
						<li>
							{{HTML::linkRoute('kontak','Kontak')}}
						</li>
						<li>
							<a href="#">
								Lain-lain
							</a>
							<ul>
							<?php
								$lains = LainController::getAllMenu();
								foreach ($lains as $lain) {
									echo '<li><a href="'.URL::route('lain',array($lain->id)).'">'.$lain->title.'</a></li>';
								}
							?>
							</ul>
							
							
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
		
    </section>