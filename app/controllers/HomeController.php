<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	Public function index()
	{
		$cars = Car::all();
		$users = User::all();
		$dealers = Dealer::all();
		$appointments = Appointment::all();
		$amount = 0;
		foreach($appointments AS $appointment)
		{
			$amount = $amount + $appointment->price;
		}
		Return View::make('home',['title'=>'Dashboard','amount'=>$amount,'cars'=>$cars,'users'=>$users,'dealers'=>$dealers,'appointments'=>$appointments]);
	}

}
