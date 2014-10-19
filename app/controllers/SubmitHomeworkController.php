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
		return view::make('submithomeworks.create');
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'homework_body'		=> 'required'
			
		);
		
		$submithomework = new SubmitHomework
		$submithomework->homework_id		= Input::get('homework_id');
		$submithomework->homework_body		= Input::get('homework_body');
		$submithomework->student_id 		= Auth::user()->id;
		$submithomework->save();
		
		Session::flash('message', 'Homework successfully added.');
		return Redirect::to('homeworks');
	
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
