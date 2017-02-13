@extends('layouts.master')

@section('title')
    {{ $customer->last_name }}, {{ $customer->name }}
@stop


@section('content')
 <link rel="stylesheet" href="http://localhost:8000/assets/css/parking.css">
<div class="row">
    <div class="page-header">
        <h2>Customer #{{ $customer->id }}</h2>
        {{ link_to_route('customers.index', '<< Back to all customers.') }}
    </div>

    <div class="col-xs-12 col-sm-6 col-md-12">
        <p><strong>Last Name: </strong>{{ $customer->last_name }}</p>
        <p><strong>First name: </strong>{{ $customer->name }}</p>
        <p><strong>Address: </strong>{{ $customer->street_name }} {{ $customer->street_number }}, {{ $customer->suburb }}</p>
        <p><strong>ID: </strong>{{ $customer->dni }}</p>
        <p><strong>E-mail: </strong>{{ $customer->email }}</p>
        @if ($customer->vehicles->count())
        <p><strong>Vehicles: </strong></p>
        <ul>
            @foreach ($customer->vehicles as $vehicle)
            <li>{{ $vehicle->brand }} {{ $vehicle->model }} {{ $vehicle->color }} ({{ $vehicle->license_plate }})</li>
            @endforeach
        </ul>
        @else
        <p class="text-danger"><i class="fa fa-exclamation-circle fa-2x"></i><strong> This customer has no vehicles registeres.</strong></p>
        <p class="text-danger">Please register a vehicles to this customer.</p>
        @endif

        <p><strong>Home Phone: </strong>{{ $customer->home_phone }}</p>
        <p><strong>Mobile Phone: </strong>{{ $customer->mobile_phone }}</p>
        <p><strong>Created at: </strong>{{ $customer->created_at }}</p>
        <p><strong>Updated at: </strong>{{ $customer->updated_at }}</p>
    </div>
</div><!-- End: .row -->

@stop