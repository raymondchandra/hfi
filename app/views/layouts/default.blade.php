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

	<footer class="row">
		@include('includes.footer')
	</footer>

</div>
</body>
</html>