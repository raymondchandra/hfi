@extends('layouts.default')
@section('content')
<div class="container_12">

	<div class="grid_12">
		<div class="selamat_datang_container">
			
			<div class="main_content">
				<h2>{{$lain->title}}</h2>
				
				<p>
					{{$lain->konten}}
				</p>
			
			</div>
		</div>
		
	</div>

@stop