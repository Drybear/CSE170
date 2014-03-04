<?php

$url = "https://www.google.com/calendar/feeds/cse170memdar%40gmail.com/public/basic?alt=json";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/6.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.7) Gecko/20050414 Firefox/1.0.3");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
$result = curl_exec ($ch); 
curl_close ($ch);

$decode = json_decode($result, true);
$eventsList = json_encode(array_value_recursive('$t', $decode));
$numEvents = substr_count($eventsList, 'When: ')/2;

// echo ("<pre>");
// print_r($decode);
// echo ("</pre>");

$x = 0;

$final = array();

while($x < $numEvents){
	$titleName = implode(",",($decode["feed"]["entry"][$x]["title"]));
	$comma = strpos($titleName, ',');
	$eventSize = strlen($titleName);
	$titleName = substr($titleName, 0, $comma);
	
	$eventTime = implode(",",($decode["feed"]["entry"][$x]["content"]));
	$bracket = strpos($eventTime, '<');
	$eventSize = strlen($eventTime);
	$eventTime = substr($eventTime, 6, $bracket);
	
	$final[] = array(
		'title' => $titleName,
		'time' => $eventTime,
		);
	$x++;
	}

// echo ("<pre>");
// print_r($final);
// echo ("</pre>");
		
function array_value_recursive($key, array $decode){
    $val = array();
    array_walk_recursive($decode, function($v, $k) use($key, &$val){
        if($k == $key) array_push($val, $v);
    });
    return count($val) > 1 ? $val : array_pop($val);
}


$eventsSize = strlen($eventsList);


// $time = 'When: ';
// $newLine = '\n';
// $assigner = '=>';

// $time = 'When: ';
// $newLine = '\n';
// $space = ' ';
// $eventFlag = ' Event';
// $PST = 'PST';

// $timeStart = strpos($eventsList, $time);
// $timeEnd = strpos($eventsList, $PST);
//$title = substr($eventsList, $timeStart, $timeEnd);

// $findme = 'When: ';
// $pos = strpos(array_value_recursive('$t', $decode), $findme);

//var_dump(json_decode($result));

// $jsonIterator = new RecursiveIteratorIterator(
    // new RecursiveArrayIterator(json_decode($result, TRUE)),
    // RecursiveIteratorIterator::SELF_FIRST);

// foreach ($jsonIterator as $key => $val) {
    // if(is_array($val)) {
        // echo "$key:\n";
    // } else {
        // echo "$key => $val\n";
    // }
// }
//print_r(array_values($decode));
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title> Memdar </title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Bootstrap 3.0: Latest compiled and minified CSS -->
		<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"> -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		
		<!-- Optional theme -->
		<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css"> -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
		
		<!-- This is our calendar embed -->
	<link rel='stylesheet' href="{{ asset('css/fullcalendar.css') }}">
		
		<!-- Javascripts
		================================================== -->
		<script src="{{ asset('js/jquery-2.0.2.min.js') }}"></script>
		<script src="{{ asset('js/quizconfig.js') }}"></script>
		<script src="{{ asset('js/jquiz.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/restfulizer.js') }}"></script>
        <script src="{{ asset('js/fullcalendar.js') }}"></script>		
		<script src="{{ asset('js/gcal.js') }}"></script>
		<!--   -->

		<style>
			body {
				padding-top: 70px;
			}
			alert-success {
				color: #000000;
			}
			.panel-success>.panel-heading {
				color: #000000;
			}
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	
	</head>

	<body>
		

		<!-- Navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          @if (Sentry::check())
				<a class="navbar-brand" href="mylobby">Memdar</a>
			  @else
				<a class="navbar-brand" href="{{ URL::route('login') }}">Memdar</a>
			  @endif
	        </div>
	        <div class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
				@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
					<li {{ (Request::is('users*') ? 'class="active"' : '') }}><a href="{{ URL::to('/users') }}">Users</a></li>
					<li {{ (Request::is('groups*') ? 'class="active"' : '') }}><a href="{{ URL::to('/groups') }}">Groups</a></li>
				@endif
	          </ul>
	          <ul class="nav navbar-nav navbar-right">
	            @if (Sentry::check())
				<li {{ (Request::is('users/show/' . Session::get('userId')) ? 'class="active"' : '') }}><a href="{{ URL::to('/calendar') }}">Calendar</a></li>
				<li {{ (Request::is('users/show/' . Session::get('userId')) ? 'class="active"' : '') }}><a href="{{ URL::to('/quiz') }}">Quiz</a></li>
				<li {{ (Request::is('users/show/' . Session::get('userId')) ? 'class="active"' : '') }}><a href="/users/{{ Session::get('userId') }}">Profile</a></li>
				<li><a href="{{ URL::to('logout') }}">Logout</a></li>
				@else
				<li {{ (Request::is('login') ? 'class="active"' : '') }}><a href="{{ URL::to('login') }}">Login</a></li>
				<li {{ (Request::is('users/create') ? 'class="active"' : '') }}><a href="{{ URL::to('users/create') }}">Register</a></li>
				@endif
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
		<!-- ./ navbar -->

		<!-- Container -->
		<div class="container">
			<!-- Notifications -->
			@include('layouts/notifications')
			<!-- ./ notifications -->

			<!-- Content -->
			@yield('content')
			<!-- ./ content -->
		</div>

		<!-- ./ container -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-48540804-1', 'memdar.herokuapp.com');
		  ga('send', 'pageview');

		</script>

		<script>
			$(document).ready(function()
			{
				
				var calendar = $('#calendar').fullCalendar({
					header: {
						left: 'prev,next',
						center: 'title',
						right: ''
					},
					
					editable: true,
					selectable: true,
					selectHelper: true,
					select: function(start, end, allDay)
					
				{
					/*
						after selection user will be promted for enter title for event.
					*/
					var title = prompt('Event Title:');
					/*
						if title is enterd calendar will add title and event into fullCalendar.
					*/
					if (title)
					{
						calendar.fullCalendar('renderEvent',
							{
								title: title,
								start: start,
								end: end,
								allDay: allDay
							},
							true // make the event "stick"
						);
					}
					calendar.fullCalendar('unselect');
				},
					events: 'https://www.google.com/calendar/feeds/cse170memdar%40gmail.com/public/basic'
								})
							});
		</script>
		
	</body>
</html>
