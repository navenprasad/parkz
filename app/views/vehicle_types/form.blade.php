@extends('layouts.master')

@section('title')
    @if ($vehicle_type->exists)
        Edit type #: {{ $vehicle_type->id }}
    @else
        Create a type
    @endif
@stop


@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="page-header">
            <h2>{{ link_to_route('vehicle_types.index', 'Vehicle Types') }} - @if($vehicle_type->exists) Edit @else Add @endif Vehicle Type</h2>
        </div>

        {{Form::model($vehicle_type, array('route' => ($vehicle_type->exists) ? array('vehicle_types.update', $vehicle_type->id) : 'vehicle_types.store', 'method' => ($vehicle_type->exists) ? 'PUT' : 'POST', 'autocomplete' => 'off')) }}

        @if($errors->any())
        <div class="alert alert-error">
            {{ implode(' ', $errors->all('<li>:message</li>')) }}
        </div>
        @endif

        <fieldset>
            <div class="form-group">
                {{ Form::label('name', 'Type name', array('class' => 'col-md-2 control-label')) }}
                <div class="col-md-10">
                    {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'ej: Car')) }}
                </div>
            </div>
        </fieldset>

        <div class="form-actions">
            {{ Form::submit('Save',array('class'=>'btn btn-primary')) }}
        </div>

        {{ Form::close() }}

    </div>
</div><!-- End: .row -->

@stop