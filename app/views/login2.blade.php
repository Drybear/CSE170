@extends('layouts.default')

<!DOCTYPE html>

{{-- Web site Title --}}
@section('title')
Log In
@stop

{{-- Content --}}
@section('content')
<style>
	.banner-image
	{
	  background: url('img/headimg.jpg');
	}
	img {
	vertical-align: left;
	}
	.bg
	{
	  width: 100%;
	  z-index: 0;
	}
	#slot {
		text-align: center;
	}
	body{
		background-image:url('{{asset('img/brain.jpg')}}');
		}
</style>

	<div class="row">
		
			{{ Form::open(array('action' => 'SessionController@store')) }}
			
				
				<h2 class="form-signin-heading">Sign In</h2>

				<div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
					{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'autofocus')) }}
					{{ ($errors->has('email') ? $errors->first('email') : '') }}
				</div>

				<div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
					{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}
					{{ ($errors->has('password') ?  $errors->first('password') : '') }}
				</div>
				
				<label class="checkbox">
					{{ Form::checkbox('rememberMe', 'rememberMe') }} Remember me
				</label>
				{{ Form::submit('Sign In', array('class' => 'btn btn-primary'))}}
				<a class="btn btn-link" href="{{ route('forgotPasswordForm') }}">Forgot Password</a>
			{{ Form::close() }}

	</div>
	<div class="row featurrette">
		<p>Not a member?         <a href='register' class="btn btn-primary">Register</a></p>
	</div>


@stop