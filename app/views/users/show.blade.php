@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')
	<h4>Account Profile</h4>
	
  	<div class="jumbotron"> 
	    <div class="col-md-8">
		    @if ($user->first_name)
		    	<p>First Name:</strong> {{ $user->first_name }} </p>
			@endif
			@if ($user->last_name)
		    	<p><strong>Last Name:</strong> {{ $user->last_name }} </p>
			@endif
		    <p><strong>Email:</strong> {{ $user->email }}</p>
			@if ($user->created_at)
				<p>Google Url added!</p>
			@else
				<p>You must enter your Google URL, click the Edit Profile button</p>
			@endif
		    
		</div>
		<div class="col-md-4">
			<!--
			<p><em>Account created: {{ $user->created_at }}</em></p>
			<p><em>Last Updated: {{ $user->updated_at }}</em></p>
			-->
			<button class="btn btn-primary" onClick="location.href='{{ action('UserController@edit', array($user->id)) }}'">Edit Profile</button>
		</div>
	</div>

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
	</div>
	
	<hr />
<!--
	<h4>User Object</h4>
	<div>
		<p>{{ var_dump($user) }}</p>
	</div>
	-->

@stop
