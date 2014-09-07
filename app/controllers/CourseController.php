<?php

class CourseController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{		
		// complicated man kaayo ni nga pamaagi

		// $course = new CourseRepository;
		// $rows = $course->all();
		// return View::make('course.index')->with('rows', $rows);

		//mas sayon ni pramis
		$courses = Course::all();
		return View::make('course.index')->with('rows', $courses);

	}

	/*
	 * Display the list of courses.
	 */
	public function student_index(){
		$course = new CourseRepository;
		$rows = $course->viewAll();
		return View::make('course.student_index')
					->with('rows', $rows);			
	}

	/*
	 * Page with Enrol me button.
	 */
	public function student_enrol($id){
		$displayData = $this->course->find($id);
		return View::make('course.student_enrol')
					->with('rows', $displayData);
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

		$c_section = $attributes['sec_name'];

		$rules = [
			'course_code' => 'required',
			'course_title' => 'required',
			'course_description' => 'required'
		];

		$validator = Validator::make($courseData, $rules);
				
		if ($validator->fails()) {
			return Redirect::to('course/create')
							->withErrors($validator)
							->withInput(Input::all());
		} else{
			$this->course->add($courseData, $c_section);
			return $this->index() ;
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

		$courseData = $this->course->find($id);
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
			return $this->show($id);
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

		$this->course->delete($id);
		return $this->index() ;

	}


}
