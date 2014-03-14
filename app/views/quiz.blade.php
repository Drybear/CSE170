@extends('layouts.default')
<?php
if(Sentry::check()){
$googleCal = Sentry::getUser()->google;
$compare1 = substr($googleCal, 0, 37);
$compare2 = "https://www.google.com/calendar/feeds";
$flag = strcmp($compare1,$compare2);

$google = $googleCal."?alt=json";

if($flag == 0)
	$url = $google;
else
	$url = "https://www.google.com/calendar/feeds/cse170memdar%40gmail.com/public/basic?alt=json";
}
else
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
if($decode == NULL){
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
}
$decode = json_decode($result, true);
$eventsList = json_encode(array_value_recursive3('$t', $decode));
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
	$tester = substr($eventTime, 0, 5);
	$tester2 = "Recur";
	$isRecurring = strcmp($tester, $tester2);
	$eventSize = strlen($eventTime);
	if($isRecurring != 0){
		$eventSize = strlen($eventTime);
		$eventTime = substr($eventTime, 5, $bracket);
	}
	else{
		$afterRecurring = strpos($eventTime, 'start:');
		$eventTime = substr($eventTime, $afterRecurring, $eventSize);
		$bracket = strpos($eventTime, '<');
		$eventTime = substr($eventTime, 6, $bracket-1);
	}
	
	$final[] = array(
		'title' => $titleName,
		'time' => $eventTime,
		);
	$x++;
	}

// echo ("<pre>");
// print_r($final);
// echo ("</pre>");
		
function array_value_recursive3($key, array $decode){
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

@section('content')
	<script>
			$(document).ready(function()
			{
				
				var calendar = $('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					editable: true,
					selectable: true,
					selectHelper: true,
					
					events: <?php echo "'" . $googleCal . "'";?>
					function(date, allDay, jsEvent, view) {
						var dayEvents = $('#calendar').fullCalendar('clientEvents' function(event){return event.start.sethours(0,0,0,0);});
					}
				})
			});
	</script>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <h2>Quiz</h2>
          <p>Welcome to the quiz! Please choose your options below, and press start to begin.</p>

          <div class="row">
            <input type="checkbox"> Include past events
          </div>
          <div class="row">
            <input type="checkbox"> Only use recurring events
          </div>
          <br>
          <div class="row">
            Use events from:
          </div>
          <div>
            <input type="radio" name="frequency" value="week"> This week <br>
            <input type="radio" name="frequency" value="month"> This month <br>
            <input type="radio" name="frequency" value="year"> This year <br>
            <input type="radio" name="frequency" value="all"> All time <br>
          </div>
		
          <br>
          
          <p><a class="btn btn-success" href="quizstart" role="button">Start &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 MEMDAR &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->
@stop