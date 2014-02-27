@extends('layouts.default')

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title> Memdar Quiz</title>
  
  
  
  <link rel="stylesheet" type="text/css" href="/css/result-light.css">
  
  <style type='text/css'>
    body{
    margin: 0px;
    padding: 0px;
    background: #EFEFEF;
    cursor: default;
    font-size: 12px;
    font-family: Arial, Tahoma;
}
.questionContainer {
    width: 600px;
    border: 3px double #CFCFCF;
    padding: 3px;
    margin: 10px;
}
ul {
    margin: 0px;
    padding: 5px;
}
ul li {
    list-style: none;
}
a {
    border: 1px solid #000;
    padding: 2px 5px;
    font-weight: bold;
    font-size: 10px;
    background: #FFF;
    cursor: pointer;
}
a:hover {
    background: none;
}
.btnContainer {
    width: 96%;
    margin: 10px 0px 10px 2%;
}
#progressKeeper {
    width: 600px;
    height: 25px;
    border: 3px double #CFCFCF;
    margin: 0px 10px;
    padding: 3px;
}
.txtStatusBar {
    margin: 5px 10px;
    font-weight: bold;
}
#progress {
    background: green;
    width: 0;
    height: 25px;
    -webkit-transition: width 0.3s ease;
}
.radius {
    border-radius: 6px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    -o-border-radius: 6px;
}
#resultKeeper {
    width: 600px;
    margin: 10px;
    padding: 3px;
    border: 3px double #CFCFCF;
}
#resultKeeper div {
    line-height: 20px;
}
.totalScore {
    font-weight: bold;
}
input {
    position: relative;
    top: 2px;
}
h1 {
    border-bottom: 1px solid #CCCCCC;
    font-size: 16px;
    height: 22px;
    margin: 10px;
    text-indent: 5px;
}
.prev { float: left; }
.next, .btnShowResult { float: right; }
.clear { clear: both; }
.hide { display: none; }
  </style>
  


<script type='text/javascript'>//<![CDATA[ 

$(function(){
    var jQuiz = {
        answers: { q1: 'd', q2: 'd', q3: 'a', q4: 'c', q5: 'a' },
        questionLenght: 5,
        checkAnswers: function() {
            var arr = this.answers;
            var ans = this.userAnswers;
            var resultArr = []
            for (var p in ans) {
                var x = parseInt(p) + 1;
                var key = 'q' + x;
                var flag = false;
                if (ans[p] == 'q' + x + '-' + arr[key]) {
                    flag = true;
                }
                else {
                    flag = false;
                }
                resultArr.push(flag);
            }
            return resultArr;
        },
        init: function(){
            $('.btnNext').click(function(){
                if ($('input[type=radio]:checked:visible').length == 0) {
                            
                    return false;
                }
                $(this).parents('.questionContainer').fadeOut(500, function(){
                    $(this).next().fadeIn(500);
                });
                var el = $('#progress');
                el.width(el.width() + 120 + 'px');
            });
            $('.btnPrev').click(function(){
                $(this).parents('.questionContainer').fadeOut(500, function(){
                    $(this).prev().fadeIn(500)
                });
                var el = $('#progress');
                el.width(el.width() - 120 + 'px');
            })
            $('.btnShowResult').click(function(){
                var arr = $('input[type=radio]:checked');
                var ans = jQuiz.userAnswers = [];
                for (var i = 0, ii = arr.length; i < ii; i++) {
                    ans.push(arr[i].getAttribute('id'))
                }
            })
            $('.btnShowResult').click(function(){
                $('#progress').width(300);
                $('#progressKeeper').hide();
                var results = jQuiz.checkAnswers();
                var resultSet = '';
                var trueCount = 0;
                for (var i = 0, ii = results.length; i < ii; i++){
                    if (results[i] == true) trueCount++;
                    resultSet += '<div> Question ' + (i + 1) + ' is ' + results[i] + '</div>'
                }
                resultSet += '<div class="totalScore">Your total score is ' + trueCount * 20 + ' / 100</div>'
                $('#resultKeeper').html(resultSet).show();
            })
        }
    };
    jQuiz.init();
})
//]]>  

