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
		/*
		if (Auth::user()->role == 'teacher') 
		{
		 	$tests = DB::select('SELECT tests.id, tests.course_id, tests.test_name, courses.course_code, tests.created_at FROM tests INNER JOIN courses ON (tests.course_id = courses.id) WHERE teacher_id = ?', array(Auth::user()->id));
		
			return View::make('tests.index')->with('tests', $tests);
		} 
		else 
		{
			return Redirect::to('profile')->with('message', 'Error! Access denied.');
		}
		*/
		
		$tests = Test::all();
		
		return View::make('tests.index')
		->with('tests', $tests);
	}



	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$results = DB::select('SELECT courses.id, courses.course_code, courses.course_title FROM teacher_courses INNER JOIN courses ON (teacher_courses.course_id = courses.id) WHERE teacher_id = ?', array(Auth::user()->id));

		return View::make('tests.create')->with('courses', $results);
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
			'testDate'		=> '',
			'course_id'		=> 'required',
			
		);

		$test = new Test;
		$test->test_name		= Input::get('test_name');
		$test->testDate			= Input::get('testDate');
		$test->course_id 		= Input::get('course_id');

		$test->teacher_id		= Auth::id();
		$test->save();
			
		Session::flash('message', 'Test/quiz successfully added.');
		return Redirect::to('tests');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	$results = DB::select('SELECT questions.id, questions.content, questions.choice1, questions.choice2, questions.choice3, questions.choice4, questions.answer, questions.test_id FROM questions INNER JOIN tests ON (questions.test_id = tests.id) WHERE teacher_id = ?', array(Auth::user()->id));

	return View::make('tests.show')->with('questions', $results);
	
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$testData = $this->tests->find($id);
        return View::make('tests.edit', $testData);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
				$testData = [
			'course_id' => Input::get('course_id'),
			'test_name' => Input::get('test_name'),
			'testDate' => Input::get('testDate')
        ];
        $rules = [
            'course_id' => '',
			'test_name' => '',
			'testDate' => ''
        ];
        $validator = Validator::make($testData, $rules);
		try{
			if ($validator->passes()) {
				$this->tests->edit($id, $testData);
				return Redirect::route('tests.index');
				Session::flash('message', 'Successfully edited test!');
				
			}
		}
		catch(\Exception $e){
			return Redirect::to('tests/' . $id . '/edit');
			//echo 'Error!! Invalid input!';
			Session::flash('message', 'Error!! Invalid input!');
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
            $this->tests->delete($id);
        
            return Redirect::route('tests.index');
     }


}
