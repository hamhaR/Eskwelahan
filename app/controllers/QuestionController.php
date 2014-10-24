<?php

class QuestionController extends \BaseController {

	public function __construct(QuestionModel $questions) 
	{
        $this->questions = $questions;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$questions = Question::orderBy('id', 'desc')->paginate(4);
		
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
		$attributes = Input::all();
		$questionData = [
			'content' 			=> 	$attributes['content'],
			'a'		 			=> 	$attributes['a'],
			'b'					=> 	$attributes['b'],
			'c'					=> 	$attributes['c'],
			'd'					=> 	$attributes['d'],
			'correct_answer'	=> 	$attributes['correct_answer'],
			'test_id'			=>	$attributes['test_id']
		];

		$rules = [
			'content' 			=> 	'required',
			'a'	 				=> 	'required',
			'b'					=> 	'required',
			'c' 				=> 	'required',
			'd' 				=> 	'required',
			'correct_answer'	=>	'required|max:1',
			'test_id' 			=> 	''
		];

		$messages = array(
    	'required' => 'The :attribute field is required.',
);

		$validator = Validator::make($questionData, $rules, $messages);
				
		if ($validator->fails()) {
			if(($attributes['content'] == null) || ($attributes['a'] == null) || ($attributes['b'] == null) || ($attributes['c'] == null) || ($attributes['d'] == null) || ($attributes['correct_answer'] == null)){
				Session::flash('message', 'Error, required field left blank.');
				return Redirect::to('/tests/'. $attributes['test_id'] );
			}
			else{ //kung ang gi input sa answer kay more than one choice
				Session::flash('message', 'Invalid input! Just enter only 1 correct answer');
				return Redirect::to('/tests/'. $attributes['test_id'] );
			}
			
		} 
		else{
			$question = new Question;
				$question->content 			= 	Input::get('content');
				$question->a 				= 	Input::get('a');
				$question->b 				=	Input::get('b');
				$question->c 				=	Input::get('c');
				$question->d 				=	Input::get('d');
				$question->correct_answer 	=	Input::get('correct_answer');
				$question->test_id 			=	Input::get('test_id');
					
				$question->save();
				Session::flash('message', 'Question was  successfully added.');
				return Redirect::to('/tests/'. $attributes['test_id'] );
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
					'test' 				=> $test,
					'content' 			=> Input::get('content'),
					'a' 				=> Input::get('a'),
					'b' 				=> Input::get('b'),
					'c' 				=> Input::get('c'),
					'd' 				=> Input::get('d'),
					'correct_answer' 	=> Input::get('correct_answer')

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
		$question = Question::find($id);

		$attributes = [
			'content' 			=> Input::get('content'),
			'a' 				=> Input::get('a'),
			'b' 				=> Input::get('b'),
			'c' 				=> Input::get('c'),
			'd' 				=> Input::get('d'),
			'correct_answer' 	=> Input::get('correct_answer')
		];

		$rules = [
			'content' 			=> '',
			'a' 				=> '',
			'b' 				=> '',
			'c' 				=> '',
			'd' 				=> '',
			'correct_answer' 	=> ''
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			Session::flash('Error! Invalid data!');
			return Redirect::to('tests/' . $question->test_id );
		} 
		else {
			// $original = $question->getOriginal(); //gets all old data sa database, dayon icompare sa updated data
			// if((Input::get('content') = $original['content']) && (Input::get('a') == $original['a']) && (Input::get('b') == $original['b']) && (Input::get('c') == $original['c']) && (Input::get('d') == $original['d']) && (Input::get('correct_answer') == $original['correct_answer'])){
			// 	Session::flash('message', 'No changes were made.');
			// 	return Redirect::to('tests/' . $question->test_id);
			// }
			// else{
				$question->content = Input::get('content');
				$question->a = Input::get('a');
				$question->b = Input::get('b');
				$question->c = Input::get('c');
				$question->d = Input::get('d');	
				$question->correct_answer  = Input::get('correct_answer');
				$question->save();
				Session::flash('message', 'Successfully edited question!');
				return Redirect::to('tests/' . $question->test_id);
			// }
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
