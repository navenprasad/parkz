@extends('layouts.master')

@section('title')
@stop


@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="page-header">
            
        </div>

        {{Form::model($spot, array('route' => ($spot->exists) ? array('spots.update', $spot->id) : 'spots.store', 'method' => ($spot->exists) ? 'PUT' : 'POST', 'autocomplete' => 'off')) }}

        @if($errors->any())
        <div class="alert alert-error">
            {{ implode(' ', $errors->all('<li>:message</li>')) }}
        </div>
        @endif

        <fieldset>
            <div class="form-group">
                {{ Form::label('spot_id', 'Spot (spot)', array('class' => 'col-md-2 control-label')) }}
                <div class="col-md-10">
                    {{ Form::select('available_spots', array(''=>'-- Select a Client --')+$available_spots->lists('description'), null, array('class' => 'form-control', 'placeholder' => 'ej: Juan')) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('vehicles', 'Vehicles', array('class' => 'col-md-2 control-label')) }}
                <div class="col-md-10">
                    {{ Form::select('vehicles', array(''=>'-- Select a Type --')+$vehicles->lists('license_plate','model'), null, array('class' => 'form-control', 'placeholder' => 'ej: Juan')) }}
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