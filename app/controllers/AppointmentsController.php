<?php

class AppointmentsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$appointmens = Appointment::with('car','dealer','user')->get();
		$title = 'All appointments';
		return View::make('appointment.index',['appointments'=>$appointmens,'title'=>$title]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$cars_obj = Car::with('dealer','user')->get();
		$cars[0] = '';
		foreach ($cars_obj as $car)
		{
			$cars[$car->id] = $car->license_plate;
		}
		$appointments = Appointment::with('user')->get();

		$title = 'Create new appointment';
		return View::make('appointment.create',['title'=>$title,'cars'=>$cars,'cars_objs'=>$cars_obj,'appointments'=>$appointments]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::except('token','method');
		$validator = Validator::make($data,
			[
				'date'      => ['required','after:'.date('Y,m,d',strtotime('+1 day')).''],
			    'car_id'    => ['required','min:0'],
			    'price'     => ['required','min:0'],
			]);
		if($validator->fails())
		{
			return Redirect::action('AppointmentsController@create')->withErrors($validator)->withInput();
		}
		else
		{
			$car = Car::find($data['car_id']);
			$data['dealer_id'] = $car->dealer->id;
			$data['user_id'] = $car->user->id;
			$data['workshop'] = $car->workshop;

			Appointment::create($data);

			return Redirect::action('AppointmentsController@index')->withErrors(['notice'=>'The appointment has been made']);
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
		$cars_obj = Car::with('dealer','user')->get();
		$cars[0] = '';
		foreach ($cars_obj as $car)
		{
			$cars[$car->id] = $car->license_plate;
		}
		$appointments = Appointment::with('user')->get();
		$appointment = Appointment::find($id);

		$title = 'Edit appointment';
		return View::make('appointment.edit',['appointment'=>$appointment,'cars'=>$cars,'appointments'=>$appointments,'title'=>$title]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::except('token','method');
		$validator = Validator::make($data,
		                             [
			                             'date'      => ['required','after:'.date('Y,m,d',strtotime('+1 day')).''],
			                             'car_id'    => ['required','min:0'],
			                             'price'     => ['required','min:0'],
		                             ]);
		if($validator->fails())
		{
			return Redirect::action('AppointmentsController@edit',$id)->withErrors($validator)->withInput();
		}
		else
		{
			$car = Car::find($data['car_id']);
			$data['dealer_id'] = $car->dealer->id;
			$data['user_id'] = $car->user->id;
			$data['workshop'] = $car->workshop;

			$appointment = Appointment::find($id);
			$appointment->update($data);
			return Redirect::action('AppointmentsController@index')->withErrors(['notice'=>'The appointment has been changed']);
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
		$appointment = Appointment::find($id);
		$appointment->delete();
		return Redirect::action('AppointmentsController@index')->withErrors(['notice'=>'The appointment has been removed']);
	}


}
