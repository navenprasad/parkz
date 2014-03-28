@extends('layouts.master')

@section('title')
Panel de Administracion
@stop

@section('content')

<div class="row">
	<div class="col-lg-6 col-lg-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					<span class="fa fa-bookmark"></span> Accesos Rapidos</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<a href="{{ route('spots.index') }}" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Lugares</a>
						<a href="{{ route('vehicles.index') }}" class="btn btn-warning btn-lg" role="button"><span class="fa fa-truck"></span> <br/>Vehiculos</a>
						<a href="{{ route('customers.index') }}" class="btn btn-primary btn-lg" role="button"><span class="fa fa-users"></span> <br/>Clientes</a>
						<a href="#" class="btn btn-success btn-lg" role="button"><span class="fa fa-money"></span> <br/>Facturacion</a>
						<a href="#" class="btn btn-info btn-lg" role="button"><span class="fa fa-gears"></span> <br/>Opciones</a>
						<a href="#" class="btn btn-default btn-lg" role="button"><span class="fa fa-sign-out"></span> <br/>Salir</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- End: .row -->


@stop