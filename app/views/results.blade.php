@extends('layouts.default')

@section('content')
<!DOCTYPE html>
<style>
body{
					background-color: #0D747C;
}
td{
	background-color: #0D747C;
}
</style>
<html>

<head>
<title>Instant Quiz Results</title>
<link rel="stylesheet" href="{{ asset('css/results.css') }}">
</head>

<a href='/mylobby' class="btn btn-danger">Home</a>
<a href='/quizstart' class="btn btn-danger">Take the quiz again</a>
<br>
<br>

<body bgcolor="#FFFFFF">

<p align="center"><strong><font face="Arial">

<script src="quizconfig.js">
</script>

<big>Instant Quiz Results</big></font></strong></p>
<div align="center"><center>

<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%"><form method="POST" name="result"><table border="0" width="100%" cellpadding="0" height="116">
        <tr>
          <td height="25" bgcolor="#108A93"><strong><font face="Arial"># Correct: </font></strong></td>
          <td height="25"><p><input type="text" name="p" size="24"></td>
        </tr>
        <tr>
          <td height="17" bgcolor="#108A93"><strong><font face="Arial">Q's Wrong: </font></strong></td>
          <td height="17"><p><textarea name="T2" rows="3" cols="24" wrap="virtual"></textarea></td>
        </tr>
        <tr>
          <td height="25" bgcolor="#108A93"><strong><font face="Arial">Grade: </font></strong></td>
          <td height="25"><input type="text" name="q" size="8"></td>
        </tr>
      </table>
    </form>
    </td>
  </tr>
</table>
</center></div>

<form method="POST"><div
  align="center"><font color = "000000"><center><p>

<script>
var wrong=0
for (e=0;e<=2;e++)
document.result[e].value=""

var results=document.cookie.split(";")
for (n=0;n<=results.length-1;n++){
if (results[n].charAt(1)=='q')
parse=n

}

var incorrect=results[parse].split("=")
incorrect=incorrect[1].split("/")
if (incorrect[incorrect.length-1]=='b')
incorrect=""
document.result[0].value=totalquestions-incorrect.length+" out of "+totalquestions
document.result[2].value=(totalquestions-incorrect.length)/totalquestions*100+"%"
for (temp=0;temp<incorrect.length;temp++)
document.result[1].value+=incorrect[temp]+", "


</script>
<br>

 </p>
  </font></center></div>
</form>

<script>

document.write('<title>Solution</title>')
document.write('<body bgcolor="#FFFFFF">')
document.write('<center><h3>Solution to Quiz</h3></center>')
document.write('<center><font face="Arial">')
for (i=1;i<=totalquestions;i++){
for (temp=0;temp<incorrect.length;temp++){
if (i==incorrect[temp])
wrong=1
}
if (wrong==1){
document.write("Question "+i+" = "+correctchoices[i].fontcolor("IndianRed")+"<br>")
wrong=0
}
else
document.write("Question "+i+" = "+correctchoices[i]+"<br>")
}
document.write('</center></font>')
document.write("<h5>Note: The solutions in red are the ones to the questions you had incorrectly answered.</h5></small>")
document.close()
</script>

</body>
</html>



@stop


