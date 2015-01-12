<?php

class CarController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cars = Car::all();
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

		$title = 'Add new car';
		return View::make('car.create',['users'=>$users,'title'=>$title]);
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
