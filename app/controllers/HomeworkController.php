<?php

use Illuminate\Support\MessageBag;
use Illuminate\Routing\Controller;

class HomeworkController extends \BaseController 
{
	private $homeworks;

	public function __construct(HomeworkModel $homeworks) 
	{
        $this->homeworks = $homeworks;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//for index views of homeworks
		$homeworks = Homework::all();
		
		return View::make('homeworks.index')
			->with('homeworks', $homeworks);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('homeworks.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'homework_instruction' => 'required'
		);

		$homework = new Homework;
		$homework->homework_instruction	= Input::get('homework_instruction');
		$homework->save();
			
		Session::flash('message', 'Homework successfully added.');
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
