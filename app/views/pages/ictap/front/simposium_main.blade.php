@extends('layouts.ictap')
@section('content')
<div class="container_12">
	<div class="grid_12">
		<div class="main_content">
			
			@include('includes.ictap.sidebar')
			<div class="content_hfi">
				<p>
					{{$text}}
				</p>
			</div>
		</div>
	</div>
</div>


@stop