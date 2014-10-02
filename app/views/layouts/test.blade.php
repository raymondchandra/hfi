<!doctype html>
<html>
<head>
	   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HFI</title>
 
 	{{ HTML::style( asset('/assets/css/all.css') ) }}
    {{ HTML::style( asset('/assets/css/carousel.css') ) }}
	{{ HTML::script( asset('/assets/js/jquery-1.11.1.min.js') )}}
	{{ HTML::script( asset('/assets/js/jquery-migrate-1.2.1.min.js') )}}
	{{ HTML::script( asset('/assets/js/jquery.validate.min.js') )}}
	{{ HTML::script( asset('/assets/js/text_editor/jquery-te-1.4.0.min.js')) }}
	
	<!-- tambahan javascript ui accordion-->
	{{ HTML::style( asset('/assets/js/jquery-ui-1.11.1/jquery-ui.css')) }}
	{{ HTML::script( asset('/assets/js/jquery-ui-1.11.1/jquery-ui.js')) }}
	
	<!-- tambahan fixer pop up modal ala bootstrap-->
	{{ HTML::script( asset('/assets/js/bootstrap.min.js')) }}
</head>
<body>

	
	@yield('content')
	
	@include('includes.footer')

	
</body>
</html>