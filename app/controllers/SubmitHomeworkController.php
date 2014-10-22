<?php

class SubmitHomeworkController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	if (Auth::user()->role == 'student') 
	
		{
		//	$results = DB::select('SELECT homework.homework_id FROM homework WHERE ho'); 
			return View::make('submithomeworks.create');
		//
		}
	else
		{
			return Redirect::to('profile')->with('message', 'Access is restricted.');
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'homework_id'		=> 'required',
			'homework_body'		=> 'required'
			
		);
		
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->passes()) {
			$submithomework = new Submithomework;
			$submithomework->homework_id		= Input::get('homework_id');
			$submithomework->homework_body		= Input::get('homework_body');
			$submithomework->student_id 		= Auth::user()->id;
			$submithomework->save();
		
			Session::flash('message', 'Homework successfully added.');
			return Redirect::to('homeworks');
		}
		
		else{
			return Redirect::to('submithomeworks/create')
							->with('message', 'Please fill out all fields');	
		}
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if (Auth::user()-> role=='teacher'){
			$submithomework = Submithomework::find($id);
		
			return View::make('submithomeworks.show')
					->with('submithomework', $submithomework);
		//
		}
		
		else{
		
			return Redirect::to('profile')->with('message', 'Access is restricted.');
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
