<?php

class StudentCourseController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$course = Course::find(1);
		$sts = Student::all();

		foreach ($course->students as $value) {
		 	echo $value->fname;
		 } 

		 foreach ($sts as $key) {
		 	echo "*".$key->fname;
		 }

		//return View::make('studentcourses.index')->with('students',$students);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('studentcourses.create');
	}


	/**
	 * Store a newly created resource in storage.
	 * @return Response
	 */
	public function store()
	{
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
		$student = User::find($id);
		return $student->fname;
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
