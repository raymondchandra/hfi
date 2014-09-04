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
					<li>
						{{HTML::linkRoute('publikasi','Jenis Publikasi',array(1))}}

					</li>
					<li>
						{{HTML::linkRoute('publikasi','Ketentuan Umum',array(2))}}

					</li>
					<li>
						{{HTML::linkRoute('publikasi','Karya-Karya Tulis Lain',array(3))}}

					</li>
					<span class="white_space">&nbsp;</span>
					<li>
						{{HTML::linkRoute('publikasi','Publikasi Ilmiah Populer',array(4))}}

					</li>
				
				</ul>
				</div>
			</div>
			
			<div class="content_hfi">
				{{$publikasi}}
			</div>
		</div>
	</div>

@stop