<?php

use Illuminate\Support\MessageBag;
use Illuminate\Routing\Controller;

class QuestionController extends Controller 
{
	private $questions;
	//private $tests;

	
	public function __construct(QuestionModel $questions) 
	{
        $this->questions = $questions;
        //$this->tests = $tests;
    }



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//for index views of questions
		//$c = $courses->all();
		$questions = Question::all();
		//$tests = Test::where();
		
		return View::make('questions.index')
			->with('questions', $questions);
			//->with('tests', $tests);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('questions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'content' 	=>	'required',
			'correct_answer'		=> 'required',
			'teacher_id'	=>	'required'
		);

		$question = new Question;
		$question->content				= Input::get('content');
		$question->correct_answer 		= Input::get('correct_answer');
		$question->teacher_id			= Input::get('teacher_id');
		$question->save();
			
		//Session::flash('message', 'question/quiz successfully added.');
		return Redirect::to('questions/index')->with('message', 'question is successfully added!');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('questions.show', [
                    'question' => $this->questions->find($id)
        ]);
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
