<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>@yield('title') - Parkz | Cloud Based Parking Manager</title>

    <!-- Custom styles for this template -->
     <link rel="stylesheet" href="assets/css/parking.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Parkz | Cloud Based Parking Management</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>{{ link_to_route('customers.index', 'Clients') }}</li>
                <li>{{ link_to_route('vehicles.index', 'Vehicles') }}</li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configurations <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ link_to_route('vehicle_types.index', 'Types of Vehicles') }}</li>
                    </ul>
                </li>

                <li><a href="{{ URL::route('account-sign-out') }}">Sign Out</a></li>

                
            </ul>
        </div>
    </div>
</div>

<div class="container">

    @yield('content')

</div> <!-- /container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
{{ HTML::script('assets/js/vendor/jquery-1.11.0.min.js') }}
<!-- Include all compiled plugins (below), or include individual files as needed -->
{{ HTML::script('assets/js/vendor/bootstrap.min.js') }}

</body>
</html>
