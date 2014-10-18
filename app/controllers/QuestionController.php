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
			'a'		=> 'required',
			'b'		=> 'required',
			'c' 	=>	'required',
			'd'		=> 'required',
			'correct_answer'		=> 'required',
			'test_id'		=> ''
			//'teacher_id'	=> 'required'
			
		);

		$question = new Question;
		$question->content 		= Input::get('content');
		$question->a		= Input::get('a');
		$question->b		= Input::get('b');
		$question->c 		= Input::get('c');
		$question->d		= Input::get('d');
		$question->correct_answer		= Input::get('correct_answer');
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
					'a' => Input::get('a'),
					'b' => Input::get('b'),
					'c' => Input::get('c'),
					'd' => Input::get('d'),
					'correct_answer' => Input::get('correct_answer')

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
		$questionData = [
			'content' => Input::get('content'),
			'a' => Input::get('a'),
			'b' => Input::get('b'),
			'c' => Input::get('c'),
			'd' => Input::get('d'),
			'correct_answer' => Input::get('correct_answer')
        ];
        $rules = [
			'content' => '',
			'a' => '',
			'b' => '',
			'c' => '',
			'd' => '',
			'correct_answer' => ''
        ];
        $validator = Validator::make($questionData, $rules);
		try{
			if ($validator->passes()) {
				$question = Question::find($id);
				$question->content = Input::get('content');
				$question->a = Input::get('a');
				$question->b = Input::get('b');
				$question->c = Input::get('c');
				$question->d = Input::get('d');
				$question->correct_answer  = Input::get('correct_answer');
				$question->save();
				Session::flash('message', 'Successfully edited question!');
				return Redirect::to('tests/' . $question->test_id);
			}
		}
		catch(\Exception $e){
			return Redirect::to('tests/' .$question->test_id);
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
		$question = Question::find($id);
		$question->delete();
		return Redirect::to('tests/' . $question->test_id);
		//echo $question->id;


	}



	

}
