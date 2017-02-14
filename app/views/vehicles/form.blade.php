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

             <div class="form-group @if($errors->has('license_plate')) has-error @endif">
			    {{ Form::label('license_plate', 'License Plate', array('class'=>'col-lg-2 control-label')) }}
			    <div class="col-lg-9">
				    {{ Form::text('license_plate', null, array('class' => 'form-control', 'placeholder' => 'eg; ABC 123')) }}
				    @if($errors->has('last_name'))
				    <span class="text-danger">{{ $errors->first('license_plate') }}</span>
				    @endif
			    </div>
		    </div>

              <div class="form-group @if($errors->has('brand')) has-error @endif">
			    {{ Form::label('brand', 'Brand', array('class'=>'col-lg-2 control-label')) }}
			    <div class="col-lg-9">
				    {{ Form::text('brand', null, array('class' => 'form-control', 'placeholder' => 'eg; Totoya')) }}
				    @if($errors->has('brand'))
				    <span class="text-danger">{{ $errors->first('brand') }}</span>
				    @endif
			    </div>
		    </div>
            <div class="form-group @if($errors->has('model')) has-error @endif">
			    {{ Form::label('model', 'Model', array('class'=>'col-lg-2 control-label')) }}
			    <div class="col-lg-9">
				    {{ Form::text('model', null, array('class' => 'form-control', 'placeholder' => 'eg; Harrier')) }}
				    @if($errors->has('model'))
				    <span class="text-danger">{{ $errors->first('model') }}</span>
				    @endif
			    </div>
		    </div>
            <div class="form-group @if($errors->has('color')) has-error @endif">
			    {{ Form::label('color', 'Color', array('class'=>'col-lg-2 control-label')) }}
			    <div class="col-lg-9">
				    {{ Form::text('color', null, array('class' => 'form-control', 'placeholder' => 'White')) }}
				    @if($errors->has('color'))
				    <span class="text-danger">{{ $errors->first('license_plate') }}</span>
				    @endif
			    </div>
		    </div>
            <div class="form-group @if($errors->has('price')) has-error @endif">
			    {{ Form::label('price', 'Price', array('class'=>'col-lg-2 control-label')) }}
			    <div class="col-lg-9">
				    {{ Form::text('price', null, array('class' => 'form-control', 'placeholder' => '10.00')) }}
				    @if($errors->has('price'))
				    <span class="text-danger">{{ $errors->first('price') }}</span>
				    @endif
			    </div>
		    </div>
            <div class="form-group @if($errors->has('rent_due')) has-error @endif">
			    {{ Form::label('rent_due', 'Rent Due', array('class'=>'col-lg-2 control-label')) }}
			    <div class="col-lg-9">
				    {{ Form::text('rent_due', null, array('class' => 'form-control', 'placeholder' => '2017-01-01')) }}
				    @if($errors->has('rent_due'))
				    <span class="text-danger">{{ $errors->first('rent_due') }}</span>
				    @endif
			    </div>
		    </div>
        </fieldset>

         <div class="form-group">
		    <div class="col-lg-11">
			    <input type="submit" class="btn btn-primary pull-right" value="Save" />
		    </div>
	    </div>

	    {{ Form::close() }}

    </div>
</div><!-- End: .row -->

@stop