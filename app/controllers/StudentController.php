<?php

class StudentController extends \BaseController {

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
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$attributes = Input::all();

		echo Input::get('student_id');

		$student_id = $attributes['student_id'];
		$section_id = $attributes['section_id'];
		$course_id = $attributes['course_id'];

		$rules = array(
			'student_id' => 'required',
			'section_id' => 'required',
			'course_id'	 =>	'required'
		);

		$validator = Validator::make($attributes, $rules);
				
		if ($validator->fails()) {
			return Redirect::to('classes/' .$section_id. '?course_id=' . $course_id)
							->withErrors('Student already exists in this class.')
							->withInput(Input::all());
		} else{

			$student = User::whereHas('sections',function($q){
				$q->where('student_id','=',Input::get('student_id'));
			})->get();
			if(count($student) == 0){
				$section = Section::find($section_id);
				$section->students()->attach($student_id);
			
				return Redirect::to('/classes/'.$section_id. '?course_id=' . $course_id);
			}
			else{
				Session::flash('message','Student already exists in this class.');
				return Redirect::to('classes/' .$section_id. '?course_id=' . $course_id);
			}

			
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
