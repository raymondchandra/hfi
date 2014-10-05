<div class="container_12">
	<div class="grid_12 s_sponsor_area">
		@if(Session::get('session_user_id') == NULL && Session::get('session_admin_id')== NULL)
			<a href="{{url('simposium/registrasi/'.$id)}}">
				Daftar
			</a>
			|
			<a href="{{url('simposium/login/'.$id)}}">
				Log In
			</a>
		@elseif(Session::get('session_admin_id')!= NULL)
			<a href="javascript:void(0)">
				Selamat datang, Admin
			</a>
			|
			<a href="{{url('simposium/logout/'.$id)}}">
				Log Out
			</a>
		@else
			<a href="{{url('simposium/user/'.Session::get('session_user_id')[0]).'/'.$id}}">
				{{Peserta::find(Session::get('session_user_id')[0])->username}}
			</a>
			|
			<a href="{{url('simposium/logout/'.$id)}}">
				Log Out
			</a>
		@endif
	</div>
</div>