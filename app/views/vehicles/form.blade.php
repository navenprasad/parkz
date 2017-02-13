@extends('layouts.master')

@section('title')
    @if ($vehicle->exists)
        Edit vehicle #: {{ $vehicle->id }}
    @else
        Create a vehicle
    @endif
@stop


@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="page-header">
            <h2>{{ link_to_route('vehicles.index', 'Vehicles') }} - @if($vehicle->exists) Edit @else Add @endif Vehicle</h2>
        </div>

        {{Form::model($vehicle, array('route' => ($vehicle->exists) ? array('vehicles.update', $vehicle->id) : 'vehicles.store', 'method' => ($vehicle->exists) ? 'PUT' : 'POST', 'autocomplete' => 'off')) }}

        @if($errors->any())
        <div class="alert alert-error">
            {{ implode(' ', $errors->all('<li>:message</li>')) }}
        </div>
        @endif

        <fieldset>
            <div class="form-group">
                {{ Form::label('customer_id', 'Owner (customer)', array('class' => 'col-md-2 control-label')) }}
                <div class="col-md-10">
                    {{ Form::select('customer_id', array(''=>'-- Select a Client --')+$customers->lists('name','id'), null, array('class' => 'form-control', 'placeholder' => 'ej: Juan')) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('vehicle_type_id', 'Vehicle Type', array('class' => 'col-md-2 control-label')) }}
                <div class="col-md-10">
                    {{ Form::select('vehicle_type_id', array(''=>'-- Select a Type --')+$vehicle_type->lists('name','id'), null, array('class' => 'form-control', 'placeholder' => 'ej: Juan')) }}
                </div>
            </div>


            <th>#</th>
            <th>Owner</th>
            <th>Vehicle Type</th>
            <th>Place</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Color</th>
            <th>License Plate</th>
            <th>Rent Price</th>
            <th>Rent Due</th>
            <th>Created at</th>
            <th>Action(s)</th>
        </fieldset>

        <div class="form-actions">
            {{ Form::submit('Save',array('class'=>'btn btn-primary')) }}
        </div>

        {{ Form::close() }}

    </div>
</div><!-- End: .row -->

@stop