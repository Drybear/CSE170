@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
{{trans('pages.helloworld')}}
@stop

<!-- Google Analytics Content Experiment code -->
<head>
<script>function utmx_section(){}function utmx(){}(function(){var
k='82810967-4',d=document,l=d.location,c=d.cookie;
if(l.search.indexOf('utm_expid='+k)>0)return;
function f(n){if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.
indexOf(';',i);return escape(c.substring(i+n.length+1,j<0?c.
length:j))}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;d.write(
'<sc'+'ript src="'+'http'+(l.protocol=='https:'?'s://ssl':
'://www')+'.google-analytics.com/ga_exp.js?'+'utmxkey='+k+
'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='+new Date().
valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
'" type="text/javascript" charset="utf-8"><\/sc'+'ript>')})();
</script><script>utmx('url','A/B');</script>
</head>
<!-- End of Google Analytics Content Experiment code -->

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
</style>
<header>
  <img class="bg" src="{{asset('img/headimg.jpg')}}">
</header>
<div class="jumbotron">
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
</div>
<div class="jumbotron">
	<div class="row featurrette">
		<div id="slot">
			<h2 class="featurette-heading" id="element">Memdar</h2>
		</div>
		<div id="slot">
			<h2 class="featurette-heading">Genius. <span class="text-muted">Made to achieve excellence.</span></h2>
		</div>
	<img class="bg" src="{{asset('img/Calendar.jpg')}}" width="320" height="200">
	<div id="slot">
		<p class="lead">Never forget anything again with Memdar. Sync your Google Calendar with Memdar seamlessly and then be quizzed on details in the calendar, always staying on top of your upcoming events.</p>
	</div>
	</div>
</div>

<div class="footer">
	<p>&copy; Memdar</p>
</div>	
 
 
@stop
