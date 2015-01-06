<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = Sentry::findAllUsers();
		return View::make('user.index',['title'=>'All users','users'=>$users]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create',['title'=>'Create new user']);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::except('token','method'),
		                             [
			                             'first_name'           => ['required', 'alpha'],
			                             'last_name'            => ['required', 'alpha'],
			                             'email'                => ['required', 'email', 'unique:users'],
			                             'password'             => ['confirmed','required'],
		                                 'password_confirmation'=> ['required'],
		                             ]);
		if($validator->fails())
		{
			return Redirect::action('UserController@create')->withErrors($validator)->withInput(Input::except('password'));
		}
		else {
			try {
				$data = Input::except('token', 'method','password_confirmation');
				$user = Sentry::register($data, true);
				return Redirect::action('UserController@index')->withhErrors(['notice'=>'The User Has been created']);
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
				return Redirect::action('UserController@index')->withErrors(['email'=>'The email field is required']);
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
				return Redirect::action('UserController@index')->withErrors(['password'=>'The password field is required']);
			}
			catch (Cartalyst\Sentry\Users\UserExistsException $e) {
				return Redirect::action('UserController@index')->withErrors(['email'=>'User with this login already exists']);
			}
		}
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
		$validator = Validator::make(Input::except('token','method'),
		                             [
			                             'first_name'    => ['required', 'alpha'],
			                             'last_name'     => ['required', 'alpha'],
			                             'email'         => ['required', 'email'],
			                             'password'      => ['required', '']
		                             ]);
		if($validator->fails())
		{
			return Redirect::action('UsersController@edit',$id)->withErrors($validator)->withInput(Input::except('password'));
		}
		else {
			try
			{
				$user = Sentry::findUserById($id);

				$user->email = Input::get('email');
				$user->first_name = Input::get('first_name');
				$user->last_name = Input::get('last_name');
				if(Input::get('password')!=='') {
					$user->password = Input::get('password');
				}
			}
			catch (Cartalyst\Sentry\Users\UserExistsException $e) {
				return Redirect::action('UserController@edit',$id)->withErrors('User with this login already exists')->withInput(Input::except('password'));
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
				return Redirect::action('UserController@edit',$id)->withErrors('User was not found')->withInput(Input::except('password'));
			}
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
		try {
			$user = Sentry::findUserById($id);

			$user->delete();
		}
		catch(Cartalyst\Sentry\Users\UserNotFoundException $e) {
			return Redirect::action('UserController@index')->withErrors('User was not found');
		}

	}

	public function forgotten($id)
	{
		//
	}



}
