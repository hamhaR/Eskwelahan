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
		//return View::make('tests.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'question' 	=>	'required',
			'choice1'	=>	'required',
			'choice2' 	=>	'required',
			'choice3'	=>	'required',
			'choice4'	=>	'required',
			'answer'	=>	'required'
		);

		$test = new Test;
		$test->course_id 	= Input::get('course_id');
		$test->question		= Input::get('question');
		$test->choice1		= Input::get('choice1');
		$test->choice2		= Input::get('choice2');
		$test->choice3		= Input::get('choice3');
		$test->choice4		= Input::get('choice4');
		$test->answer		= Input::get('answer');
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
		//
	}


}
