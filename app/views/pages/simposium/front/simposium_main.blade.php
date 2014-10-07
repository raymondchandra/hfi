@extends('layouts.simposium')
@section('content')
<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			
			@include('includes.simposium.sidebar')
			<div class="content_hfi">
				<p>
					@if(!empty(Session::get('message')))
						{{Session::get('message')}}
					@endif
					{{$text}}
				</p>
			</div>
		</div>
	</div>
</div>


@stop