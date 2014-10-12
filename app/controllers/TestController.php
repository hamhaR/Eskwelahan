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
	
		return View::make('tests.index')->with('tests', $tests);
	}




	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$results = DB::select('SELECT courses.id, courses.course_code, courses.course_title 
			-> FROM teacher_courses 
			-> INNER JOIN courses 
			-> ON (teacher_courses.course_id = courses.id) 
			-> WHERE teacher_id = ?', array(Auth::user()->id));

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
	//$results = DB::select('SELECT questions.id, questions.content, questions.choice1, questions.choice2, questions.choice3, questions.choice4, questions.answer, questions.test_id FROM questions INNER JOIN tests ON (questions.test_id = tests.id) WHERE teacher_id = ?', array(Auth::user()->id));
		if(Auth::user()->role == 'teacher'){
			$result = Question::where('test_id' , '=', $id)->get();
			return View::make('tests.show')->with(array(
				'questions'=> $result,
				'test_id' => $id
				));
		}
		else if(Auth::user()->role == 'student'){
			return View::make('tests.testfrontview', [
                    'test' => $this->tests->find($id)
       		 ]);
		}
		else{
			return Redirect::to('tests');
			Session::flash('message', 'Access denied!');
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
			'test_name' => Input::get('test_name'),
			'testDate' => Input::get('testDate')
        ];
        $rules = [
			'test_name' => '',
			'testDate' => ''
        ];
        $validator = Validator::make($testData, $rules);
		try{
			if ($validator->passes()) {
				$test = Test::find($id);
				$test->testDate = Input::get('testDate');
				$test->test_name = Input::get('test_name');
				$test->save();
				Session::flash('message', 'Successfully edited test!');
				return Redirect::to('tests');
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
        $test = Test::find($id);
		$test->delete();
		return Redirect::to('tests');
     }

    /**
	* Allows students to take test
    */

    public function taketest($id){
    	$questions = Question::where('test_id', '=', $id)->get();
    	return View::make('tests.taketest')-> with('questions', $questions);
	}

	public function testfrontview($id){
		return View::make('tests.testfrontview', [
                    'test' => $this->tests->find($id)
        ]);
	}
    


}
