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

		var_dump($attributes);
// 		$student = $attributes['student'];
// 		$section_id = $attributes['section_id'];

// 		$rules = array(
// 			'student' => 'required',
// 			'section_id' => 'required'
// 		);

// 		$validator = Validator::make($attributes, $rules);
				
// 		if ($validator->fails()) {
// 			return Redirect::to('classes/index')
// 							->withErrors($validator)
// 							->withInput(Input::all());
// 		} else{
// 			$section = Section::find($section_id);
// 			$section->students()->attach($student->id);
			
// 			return Redirect::to('/classes');
// 		}


// $validator = Validator::make($attributes, $rules);
				
// 		if ($validator->fails()) {
// 			return Redirect::to('classes/index')
// 							->withErrors($validator)
// 							->withInput(Input::all());
// 		} else{
// 			$section = new Section;
// 			$section->section_name = $section_name;
// 			$section->teacher_id = Auth::user()->id;
// 			$section->save();

// 			$course = Course::where('course_title', '=', $course_title )->first();
// 			$section->courses()->attach($course->id);
// 			return Redirect::to('/classes');
// 		}
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
