<?php

class QuestionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$questions = Question::all();
		
		return View::make('questions.index')
		->with('questions', $questions);
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
			if($user->role == 'teacher'){
					//return Redirect::{{}}('/');
			}

			else{
				echo "Access denied!";
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
		$rules = array(
			'content' 	=>	'required',
			'choice1'		=> 'required',
			'choice2'		=> 'required',
			'choice3' 	=>	'required',
			'choice4'		=> 'required',
			'answer'		=> 'required',
			'test_id'		=> ''
			//'teacher_id'	=> 'required'
			
		);

		$question = new Question;
		$question->content 		= Input::get('content');
		$question->choice1		= Input::get('choice1');
		$question->choice2		= Input::get('choice2');
		$question->choice3 		= Input::get('choice3');
		$question->choice4		= Input::get('choice1');
		$question->answer		= Input::get('answer');
		$question->test_id 		= Input::get('test_id');
		//$question->teacher_id		= Auth::id();
		$question->save();
			
		Session::flash('message', 'question successfully added.');
		return Redirect::to('/tests/'. $question->test_id );

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
			$test = Test::find($id);
			return View::make('questions.show')
				->with(array(
					'test' => $test,
					'content' => Input::get('content'),
					'choice1' => Input::get('choice1'),
					'choice2' => Input::get('choice2'),
					'choice3' => Input::get('choice3'),
					'choice4' => Input::get('choice4'),
					'answer' => Input::get('answer')

				)
			);			
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
		$question = Question::find($id);
		$question->delete();

	}


}
