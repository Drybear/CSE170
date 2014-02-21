@extends('layouts.default')

@section('content')
	

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
          
          <p><a class="btn btn-success" href="#" role="button">Start &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 MEMDAR &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->
@stop