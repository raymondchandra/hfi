<!doctype html>
<html>
<head>
	@include('includes.head')
</head>
<body>
<div class=""><!-- class="container" OLD -->

	@include('includes.header')
	

	<section class="content_container">
		<div class="container_12">
			

			@yield('content')

		</div>
	</section>

	
		@include('includes.footer')
	

</div>
</body>
</html>