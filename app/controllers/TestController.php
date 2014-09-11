<?php

use Illuminate\Support\MessageBag;
use Illuminate\Routing\Controller;

class TestController extends Controller 
{
	private $tests;

	

	public function __construct(TestModel $tests) 
	{
        $this->tests = $tests;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//for index views of tests
		if (Auth::user()->role == 'teacher') 
		{
		 	$tests = DB::select('SELECT tests.id, tests.course_id, tests.test_name, courses.course_code, tests.created_at FROM tests INNER JOIN courses ON (tests.course_id = courses.id) WHERE teacher_id = ?', array(Auth::user()->id));
		
			return View::make('tests.index')->with('tests', $tests);
		} 
		else 
		{
			return Redirect::to('profile')->with('message', 'Error! Access denied.');
		}
	}



	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tests.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'test_name' 	=>	'required',
			'course_id'		=> 'required',
			'teacher_id'	=>	'required'
		);

		$test = new Test;
		$test->test_name		= Input::get('test_name');
		$test->course_id 		= Input::get('course_id');
		$test->teacher_id		= Input::get('teacher_id');
		$test->save();
			
		Session::flash('message', 'Test/quiz successfully added.');
		return Redirect::to('');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
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
            $this->tests->delete($id);
        
            return Redirect::route('tests.index');
     }


}
