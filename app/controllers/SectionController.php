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

		$user = Auth::user();
		if(Auth::check()){
			if(($user->role == 'admin')||$user->role == 'teacher'){
					return View::make('section.create');
			}

			else{
				echo "not allowed";
			}
		}
		
		
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
		$user = Auth::user();
		if(Auth::check()){
			$section = Section::find($id);
			return View::make('section.show')->with('section',$section);			
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
		$section = Section::find($id);
		return View::make('section.edit')->with('section',$section);
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
			return Redirect::to('sections/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::all());
		}
		else{
			$section = Section::find($id);
			$section->section_name = Input::get('section_name');
			$section->save();

			Session::flash('message', 'Successfully updated section!');
			return Redirect::to('sections');
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
		//
	}


}
