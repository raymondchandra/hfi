@extends('layouts.ictap')
@section('content')

<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			
			@include('includes.ictap.sidebar')
			<div class="content_hfi">
				
				<h2>
					{{$title}}
				</h2>
				<p>
					{{$text}}
				</p>
			</div>
		</div>
	</div>
</div>


@stop