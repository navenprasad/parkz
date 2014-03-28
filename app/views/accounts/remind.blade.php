@extends('layouts.public')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">Forgot your password?</div>
	<div class="panel-body">
		{{ Form::open(array('url' => 'password/remind')) }}
		<div class="form-group @if($errors->has('email')) error @endif">
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
		</div>
		{{ Form::submit('Send Reminder', array('class' => 'btn btn-lg btn-primary btn-block')) }}
		{{ Form::close() }}
	</div>
</div>

@stop