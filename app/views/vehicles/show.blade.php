@extends('layouts.master')

@section('title')
    {{ $customer->last_name }}, {{ $customer->name }}
@stop


@section('content')

<div class="row">
    <div class="page-header">
        <h2>Customer #{{ $customer->id }} - {{ $customer->last_name }}, {{ $customer->name }}</h2>
        {{ link_to_route('customers.index', '<< Go back to customers list') }}
    </div>

    <div class="col-xs-12 col-sm-6 col-md-12">
        <p><strong>Address: </strong>{{ $customer->street_name }} {{ $customer->street_number }}, {{ $customer->suburb }}</p>
        <p><strong>DNI: </strong>{{ $customer->dni }}</p>
        <p><strong>E-mail: </strong>{{ $customer->email }}</p>
        @if ($customer->vehicles->count())
        <p><strong>Vehicles: </strong></p>
        <ul>
            @foreach ($customer->vehicles as $vehicle)
            <li>{{ $vehicle->brand }} {{ $vehicle->model }} {{ $vehicle->color }} ({{ $vehicle->license_plate }})</li>
            @endforeach
        </ul>
        @else
        <p><strong>The customer has no vehicles attached.</strong></p>
        @endif

        <p><strong>Home Phone: </strong>{{ $customer->home_phone }}</p>
        <p><strong>Mobile Phone: </strong>{{ $customer->mobile_phone }}</p>
        <p><strong>Created at: </strong>{{ $customer->created_at }}</p>
    </div>
</div><!-- End: .row -->


@stop