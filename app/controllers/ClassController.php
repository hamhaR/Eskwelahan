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
				$sections = $user->sections()->paginate(4);
				return View::make('class.index')->with('sections',$sections);
			}

			if($user->role == 'teacher'){
				$sections = Section::where('teacher_id','=',$user->id)->orderBy('section_id','desc')->paginate(4);
				return View::make('class.index')->with('sections',$sections);
			}

			if($user->role == 'admin'){
				$sections = Section::orderBy('section_id', 'desc')->paginate(4);
				return View::make('class.index')->with('sections', $sections);
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
		$course_id = $attributes['course_id'];

		$rules = array(
			'section_name' => 'required',
			'course_id' => 'required'
		);

		$validator = Validator::make($attributes, $rules);
				
		if ($validator->fails()) {
			return Redirect::to('/classes')
							->with('message','Invalid section.')
							->withInput(Input::all());
		} else{

			$temp_section = Section::whereHas('courses',function($q){
				$q->where('courses.id','=',Input::get('course_id'))
					->where('sections.section_name','=',Input::get('section_name'));
			})->get();

			if(count($temp_section) == 0){
				$section = new Section;
				$section->section_name = $section_name;
				$section->teacher_id = Auth::user()->id;
				$section->save();

				
				$section->courses()->attach($course_id);
				return Redirect::to('/classes');
			}
			else{
				Session::flash('message','Section name already exists in this course');
				return Redirect::to('/classes');

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
		$user = Auth::user();
		
		if(Auth::check()){
			$section = Section::find($id);

			$students = User::where('role','=','student')->get();

			return View::make('class.show')
				->with(array(
					'section' => $section,
					'course_id' => Input::get('course_id'),
					'students' => $students
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
		$rules = array(
			'section_name' => 'required'
		);

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails()){
			Session::flash('message', 'Invalid Section');
			return Redirect::to('classes');
			//return Redirect::to('classes/' . $id . '/edit')
			//	->withErrors('Invalid Section')
			//	->withInput(Input::all());
		}
		else{
			$section = Section::find($id);
			$section->section_name = Input::get('section_name');
			$section->save();

			Session::flash('message', 'Successfully updated section!');
			return Redirect::to('classes');
		}
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
		Session::flash('message', 'Class was successfully deleted.');
		return Redirect::to('classes');
	}


}
