<?php

class QuestionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{/*
		$user = Auth::user();

		if(Auth::check()){

			if($user->role == 'student'){
				//moredirect sa take test na module
			}

			if($user->role == 'teacher'){
				$questions = Question::where('test_id','=',$test->id)->orderBy('id','desc')->get();
				return View::make('question.index')->with('questions',$questions);
			}

			if($user->role == 'admin'){
				//do nothing
			}
			
			
		}
		else{
			echo "not logged in";
		}
		
		$tests = Test::find($id);
		if (! is_null($tests)){
			$questions = Question::all();
			
			return View::make('questions.index')
			->with('questions', $questions);
		}
		else{
			echo 'Test does not exist';
		}
		*/
		$user = Auth::user();
		$test = Test::find($id);

		if(Auth::check()){
					if($user->role == 'teacher'){
				$questions = Question::where('test_id','=',$test->id)->orderBy('id','desc')->get();
				return View::make('questions.index')->with('questions',$questions);
			}
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
			if($user->role == 'teacher'){
					return View::make('questions.index');
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
		$attributes = Input::all();

		if (! is_null($test_id)){
			$content = $attributes['content'];
			$choice1 = $attributes['choice1'];
			$choice2 = $attributes['choice2'];
			$choice3 = $attributes['choice3'];
			$choice4 = $attributes['choice4'];
			$answer  = $attributes['answer'];
		}

		$rules = array(
			'content' => 'required',
			'choice1' => 'required',
			'choice2' => 'required',
			'choice3' => 'required',
			'choice4' => 'required',
			'answer' => 'required'
		);


		$validator = Validator::make($attributes, $rules);
				
		if ($validator->fails()) {
			return Redirect::to('questions/index')
							->withErrors($validator)
							->withInput(Input::all());
		} else{
			$question = new Question;
			$question->content = $content;
			$question->choice1 = $choice1;
			$question->choice2 = $choice2;
			$question->choice3 = $choice3;
			$question->answer = $answer;
			//$question->test_id = 
			$question->teacher_id = Auth::user()->id;
			$question->save();

			$test = Test::where('test_name', '=', $test_name )->first();
			$question->test()->attach($test->id);
			return Redirect::to('/questions');
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
	public function destroy($section_id)
	{
		
	}


}
