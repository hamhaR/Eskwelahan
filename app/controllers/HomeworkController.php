<?php

use Illuminate\Support\MessageBag;
use Illuminate\Routing\Controller;

class HomeworkController extends \BaseController 
{
	private $homeworks;

	public function __construct(HomeworkModel $homeworks) 
	{
        $this->homeworks = $homeworks;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//for index views of homeworks
		$homework = new HomeworkModel;
		$homeworks = $homework->all();
		return View::make('homeworks.index')->with('homeworks', $homeworks);
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

			return View::make('homeworks.create')->with('courses', $results);
		}
		else
		{
			return Redirect::to('profile')->with('message', 'Access is restricted.');
		}
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
			'homework_title' => 'required',
			'homework_instruction' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);
		if ($validator->passes()) {
			$homework = new Homework;
			$homework->course_id = Input::get('course_id');
			$homework->homework_title = Input::get('homework_title');
			$homework->homework_instruction	= Input::get('homework_instruction');
			$homework->teacher_id = Auth::user()->id;
			$homework->save();
				
			Session::flash('message', 'Homework successfully added.');
			return Redirect::to('homeworks');
		} else{
			return Redirect::to('homeworks/create')
							->with('message', 'Required field is left blank.');	
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
		if (Auth::user()->role == 'teacher' || Auth::user()->role == 'student') 
		{
		//	$results = DB::select('SELECT * FROM homeworks WHERE id = ?', array($id));
			$results = Homework::find($id);
			return View::make('homeworks.show')->with('homeworks', $results);
		} 
		else 
		{
			return Redirect::to('profile')->with('message', 'Access is restricted.');
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
		$results = DB::select('SELECT courses.id, courses.course_code, courses.course_title FROM teacher_courses INNER JOIN courses ON (teacher_courses.course_id = courses.id) WHERE teacher_id = ?', array(Auth::user()->id));

		$homeworkData = Homework::find($id);
		//return View::make('homeworks.edit')->with('homework', $homeworkData);
		return View::make('homeworks.edit', array('homework' => $homeworkData, 'courses' => $results ));
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
				'homework_instruction' => 'required',
				'homework_title' => 'required',
				'course_id' => 'required'
		];

		$attributes = [
				'homework_title' => Input::get('homework_title'),
				'homework_instruction' => Input::get('homework_instruction'),
				'course_id' => Input::get('course_id')
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) 
		{
			return Redirect::to('homeworks/' . $id . '/edit')
							->with('message', 'Required field left blank.');
		} 
		else 
		{
			$homework = Homework::find($id);
			$homework->course_id = Input::get('course_id');
			$homework->homework_title = Input::get('homework_title');
			$homework->homework_instruction	= Input::get('homework_instruction');
			$homework->save();
		//	return $this->show($id);
			Session::flash('message', 'Homework successfully updated.');
			return Redirect::to('homeworks/'. $id);
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
		$homework = new HomeworkModel;
		$rows = $homework->delete($id);
		return $this->index();
	}


}
