@extends('layouts.default')

<style type="text/css">
		body
		{
			margin-top: 10px;
			text-align: center;
			font-size: 14px;
			font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		}
		#calendar
		{
			<br>
			<br>

			width: 300px;
			margin: 2 auto;
		}
	</style>
@section('content')

		<div class="container">
			<p class="lead">
			<a href='calendar' class="btn btn-success">Month</a>
			<a href='calendar2' class="btn btn-primary">Week</a>
			<a href='calendar3' class="btn btn-primary">Day</a>
		</div>
		<div id='calendar'></div>


@stop


