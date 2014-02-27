@extends('layouts.default')

@section('content')
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

<div class="qheader">
1) What's taking place February 17th at 11:30 AM?</div>
<div class="qselections">
<input type="radio" value="a" name="question1">a) Lunch<br>
<input type="radio" value="b" name="question1">b) Pool Party<br>
<input type="radio" value="c" name="question1">c) Breakfast<br>
<input type="radio" value="d" name="question1">d) Meeting<br>
</div>

<br>

<div class="qheader">
2) At 8:30 pm on Wednesday February 19th what are you doing?</div>
<div class="qselections">
<input type="radio" value="a" name="question2">a) More stuff<br>
<input type="radio" value="b" name="question2">b) Memdar Rocks<br>
<input type="radio" value="c" name="question2">c) hi josh<br>
<input type="radio" value="d" name="question2">d) Testtest<br>
</div>

<br>

<div class="qheader">
3) Are you free at 11:00 AM on Monday March 3rd?</div>
<div class="qselections">
<input type="radio" value="a" name="question3">a) No. <br>
<input type="radio" value="b" name="question3">b) Only for 30 minutes. <br>
<input type="radio" value="c" name="question3">c) Yes. <br>
<input type="radio" value="d" name="question3">d) None of the above.<br>
</div>

<br>

<div class="qheader">
4) What is happening at 6 PM on Thursday February 20th? </div>
<div class="qselections">
<input type="radio" value="a" name="question4">a) Testtest<br>
<input type="radio" value="b" name="question4">b) kjghkjghkgh<br>
<input type="radio" value="c" name="question4">c) hi josh<br>
<input type="radio" value="d" name="question4">d) Breakfast<br>
</div>

<br>

<div class="qheader">
5) What is happening at 3 PM on Monday February 24th? </div>
<div class="qselections">
<input type="radio" value="a" name="question5">a) Memdar Rocks<br>
<input type="radio" value="b" name="question5">b) Dinner <br>
<input type="radio" value="c" name="question5">c) Nothing <br>
<input type="radio" value="d" name="question5">d) None of the above. <br>
</div>

<br>

</form>

<form>
<div align="center"><font color ="000000">
<input type="button" value="Grade Me!" name="B1" onClick="gradeit()"> <input type="button" value="Reset" name="B2" onClick="document.myquiz.reset()"></font></div>
</form>

</body>
</html>

@stop


