@extends('layouts.master')

@section('title')
    @if ($customer->exists)
        Editar cliente #: {{ $customer->id }}
    @else
        Create Customers
    @endif
@stop

@section('content')
 <link rel="stylesheet" href="http://localhost:8000/assets/css/parking.css">

<div class="row">
	<div class="page-header">
		<h2>@if($customer->exists) Edit @else Create @endif Customer</h2>
		{{ link_to_route('customers.index', '<< Back to All Customers') }}
	</div>
    <div class="col-lg-6 col-lg-offset-3">

	    @if($errors->any())
	    <div class="alert alert-danger">
		    <p>The form contained errors</p>
	    </div>
	    @endif

        {{ Form::model($customer, array('route' => ($customer->exists) ? array('customers.update', $customer->id) : 'customers.store', 'method' => ($customer->exists) ? 'PUT' : 'POST', 'class' => 'form-horizontal well', 'autocomplete' => 'off')) }}


	    <fieldset>
		    <legend>Customer Details</legend>

		    <div class="form-group @if($errors->has('name')) has-error @endif">
			    {{ Form::label('name', 'First Name', array('class'=>'col-lg-2 control-label')) }}
			    <div class="col-lg-9">
				    {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'eg; Naven')) }}
				    @if($errors->has('name'))
				    <span class="text-danger">{{ $errors->first('name') }}</span>
				    @endif
			    </div>
		    </div>

		    <div class="form-group @if($errors->has('last_name')) has-error @endif">
			    {{ Form::label('last_name', 'Last Name', array('class'=>'col-lg-2 control-label')) }}
			    <div class="col-lg-9">
				    {{ Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'eg; Prasad')) }}
				    @if($errors->has('last_name'))
				    <span class="text-danger">{{ $errors->first('last_name') }}</span>
				    @endif
			    </div>
		    </div>

		    <div class="form-group @if($errors->has('dni')) has-error @endif">
			    {{ Form::label('dni', 'ID', array('class'=>'col-lg-2 control-label')) }}
			    <div class="col-lg-9">
				    {{ Form::text('dni', null, array('class' => 'form-control', 'placeholder' => 'eg; 12652301')) }}
				    @if($errors->has('dni'))
				    <span class="text-danger">{{ $errors->first('dni') }}</span>
				    @endif
			    </div>
		    </div>
	    </fieldset>

	    <fieldset>
		    <legend>Address</legend>

		    <div class="form-group @if($errors->has('street_name')) has-error @endif">
			    {{ Form::label('street_name', 'Street Name', array('class'=>'col-lg-2 control-label')) }}
			    <div class="col-lg-9">
				    {{ Form::text('street_name', Input::old('street_name'), array('class' => 'form-control', 'placeholder' => 'eg; Taman Meranti')) }}
				    @if($errors->has('street_name'))
				    <span class="text-danger">{{ $errors->first('street_name') }}</span>
				    @endif
			    </div>
		    </div>

		    <div class="form-group">
			    {{ Form::label('street_number', 'Street Number', array('class'=>'col-lg-2 control-label')) }}
			    <div class="col-lg-3">
				    {{ Form::text('street_number', Input::old('street_number'), array('class' => 'form-control', 'placeholder' => 'eg; 1540')) }}
				    @if($errors->has('street_number'))
				    <span class="text-danger">{{ $errors->first('street_number') }}</span>
				    @endif
			    </div>
			    {{ Form::label('suburb', 'Town', array('class'=>'col-lg-2 control-label')) }}
			    <div class="col-lg-4">
				    {{ Form::text('suburb', Input::old('suburb'), array('class' => 'form-control', 'placeholder' => 'eg; Tampin')) }}
				    @if($errors->has('suburb'))
				    <span class="text-danger">{{ $errors->first('suburb') }}</span>
				    @endif
			    </div>
		    </div>

	    </fieldset>

	    <fieldset>
		    <legend>Contact</legend>

		    <div class="form-group @if($errors->has('name')) has-error @endif">
			    {{ Form::label('email', 'E-Mail', array('class'=>'col-lg-2 control-label')) }}
			    <div class="col-lg-9">
				    {{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'naven@leern.tech')) }}
				    @if($errors->has('email'))
				    <span class="text-danger">{{ $errors->first('email') }}</span>
				    @endif
			    </div>
		    </div>

		    <div class="form-group">
			    {{ Form::label('home_phone', 'House Phone', array('class'=>'col-lg-2 control-label')) }}
			    <div class="col-lg-3">
				    {{ Form::text('home_phone', Input::old('home_phone'), array('class' => 'form-control', 'placeholder' => 'eg; 4741983')) }}
				    @if($errors->has('home_phone'))
				    <span class="text-danger">{{ $errors->first('home_phone') }}</span>
				    @endif
			    </div>
			    {{ Form::label('mobile_phone', 'Mobile Phone', array('class'=>'col-lg-2 control-label')) }}
			    <div class="col-lg-4">
				    {{ Form::text('mobile_phone', Input::old('mobile_phone'), array('class' => 'form-control', 'placeholder' => 'eg; 0147207275')) }}
				    @if($errors->has('mobile_phone'))
				    <span class="text-danger">{{ $errors->first('mobile_phone') }}</span>
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