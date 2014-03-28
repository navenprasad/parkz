@extends('layouts.public')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">Forgot your password?</div>
	<div class="panel-body">
		@if($errors->any())
		<div class="alert alert-error">
			{{ implode(' ', $errors->all('<li>:message</li>')) }}
		</div>
		@endif

		{{ Form::open(array('url' => 'password/reset')) }}
		<input type="hidden" name="token" value="{{ $token }}">

		<div class="form-group @if($errors->has('email')) error @endif">
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
		</div>

		<div class="form-group @if($errors->has('password')) error @endif">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', array('class' => 'form-control')) }}
		</div>

		<div class="form-group @if($errors->has('password_confirmation')) error @endif">
			{{ Form::label('password_confirmation', 'Password Confirmation') }}
			{{ Form::password('password_confirmation', array('class' => 'form-control')) }}
		</div>
		{{ Form::submit('Reset Password', array('class' => 'btn btn-lg btn-primary btn-block')) }}
		{{ Form::close() }}
	</div>
</div>

@stop