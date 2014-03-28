@extends('layouts.public')

@section('content')

<div class="page-header">
	<h2>Change Password</h2>
</div>
<div class="row">

	@if($errors->any())
	<div class="alert alert-error">
		{{ implode(' ', $errors->all('<li>:message</li>')) }}
	</div>
	@endif

	{{ Form::open(array('action' => 'AccountsController@postChangePassword', 'class' => 'form-horizontal span6 offset2')) }}

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

@stop