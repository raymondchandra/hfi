@extends('layouts.simposium')
@section('content')
<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			
			@include('includes.simposium.sidebar')
			<div class="content_hfi">
				<p>
					{{$message}}
					{{$text}}
				</p>
			</div>
		</div>
	</div>
</div>


@stop