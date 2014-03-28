<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    {{ HTML::style('assets/css/parking.css?v=' . filemtime('assets/css/parking.css')) }}

    @yield('styles')

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--SCRIPTS-->




    {{ HTML::script('assets/js/common.js') }}

    @yield('scripts')
</head>
<body>
<!--HEADER-->

@include('layouts.includes.header')

<!--CONTENT-->

<div id="content-container" class="container">
    @yield('content')
</div><!-- #content-container -->

<!--FOOTER-->

@include('layouts.includes.footer')

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
{{ HTML::script('assets/js/vendor/jquery-1.10.1.min.js') }}
<!-- Include all compiled plugins (below), or include individual files as needed -->
{{ HTML::script('assets/js/vendor/bootstrap.min.js') }}
</body>
</html>