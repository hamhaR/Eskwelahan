<?php

class CourseController extends \BaseController {

	private $course;
	
	public function __construct(CourseRepository $course){
		$this->course = $course;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$course = new CourseRepository;
		$data = $course->all();
		return View::make('course.index', ['rows' => $data]);
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
		$courseData = [
			'course_code' => Input::get('course_code'),
			'course_title' => Input::get('course_title'),
			'course_description' => Input::get('course_description')
		];
		$rules = array(
			'course_code' => 'required',
			'course_title' => 'required',
			'course_description' => 'required'
		);
		$validator = Validator::make($courseData, $rules);
		if ($validator->fails()) {
			return Redirect::to('course/create')
							->withErrors($validator)
							->withInput(Input::all());
		} else{
			$this->course->add($courseData);
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
		$displayData = $this->course->find($id);
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
