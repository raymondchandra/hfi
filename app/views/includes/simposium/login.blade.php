<div class="container_12">
	<div class="grid_12 s_sponsor_area">
		@if(Session::get('session_user_id') == NULL)
			<a href="{{url('simposium/registrasi/1')}}">
				Daftar
			</a>
			|
			<a href="{{url('simposium/login')}}">
				Log In
			</a>
		@else
			<a href="{{url('simposium/user/'.Session::get('session_user_id')[0])}}">
				{{Peserta::find(Session::get('session_user_id')[0])->username}}
			</a>
			|
			<a href="{{url('simposium/logout')}}">
				Log Out
			</a>
		@endif
	</div>
</div>