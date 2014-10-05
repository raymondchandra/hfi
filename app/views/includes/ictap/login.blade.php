<div class="container_12">
	<div class="grid_12 s_sponsor_area">
		@if(Session::get('session_user_id') == NULL && Session::get('session_admin_id')== NULL)
			<a href="{{url('ictap/registrasi/'.$id)}}">
				Register
			</a>
			|
			<a href="{{url('ictap/login/'.$id)}}">
				Log In
			</a>
		@elseif(Session::get('session_admin_id')!= NULL)
			<a href="javascript:void(0)">
				Welcome, Admin
			</a>
			|
			<a href="{{url('ictap/logout/'.$id)}}">
				Log Out
			</a>
		@else
			<a href="{{url('ictap/user/'.$id.'/'.Session::get('session_user_id')[0])}}">
				{{Peserta::find(Session::get('session_user_id')[0])->username}}
			</a>
			|
			<a href="{{url('ictap/logout/'.$id)}}">
				Log Out
			</a>
		@endif
	</div>
</div>