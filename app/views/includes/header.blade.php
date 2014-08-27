    <section class="header">
		<div class="site_id">
			<div class="container_12">
				<div class="grid_10 ">
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
				<div class="grid_2 ">
					@if(Auth::check())
						@if(Auth::user()->role == 0)
							Hi {{ HTML::linkRoute('profile', UserController::getHeaderName(Auth::user()->id), array(), array('class' => 'daftar_dan_login')) }}
						@else
							Hi {{UserController::getHeaderName(Auth::user()->id)}}
						@endif	
						<span> | </span>
						{{ HTML::linkRoute('logout', 'Keluar', array(), array('class' => 'daftar_dan_login')) }}
					@else
						{{ HTML::linkRoute('registrasi', 'Daftar', array(), array('class' => 'daftar_dan_login')) }}
						<span> | </span>
						{{ HTML::linkRoute('login', 'Login', array(), array('class' => 'daftar_dan_login')) }}
					@endif
				</div>
			</div>
		</div>
		
		<nav class="site_nav">
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
		</nav>
    </section>