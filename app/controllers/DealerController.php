<?php

class DealerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /dealer
	 *
	 * @return Response
	 */
	public function index()
	{
		$dealers = Dealer::all();
		$title = 'All dealers';
		return View::make('dealer.index',['title'=>$title,'dealers'=>$dealers]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /dealer/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$title = 'Create new dealer';
		return View::make('dealer.create',['title'=>$title]);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /dealer
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::except('_token','_method'),
			[
				'name'      => ['required','alpha_num'],
			]);
		if($validator->fails())
		{
			return Redirect::action('DealerController@create')->withErrors($validator)->withInput();
		}
		else
		{
			Dealer::create(Input::except('_token','_method'));
			return Redirect::action('DealerController@index')->withErrors(['notice'=>'The dealer '.Input::get('name').' has been added']);
		}
	}

	/**
	 * Display the specified resource.
	 * GET /dealer/{id}
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
	 * GET /dealer/{id}/edit
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
	 * PUT /dealer/{id}
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
	 * DELETE /dealer/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}