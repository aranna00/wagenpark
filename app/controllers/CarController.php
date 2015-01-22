<?php

class CarController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Session::get('userAccess'))
		{
			$cars = Car::whereRaw("user_id = " . Sentry::getUser()->id)->get();
			$cars->load('user');
		}
		else {
			$cars = Car::with('user')->get();
		}
		$title = 'All cars';
		return View::make('car.index',['cars'=>$cars,'title'=>$title]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$users_obj = Sentry::findAllUsersInGroup(Cache::get('userGroup'));
		$users [0] = '';
		foreach($users_obj AS $user)
		{
			$users[$user->id] = $user->email;
		}
		$dealers_obj = Dealer::all();
		$dealers[0] = '';
		foreach($dealers_obj AS $dealer)
		{
			$dealers[$dealer->id] = $dealer->name;
		}

		$title = 'Add new car';
		return View::make('car.create',['users'=>$users,'title'=>$title,'dealers'=>$dealers]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::except('_method','_token'),[
			'license-plate'     => ['required'],
		    'brand'             => ['required'],
		    'dealer_id'         => ['required','integer'],
		    'user_id'           => ['required','integer'],
		]);
		if($validator->fails())
		{
			return Redirect::action('CarController@create')->withErrors($validator)->withInput();
		}
		else
		{
			Car::create(Input::except('_method','_token'));

			return Redirect::action('CarController@index')->withErrors(['notice'=>'The car has been added to the system']);
		}

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$car = Car::find($id);
		$title = 'Edit '.$car->license_plate;
		$users_obj = Sentry::findAllUsersInGroup(Cache::get('userGroup'));
		$users[0] = '';
		foreach($users_obj as $user)
		{
			$users[$user->id] = $user->email;
		}
		$dealers_obj = Dealer::all();
		$dealers[0] = '';
		foreach($dealers_obj AS $dealer)
		{
			$dealers[$dealer->id] = $dealer->name;
		}

		return View::make('car.edit',['title'=>$title,'users'=>$users,'car'=>$car,'dealers'=>$dealers]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::except('_token','_method'),[
			'license_plate'     => ['required'],
		    'brand'             => ['required'],
		    'dealer_id'         => ['required'],
		    'user_id'           => ['required'],
		]);
		if($validator->fails())
		{
			return Redirect::action('CarController@edit',$id)->withErrors($validator)->withInput();
		}
		else
		{
			$car = Car::find($id);
			$car->update(Input::except('_token','_method'));
			return Redirect::action('CarController@index')->withErrors(['notice'=>'The Car '.$car->license_plate.' has been updated']);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$car = Car::find($id);
		$car->delete();
		return Rediret::action('CarController@index')->withErrors(['notice'=>'The Car has been removed from the system']);
	}


}
