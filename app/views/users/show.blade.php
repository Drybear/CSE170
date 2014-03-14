@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

<style type="text/css">
	alert {
		color:#000000;
	}
	.panel-success>.panel-heading {
		color: #000000;
	}
	alert.success {
		color: #000000;
	}
		alert.danger{
		color: #000000;
	}
		alert.warning {
		color: #000000;
	}
		alert.info {
		color: #000000;
	}
	body{
		background-color: #0D747C;
	}
</style>



{{-- Content --}}
@section('content')

	<h4>Account Profile</h4>
	
  	<div class="jumbotron"> 
		<div class="col-md-4">
			<!--
			<p><em>Account created: {{ $user->created_at }}</em></p>
			<p><em>Last Updated: {{ $user->updated_at }}</em></p>
			-->
			<button class="btn btn-primary" onClick="location.href='{{ action('UserController@edit', array($user->id)) }}'">Edit Profile</button>
		</div>
	    <div class="col-md-8">
		    @if ($user->first_name)
		    	<p>First Name:</strong> {{ $user->first_name }} </p>
			@endif
			@if ($user->last_name)
		    	<p><strong>Last Name:</strong> {{ $user->last_name }} </p>
			@endif
				<p><strong>Email:</strong> {{ $user->email }}</p>
			@if ($user->google)
				<p>Google Url added! {{ $user->google }}</p>
			@else
				<p>You must enter your Google URL, click the Edit Profile button</p>
				<div id="slot">
					<h3>You must enter your Google URL.</h3>
					<p> First, make your Google calendar public, follow these steps: </p>
					<ol>
					<li>In the Google Calendar interface, locate the "My Calendar" box on the left.</li>
					<li>Click the arrow next to the calendar you need.</li>
					<li>A menu will appear. Click "Share this calendar."</li>
					<li>Check "Make this calendar public."</li>
					<li>Make sure "Share only my free/busy information" is unchecked.</li>
					<li>Click "Save."</li>
				</div>
				<div id="slot">
					<p> To obtain your calendar's private address, follow these steps:</p>
					<ol>
					<li>On your Google calendar, in the calendar list on the left, move your mouse over the appropriate calendar. Click the drop-down arrow that appears, then select Calendar settings.</li>
					<li>Select the XML button on the calendar's settings page. A pop-up window with your calendar's private URL will appear.</li>
					<li>Enter this URL into your Google Calendar URL setting.</li>
					</ol>
				</div>
			@endif
		    
		</div>
	</div>
	<!-- Groups
	<h4>Group Memberships:</h4>
	<?php $userGroups = $user->getGroups(); ?>
	<div class="jumbotron">
	    <ul>
	    	@if (count($userGroups) >= 1)
		    	@foreach ($userGroups as $group)
					<li>{{ $group['name'] }}</li>
				@endforeach
			@else 
				<li>No Group Memberships.</li>
			@endif
	    </ul>
	-->
	</div>
	
	<hr />
<!--
	<h4>User Object</h4>
	<div>
		<p>{{ var_dump($user) }}</p>
	</div>
	-->

@stop
