@extends('layouts.public')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">Sign in</div>
		<div class="panel-body">
			{{ Form::open(array('autocomplete' => 'off')) }}

			@if($errors->any())
			<div class="alert alert-error">
				{{ implode(' ', $errors->all(':message')) }}
			</div>
			@endif

			<div class="form-group @if($errors->has('email')) error @endif">
				{{ Form::label('email', 'Email') }}
				{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
			</div>

			<div class="form-group @if($errors->has('password')) error @endif">
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password', array('class' => 'form-control')) }}
				<span class="help-block">{{ HTML::link('password/remind', 'Forgotten your password?') }}</span>
			</div>
			{{ Form::submit('Sign In!', array('class' => 'btn btn-lg btn-primary btn-block')) }}
			{{ Form::close() }}
		</div>
	</div>

@stop