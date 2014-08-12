<!doctype html>
<html>
<head>
	@include('includes.head')
</head>
<body>
<div class="container">

	@include('includes.header')
	

	<section class="content_container">
		<div class="container_12">
			<div class="grid_12">
				<div class="main_content">

				@yield('content')

				</div>
			</div>
		</div>
	</section>

	<footer class="row">
		@include('includes.footer')
	</footer>

</div>
</body>
</html>