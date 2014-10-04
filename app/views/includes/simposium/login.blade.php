<div class="container_12">
	<div class="grid_12 s_sponsor_area">
		@if(Session::get('session_user_id') == NULL)
			<a href="{{url('simposium/registrasi/'.$id)}}">
				Daftar
			</a>
			|
			<a href="{{url('simposium/login/'.$id)}}">
				Log In
			</a>
		@else
			<a href="{{url('simposium/user/'.$id.'/'.Session::get('session_user_id')[0])}}">
				{{Peserta::find(Session::get('session_user_id')[0])->username}}
			</a>
			|
			<a href="{{url('simposium/logout/'.$id)}}">
				Log Out
			</a>
		@endif
	</div>
</div>