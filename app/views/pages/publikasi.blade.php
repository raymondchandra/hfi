@extends('layouts.default')
@section('content')
<div class="container_12">

	<div class="grid_12">
		<div class="main_content">
			<div class="side_panel_hfi">
				<div class="side_panel_hfi_background">
				<ul>
					<li>
						<a href="javascript:void(0)"> Publikasi Jurnal & Non-Jurnal</a>

					</li>
					<li class="sublink_sidebar">
						<a href="{{ URL::route('publikasi',array(1)) }}">
							Jenis Publikasi
						</a>

					</li>
					<li class="sublink_sidebar">
						<a href="{{ URL::route('publikasi',array(2)) }}">
							Ketentuan Umum
						</a>
					</li>
					<li class="sublink_sidebar">
						<a href="{{ URL::route('publikasi',array(3)) }}">
							Karya-Karya Tulis Lain
						</a>
					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						<a href="{{ URL::route('publikasi',array(4)) }}">
							Publikasi Ilmiah Populer
						</a>
					</li>
				
				</ul>
				</div>
			</div>
			
			<div class="content_hfi">
				<h1>{{$current}}</h1>
				{{$publikasi}}
			</div>
		</div>
	</div>

@stop