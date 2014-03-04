<?php

class TestController extends BaseController {

	public function showTest()
	{
		//echo 'test';
		return View::make('test');
	}

}