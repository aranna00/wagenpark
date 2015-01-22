<?php

class LoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('login');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::except('method','token','remember'),
			[
				'email'     => ['required'],
			    'password'  => ['required']
			]);
		if($validator->fails()) {
			try {
				$throttle = Sentry::findThrottlerByUserLogin(Input::get('email'));
				$attempts = $throttle->getLoginAttempts();
				$throttle->setSuspensionTime(2);
				switch($attempts) {
					case(5):
						$throttle->setSuspensionTime(60);
						break;
					case(10):
						$throttle->setSuspensionTime(300);
						break;
					case(15):
						$throttle->setSuspensionTime(86400);
				}
				$throttle->suspend();
				$throttle->addLoginAttempt();
				return Redirect::action('LoginController@index')->withErrors($validator)->withInput(Input::except('password'));
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
				return Redirect::action('User not found');
			}
		}
		else{
			try {
				$throttle = Sentry::findThrottlerByUserLogin(Input::get('email'));
				$throttle->addLoginAttempt();
				$suspensionTime = $throttle->getSuspensionTime();
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
				return Redirect::action('User not found');
			}
			try {
				$credentials = Input::except('_method','_token','remember');
				$user = Sentry::authenticate($credentials,Input::get('remember'));
				$throttle->clearLoginAttempts();
				if(Sentry::getUser()->inGroup(Cache::get('adminGroup')))
				{
					Session::put('adminAccess', true);
				}
				else
				{
					Session::put('adminAccess', false);
				}
				if(Sentry::getUser()->inGroup(Cache::get('dealerGroup')))
				{
					Session::put('dealerAccess', true);
				}
				else
				{
					Session::put('dealerAccess', true);
				}
				if(Sentry::getUser()->inGroup(Cache::get('userGroup')))
				{
					Session::put('userAccess', true);
				}
				else
				{
					Session::put('dealerAccess', true);
				}
				return Redirect::action('HomeController@index');
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
				return Redirect::action('LoginController@index')->withErrors(['email'=>'Login field is required']);
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
				return Redirect::action('LoginController@index')->withErrors(['password'=>'Password field is required']);
			}
			catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
				return Redirect::action('LoginController@index')->withErrors(['password'=>'Wrong username or password','email'=>'Wrong username or password']);
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
				return Redirect::action('LoginController@index')->withErrors(['password'=>'Wrong username or password','email'=>'Wrong username or password']);
			}
			catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
				return Redirect::action('LoginController@index')->withErrors(['email'=>'User is not activated yet']);
			}
			catch (Cartalyst\Sentry\Throtteling\UserSuspendedException $e) {
				return Redirect::action('LoginController@index')->withErrors(['email'=>'User is suspended for '.$suspensionTime]);
			}
			catch (Cartalyst\Sentry\Throtteling\UserBannedException $e) {
				return Redirect::action('LoginController@index')->withErrors(['email'=>'User is banned']);
			}
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Sentry::logout();
		Session::flush();
	}


}
