@extends('layouts.master')

@section('title')
    {{ $customer->last_name }}, {{ $customer->name }}
@stop


@section('content')

<div class="row">
    <div class="page-header">
        <h2>Cliente #{{ $customer->id }}</h2>
        {{ link_to_route('customers.index', '<< Volver al listado de clientes') }}
    </div>

    <div class="col-xs-12 col-sm-6 col-md-12">
        <p><strong>Apellido: </strong>{{ $customer->last_name }}</p>
        <p><strong>Nombre: </strong>{{ $customer->name }}</p>
        <p><strong>Direccion: </strong>{{ $customer->street_name }} {{ $customer->street_number }}, {{ $customer->suburb }}</p>
        <p><strong>DNI: </strong>{{ $customer->dni }}</p>
        <p><strong>E-mail: </strong>{{ $customer->email }}</p>
        @if ($customer->vehicles->count())
        <p><strong>Vehículos: </strong></p>
        <ul>
            @foreach ($customer->vehicles as $vehicle)
            <li>{{ $vehicle->brand }} {{ $vehicle->model }} {{ $vehicle->color }} ({{ $vehicle->license_plate }})</li>
            @endforeach
        </ul>
        @else
        <p class="text-danger"><i class="fa fa-exclamation-circle fa-2x"></i><strong> Este cliente no tiene vehículos vinculados.</strong></p>
        <p class="text-danger">Debe agregar un vehículo y vincularlo a este cliente.</p>
        @endif

        <p><strong>Teléfono fijo: </strong>{{ $customer->home_phone }}</p>
        <p><strong>Teléfono celular: </strong>{{ $customer->mobile_phone }}</p>
        <p><strong>Creado: </strong>{{ $customer->created_at }}</p>
        <p><strong>Actualizado: </strong>{{ $customer->updated_at }}</p>
    </div>
</div><!-- End: .row -->

@stop