@extends('layouts.simposium')
@section('content')
<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			
			@include('includes.simposium.sidebar')
			<div class="content_hfi">
				<p>
					@if(Session::get('message') != null)
						{{Session::get('message')}}
					@endif
					{{$text}}
				</p>
			</div>
		</div>
	</div>
</div>


@stop