@extends('layouts.default')

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
$eventsList = json_encode(array2_value_recursive('$t', $decode));
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
	$eventTime = substr($eventTime, 5, $bracket);
	
	$final[] = array(
		'title' => $titleName,
		'time' => $eventTime,
		);
	$x++;
	}

// echo ("<pre>");
// print_r($final);
// echo ("</pre>");
		
function array2_value_recursive($key, array $decode){
    $val = array();
    array_walk_recursive($decode, function($v, $k) use($key, &$val){
        if($k == $key) array_push($val, $v);
    });
    return count($val) > 1 ? $val : array_pop($val);
}

function uniqueRandomNumber($max, $found){
	$random1 = rand(0, $max);
	while($random1 == $found){
		$random1 = rand(0, $max);
	}
	$random2 = rand(0, $max);
	while($random2 == $found || $random2 == $random1){
		$random2 = rand(0, $max);
	}
	$random3 = rand(0, $max);
	while($random3 == $found || $random3 == $random1 || $random3 == $random2){
		$random3 = rand(0, $max);
	}
	$numbers = array(
		"1" => $random1,
		"2" => $random2,
		"3" => $random3,
	);
	return $numbers;
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
<!DOCTYPE html>
			<!-- Content -->
			<html>

				<head>
				<title>Memdar Quiz</title>

				<style>
				.qheader{
				font:bold 14px Arial;
				}

				.qselections{
				font:normal 13px Arial;
				}
				</style>

				<script src="quizconfig.js">
				</script>

				<script>


				var actualchoices=new Array()
				document.cookie="ready=yes"
				</script>

				</head>

				<body bgcolor="#FFFFFF">

				<!--Comments on configuring quiz script-->
				<!--Change the questions below any way you want, but make note of the following:-->
				<!--1) Perserve the <FORM> tags -->
				<!--2a) Inside each radio button, use the VALUE attribute to denote each question's choices: "a", "b", "c" etc.-->
				<!--2b) Inside each radio button, use the NAME attribute to denote which question the button belongs to ("question1", "question2" etc-->
				<!--3) Script supports unlmited # of questions. Be sure to edit .js file to enter corresponding solutions-->

				<p align="center">
			
				<form method="POST" name="myquiz">

				<font face="Arial"><big><big>Calendar Quiz</big></big></font></p>
				<?php 
					$random = rand(0, $numEvents-1);
					$numbers = uniqueRandomNumber($numEvents-1, $random);?>
				<div class="qheader">
				1) When is "<?php echo $final[$random]["title"] ?>" taking place?</div>
				<div class="qselections">
				<input type="radio" value="a" name="question1">a) <?php echo $final[($numbers["1"])]["time"] ?><br>
				<input type="radio" value="b" name="question1">b) <?php echo $final[($numbers["2"])]["time"] ?><br>
				<input type="radio" value="c" name="question1">c) <?php echo $final[$random]["time"] ?><br>
				<input type="radio" value="d" name="question1">d) <?php echo $final[($numbers["3"])]["time"] ?><br>
				</div>

				<br>

				<?php 
					$random = rand(0, $numEvents-1);
					$numbers = uniqueRandomNumber($numEvents-1, $random);?>
				<div class="qheader">
				2) When is "<?php echo $final[$random]["title"] ?>" taking place?</div>
				<div class="qselections">
				<input type="radio" value="a" name="question2">a) <?php echo $final[$random]["time"] ?><br>
				<input type="radio" value="b" name="question2">b) <?php echo $final[($numbers["1"])]["time"] ?><br>
				<input type="radio" value="c" name="question2">c) <?php echo $final[($numbers["2"])]["time"] ?><br>
				<input type="radio" value="d" name="question2">d) <?php echo $final[($numbers["3"])]["time"] ?><br>
				</div>

				<br>

				<?php 
					$random = rand(0, $numEvents-1);
					$numbers = uniqueRandomNumber($numEvents-1, $random);?>
				<div class="qheader">
				3) When is "<?php echo $final[$random]["title"] ?>" taking place?</div>
				<div class="qselections">
				<input type="radio" value="a" name="question3">a) <?php echo $final[($numbers["1"])]["time"] ?><br>
				<input type="radio" value="b" name="question3">b) <?php echo $final[($numbers["2"])]["time"] ?><br>
				<input type="radio" value="c" name="question3">c) <?php echo $final[$random]["time"] ?><br>
				<input type="radio" value="d" name="question3">d) <?php echo $final[($numbers["3"])]["time"] ?><br>
				</div>

				<br>

				<?php 
					$random = rand(0, $numEvents-1);
					$numbers = uniqueRandomNumber($numEvents-1, $random);?>
				<div class="qheader">
				4) When is "<?php echo $final[$random]["title"] ?>" taking place?</div>
				<div class="qselections">
				<input type="radio" value="a" name="question4">a) <?php echo $final[($numbers["1"])]["time"] ?><br>
				<input type="radio" value="b" name="question4">b) <?php echo $final[($numbers["3"])]["time"] ?><br>
				<input type="radio" value="c" name="question4">c) <?php echo $final[($numbers["2"])]["time"] ?><br>
				<input type="radio" value="d" name="question4">d) <?php echo $final[$random]["time"] ?><br>
				</div>

				<br>

				<?php 
					$random = rand(0, $numEvents-1);
					$numbers = uniqueRandomNumber($numEvents-1, $random);?>
				<div class="qheader">
				5) When is "<?php echo $final[$random]["title"] ?>" taking place?</div>
				<div class="qselections">
				<input type="radio" value="a" name="question5">a) <?php echo $final[($numbers["1"])]["time"] ?><br>
				<input type="radio" value="b" name="question5">b) <?php echo $final[$random]["time"] ?><br>
				<input type="radio" value="c" name="question5">c) <?php echo $final[($numbers["2"])]["time"] ?><br>
				<input type="radio" value="d" name="question5">d) <?php echo $final[($numbers["3"])]["time"] ?><br>
				</div>

				<br>

				</form>
		
				<form>
				<div align="center"><font color ="000000">
				<input type="button" value="Grade Me!" name="B1" onClick="gradeit()"> <input type="button" value="Reset" name="B2" onClick="document.myquiz.reset()"></font></div>
				</form>

				</body>
				</html>
			<!-- ./ content -->
@stop

