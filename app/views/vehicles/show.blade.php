@extends('layouts.master')

@section('title')
{{ $vehicle->license_plate }}
@stop


@section('content')

<div class="row">
	<div class="page-header">
		<h2>Vehículo #{{ $vehicle->id }}</h2>
		{{ link_to_route('vehicles.index', '<< Volver al listado de vehículos') }}
	</div>

	<div class="col-xs-12 col-sm-6 col-md-12">
		<p><strong>Tipo: </strong>{{ $vehicle->vehicle_type->name }}</p>
		<p><strong>Marca: </strong>{{ $vehicle->brand }}</p>
		<p><strong>Modelo: </strong>{{ $vehicle->model }}</p>
		<p><strong>Color: </strong>{{ $vehicle->color }}</p>
		<p><strong>Patente: </strong>{{ $vehicle->license_plate }}</p>
		<p><strong>Dueño: </strong>{{ $vehicle->customer->name }}</p>
		<p><strong>Precio de renta: </strong>{{ $vehicle->price }}</p>
		<p><strong>Proximo vencimiento: </strong>{{ $vehicle->rent_due }}</p>
		<p><strong>Creado: </strong>{{ $vehicle->created_at->toDayDateTimeString() }}</p>
		<p><strong>Actualizado: </strong>{{ $vehicle->updated_at }}</p>
	</div>
</div><!-- End: .row -->

@stop