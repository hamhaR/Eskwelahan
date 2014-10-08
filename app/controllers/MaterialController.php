<?php

use Illuminate\Support\MessageBag;
use Illuminate\Routing\Controller;

class MaterialController extends \BaseController {

	private $materials;

	public function __construct(MaterialModel $materials) 
	{
        $this->materials = $materials;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$material = new MaterialModel;
		$materials = $material->all();
		return View::make('materials.index')->with('materials', $materials);
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Auth::user()->role == 'teacher') 
		{
			$results = DB::select('SELECT courses.id, courses.course_code, courses.course_title FROM teacher_courses INNER JOIN courses ON (teacher_courses.course_id = courses.id) WHERE teacher_id = ?', array(Auth::user()->id));

			return View::make('materials.create')->with('courses', $results);
		}
		else
		{
			return Redirect::to('profile')->with('message', 'Access is restricted.');
		}
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'course_id' => 'required',
			'material_title' => 'required',
			'material_instruction' => 'required'
		);

		$material = new Material;
		$material->course_id = Input::get('course_id');
		$material->material_title = Input::get('material_title');
		$material->material_instruction	= Input::get('material_instruction');
		$material->teacher_id = Auth::user()->id;
		$material->save();
			
		Session::flash('message', 'Material successfully added.');
		return Redirect::to('material');
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
		if (Auth::user()->role == 'teacher' || Auth::user()->role == 'student') 
		{
			$results = Material::find($id);
			return View::make('materials.show')->with('materials', $results);
		} 
		else 
		{
			return Redirect::to('profile')->with('message', 'Access is restricted.');
		}
		
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
		$results = DB::select('SELECT courses.id, courses.course_code, courses.course_title FROM teacher_courses INNER JOIN courses ON (teacher_courses.course_id = courses.id) WHERE teacher_id = ?', array(Auth::user()->id));

		$homeworkData = Material::find($id);
		return View::make('materials.edit', array('material' => $materialData, 'courses' => $results ));
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
		$rules = [
				'material_instruction' => 'required',
				'material_title' => 'required',
				'course_id' => 'required'
		];

		$attributes = [
				'material_title' => Input::get('material_title'),
				'material_instruction' => Input::get('material_instruction'),
				'course_id' => Input::get('course_id')
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) 
		{
			return Redirect::to('materials/' . $id . '/edit')
							->withErrors($validator);
		} 
		else 
		{
			$material = Material::find($id);
			$material->course_id = Input::get('course_id');
			$material->material_title = Input::get('material_title');
			$material->material_instruction	= Input::get('material_instruction');
			$material->save();
		//	return $this->show($id);
			Session::flash('message', 'Material successfully updated.');
			return Redirect::to('materials');
		}
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
		$material = new MaterialModel;
		$rows = $material->delete($id);
		return $this->index();
	
		//
	}


}
