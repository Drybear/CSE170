@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
{{trans('pages.helloworld')}}
@stop

{{-- Content --}}
@section('content')
<style>
	body{
		text-align: center
		}
		.panel-success>.panel-heading {
			color: #000000;
		}
</style>

<div class="jumbotron">
  <div class="container">
    <h1>MEMDAR</h1>
  </div>
  @if (Sentry::check() )
	<div class="panel panel-success">
		 <div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-ok"></span> {{trans('pages.loginstatus')}}</h3>
		</div>
		<div class="container">
			<p class="lead">
			<a href='calendar' class="btn btn-danger">Calendar</a>
		</div>
		<div class="container">
			<p class="lead">
			<a href='quiz' class="btn btn-success">Quiz</a>
		</div>
		<!--<div class="panel-body">
			<p><strong>{{trans('pages.sessiondata')}}:</strong></p>
			<pre>{{ var_dump(Session::all()) }}</pre>
		</div>-->
	</div>
	@else
		<div class="container">
			<p class="lead">
			<a href='login' class="btn btn-danger">Login</a>
		</div>
		<div class="container">
			<p class="lead">
			<a href='register' class="btn btn-danger">Register</a>
		</div>
@endif

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>
</div>

<div class="footer">
	<p>&copy; Memdar</p>
</div>	
 
 
@stop
