<?php
header('Content-type: text/json');
echo '[';
$separator = "";
$days = 16;
	echo '	{ "date": "1314579600000", "type": "meeting", "title": "Test Last Year", "description": "Lorem Ipsum dolor set", "url": "" },';
	echo '	{ "date": "1377738000000", "type": "meeting", "title": "Test Next Year", "description": "Lorem Ipsum dolor set", "url": "" },';
for ($i = 1 ; $i < $days; $i= 1 + $i * 2) {
	echo $separator;
	$initTime = (intval(microtime(true))*1000) + (86400000 * ($i-($days/2)));

	echo '	{ "date": "'; echo $initTime+3600000; echo '", "type": "demo", "title": "Project '; echo $i; echo ' demo", "description": "", "url": "" },';

	echo '	{ "date": "'; echo $initTime-7200000; echo '", "type": "meeting", "title": "Test Project '; echo $i; echo ' Brainstorming", "description": "Lorem Ipsum dolor set", "url": "" },';
	echo '	{ "date": "'; echo $initTime+10800000; echo '", "type": "test", "title": "CSE 170'; echo $i; echo ' events", "description": "butts", "url": "" },';
	echo '	{ "date": "'; echo $initTime+1800000; echo '", "type": "meeting", "title": "Project '; echo $i; echo ' meeting", "description": "Lorem Ipsum dolor set", "url": "" },';
	echo '	{ "date": "'; echo $initTime+3600000+2592000000; echo '", "type": "demo", "title": "Project '; echo $i; echo ' demo", "description": "wieners", "url": "memdar.herokuapp.com/calendarnew" },';
	echo '	{ "date": "'; echo $initTime-7200000+2592000000; echo '", "type": "meeting", "title": "Test Project '; echo $i; echo ' Brainstorming", "description": "Lorem Ipsum dolor set", "url": "" },';
	echo '	{ "date": "'; echo $initTime+10800000+2592000000; echo '", "type": "test", "title": "CSE 170 '; echo $i; echo ' events", "description": "test", "url": "" },';
	echo '	{ "date": "'; echo $initTime+3600000-2592000000; echo '", "type": "demo", "title": "Project '; echo $i; echo ' demo", "description": "testing", "url": "" },';
	echo '	{ "date": "'; echo $initTime-7200000-2592000000; echo '", "type": "meeting", "title": "CSE 170 '; echo $i; echo ' Brainstorming", "description": "Lorem Ipsum dolor set", "url": "" },';
	echo '	{ "date": "'; echo $initTime+10800000-2592000000; echo '", "type": "test", "title": "CSE 170'; echo $i; echo ' events", "description": "still testing", "url": "" }';
	$separator = ",";
}
echo ']';
?>