</script>


</head>
<body>
<a class="btn" href="{{ URL::route('home') }}">Memdar</a>

  <h1>Memdar Quiz</h1>
<div class="questionContainer radius">
    <div class="question"><b>Question 1: </b>  When is breakfast Monday Feb 17th?</div>
    <div class="answers">
        <ul>
            <li>
                <label><input type="radio" name="q1" id="q1-a" />12:00 pm</label>
            </li>
            <li>
                <label><input type="radio" name="q1" id="q1-b" />12:30 am</label>
            </li>
            <li>
                <label><input type="radio" name="q1" id="q1-c" />1:00 pm</label>
            </li>
            <li>
                <label><input type="radio" name="q1" id="q1-d" />11:30 am</label>
            </li>
        </ul>
    </div>
    <div class="btnContainer">
        <div class="prev"></div>
        <div class="next">
            <a class="btnNext">Next &gt;&gt;</a>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="questionContainer hide radius">
    <div class="question"><b>Question 2:</b> What are you doing on Wednesday Feb 19th at 9:30am?</div>
    <div class="answers">
        <ul>
            <li>
                <label><input type="radio" name="q2" id="q2-a" />More stuff</label>
            </li>
            <li>
                <label><input type="radio" name="q2" id="q2-b" />Breakfast</label>
            </li>
            <li>
                <label><input type="radio" name="q2" id="q2-c" />Basketball</label>
            </li>
            <li>
                <label><input type="radio" name="q2" id="q2-d" />Stuff</label>
            </li>
        </ul>
    </div>
    <div class="btnContainer">
        <div class="prev">
            <a class="btnPrev">&lt;&lt; Prev</a>
        </div>
        <div class="next">
            <a class="btnNext">Next &gt;&gt;</a>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="questionContainer radius hide">
    <div class="question"><b>Question 3:</b> What event takes place 9:30 AM on Thursday February 20th?</div>
    <div class="answers">
        <ul>
            <li>
                <label><input type="radio" name="q3" id="q3-a" />Memdar Rocks</label>
            </li>
            <li>
                <label><input type="radio" name="q3" id="q3-b" />Pool Party</label>
            </li>
            <li>
                <label><input type="radio" name="q3" id="q3-c" />Business Meeting</label>
            </li>
        </ul>
    </div>
    <div class="btnContainer">
        <div class="prev">
            <a class="btnPrev">&lt;&lt; Prev</a>
        </div>
        <div class="next">
            <a class="btnNext">Next &gt;&gt;</a>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="questionContainer radius hide">
    <div class="question"><b>Question 4:</b>Are you free the morning of February 24th?</div>
    <div class="answers">
        <ul>
            <li>
                <label><input type="radio" name="q4" id="q4-a" />Yes, after 11 AM</label>
            </li>
            <li>
                <label><input type="radio" name="q4" id="q4-b" />No</label>
            </li>
            <li>
                <label><input type="radio" name="q4" id="q4-c" />Yes</label>
            </li>
        </ul>
    </div>
    <div class="btnContainer">
        <div class="prev">
            <a class="btnPrev">&lt;&lt; Prev</a>
        </div>
        <div class="next">
            <a class="btnNext">Next &gt;&gt;</a>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="questionContainer radius hide">
    <div class="question"><b>Question 5:</b>You have Testtest on Friday February 21st at 12:30pm</div>
    <div class="answers">
        <ul>
            <li>
                <label><input type="radio" name="q5" id="q5-a" />True</label>
            </li>
            <li>
                <label><input type="radio" name="q5" id="q5-b" />False</label>
            </li>
        </ul>
    </div>
    <div class="btnContainer">
        <div class="prev">
            <a class="btnPrev">&lt;&lt; Prev</a>
        </div>
        <div class="next">
            <a class="btnShowResult">Finish!</a>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="txtStatusBar">Status Bar</div>
<div id="progressKeeper" class="radius">
    <div id="progress"></div>
</div>
<div id="resultKeeper" class="radius hide"></div>
  
</body>


</html>


