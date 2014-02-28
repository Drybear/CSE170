<?php

class Calendar2Controller extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Calendar Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showCalendar2()
	{
		//echo 'test';
		return View::make('calendar2');
	}

}