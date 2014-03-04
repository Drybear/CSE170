@extends('layouts.default')


{{-- Content --}}
@section('content')
<style>
	body{
		text-align: center
	}
		.panel-success>.panel-heading {
			color: #000000;
	}
	#slot {
	  width: 230px;
	  display: block;
	  margin-left: auto;
	  margin-right: auto;
	}

</style>

<div class="jumbotron">
  <div class="container">
    <h1>MEMDAR</h1>
  </div>
		<!-- URL instructions
		<div id="slot">
			<p>You must enter your Google URL.</p>
			<p> To obtain your calendar's private address, follow these steps:</p>
			<ol>
			<li>In the calendar list on the left, move your mouse over the appropriate calendar. Click the drop-down arrow that appears, then select Calendar settings.</li>
			<li>Select the XML button on the calendar's settings page. A pop-up window with your calendar's private URL will appear.</li>
			<li>Enter this URL into your Google Calendar URL setting.</li>
			</ol>
		</div>
		-->
		<div id="slot">
			<div class="btn-group">
			  <a href='calendar' class="btn btn-danger">Change Calendar View</a>
			  <a href='quizstart' class="btn btn-success">Quiz</a>
			</div>
		</div>


      <div class="row featurette">
	  <br>
      <div id='calendar'></div>
</div>

<div class="footer">
	<p>&copy; Memdar</p>
</div>	
 
 
@stop
