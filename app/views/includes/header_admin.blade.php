    <section class="header_admin">
		<div class="admin_logo">
			<span class="logo_admin">
			</span>
			<p>
				Himpunan Fisika Indonesia
			</p>
		</div>
		<div class="admin_id">
			Selamat datang, {{ HTML::linkRoute('viewUser', UserController::getHeaderName(Auth::user()->id), array(), array('class' => 'daftar_dan_login')) }} HFI <span class="sep">|</span> {{ HTML::linkRoute('logout', 'Keluar', array(), array('class' => 'daftar_dan_login')) }}
		</div>
    </section>