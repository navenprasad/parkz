<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Parking Manager System</title>

	<link href="https://parkzdev.herokuapp.com/assets/css/parking.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<script src="{{ asset('assets/js/plugins.min.js') }}"></script>
	<!--<script src="{{ asset('assets/js/app.min.js') }}"></script>-->

	@yield('scripts')

</head>

<body>

<div class="container">
<div class="col-xs-6">
<h1>Welcome to Parkz!</h1>
<h2>The cloud based parking management system.</h2>
</div>
<div class="col-xs-6">

	@yield('content')

	
</div>
<hr>

	<footer>
		<p>&copy; Made for Web Techniques and Applications, February 2017</p>
	</footer>

</div><!--/.container-->

</body>
</html>