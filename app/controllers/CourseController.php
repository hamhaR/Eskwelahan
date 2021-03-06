<?php

class CourseController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	

		//$course = new CourseRepository;
		//$rows = $course->all();
		$rows = Course::orderBy('id', 'desc')->get();
		return View::make('course.index')->with('rows', $rows);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return View::make('course.create');

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$attributes = Input::all();
		$courseData = [
			'course_code' => $attributes['course_code'],
			'course_title' => $attributes['course_title'],
			'course_description' => $attributes['course_description']
		];

		$rules = [
			'course_code' => 'required|Unique:courses',
			'course_title' => 'required',
			'course_description' => 'required'
		];

		$validator = Validator::make($courseData, $rules);
				
		if ($validator->fails()) {
			Session::flash('message', 'Error. Please try again.');
			return Redirect::to('courses/');
		} else{
			$course = new CourseRepository;
			$rows = $course->add($courseData);
			Session::flash('message', 'Course successfully added.');
			return Redirect::to('courses');
			//return View::make('course.test')->with('rows', $rows);
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

		$displayData = Course::find($id);
		return View::make('course.show')
					->with('rows', $displayData);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$course = new CourseRepository;
		$courseData = $course->find($id);
		return View::make('course.edit')
			->with('course', $courseData);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		// validate
		$rules = [
				'course_description' => 'required'
		];

		$attributes = [
				'course_description' => Input::get('course_description')
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('course/' . $id . '/edit')
							->withErrors($validator);	
		} else {
			$course = Course::find($id);
			$course->course_description = Input::get('course_description');
			$course->save();
			Session::flash('message', 'Course successfully updated');
			return Redirect::to('courses');
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
		$course = new CourseRepository;
		$rows = $course->delete($id);
		Session::flash('message', 'Course successfully deleted.');
		return Redirect::to('courses');
	}


}
