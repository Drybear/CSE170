@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
{{trans('pages.helloworld')}}
@stop

{{-- Content --}}
@section('content')

<div class="jumbotron">
  <div class="container">
    <h1>MEMDAR</h1>
    <p class="lead">Never forget</p>
  </div>
  <div class="container">
	<p class="lead">
		<a href='calendar' class="btn btn-danger">Calendar</a>
  </div>
</div>

<div class="footer">
	<p>&copy; Memdar</p>
</div>	

@if (Sentry::check() )
	<div class="panel panel-success">
		 <div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-ok"></span> {{trans('pages.loginstatus')}}</h3>
		</div>
		<div class="panel-body">
			<p><strong>{{trans('pages.sessiondata')}}:</strong></p>
			<pre>{{ var_dump(Session::all()) }}</pre>
		</div>
	</div>
@endif 
 
 
@stop
