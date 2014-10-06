<div class="container_12">
	<div class="grid_12 s_sponsor_area">
		@if(Session::get('session_user_id') == NULL && Session::get('session_admin_id')== NULL)
			<a href="{{url('event/registrasi/'.$id)}}">
				@if($simpIct == 3)
					Daftar
				@else 
				@if($simpIct == 4)
					Register
				@endif
				@endif
			</a>
			|
			<a href="{{url('event/login/'.$id)}}">
				@if($simpIct == 3)
					Masuk
				@else 
				@if($simpIct == 4)
					Log In
				@endif
				@endif
			</a>
		@elseif(Session::get('session_admin_id')!= NULL)
			<a href="javascript:void(0)">
				@if($simpIct == 3)
					Selamat datang, Admin
				@else 
				@if($simpIct == 4)
					Welcome , Admin
				@endif
				@endif

			</a>
			|
			<a href="{{url('event/logout/'.$id)}}">
				@if($simpIct == 3)
					Keluar
				@else 
				@if($simpIct == 4)
					Log Out
				@endif
				@endif
			</a>
		@else
			<a href="{{url('event/user/'.Session::get('session_user_id')[0]).'/'.$id}}">
				{{Peserta::find(Session::get('session_user_id')[0])->username}}
			</a>
			|
			<a href="{{url('event/logout/'.$id)}}">
				@if($simpIct == 3)
					Keluar
				@else 
				@if($simpIct == 4)
					Log Out
				@endif
				@endif
			</a>
		@endif
	</div>
</div>