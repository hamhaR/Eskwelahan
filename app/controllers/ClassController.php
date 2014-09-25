<?php

class ClassController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		if(Auth::check()){

			if($user->role == 'student'){
				$sections = $user->sections;
				return View::make('class.index')->with('sections',$sections);
			}

			if($user->role == 'teacher'){
				$sections = Section::where('teacher_id','=',$user->id)->orderBy('section_id','desc')->get();
				return View::make('class.index')->with('sections',$sections);
			}

			if($user->role == 'admin'){
				return View::make('class.index')->with('sections', Section::all());
			}
			
			
		}
		else{
			echo "not logged in";
		}

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

		$section_name = $attributes['section_name'];
		$course_title = $attributes['course_title'];

		$rules = array(
			'section_name' => 'required',
			'course_title' => 'required'
		);

		$validator = Validator::make($attributes, $rules);
				
		if ($validator->fails()) {
			return Redirect::to('classes/index')
							->withErrors($validator)
							->withInput(Input::all());
		} else{
			$section = new Section;
			$section->section_name = $section_name;
			$section->teacher_id = Auth::user()->id;
			$section->save();

			$course = Course::where('course_title', '=', $course_title )->first();
			$section->courses()->attach($course->id);
			return Redirect::to('/classes');
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
		$user = Auth::user();
		if(Auth::check()){
			$section = Section::find($id);
			return View::make('class.show')
				->with(array(
					'section' => $section,
					'course_id' => Input::get('course_id')
				)
			);			
		}

		else{
			echo "not allowed";
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
	public function destroy($section_id)
	{
		$section = Section::find($section_id);
		$section->delete();
		return Redirect::to('classes');
	}


}
