<!doctype html>
<html>
<head>
	@include('includes.head')
	<!-- Latest compiled and minified CSS -->
</head>
<body>
	@include('includes.simposium.header')
	@include('includes.simposium.sponsor')

	
	@yield('content')

	
	<footer class="row">
		@include('includes.footer')
	</footer>
	
	@include('includes.modals.loading')

</body>
</html>