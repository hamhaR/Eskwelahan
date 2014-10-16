<?php

use Illuminate\Support\MessageBag;
use Illuminate\Routing\Controller;

class TestAnswerController extends Controller 
{
	private $testanswers;

	

	public function __construct(TestModel $testanswers) 
	{
        $this->testanswers = $testanswers;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
			
		
}




	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{/*

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'student_id' 			=>	'',
			'test_id'				=> '',
			'question_id'			=> '',
			'user_answer'			=> 'required'
			
		);
		if($testanswer->question_id == null){
			return Redirect::to('tests');
		}
		else{

			$testanswer = new TestAnswer;
			$testanswer->student_id			= Auth::id();
			$testanswer->test_id 			= Input::get('test_id');
			$testanswer->question_id 		= Input::get('question_id');
			$testanswer->user_answer		= Input::get('user_answer');			

			$testanswer->save();
			
			//Session::flash('message', 'Test/quiz successfully added.');
			return Redirect::to('/taketest/{{ $test->id}}');
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
		if(Auth::user()->role == 'teacher'){
			$result = Question::where('test_id' , '=', $id)->get();
			return View::make('tests.show')->with(array(
				'questions'=> $result,
				'test_id' => $id
				));
		}
		else if(Auth::user()->role == 'student'){
			$test = Test::where('test_id', '=', $id)->get();
			$question = Question::where('test_id', '=', $test->id);
			return View::make('testanswer.taketest')->with(array(
				'tests'	=>	$test,
				'questions'	=> $question
				));
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

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        
     }


	public function testfrontview($id){
		return View::make('tests.testfrontview', [
                    'test' => $this->tests->find($id)
        ]);
	}


}
