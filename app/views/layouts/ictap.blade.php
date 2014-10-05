<!doctype html>

<html>
<head>
	@include('includes.head')
	<!-- Latest compiled and minified CSS -->
</head>
<body>
	@include('includes.simposium.header')
	@include('includes.simposium.sponsor')
	@include('includes.ictap.login')

	
	@yield('content')

	
	
	@include('includes.footer')
	
	
	@include('includes.modals.loading')

</body>
</html>