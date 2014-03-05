@extends('layouts.default')

<!DOCTYPE html>
<head>
	<!-- Google Analytics Content Experiment code -->
<script>function utmx_section(){}function utmx(){}(function(){var
k='82810967-1',d=document,l=d.location,c=d.cookie;
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
<!-- End of Google Analytics Content Experiment code -->
</head>

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


