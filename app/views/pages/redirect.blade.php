@extends('layouts.default')
@section('content')	
<div class="grid_12">
	<div class="main_content">
		<h1 style="text-align: center; margin-top: 180px;">
			{{Session::get('message')}}
		</h1>
	</div>
</div>
@stop