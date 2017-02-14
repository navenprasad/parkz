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
            <div class="form-group @if($errors->has('description')) has-error @endif">
			    {{ Form::label('description', 'Description', array('class'=>'col-lg-2 control-label')) }}
			    <div class="col-lg-9">
				    {{ Form::text('description', null, array('class' => 'form-control', 'placeholder' => 'B3')) }}
				    @if($errors->has('description'))
				    <span class="text-danger">{{ $errors->first('description') }}</span>
				    @endif
			    </div>
		    </div>

            <div class="form-group">
                {{ Form::label('vehicle_id', 'Vehicle', array('class' => 'col-md-2 control-label')) }}
                <div class="col-md-10">
                    {{ Form::select('vehicle_id', array(''=>'-- Select a Type --')+$vehicles->lists('id'), null, array('class' => 'form-control', 'placeholder' => 'ej: Juan')) }}
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