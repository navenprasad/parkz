@extends('layouts.master')

@section('title')
Administrative Panel
@stop

@section('content')
    


<div class="row">
	<div class="col-lg-6 col-lg-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					<span class="fa fa-bookmark"></span> Quick Links</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<a href="{{ route('spots.index') }}" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Spots</a>
						<a href="{{ route('vehicles.index') }}" class="btn btn-warning btn-lg" role="button"><span class="fa fa-truck"></span> <br/>Vehicles</a>
						<a href="{{ route('customers.index') }}" class="btn btn-primary btn-lg" role="button"><span class="fa fa-users"></span> <br/>Clients</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- End: .row -->


@stop