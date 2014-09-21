<?php

class SectionController extends \BaseController {

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
				return View::make('section.index')->with('sections',$sections);
			}

			if($user->role == 'teacher'){
				$sections = Section::where('teacher_id','=',$user->id)->orderBy('section_id','asc')->get();
				return View::make('section.index')->with('sections',$sections);
			}

			if($user->role == 'admin'){
				return View::make('section.index')->with('sections', Section::all());
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
		return View::make('section.create');
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

		$rules = [
			'section_name' => 'required'
		];

		$validator = Validator::make($attributes, $rules);
				
		if ($validator->fails()) {
			return Redirect::to('sections/create')
							->withErrors($validator)
							->withInput(Input::all());
		} else{
			$section = new Section;
			$section->section_name = $section_name;
			$section->teacher_id = Auth::user()->id;
			$section->save();
			return $this->index() ;
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
		$section = Section::find($id);
		return View::make('section.show')->with('section',$section);
		
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
