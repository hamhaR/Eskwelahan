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
				$s = Section::where('section_id','=',3)->pluck('section_name');
				echo $s;
				//$sections = $user->sections;
				//return View::make('section.index')->with('sections',$sections);
			}

			if($user->role == 'teacher'){
				$sections = $user->sections;
				return View::make('section.index')->with('sections',$sections);
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